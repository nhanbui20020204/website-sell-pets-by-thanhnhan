<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TrangChu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APITrangChuController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            TrangChu::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới thú cưng thành công!'
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function data()
    {
        $data   = TrangChu::get();

        return response()->json([
            'data'    => $data,
        ]);
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $TrangChu   = TrangChu::find($request->id);
            if($TrangChu) {
                if($TrangChu->tinh_trang == 1) {
                    $TrangChu->tinh_trang = 0;
                } else {
                    $TrangChu->tinh_trang = 1;
                }
                $TrangChu->save();
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

            $TrangChu   = TrangChu::find($request->id);
            if($TrangChu) {
                $data   = $request->all();
                $TrangChu->update($data);
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

            $TrangChu   = TrangChu::find($request->id);

            if($TrangChu) {
                $TrangChu->delete();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa thú thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Thú không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function TrangChu(Request $request)
    {
        $data = TrangChu::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function home()
    {
        $data = TrangChu::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    
}
