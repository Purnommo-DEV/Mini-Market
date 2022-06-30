@extends('layouts/home')
@section('name')
beranda
@endsection

@section('content')

<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Produk</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="tab-content">
                        <!-- Start Single Tab -->
                                <div class="row align-items-center" style="justify-content: center;">
                                    @foreach ( $data_produk as $data_produks)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
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
                                    </div>
                                    @endforeach
                                </div>
                        <!--/ End Single Tab -->
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