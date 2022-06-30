<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Shopping Summery -->
            <table class="table shopping-summery">
                <thead>
                    <tr class="main-hading">
                        <th>Produk</th>
                        <th>Nama</th>
                        <th class="text-center">Harga Satuan</th>
                        <th class="text-center">Kuantitas</th>
                        <th class="text-center">Total</th> 
                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $satuan = 0;
                        $total = 0;
                    @endphp
                    @foreach ($data_keranjang as $data_keranjangs)
                    <?php
                        $gambar_produk = \App\Models\GambarProduk::where('produk_id', $data_keranjangs->produk_id)->first();
                    ?>
                    
                        <tr>
                            <td class="image" data-title="No"><img src="{{ ('Admin/gambar/gambar_produk')}}/{{ $gambar_produk->gambar1 }}" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#">{{ $data_keranjangs->produk->nama_produk }}</a></p>
                                <p class="product-des">{{ $data_keranjangs->produk->deskripsi_produk }}</p>
                            </td>
                            <td class="price" data-title="Price"><span>@currency($data_keranjangs->produk->harga_jual_produk)</span></td>
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                <div class="input-group">

                                    <input class="span1" name="quantity" style="max-width: 40px; text-align:center" value="{{$data_keranjangs->kuantitas}}" type="text" data-min="1" data-max="{{$data_keranjangs->total_stok}}">
                                    <button class="btnItemUpdate qtyMinus btn-sm " type="button" data-cartid="{{$data_keranjangs->id}}" style="background-color: #007bff; border-radius:60%;"><i class="fa fa-minus" style="color: aliceblue"></i></button>
                                    <button class="btn-sm btnItemUpdate qtyPlus" type="button" data-cartid="{{$data_keranjangs->id}}" style="background-color: #007bff; border-radius:60%;"><i class="fa fa-plus" style="color: aliceblue"></i></button>
                                    @php $satuan = $data_keranjangs->harga_produk * $data_keranjangs->kuantitas; @endphp
                                    @php $total += $data_keranjangs->harga_produk * $data_keranjangs->kuantitas; @endphp

                                </div>
                                <!--/ End Input Order -->
                            </td>
                            <td class="total-amount" data-title="Total"><span>@currency($satuan)</span></td>
                            <td class="action"><button class="btnItemDelete" type="button" data-cartid="{{$data_keranjangs->id}}" data-title="Remove"><i class="ti-trash remove-icon"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--/ End Shopping Summery -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Total Amount -->
            <div class="total-amount">
                <div class="row">
                    <div class="col-lg-8 col-md-5 col-12">
                        <div class="left">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-12">
                        <div class="right">
                            <ul>
                                <li>Total<span>@currency($total)</span></li>
                            </ul>
                            <div class="button5">
                                <?php
                                    $data_keranjang = \App\Models\Keranjang::where('user_id', Auth::user()->id)->count();
                                ?>
                                @if ($data_keranjang > 0)
                                <a href="{{ route('Pemeriksaan') }}" class="btn">Periksa</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Total Amount -->
        </div>
    </div>
</div>