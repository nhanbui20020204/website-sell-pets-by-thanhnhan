<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DogController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIDogController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            DogController::create($data);
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
        $data   = DogController::get();

        return response()->json([
            'data'    => $data,
        ]);
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $DogController   = DogController::find($request->id);
            if($DogController) {
                if($DogController->tinh_trang == 1) {
                    $DogController->tinh_trang = 0;
                } else {
                    $DogController->tinh_trang = 1;
                }
                $DogController->save();
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

            $DogController   = DogController::find($request->id);
            if($DogController) {
                $data   = $request->all();
                $DogController->update($data);
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

            $DogController   = DogController::find($request->id);

            if($DogController) {
                $DogController->delete();
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
    public function DogController(Request $request)
    {
        $data = DogController::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function home()
    {
        $data = DogController::where('tinh_trang',1)->get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
    public function info(Request $request) {
        $data = DogController::find($request -> id);
        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }
}
