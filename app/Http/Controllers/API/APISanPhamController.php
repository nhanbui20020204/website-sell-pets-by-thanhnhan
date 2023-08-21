<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APISanPhamController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            SanPham::create($data);
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
        $data   = SanPham::get();

        return response()->json([
            'data'    => $data,
        ]);
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $SanPham   = SanPham::find($request->id);
            if($SanPham) {
                if($SanPham->trang_thai == 1) {
                    $SanPham->trang_thai = 0;
                } else {
                    $SanPham->trang_thai = 1;
                }
                $SanPham->save();
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

            $SanPham   = SanPham::find($request->id);
            if($SanPham) {
                $data   = $request->all();
                $SanPham->update($data);
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

            $SanPham   = SanPham::find($request->id);

            if($SanPham) {
                $SanPham->delete();
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
    public function SanPham(Request $request)
    {
        $data = SanPham::where('trang_thai',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function home()
    {
        $data = SanPham::where('trang_thai',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function info(Request $request) {
        $data = SanPham::find($request -> id);
        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }
}
