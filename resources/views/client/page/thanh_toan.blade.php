@extends('admin.master')
@section('noi_dung')
<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                        <h6 class="text-center"><b>Đã đặt hàng thành công</b></h6>
                </div>
                <div class="card-body">
                    <td class="align-middle text-center">
                        {{-- <img class="rounded-circle p-1 border" width="90px" height="90px" v-bind:src="value.hinh_anh"  alt=""> --}}
                        <img style="height:200px; weigh: 250px  "
                            src="https://cdn.eva.vn/upload/3-2021/images/2021-09-10/image7-1631240728-880-width650height490.jpg"
                            alt="">
                    </td><br>
                    <td><b>Mèo Anh Lông Ngắn</b></td><br>
                    <td>Mô Tả : Mèo Anh lông ngắn (tên tiếng Anh là British shorthair, gọi tắt: mèo Aln). Giống mèo này được du nhập vào Việt Nam vào khoảng những năm 2008 – 2010.</td><br>
                    <th><b>Thông Tin Người Nhận:</b> Thanh Nhân</th><br>
                    <th><b>Số Điện Thoại:</b> 0935070***</th><br>
                    <th><b>Địa Chỉ:</b> Hội An</th><br>
                    <th><b>Số Tiền Cần Thanh Toán:</b> 5.000.000đ</th><br>
                </div>
                <div class="card-footer text-center">
                    <a  href="/trang-chu"  class="btn btn-danger "><i class="fa-solid fa-house "></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
