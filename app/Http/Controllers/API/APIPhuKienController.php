<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PhuKien;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIPhuKienController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            PhuKien::create($data);
            DB::commit();
            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới thành công!'
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function data()
    {
        $data   = PhuKien::get();

        return response()->json([
            'data'    => $data,
        ]);
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $PhuKien   = PhuKien::find($request->id);
            if($PhuKien) {
                if($PhuKien->trang_thai == 1) {
                    $PhuKien->trang_thai = 0;
                } else {
                    $PhuKien->trang_thai = 1;
                }
                $PhuKien->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            $PhuKien   = PhuKien::find($request->id);
            if($PhuKien) {
                $data   = $request->all();
                $PhuKien->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $PhuKien   = PhuKien::find($request->id);

            if($PhuKien) {
                $PhuKien->delete();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function PhuKien(Request $request)
    {
        $data = PhuKien::where('trang_thai',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function home()
    {
        $data = PhuKien::where('trang_thai',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function info(Request $request) {
        $data = PhuKien::find($request -> id);
        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }
}
