@extends('share.master')
@section('noi_dung')
<div id="app">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        {{-- <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH SLIDE</h6>
        </div> --}}
        <div class="ms-auto">
            <button data-bs-toggle="modal" data-bs-target="#themSanPhamModal" type="button" class="btn btn-primary">Thêm Mới Sản Phầm</button>
            <div class="modal fade" id="themSanPhamModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm Mới Sản Phầm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <label class="mb-2">Tên Sản Phầm</label>
                                    <input v-model="them_moi.ten_san_pham" type="text" class="form-control" placeholder="Nhập vào tên Sản Phầm">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Slug Sản Phầm</label>
                                    <input v-model="them_moi.slug_san_pham" type="text" class="form-control" placeholder="Nhập vào slug Sản Phầm">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Hình Ảnh</label>
                                    <input v-model="them_moi.anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Giá Bán</label>
                                    <input v-model="them_moi.gia" type="text" class="form-control" placeholder="Nhập vào giá tiền">
                                </div>
                            </div>

                            <div class="row mb-2">

                                <div class="col-4">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select v-model="them_moi.trang_thai" class="form-control">
                                        <option value="1">Hiển Thị Trang Chủ</option>
                                        <option value="0">Không Hiển thị</option>
                                    </select>
                                </div>
                                <div class="col-8">
                                    <label class="mb-2">Mô Tả</label>
                                    <input v-model="them_moi.mieu_ta" type="text" class="form-control" placeholder="Nhập vào mô tả">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button v-on:click="themsanPham()" type="button" class="btn btn-primary">Thêm Sản Phẩm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
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
                                        <th class="text-center">Hiển Thị</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, key) in list">
                                        <tr>
                                            <th class="text-center align-middle">@{{key + 1}}</th>
                                            <th class="text-center align-middle">@{{value.ten_san_pham}}</th>
                                            <th class="text-center align-middle">@{{ format(value.gia) }}</th>
                                            <td class="align-middle text-center">
                                                <img class="rounded-circle p-1 border" width="90px" height="90px" v-bind:src="value.anh"  alt="">
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai == 1"  class="btn btn-primary">Hiển Thị</button>
                                                <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Tạm Tắt</button>
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button v-on:click="edit=value "  data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-info">Cập Nhật</button>
                                                <button v-on:click="tt_xoa = value"  data-bs-toggle="modal" data-bs-target="#delModal" class="btn btn-danger">Hủy Bỏ</button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                    <input type="hidden" id="id_xoa">
                                                <div class="text-dark">Bạn có chắc chắn muốn xóa sản phẩm <b  class="text-danger"></b> này không!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button v-on:click="xoa()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cập Nhật sản phẩm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <label class="mb-2">Tên sản phẩm</label>
                                                <input v-model="edit.ten_san_pham" type="text" class="form-control" placeholder="Nhập vào tên sản phẩm">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Slug sản phẩm</label>
                                                <input v-model="edit.slug_san_pham" type="text" class="form-control" placeholder="Nhập vào slug sản phẩm">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Hình Ảnh</label>
                                                <input v-model="edit.anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Giá Bán</label>
                                                <input v-model="edit.gia" type="text" class="form-control" placeholder="Nhập vào giá tiền">
                                            </div>
                                        </div>

                                        <div class="row mb-2">

                                            <div class="col-4">
                                                <label class="mb-2">Tình Trạng</label>
                                                <select v-model="edit.trang_thai" class="form-control">
                                                    <option value="1">Hiển Thị Trang Chủ</option>
                                                    <option value="0">Không Hiển thị</option>
                                                </select>
                                            </div>
                                            <div class="col-8">
                                                <label class="mb-2">Mô Tả</label>
                                                <input v-model="edit.mieu_ta" type="text" class="form-control" placeholder="Nhập vào mô tả">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capNhatSanPham()" type="button" class="btn btn-primary">Cập Nhật sản phẩm</button>
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
            el      :       '#app',
            data    :       {
                them_moi        :       {},
                list            :       [],
                edit            :       {},
                tt_xoa          :       {},
            },
            created()       {
                this.loadData();
            },
            methods:        {
                themsanPham() {
                    axios
                        .post('{{ Route("phuKienStore") }}', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                $("#themSanPhamModal").modal('hide');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                format(number) {
                    return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
                },
                loadData() {
                    axios
                        .post('{{ Route("phuKienData") }}')
                        .then((res) => {
                            this.list   = res.data.data;
                        });
                },
                xoaSlide() {
                    axios
                        .post('{{ Route("phuKienDel") }}', this.tt_xoa)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#deleteModal').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                capNhatSanPham() {
                    axios
                        .post('{{ Route("phuKienUpdate") }}', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#editModal').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                doiTrangThai(payload) {
                    axios
                        .post('{{ Route("phuKienStatus") }}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                xoa() {
                    axios
                        .post('{{ Route("phuKienDel") }}', this.tt_xoa)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#deleteModal').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },

            },
        });
    });
</script>
@endsection
