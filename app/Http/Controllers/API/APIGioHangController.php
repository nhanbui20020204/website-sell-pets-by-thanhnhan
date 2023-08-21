<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GioHang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIGioHangController extends Controller
{
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            GioHang::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã đặt hàng thành công!'
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
