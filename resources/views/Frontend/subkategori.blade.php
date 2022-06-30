@extends('layouts/home')
@section('name')
beranda
@endsection

@section('content')

<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Kategori</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    @foreach ( $data_produk as $data_produks)
                    <div class="single-product produk_data">
                        <div class="product-img">
                            <a href="{{ route('DetailProduk', $data_produks->slug_produk)}}">
                                @foreach (gambar_produk() as $gambar_produks)
                                @if ($gambar_produks->produk_id == $data_produks->id)
                                    <img class="default-img" src="{{ asset('Admin/gambar/gambar_produk')}}/{{ $gambar_produks->gambar1 }}" alt="#">
                                    <img class="hover-img" src="{{ asset('Admin/gambar/gambar_produk')}}/{{ $gambar_produks->gambar2 }}" alt="#">
                                    {{-- <span class="out-of-stock">Hot</span> --}}
                                @endif
                                @endforeach
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                </div>
                                <div class="product-action-2">
                                    <input type="hidden" class="produk_id" value="{{$data_produks->id}}">
                                    <input type="hidden" class="berat" value="{{$data_produks->berat_produk}}">
                                    <input type="hidden" class="harga" value="{{$data_produks->harga_jual_produk}}">
                                    <input type="hidden" class="form-control produk_kuantitas text-center" value="1">
                                    <a class="tambahKeKeranjangBtn">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('DetailProduk', $data_produks->slug_produk) }}">{{ $data_produks->nama_produk }}</a></h3>
                            <div class="product-price">
                                {{-- <span class="old">$60.00</span> --}}
                                <span>@currency($data_produks->harga_jual_produk)</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                                <div class="product-gallery">
                                    <div class="quickview-slider-active">
                                        <div class="single-slider">
                                            <img src="https://via.placeholder.com/569x528" alt="#">
                                        </div>
                                        <div class="single-slider">
                                            <img src="https://via.placeholder.com/569x528" alt="#">
                                        </div>
                                        <div class="single-slider">
                                            <img src="https://via.placeholder.com/569x528" alt="#">
                                        </div>
                                        <div class="single-slider">
                                            <img src="https://via.placeholder.com/569x528" alt="#">
                                        </div>
                                    </div>
                                </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Flared Shift Dress</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                    </div>
                                </div>
                                <h3>$29.00</h3>
                                <div class="quickview-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                </div>
                                <div class="size">
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
                                </div>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Add to cart</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
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
        $(document).ready(function () {
        $(".tambahKeKeranjangBtn").click(function (e) {
            e.preventDefault();
            var produk_id = $(this)
                .closest(".produk_data")
                .find(".produk_id")
                .val();
            var produk_kuantitas = $(this)
                .closest(".produk_data")
                .find(".produk_kuantitas")
                .val();
                var berat = $(this)
                .closest(".produk_data")
                .find(".berat")
                .val();
                var harga = $(this)
                .closest(".produk_data")
                .find(".harga")
                .val();
            $.ajax({
                method: "POST",
                url: "/simpan_ke_keranjang",
                data: {
                    produk_id: produk_id,
                    berat:berat,
                    harga:harga,
                    produk_kuantitas: produk_kuantitas
                },
                success: function (response) {
                    alert(response.status);
                    tampilProdukKeranjang();
                }
            });
        });
    });
</script>
@endsection