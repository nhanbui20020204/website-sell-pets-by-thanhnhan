<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ChiTiet;
use App\Models\TrangChu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIChiTietController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            ChiTiet::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm thành công!'
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function data()
    {
        $data   = ChiTiet::get();

        return response()->json([
            'data'    => $data,
        ]);
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $ChiTiet   = ChiTiet::find($request->id);
            if($ChiTiet) {
                if($ChiTiet->tinh_trang == 1) {
                    $ChiTiet->tinh_trang = 0;
                } else {
                    $ChiTiet->tinh_trang = 1;
                }
                $ChiTiet->save();
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

            $ChiTiet   = ChiTiet::find($request->id);
            if($ChiTiet) {
                $data   = $request->all();
                $ChiTiet->update($data);
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

            $ChiTiet   = ChiTiet::find($request->id);

            if($ChiTiet) {
                $ChiTiet->delete();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa thành công!'
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
    public function ChiTiet(Request $request)
    {
        $data = ChiTiet::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function home()
    {
        $data = ChiTiet::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function info(Request $request) {
        $data = TrangChu::find($request -> id);
        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }
}
