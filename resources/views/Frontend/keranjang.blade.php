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
                        <li class="active"><a href="#">Keanjang</a></li>
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

<div id="GabungKeranjang">
    @include('Frontend.isi_keranjang')
</div>

</div>
<!--/ End Shopping Cart -->
@endsection
@section('script')
    <script>
            $(document).on('click','.btnItemUpdate', function(){
            if($(this).hasClass('qtyMinus')){
                var kuantitas = $(this).prev().val();
                if(kuantitas<=1){
                    alert("Tidak Bisa 0");
                    return false;
                }else{
					kuantitas_baru = parseInt(kuantitas)-1;
				}
            }
			if($(this).hasClass('qtyPlus')){
                var kuantitas = $(this).prev().prev().val();
                    kuantitas_baru = parseInt(kuantitas)+1;
            }
			var cartid = $(this).data('cartid'); 
			$.ajax({
				data:{
					"cartid":cartid,
					"kts":kuantitas_baru
				},
				url:'/ubahKuantitasKeranjang',
				type:'post',
				success:function(resp){
					// alert(resp);
					// alert(resp.status);
					if(resp.status==false){
						alert("Melebihi Stok");
					}
					$("#GabungKeranjang").html(resp.view);
				},
				error:function(){
					alert("Update Kuantitas Gagal");
				}
			});
        });

        $(document).on('click','.btnItemDelete', function(){
			var cartid = $(this).data('cartid');
			var peringatan = confirm("Yakin Ingin Menghapus?");
			if(peringatan){
					$.ajax({
					data:{ "cartid":cartid, },
					url:'/hapusProdukDalamKeranjang',
					type:'post',
					success:function(resp){
						$("#GabungKeranjang").html(resp.view);
                        tampilProdukKeranjang();
					},
					error:function(){
						alert("error");
					}
				});
			}
        });
    </script>
@endsection