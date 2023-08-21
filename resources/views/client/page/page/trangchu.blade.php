@extends('admin.master')
@section('noi_dung')
    <div id="app">
        <div class="row">
            <div  class="text-center alert alert-info" role="alert">
                <h3>Thú Cưng Được Yêu Thích</h3>
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
                                    <a v-bind:href="'/trang-chu/detail/' + v.id" type="button" class="btn btn-outline-secondary">Chi tiết sản phẩm</a>
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
                                        <a  class="btn btn-danger">Thêm vào giỏ hàng</a>
                                <a href="/gio-hang"  class="btn btn-warning">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

        <div class="row">
            <div class="text-center alert alert-info" role="alert">
                <h3>Liên Quan Đến Thú Cưng</h3>
              </div>
            <template v-for="(value,key) in ds_thu">
                <div class="col-3 text-nowrap">
                    <div class="card" >
                        <div class="card-body">
                            <img v-bind:src="value.anh" class="img-fluid" style="height: 200px; weight: 250px">
                            <p>
                            <h5 class="text-start card-title">@{{ value.ten_san_pham }}</h5>
                            Giá:<b>@{{format(value.gia)}}</b>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a  v-bind:href="'/trang-chu/lien-quan/detail/' + value.id" type="button" class="btn btn-outline-secondary">Chi tiết sản phẩm</a>
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
                                    <a  class="btn btn-danger">Thêm vào giỏ hàng</a>
                                    <a href="/gio-hang"  class="btn btn-warning">Mua Ngay</a>
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
                ds_thu: [],
            },
            created() {
                this.loadData();
                this.loadData1();
            },
            methods: {
                format(number) {
                    return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
                },
                loadData() {
                    axios
                        .post('/api/trangchu')
                        .then((res) => {
                            this.list = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                loadData1() {
                    axios
                        .post('/api/san-pham')
                        .then((res) => {
                            this.ds_thu = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(key, value) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
            },
        });
    </script>
@endsection
