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
                        <li class="active"><a href="#">Register</a></li>
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
									<h3>Register Pengguna</h3>
								</div>
								<form class="form" action="{{ route('Register') }}" method="post">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nama<span>*</span></label>
												<input name="name" type="text" placeholder="" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" type="email" placeholder="" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nomor Hp<span>*</span></label>
												<input name="nomor_hp" type="text" placeholder="" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password<span>*</span></label>
												<input name="password" type="password" placeholder="" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Provinsi</label>
                                                <br>
                                                <select class="form-control provinsi" name="provinsi_id" aria-hidden="true">
                                                    <option value="0" required>-- Pilih Provinsi --</option>
                                                    @foreach ($provinsi as $provinsis => $value)
                                                        <option value="{{ $provinsis  }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>                        
										</div>
										<div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Kota</label>
                                                <br>
                                                <select class="form-control kota" name="kota_id" aria-hidden="true">
                                                    <option value="" required>-- Pilih Kota --</option>
                                                </select>
                                            </div>                        
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>Alamat<span>*</span></label>
												<textarea name="alamat" placeholder="" required></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Submit</button>
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
@section('script')
<script>
    $(document).ready(function(){
        //active select2
        $(".provinsi, .kota").select2({
            theme:'bootstrap4',dropdownCssClass: "bigdrop",
        });
        //ajax select kota asal
        $('select[name="provinsi_id"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/kota/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="kota_id"]').empty();
                        $('select[name="kota_id"]').append('<option value="">-- Pilih Kota --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="kota_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="kota_id"]').append('<option value="">-- Pilih Kota --</option>');
            }
        });
    });
</script>
@endsection