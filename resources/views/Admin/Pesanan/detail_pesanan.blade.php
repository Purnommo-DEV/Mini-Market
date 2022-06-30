@extends('Admin.Layout.master')
@section('konten')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-header" style="padding: 0.1rem 1.0rem;">
                                        <h4 class="card-title">Produk Pesanan</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="produk_pesanan" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Kuantitas</th>
                                                    <th>Harga Produk</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($produk_dipesan as $produk_dipesans)
                                                <tr>
                                                    <td>{{$produk_dipesans->produk->nama_produk}}</td>
                                                    <td>{{$produk_dipesans->kuantitas}}</td>
                                                    <td>@currency($produk_dipesans->produk->harga_jual_produk)</td>
                                                    @php
                                                    $sub_total = $produk_dipesans->produk->harga_jual_produk *
                                                    $produk_dipesans->kuantitas
                                                    @endphp
                                                    <td>@currency($sub_total)</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-header" style="padding: 0.1rem 1.0rem;">
                                        <h4 class="card-title">Alamat Pengiriman</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="alamat_pengiriman" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Penerima</th>
                                                    <th>Alamat</th>
                                                    <th>Nomor Hp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$detail_pesananPelanggan->user->name}}</td>
                                                    <td>{{$detail_pesananPelanggan->user->alamat}},
                                                        {{$detail_pesananPelanggan->user->kota->nama}},
                                                        {{$detail_pesananPelanggan->user->provinsi->nama}}
                                                    <td>{{$detail_pesananPelanggan->user->nomor_hp}}</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-6 col-md-12">
                            <div class="card-header" style="padding: 0.1rem 1.0rem;">
                                <h4 class="card-title" style="font-size: 14px;">Ringkasan</h4>
                            </div>
                            <div class="card card-pricing">
                                <ul class="specification-list">
                                    <li>
                                        <span class="name-specification">Total</span>
                                        <span
                                            class="status-specification">@currency($detail_pesananPelanggan->total_bayar)</span>
                                    </li>
                                    <li>
                                        <span class="name-specification">Status Pesanan</span>
                                        @if($detail_pesananPelanggan->status_pesanan == "Pending")
                                        <span class="status-specification" style="color: red">
                                            {{ $detail_pesananPelanggan->status_pesanan }}
                                        </span>
                                        @elseif($detail_pesananPelanggan->status_pesanan == "Dikemas")
                                        <span class="status-specification" style="color: rgb(255, 170, 0)">
                                            {{ $detail_pesananPelanggan->status_pesanan }}
                                        </span>
                                        @elseif($detail_pesananPelanggan->status_pesanan == "Dikirim")
                                        <span class="status-specification" style="color: rgb(217, 255, 0)">
                                            {{ $detail_pesananPelanggan->status_pesanan }}
                                        </span>
                                        @else
                                        <span class="status-specification" style="color: rgba(3, 202, 0, 0.648)">
                                            <b>{{ $detail_pesananPelanggan->status_pesanan }}</b>
                                        </span>
                                        @endif
                                    </li>
                                    <li>
                                        <span class="name-specification">Bukti Transfer</span>
                                    </li>
                                    <li style="display: inline;">
                                        <img class="card-img-top"
                                            src="{{asset('Admin/gambar/bukti_bayar')}}/{{ $bukti_bayar->bukti_bayar }}"
                                            alt="Card image cap" style="width: min-content; width: 40%;">
                                    </li>
                                </ul>
                                <div class="card-footer" style="padding: 0rem 1.0rem;">
                                    @if($bukti_bayar->status_verifikasi == 0)
                                    <button type="submit" class="btn btn-primary btn-block btn-xs" data-toggle="modal"
                                        data-target="#verifikasiPembayaran"><b>Verifikasi Pembayaran</b></button>
                                    @else
                                    <button class="btn btn-primary btn-block btn-xs" data-toggle="modal" ><b>Pembayaran Telah di Verifikasi</b></button>
                                    @endif
                                    <form action="{{ route('VerifikasiPembayaran') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="verifikasiPembayaran" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin Memverifikasi Pembayaran?
                                                        <input type="hidden" name="pesanan_id"
                                                            value="{{ $bukti_bayar->pesanan_id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-6 col-md-12">
                            <div class="card-header"style="padding: 0.1rem 1.0rem; ">
                                <h4 class="card-title" style="font-size: 14px;">Bukti Pembayaran</h4>
                            </div>
                            <div class="card card-pricing" style="padding: 0.1rem 1.0rem;display: block;">
                                <img class="card-img-top" src="../member/bukti_bayar/{{$transferPembayaran->bukti_bayar}}"
                        alt="Card image cap" style="width: min-content;">
                    </div>
                    <div class="card-footer" style="padding: 0rem 1.0rem;">
                        <button class="btn btn-primary btn-block btn-xs"><b>Verifikasi Pembayaran</b></button>
                    </div>
                </div> --}}

                <div class="col-sm-6 col-md-12">
                    @if($detail_pesananPelanggan->status_pesanan == "Terkirim")
                    @else
                    <div class="card-header" style="padding: 0.1rem 1.0rem;">
                        <h4 class="card-title" style="font-size: 14px;">Perbarui Status Pesanan</h4>
                    </div>
                    
                        <div class="card card-pricing">
                            <form action="{{ route('StatusPesananLogs') }}" method="POST">
                                @csrf
                                <ul class="specification-list">
                                    <li>
                                        <input type="hidden" name="pesanan_id" value="{{ $detail_pesananPelanggan->id }}">
                                        <select name="pesanan_status" id="pesanan_status" class="form-control">
                                            <option value="#" selected disabled> -- Pilih Status --</option>
                                            @if ($detail_pesananPelanggan->status_pesanan == "Pending")
                                                <option value="Dikemas">Dikemas</option>
                                            @elseif ($detail_pesananPelanggan->status_pesanan == "Dikemas")
                                                <option value="Dikirim">Dikirim</option>
                                            @elseif($detail_pesananPelanggan->status_pesanan == "Dikirim")
                                                <option value="Terkirim">Terkirim</option>
                                            @elseif($detail_pesananPelanggan->status_pesanan == "Terkirim")
                                                <option value="#" selected disabled> -- Selesai --</option>
                                            @endif
                                        </select>
                                            <hr>
                                            @if ($detail_pesananPelanggan->status_pesanan == "Dikemas")
                                                <input class="form-control" type="text" name="resi" id="resi" placeholder="Input Nomor Resi" required>
                                            @else
                                                <input class="form-control" type="text" name="resi" value="{{ $detail_pesananPelanggan->resi }}" id="resi" placeholder="Input Nomor Resi">
                                            @endif
                                    </li>
                                    <div class="card-footer" style="padding: 0rem 1.0rem;">
                                        @if($detail_pesananPelanggan->status_pesanan == "Terkirim")
                                        @else
                                        <button type="submit" class="btn btn-primary btn-block btn-xs">
                                            <b>Ubah Status Pesanan</b>
                                        </button>
                                        @endif
                                        <div>
                                </ul>
                            </form>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="produk_pesanan" class="display table table-striped table-hover">
                            @foreach ($pesananLogs as $logs)
                            <tr>
                                <td>{{$logs->pesanan_status}}</td>
                                <td>{{ date('F j, Y, g:i a', strtotime($logs->created_at)) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Resi</td>
                                <td>{{ $detail_pesananPelanggan->resi }} </td>
                            </tr>
                        </table>
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
    $("#resi").hide();
    $("#pesanan_status").on("change", function () {
        if (this.value == "Dikirim") {
            $("#resi").show();
        } else {
            $("#resi").hide();
        }
    });

</script>

@endsection
