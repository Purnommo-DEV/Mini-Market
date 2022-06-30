@extends('Admin.Layout.master')
@section('konten')
	<div class="content">
		<div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('HalamanTambahProduk') }}">
                                    <i class="fa fa-plus"></i>
                                    Tambah Pemasok
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kategoris" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_produk as $data_produks)
                                            <tr>
                                                <td>{{$data_produks->id}}</td>
                                                <td>{{$data_produks->nama_produk}}</td>
                                                <td>@currency($data_produks->harga_jual_produk)</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href = "{{ route('HalamanUbahProduk',$data_produks->id) }}" class="btn btn-link btn-primary"
                                                            data-original-title="Edit Pemasok">
                                                            <i class="fa fa-edit">Ubah</i>
                                                        </a>
                                                        <a href="#" produk-id="{{$data_produks->id}}" class="btn btn-link btn-danger hapusProduk" data-original-title="Hapus">
                                                            <i class="fa fa-times">Hapus</i>
                                                        </a>
													</div>
                                                </td>
                                            </tr>
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
    $('.hapusProduk').click(function(){
        //Buat variabel baru siswa_id, This mengacu pada clas yang di klik yaitu .delete kemudia ambil attributnya yaitu siswa_id
        var produk_id = $(this).attr('produk-id');
        swal({
        title: "Yakin ?",
        text: "Menghapus Data ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusProduk/"+produk_id;
                }
            });
        });
    </script>
@endsection