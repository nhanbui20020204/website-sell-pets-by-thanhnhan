@extends('share.master')
@section('noi_dung')
<div id="app">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        {{-- <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH SLIDE</h6>
        </div> --}}
        <div class="ms-auto">
            <button data-bs-toggle="modal" data-bs-target="#themThuModal" type="button" class="btn btn-primary">Thêm Mới Thú Cưng</button>
            <div class="modal fade" id="themThuModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm Mới Thú Cưng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <label class="mb-2">Tên Thú Cưng</label>
                                    <input v-model="them_moi.ten_thu" type="text" class="form-control" placeholder="Nhập vào tên thú cưng">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Slug thú cưng</label>
                                    <input v-model="them_moi.slug_thu" type="text" class="form-control" placeholder="Nhập vào slug thú cưng">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Hình Ảnh</label>
                                    <input v-model="them_moi.hinh_anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Thể Loại</label>
                                    <input v-model="them_moi.loai" type="text" class="form-control" placeholder="Nhập vào thể loại">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="mb-2">Giá Bán</label>
                                    <input v-model="them_moi.gia_ban" type="text" class="form-control" placeholder="Nhập vào giá tiền">
                                </div>
                                <div class="col-3">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select v-model="them_moi.tinh_trang" class="form-control">
                                        <option value="1">Hiển Thị Trang Chủ</option>
                                        <option value="0">Không Hiển thị</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="mb-2">Mô Tả</label>
                                    <input v-model="them_moi.mo_ta" type="text" class="form-control" placeholder="Nhập vào mô tả">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button v-on:click="themThu()" type="button" class="btn btn-primary">Thêm Thú Cưng</button>
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
                                        <th class="text-center">Tên Thú Cưng</th>
                                        <th class="text-center">Loại</th>
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
                                            <th class="text-center align-middle">@{{value.ten_thu}}</th>
                                            <th class="text-center align-middle">@{{value.loai}}</th>
                                            <th class="text-center align-middle">@{{ format(value.gia_ban) }}</th>
                                            <td class="align-middle text-center">
                                                <img class="rounded-circle p-1 border" width="90px" height="90px" v-bind:src="value.hinh_anh"  alt="">
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button v-on:click="doiTrangThai(value)" v-if="value.tinh_trang == 1"  class="btn btn-primary">Hiển Thị</button>
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
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa thú</h1>
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
                                                <div class="text-dark">Bạn có chắc chắn muốn xóa thú cưng <b  class="text-danger"></b> này không!</div>
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
                                        <h5 class="modal-title">Cập Nhật thú cưng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <label class="mb-2">Tên Thú Cưng</label>
                                                <input v-model="edit.ten_thu" type="text" class="form-control" placeholder="Nhập vào tên thú cưng">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Slug thú cưng</label>
                                                <input v-model="edit.slug_thu" type="text" class="form-control" placeholder="Nhập vào slug thú cưng">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Hình Ảnh</label>
                                                <input v-model="edit.hinh_anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Thể Loại</label>
                                                <input v-model="edit.loai" type="text" class="form-control" placeholder="Nhập vào thể loại">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="mb-2">Giá Bán</label>
                                                <input v-model="edit.gia_ban" type="text" class="form-control" placeholder="Nhập vào giá tiền">
                                            </div>
                                            <div class="col-3">
                                                <label class="mb-2">Tình Trạng</label>
                                                <select v-model="edit.tinh_trang" class="form-control">
                                                    <option value="1">Hiển Thị Trang Chủ</option>
                                                    <option value="0">Không Hiển thị</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label class="mb-2">Mô Tả</label>
                                                <input v-model="edit.mo_ta" type="text" class="form-control" placeholder="Nhập vào mô tả">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capNhatThu()" type="button" class="btn btn-primary">Cập Nhật Thú</button>
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
                themThu() {
                    axios
                        .post('{{ Route("dogStore") }}', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                $("#themThuModal").modal('hide');
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
                        .post('{{ Route("dogData") }}')
                        .then((res) => {
                            this.list   = res.data.data;
                        });
                },
                xoaSlide() {
                    axios
                        .post('{{ Route("dogDel") }}', this.tt_xoa)
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
                capNhatThu() {
                    axios
                        .post('{{ Route("dogUpdate") }}', this.edit)
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
                        .post('{{ Route("dogStatus") }}', payload)
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
                        .post('{{ Route("dogDel") }}', this.tt_xoa)
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
