@extends('share.master')
@section('noi_dung')
    <div id="app">
        <div class="row">
            <div class="text-center alert alert-info" role="alert">
                <h3>Chi Tiết Sản Phẩm</h3>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img v-bind:src="sanpham.anh" alt="" style="height:300px; weigh: 400px ">
                    </div>
                    <div class="col-8">
                        <div style="height: 300px" class="card ">
                            <div class="card-header">
                                <h5>@{{sanpham.ten_san_pham}}</h5>
                            </div>
                            <div class="card-body">
                                @{{sanpham.mieu_ta}}
                                <br>
                                Giá: <b>@{{format(sanpham.gia)}}</b>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-danger">Thêm vào giỏ hàng</a>
                                <a v-bind:href="link_mua_hang" class="btn btn-warning">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                sanpham: {},
                id: 0,
            },
            created()   {
                this.getIdPhong();
                this.loadData();
            },
            methods :   {
                format(number) {
                    return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
                },
                getIdPhong() {
                    var currentURL = window.location.href;
                    var parts = currentURL.split('/');
                    var number = parts[parts.length - 1];
                    if (!isNaN(number)) {
                        this.id = number;
                    } else {
                        console.log('Không tìm thấy số');
                    }
                },
                loadData() {
                    var payload = {
                        'id' : this.id,
                    }
                    axios.post('{{Route("thucAnInfo")}}', payload)
                        .then((res) => {
                            this.sanpham = res.data.data;
                        })
                        console.log(payload);
                }
            },
        });
    </script>
@endsection
