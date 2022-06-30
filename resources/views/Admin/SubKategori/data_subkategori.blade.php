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
                                    Tambah Sub Kategori
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
                                                    Tambah Sub Kategori
                                                </span> 
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('TambahSubKategori') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Kategori</label>
                                                                <select name="kategori_id" required>
                                                                    <option value="">--Pilih Kategori--</option>
                                                                    @foreach ($data_kategori as $data_kategoris)
                                                                        <option value="{{ $data_kategoris->id }}">{{ $data_kategoris->nama_kategori }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Sub Kategori</label>
                                                                <input type="text" class="form-control" name="nama_subkategori" placeholder="Contoh : Pakaian Pria" required>
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
                                            <th>Nama Kategori</th>
                                            <th>Nama Sub Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_subkategori as $data_subkategoris)
                                            <tr>
                                                <td>{{$data_subkategoris->kategori->nama_kategori}}</td>
                                                <td>{{$data_subkategoris->nama_subkategori}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href = "#" data-toggle="modal" data-target="#editKategori-{{ $data_subkategoris->id }}" class="btn btn-link btn-primary"
                                                            data-original-title="Edit Kategori">
                                                            <i class="fa fa-edit">Ubah</i>
                                                        </a>
                                                        <a href="#" kategori-id="{{$data_subkategoris->id}}" class="btn btn-link btn-danger hapusKategori" data-original-title="Hapus">
                                                            <i class="fa fa-times">Hapus</i>
                                                        </a>
													</div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editKategori-{{ $data_subkategoris->id }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header no-bd">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('UbahSubKategori', $data_subkategoris->id )}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Nama Kategori</label>
                                                                            <select name="kategori_id" required>
                                                                                @foreach ($data_kategori as $data_kategoris)
                                                                                @if ($data_subkategoris->kategori_id == $data_kategoris->id)
                                                                                    <option value="{{ $data_kategoris->id }}" selected>{{ $data_kategoris->nama_kategori }}</option>
                                                                                @else
                                                                                    <option value="{{ $data_kategoris->id }}">{{ $data_kategoris->nama_kategori }}</option>
                                                                                    <option value="">--Pilih Kategori--</option>
                                                                                @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Nama Sub Kategori</label>
                                                                            <input name="nama_subkategori" value="{{ $data_subkategoris->nama_subkategori }}" type="text"
                                                                                class="form-control" placeholder="Contoh : Pakaian Pria" required>
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
    $('.hapusKategori').click(function(){
        //Buat variabel baru siswa_id, This mengacu pada clas yang di klik yaitu .delete kemudia ambil attributnya yaitu siswa_id
        var kategori_id = $(this).attr('kategori-id');
        swal({
        title: "Yakin ?",
        text: "Menghapus Data ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusSubKategori/"+kategori_id;
                }
            });
        });
    </script>
@endsection