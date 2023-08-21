<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CatController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APICatController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            CatController::create($data);
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
        $data   = CatController::get();

        return response()->json([
            'data'    => $data,
        ]);
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $CatController   = CatController::find($request->id);
            if($CatController) {
                if($CatController->tinh_trang == 1) {
                    $CatController->tinh_trang = 0;
                } else {
                    $CatController->tinh_trang = 1;
                }
                $CatController->save();
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

            $CatController   = CatController::find($request->id);
            if($CatController) {
                $data   = $request->all();
                $CatController->update($data);
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

            $CatController   = CatController::find($request->id);

            if($CatController) {
                $CatController->delete();
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
    public function CatController(Request $request)
    {
        $data = CatController::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function home()
    {
        $data = CatController::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function info(Request $request) {
        $data = CatController::find($request -> id);
        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }
}
