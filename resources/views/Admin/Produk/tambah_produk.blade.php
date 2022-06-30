@extends('Admin.Layout.master')
@section('konten')

<div class="content">
    <div class="page-inner">
        @if ($errors->any())
            @foreach ($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        <form action="{{ route('TambahProduk') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Info Produk</div>
                            @if ($errors->any())
                            @foreach ($errors->all as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-floating-label">
                                        <select name="pemasok_id" value="{{ old('pemasok_id') }}" class="form-control input-solid" id="selectFloatingLabel2" required>
                                            <option value="">&nbsp;</option>
                                            @foreach ($data_pemasok as $data_pemasoks)
                                                <option value="{{ $data_pemasoks->id }}">{{ $data_pemasoks->nama_pemasok }}</option>
                                            @endforeach
                                        </select>
                                        <label for="selectFloatingLabel2" class="placeholder">Select</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="nama_produk" value="{{ old('name') }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Nama Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <select name="kategori_id" class="form-control input-solid kategori" id="selectFloatingLabel2" required>
                                            <option  value="0" required>&nbsp;</option>
                                            @foreach ($kategori as $kategoris => $value)
                                                <option value="{{ $kategoris }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        
                                        <label for="selectFloatingLabel2" class="placeholder">Pilih Kategori</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <select name="subkategori_id" class="form-control input-solid subkategori" id="selectFloatingLabel2" required>
                                            <option value="">&nbsp;</option>
                                        </select>
                                        <label for="selectFloatingLabel2" class="placeholder">Pilih Sub Kategori</label>
                                    </div>

                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="satuan_produk" value="{{ old('satuan_produk') }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Satuan</label>
                                    </div>

                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="berat_produk" value="{{ old('berat_produk') }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Berat Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="stok_produk" value="{{ old('stok_produk') }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Stok Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="harga_beli_produk" value="{{ old('harga_beli_produk') }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Harga Beli</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="harga_jual_produk" value="{{ old('harga_jual_produk') }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Harga Jual</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="diskon_produk" value="{{ old('diskon_produk') }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Diskon Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <textarea id="inputFloatingLabel2" type="text" name="deskripsi_produk" class="form-control input-solid" required>{{ old('deskripsi_produk') }}</textarea>
                                        <label for="inputFloatingLabel2" class="placeholder">Deskripsi Produk</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Gambar Produk</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Gambar 1</label>
                                        <input type="file" accept="image/png, image/jpeg" name="gambar1" value="{{ old('gambar1') }}" class="form-control-file" id="exampleFormControlFile1" required>
                                        <span class="text-danger">@error('gambar1') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Gambar 2</label>
                                        <input type="file" accept="image/png, image/jpeg" name="gambar2" value="{{ old('gambar2') }}" class="form-control-file" id="exampleFormControlFile1" required>
                                        <span class="text-danger">@error('gambar2') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Gambar 3</label>
                                        <input type="file" accept="image/png, image/jpeg" name="gambar3" value="{{ old('gambar3') }}" class="form-control-file" id="exampleFormControlFile1" required>
                                        <span class="text-danger">@error('gambar3') {{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8" >
                <button class="btn btn-success" type="submit">Submit</button>
                <a href="{{ route('HalamanDaftarProduk') }}" class="btn btn-danger" >Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        //active select2
        // $(".kategori, .subkategori").select2({
        //     theme:'bootstrap4',width:'style',
        // });
        //ajax select kota asal
        $('select[name="kategori_id"]').on('change', function () {
            let kategoriId = $(this).val();
            if (kategoriId) {
                jQuery.ajax({
                    url: '/dataKategori/'+kategoriId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="subkategori_id"]').empty();
                        $('select[name="subkategori_id"]').append('<option value=""></option>');
                        $.each(response, function (key, value) {
                            $('select[name="subkategori_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="subkategori_id"]').append('<option value=""></option>');
            }
        });
    });
</script>
@endsection