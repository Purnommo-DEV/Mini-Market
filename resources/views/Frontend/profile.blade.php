@extends('layouts/home')
@section('name')
beranda
@endsection
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('Home') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="#">Profil</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="contact-us" class="contact-us section">
    <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <ul class="nav nav-pills" style="justify-content: center;">
                                <li class="nav-item"><a class="nav-link active" href="#pesanan" data-toggle="tab">Pesanan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pesananBerhasil" data-toggle="tab">Selesai</a></li>
                            </ul>

                        <div><h3 class="card-title">  </h3></div>
                            <div class="tab-content">
                                @include('Frontend.profil.pesanan')
                                @include('Frontend.profil.pesanan_berhasil')
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="single-info">
                                <i class="fa fa-user"></i>
                                <h4 class="title">Nama</h4>
                                <ul>
                                    <li>{{ Auth::user()->name }}</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-envelope-open"></i>
                                <h4 class="title">Email:</h4>
                                <ul>
                                    <li><a href="#">{{ Auth::user()->email }}</a></li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-location-arrow"></i>
                                <h4 class="title">Alamat</h4>
                                <ul>
                                    <li>{{ Auth::user()->alamat}}, {{ Auth::user()->kota->nama }}, {{ Auth::user()->provinsi->nama }}</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-phone"></i>
                                <h4 class="title">Nomor HP</h4>
                                <ul>
                                    <li>{{ Auth::user()->nomor_hp }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection