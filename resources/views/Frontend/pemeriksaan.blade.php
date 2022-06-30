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
                        <li class="active"><a href="#">Pemeriksaan</a></li>
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
<div class="shopping-cart section">
    <form action="{{route('Pembayaran')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<!-- Form -->
							<form class="form" method="post" action="#">
								<div class="row">
                                    <table class="table shopping-summery">
                                        <thead>
                                            <tr class="main-hading">
                                                <th>Produk</th>
                                                <th>Nama</th>
                                                <th class="text-center">Harga Satuan</th>
                                                <th class="text-center">Kuantitas</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $satuan = 0;
                                            $total = 0;
                                            $sub_total = 0; $total_berat = 0;
                                            @endphp
                                            @foreach ($data_keranjang as $data_keranjangs)
                                            <?php
                                                $gambar_produk = \App\Models\GambarProduk::where('produk_id', $data_keranjangs->produk_id)->first();
                                            ?>
                                            <tr>
                                                <td class="image" data-title="No"><img src="{{ ('Admin/gambar/gambar_produk')}}/{{ $gambar_produk->gambar1 }}"
                                                        alt="#"></td>
                                                <td class="product-des" data-title="Description">
                                                    <p class="product-name"><a
                                                            href="#">{{ $data_keranjangs->produk->nama_produk }}</a></p>
                                                    <p class="product-des">{{ $data_keranjangs->produk->deskripsi_produk }}</p>
                                                </td>
                                                <td class="price" data-title="Price">
                                                    <span>@currency($data_keranjangs->produk->harga_jual_produk)</span></td>
                                                <td class="qty" data-title="Qty">
                                                    <!-- Input Order -->
                                                    <p class="product-des"><a href="#">{{ $data_keranjangs->kuantitas }}</a></p>
                                                    @php
                                                    $satuan = $data_keranjangs->harga_produk * $data_keranjangs->kuantitas;
                                                    $sub_total = $sub_total + ($data_keranjangs->harga_produk * $data_keranjangs->kuantitas);
                                                    $total += $data_keranjangs->harga_produk * $data_keranjangs->kuantitas;
                                                    @endphp
            
                                                    <!--/ End Input Order -->
                                                </td>
                                                <td class="total-amount" data-title="Total"><span>@currency($satuan)</span></td>
            
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Total Pembayaran</h2>
                                <div class="content">
                                    <ul>
                                        <li class="last">Total<span id="tampilTotal">@currency($total)</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Alamat Pengiriman</h2>
                                <div class="content">
                                    <ul>
                                        <li>
                                            {{ Auth::user()->alamat }}, {{ Auth::user()->kota->nama }},
                                            {{ Auth::user()->provinsi->nama }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="single-widget">
                                <h2>Pilih Jasa Pengiriman</h2>
                                <div class="content">
                                    <div class="checkbox" style="padding: 0px 50px;">
                                        @foreach ($cek_ongkir as $result)

                                        <input class="form-check-input" type="radio"
                                            id="jasaKirim{{ $result['service'] }}"
                                            value="{{ $result['cost'][0]['value'] }}" name="ongkos_kirim" required>
                                        <label for="jasaKirim{{ $result['service'] }}" style="position: inherit;">
                                            {{ $result['service'] }} - @currency($result['cost'][0]['value']) -
                                            {{ $result['cost'][0]['etd'] }} Hari
                                        </label>

                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="single-widget">
                                <h2>Metode Pembayaran</h2>
                                <div class="content">
                                    <div class="checkbox" style="padding: 0px 50px;">
                                        <input class="form-check-input" type="radio" id="metode_pembayaran" value="TF"
                                            name="metode_pembayaran" required>
                                        <label for="metode_pembayaran" style="position: inherit;">
                                            Transfer Bank
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn">Bayar</button>
                                    </div>
                                </div>
                            </div>
							<!--/ End Button Widget -->
						</div>
					</div>
                    <div class="col-lg-8 col-8 formTransfer">
                        <div class="checkout-form">
                            <h2 class="checkout-title">Transfer Bank</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Bank 1</label>
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6">
                                    <label>Bank 2</label>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Asal Bank</label>
                                    <input type="text" class="form-control" name="asal_bank" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Nama Pengirim</label>
                                    <input type="text" class="form-control" name="nama_pengirim" required>
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6">
                                    <label>Nomor Rekening</label>
                                    <input type="text" class="form-control" name="nomor_rekening" required>
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6">
                                    <label>Upload Bukti Transfer</label>
                                    <input type="file" name="bukti_bayar" accept="image/png, image/jpeg" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
				</div>
			</div>
		</section>
</form>
</div>
@endsection
@section('script')
<script>
    $(document).on('change', 'input[type=radio][name=ongkos_kirim]', function (event) {

        ongkir = $(this).attr('value');
        pengiriman = $(this).attr('id');

        var subtotal = "{{ $sub_total }}"
        var total = parseInt(ongkir) + parseInt(subtotal);
        $('#totalBayar').attr("value", total);
        $('#jasaPengiriman').attr("value", pengiriman);

        var reverse = total.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        total_dalam_rupiah = ribuan.join('.').split('').reverse().join('');
        $('#tampilTotal').text('Rp ' + total_dalam_rupiah);

    });
    $(function () {
        $(".formTransfer").hide();
        $("#metode_pembayaran").on("click", function () {
            $(".formTransfer").toggle(this.checked);
        });
    });

</script>
@endsection
