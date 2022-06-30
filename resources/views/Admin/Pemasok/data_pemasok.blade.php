@extends('Admin.Layout.master')
@section('konten')
	<div class="content">
		<div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tmbKategori">
                                    <i class="fa fa-plus"></i>
                                    Tambah Pemasok
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="tmbKategori" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Tambah Pemasok
                                                </span> 
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('TambahPemasok') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Pemasok</label>
                                                                <input type="text" class="form-control" name="nama_pemasok" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Telpon Pemasok</label>
                                                                <input type="text" class="form-control" name="telp_pemasok" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Alamat Pemasok</label>
                                                                <textarea class="form-control" name="alamat_pemasok" id="" cols="30" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Deskripsi Pemasok</label>
                                                                <textarea class="form-control" name="deskripsi_pemasok" id="" cols="30" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="kategoris" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Nama Pemasok</th>
                                            <th>Telpon</th>
                                            <th>Alamat</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pemasok as $data_pemasoks)
                                            <tr>
                                                <td>{{$data_pemasoks->nama_pemasok}}</td>
                                                <td>{{$data_pemasoks->telp_pemasok}}</td>
                                                <td>{{$data_pemasoks->alamat_pemasok}}</td>
                                                <td>{{$data_pemasoks->deskripsi_pemasok}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href = "#" data-toggle="modal" data-target="#editPemasok-{{ $data_pemasoks->id }}" class="btn btn-link btn-primary"
                                                            data-original-title="Edit Pemasok">
                                                            <i class="fa fa-edit">Ubah</i>
                                                        </a>
                                                        <a href="#" pemasok-id="{{$data_pemasoks->id}}" class="btn btn-link btn-danger hapusPemasok" data-original-title="Hapus">
                                                            <i class="fa fa-times">Hapus</i>
                                                        </a>
													</div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="editPemasok-{{ $data_pemasoks->id }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header no-bd">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('UbahPemasok', $data_pemasoks->id )}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Nama Pemasok</label>
                                                                            <input type="text" class="form-control" value="{{ $data_pemasoks->nama_pemasok }}" name="nama_pemasok" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Telpon Pemasok</label>
                                                                            <input type="text" class="form-control" value="{{ $data_pemasoks->telp_pemasok }}" name="telp_pemasok" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Alamat Pemasok</label>
                                                                            <textarea class="form-control" name="alamat_pemasok" id="" cols="30" rows="3">{{ $data_pemasoks->alamat_pemasok }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Deskripsi Pemasok</label>
                                                                            <textarea class="form-control" name="deskripsi_pemasok" id="" cols="30" rows="3">{{ $data_pemasoks->deskripsi_pemasok }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer no-bd">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
    //Jika ada class yang bernama delete lalu di klik maka jalankan function() dan tampilkan alert(1) atau pesan
    $('.hapusPemasok').click(function(){
        //Buat variabel baru siswa_id, This mengacu pada clas yang di klik yaitu .delete kemudia ambil attributnya yaitu siswa_id
        var pemasok_id = $(this).attr('pemasok-id');
        swal({
        title: "Yakin ?",
        text: "Menghapus Data ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusPemasok/"+pemasok_id;
                }
            });
        });
    </script>
@endsection