@extends('Admin.Layout.master')
@section('konten')

<div class="content">
    <div class="page-inner">
        @if ($errors->any())
            @foreach ($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        <form action="{{ route('UbahProduk', $data_produk->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <select name="pemasok_id" value="{{ $data_produk->pemasok_id}}" class="form-control input-solid" id="selectFloatingLabel2" required>
                                            <option value="">&nbsp;</option>
                                            @foreach ($data_pemasok as $data_pemasoks)
                                            @if ($data_produk->pemasok_id == $data_pemasoks->id)
                                                <option value="{{ $data_pemasoks->id }}" selected>{{ $data_pemasoks->nama_pemasok }}</option>
                                            @else
                                                <option value="{{ $data_pemasoks->id }}">{{ $data_pemasoks->nama_pemasok }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <label for="selectFloatingLabel2" class="placeholder">Select</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="nama_produk" value="{{ $data_produk->nama_produk }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Nama Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <select name="kategori_id" value="{{ old('kategori_id') }}" class="form-control input-solid" id="selectFloatingLabel2" required>
                                            <option value="">&nbsp;</option>
                                            @foreach ($kategori as $kategoris)
                                                @if ($data_produk->kategori_id == $kategoris->id)
                                                    <option value="{{ $kategoris->id }}" selected>{{ $kategoris->nama_kategori }}</option>
                                                @else
                                                    <option value="{{ $kategoris->id }}">{{ $kategoris->nama_kategori }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="selectFloatingLabel2" class="placeholder">Select</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <select name="subkategori_id" value="{{ old('subkategori_id') }}" class="form-control input-solid" id="selectFloatingLabel2" required>
                                            <option value="">&nbsp;</option>
                                            @foreach ($subkategori as $subkategoris)
                                            @if ($data_produk->subkategori_id == $subkategoris->id)
                                                <option value="{{ $subkategoris->id }}" selected>{{ $subkategoris->nama_subkategori }}</option>
                                            @else
                                                <option value="{{ $subkategoris->id }}">{{ $subkategoris->nama_subkategori }}</option>
                                            @endif    
                                            @endforeach
                                        </select>
                                        <label for="selectFloatingLabel2" class="placeholder">Select</label>
                                    </div>

                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="satuan_produk" value="{{ $data_produk->satuan_produk }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Satuan</label>
                                    </div>

                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="berat_produk" value="{{ $data_produk->berat_produk }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Berat Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="stok_produk" value="{{ $data_produk->stok_produk }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Stok Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="harga_beli_produk" value="{{ $data_produk->harga_beli_produk }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Harga Beli</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="harga_jual_produk" value="{{ $data_produk->harga_jual_produk }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Harga Jual</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <input id="inputFloatingLabel2" type="text" name="diskon_produk" value="{{ $data_produk->diskon_produk }}" class="form-control input-solid" required>
                                        <label for="inputFloatingLabel2" class="placeholder">Diskon Produk</label>
                                    </div>
                                    <div class="form-group form-floating-label">
                                        <textarea id="inputFloatingLabel2" type="text" name="deskripsi_produk" value="{{ $data_produk->deskripsi_produk }}" class="form-control input-solid" required>{{ $data_produk->deskripsi_produk }}</textarea>
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
                                        <input type="file" accept="image/png, image/jpeg" name="gambar1" value="{{ $data_gambar_produk->gambar1 }}" class="form-control-file" id="exampleFormControlFile1">
                                        <img src="{{ asset('Admin/gambar/gambar_produk') }}/{{ $data_gambar_produk->gambar1 }}">
                                        <span class="text-danger">@error('gambar1') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Gambar 2</label>
                                        <input type="file" accept="image/png, image/jpeg" name="gambar2" value="{{ $data_gambar_produk->gambar2 }}" class="form-control-file" id="exampleFormControlFile1">
                                        <img src="{{ asset('Admin/gambar/gambar_produk') }}/{{ $data_gambar_produk->gambar2 }}">
                                        <span class="text-danger">@error('gambar2') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Gambar 3</label>
                                        <input type="file" accept="image/png, image/jpeg" name="gambar3" value="{{ $data_gambar_produk->gambar3 }}" class="form-control-file" id="exampleFormControlFile1">
                                        <img src="{{ asset('Admin/gambar/gambar_produk') }}/{{ $data_gambar_produk->gambar3 }}">
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