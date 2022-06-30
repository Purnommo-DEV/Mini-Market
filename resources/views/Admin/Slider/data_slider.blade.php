@extends('Admin.Layout.master')
@section('konten')
	<div class="content">
		<div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tmbSlider">
                                    <i class="fa fa-plus"></i>
                                    Tambah Slider
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="tmbSlider" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Tambah Slider
                                                </span> 
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('TambahSlider') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Judul</label>
                                                            <input type="text" class="form-control" name="judul" placeholder="Slider">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Deskripsi</label>
                                                            <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Gambar Slider</label>
                                                            <input type="file" class="form-control" name="gambar_slider" accept="image/png, image/jpeg" placeholder="Gambar">
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
                                <table id="Sliders" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_slider as $data_sliders)
                                            <tr>
                                                <td>{{$data_sliders->judul}}</td>
                                                 <td>{{$data_sliders->deskripsi}}</td>
                                                <td><img src="{{ asset('Admin/gambar/gambar_slider') }}/{{ $data_sliders->gambar_slider }}" width="100" alt="Tidak Ada Gambar"></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href = "#" data-toggle="modal" data-target="#editSlider-{{ $data_sliders->id }}" class="btn btn-link btn-primary"
                                                            data-original-title="Edit Slider">
                                                            <i class="fa fa-edit">Ubah</i>
                                                        </a>
                                                        <a href="#" Slider-id="{{$data_sliders->id}}" class="btn btn-link btn-danger hapusSlider" data-original-title="Hapus">
                                                            <i class="fa fa-times">Hapus</i>
                                                        </a>
													</div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="editSlider-{{ $data_sliders->id }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header no-bd">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('UbahSlider', $data_sliders->id )}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Judul</label>
                                                                            <input name="judul" value="{{ $data_sliders->judul }}" type="text"
                                                                                class="form-control" placeholder="Contoh : Koko Kurta">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Deskripsi</label>
                                                                            <input name="deskripsi" value="{{ $data_sliders->deskripsi }}" type="text"
                                                                                class="form-control" placeholder="Contoh : Koko Kurta">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Gambar</label>
                                                                            <input name="gambar_slider" type="file" accept="image/png, image/jpeg" value="{{ $data_sliders->gambar_slider }}"
                                                                                class="form-control">
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
    $('.hapusSlider').click(function(){
        //Buat variabel baru siswa_id, This mengacu pada clas yang di klik yaitu .delete kemudia ambil attributnya yaitu siswa_id
        var Slider_id = $(this).attr('Slider-id');
        swal({
        title: "Yakin ?",
        text: "Menghapus Data ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusSlider/"+Slider_id;
                }
            });
        });
    </script>
@endsection