@extends('layouts/home')
@section('name')
beranda
@endsection

@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('Home') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="#">Detail Produk</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Product Style -->
<!-- Start Checkout -->

<!-- End Shop Newsletter -->
<div class="container mb-5" role="document">
    <div class="modal-content">
        <div class="modal-header">
           
        </div>
        <div class="modal-body">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                <div class="single-slider">
                                    <img src="{{ asset('Admin/gambar/gambar_produk') }}/{{ $gambar_produk->gambar1 }}" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="{{ asset('Admin/gambar/gambar_produk') }}/{{ $gambar_produk->gambar2 }}" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="{{ asset('Admin/gambar/gambar_produk') }}/{{ $gambar_produk->gambar3 }}" alt="#">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="quickview-content">
                        <h2>{{ $data_produk->nama_produk }}</h2>
                       <h6>{{ $data_produk->stok_produk }} Stok</h6>
                        <h3>@currency($data_produk->harga_jual_produk)</h3>
                        <div class="quickview-peragraph">
                            <p>{{ $data_produk->deskripsi_produk }}</p>
                        </div>
                        {{-- <div class="size">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <h5 class="title">Size</h5>
                                    <select>
                                        <option selected="selected">s</option>
                                        <option>m</option>
                                        <option>l</option>
                                        <option>xl</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <h5 class="title">Color</h5>
                                    <select>
                                        <option selected="selected">orange</option>
                                        <option>purple</option>
                                        <option>black</option>
                                        <option>pink</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <form>
                            <input type="hidden" id="produk_id" name="produk_id" value="{{ $data_produk->id }}" hidden>
                            <input type="hidden" id="berat_produk" name="berat_produk" value="{{ $data_produk->berat_produk }}" hidden>
                            <input type="hidden" id="harga_produk" name="harga_produk" value="{{ $data_produk->harga_jual_produk }}" hidden>
                        <div class="quantity">
                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="kuantitas">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>
                                <input type="text" id="kuantitas" name="kuantitas" class="input-number"  data-min="1" data-max="{{ $data_produk->stok_produk }}" value="1">
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="kuantitas">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="btn btn-submit">Add to cart</button>
                            {{-- <a href="#" class="btn min"><i class="ti-heart"></i></a>
                            <a href="#" class="btn min"><i class="fa fa-compress"></i></a> --}}
                        </div>
                        </form>
                        {{-- <div class="default-social">
                            <h4 class="share-now">Share:</h4>
                            <ul>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".btn-submit").click(function(e){
 
        e.preventDefault();

        var produk_id = $("#produk_id").val();
        var berat_produk = $("#berat_produk").val();
        var harga_produk = $("#harga_produk").val();
        var kuantitas =  $("#kuantitas").val();

        $.ajax({
            type:'POST',
            url:"{{ route('TambahKeKeranjang') }}",
            data:{produk_id:produk_id, berat_produk:berat_produk, harga_produk:harga_produk, kuantitas:kuantitas},
            success:function(data){
            alert(data.success);
            tampilProdukKeranjang();
            }
        });
    });
</script>
@endsection