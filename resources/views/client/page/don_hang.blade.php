@extends('admin.master')
@section('noi_dung')
    <div>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase">DANH SÁCH GIỎ HÀNG</h6>
            </div>
        </div>
        <hr />
        <div id="app" class="row">
            <div class="col">
                <div class="card border-primary border-bottom border-3 border-0">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableA" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tên Sản Phẩm</th>
                                            <th class="text-center">Giá Bán</th>
                                            <th class="text-center">Hình Ảnh</th>
                                            <th class="text-center">Số Lượng</th>
                                            <th class="text-center">Thành Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th class="text-center align-middle">1</th>
                                            <th class="text-center align-middle">Mèo lông ngắn Anh</th>
                                            <th class="text-center align-middle">5.000.000 ₫</th>
                                            <td class="align-middle text-center">
                                                {{-- <img class="rounded-circle p-1 border" width="90px" height="90px" v-bind:src="value.hinh_anh"  alt=""> --}}
                                                <img style="height:300px; weigh: 400px "
                                                    src="https://cdn.eva.vn/upload/3-2021/images/2021-09-10/image7-1631240728-880-width650height490.jpg"
                                                    alt="">
                                            </td>
                                            <th class="text-center align-middle">1</th>
                                            <th class="text-center align-middle">5.000.000 ₫</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="ms-auto">
                                <button data-bs-toggle="modal" data-bs-target="#editModal" type="button"
                                    class="btn btn-danger">Đặt hàng</button>
                                <div class="modal fade" id="editModal" aria-labelledby="exampleModalLabel" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Thông tin giao hàng</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-2">
                                                        <label class="mb-2 text-start">Họ và tên</label>
                                                        <input v-model="them_moi.ten" type="text" class="form-control"
                                                            placeholder="">
                                                    <div class="row mb-2">
                                                        <label class="mb-2 text-start">Email</label>
                                                        <input v-model="them_moi.email" type="text" class="form-control"
                                                            placeholder="">
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="mb-2 text-start">Số Điện Thoại</label>
                                                        <input v-model="them_moi.so_dien_thoai" type="text"
                                                            class="form-control" placeholder="">
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="mb-2 text-start">Địa Chỉ</label>
                                                        <input v-model="them_moi.dia_chi" type="text"
                                                            class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a v-on:click="them()" href="/thanh-toan" type="button"
                                                    class="btn btn-primary">Xác Nhận</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    them_moi: {},
                },
                created() {},
                methods: {
                    them() {
                        axios
                            .post('{{ Route('gioHangUpdate') }}', this.them_moi)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    $("#editModal").modal('hide');
                                    this.loadData();
                                } else {
                                    toastr.success(res.data.message, 'Success');
                                }
                            });
                    },

                },
            });
        });
    </script>
@endsection
