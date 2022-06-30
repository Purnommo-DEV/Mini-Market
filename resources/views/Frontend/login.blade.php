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
                        <li class="active"><a href="#">Login</a></li>
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
									<h3>Login Pengguna</h3>
								</div>
								<form class="form" action="{{ route('CekLogin') }}" method="post">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" type="email" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password<span>*</span></label>
												<input name="password" type="password" placeholder="">
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
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
        


@endsection