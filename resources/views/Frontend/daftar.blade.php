@extends('layouts/home')
@section('name')
beranda
@endsection
@include('includes.breadcump')
@section('content')
<!-- Breadcrumbs -->
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

	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Get in touch</h4>
									<h3>Write us a message</h3>
								</div>
								<form class="form" action="{{ route('Register') }}" method="post">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nama<span>*</span></label>
												<input name="name" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" type="email" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password<span>*</span></label>
												<input name="password" type="email" placeholder="">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nomor Hp<span>*</span></label>
												<input name="nomor_hp" type="text" placeholder="">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Provinsi<span>*</span></label>
												<input name="provinsi_id" type="text" placeholder="">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Kota<span>*</span></label>
												<input name="kota_id" type="text" placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>Alamat<span>*</span></label>
												<textarea name="message" placeholder=""></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Submnit</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>+123 456-789-1120</li>
										<li>+522 672-452-1120</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
										<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
        


@endsection