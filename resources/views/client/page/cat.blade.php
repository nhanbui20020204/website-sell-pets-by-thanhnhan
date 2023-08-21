@extends('share.master')
@section('noi_dung')
    <div id="app">
        <div class="row">
            <div  class="text-center alert alert-info" role="alert">
                <h3>Danh Sách Mèo Cưng</h3>
              </div>
                <template v-for="(v,k) in list">
                    <div class="col-3 text-nowrap">
                        <div class="card" >
                            <div class="card-body">
                                <img v-bind:src="v.hinh_anh" class="img-fluid" style="height: 200px; weight: 250px">
                                <p>
                                <h5 class="text-start card-title">@{{ v.ten_thu }}</h5>
                                Giá:<b>@{{format(v.gia_ban)}}</b>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a v-bind:href="'/meo/detail/' + v.id"  type="button" class="btn btn-outline-secondary">Chi tiết sản phẩm</a>
                                  </div>
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="row text-nowrap">
                                    {{-- <div class="col">
                                        <div class="input-group mb-3">
                                            <span v-on:click="tru()" class="input-group-text">-</span>
                                            <input type="number" class="form-control text-center" v-bind:value="so_luong_mua">
                                            <span v-on:click="cong()" class="input-group-text">+</span>
                                        </div>
                                    </div> --}}
                                    <div class="col text-end">
                                        <a href="/register" class="btn btn-danger">Thêm vào giỏ hàng</a>
                                        <a href="/register"  class="btn btn-warning">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
    </div>

@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                list: [],
            },
            created() {
                this.loadData();
            },
            methods: {
                format(number) {
                    return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
                },
                loadData() {
                    axios
                        .post('/api/cat')
                        .then((res) => {
                            this.list = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
            },
        });
    </script>
@endsection
