@extends('layouts/home')
@section('name')
beranda
@endsection

@section('content')
<!-- Breadcrumbs -->
@include('includes.breadcump')
<!-- End Breadcrumbs -->

<!-- Product Style -->
<!-- Start Checkout -->
<section class="shop checkout  section">
    <div class="container">
        <div class="row mt-n5"> 
            <div class="shopping-cart col-lg-12 col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th> 
                       
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#">Women Dress</a></p>
                                <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
                            </td>
                            <td class="price" data-title="Price"><span>$110.00 </span></td>
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                <span>3</span>
                                <!--/ End Input Order -->
                            </td>
                            <td class="total-amount" data-title="Total"><span>$220.88</span></td>
                           
                        </tr>
                    
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
                <div class="row">
                    <select class="custom-select">
                        <option selected>Open this select menu</option>
                        <option value="1">One  </option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
            </div>
            <div class="col-lg-12  col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>CART  TOTALS</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>$330.00</span></li>
                                <li>(+) Shipping<span>$10.00</span></li>
                                <li class="last">Total<span>$340.00</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Payments</h2>
                        <div class="content pl-3 pr-3">
                            <div id="accordion">
                             
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          <div class="row">
                                              <div class="col-3">
                                                  <img class="logos" src="{{asset('frontend/assets/images/bca.png')}}" alt="">
                                                  
                                              </div>
                                              <p class="text-left mt-1 text-white ">Bank BCA</p>
                                           
                                          </div>
                                        </button>
                                      </h5>
                                    </div>
                                
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-lg-2 col-6">
                                                  <p class="font-weight-bold">asep suaji</p>
                                              </div>
                                              <div class="col-lg-2 col-6">
                                                  <p class="font-weight-bold">1212121212121212121</p>
                                              </div>
                                          </div>
                                          <img class="logon" src="{{asset('frontend/assets/images/qr_code.jpeg')}}" alt="">
                                      </div>
                                    </div>
                                  </div>
                                  
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img class="logos" src="{{asset('frontend/assets/images/bca.png')}}" alt="">
                                                    
                                                </div>
                                                <p class="text-left mt-1 text-white ">Bank BCA</p>
                                             
                                            </div>
                                          </button>
                                    </h5>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-6">
                                                <p class="font-weight-bold">asep suaji</p>
                                            </div>
                                            <div class="col-lg-2 col-6">
                                                <p class="font-weight-bold">1212121212121212121</p>
                                            </div>
                                        </div>
                                        <img class="logon" src="{{asset('frontend/assets/images/qr_code.jpeg')}}" alt="">
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img class="logos" src="{{asset('frontend/assets/images/bca.png')}}" alt="">
                                                    
                                                </div>
                                                <p class="text-left mt-1 text-white ">Bank BCA</p>
                                             
                                            </div>
                                          </button>
                                    </h5>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-6">
                                                <p class="font-weight-bold">asep suaji</p>
                                            </div>
                                            <div class="col-lg-2 col-6">
                                                <p class="font-weight-bold">1212121212121212121</p>
                                            </div>
                                        </div>
                                        <img class="logon" src="{{asset('frontend/assets/images/qr_code.jpeg')}}" alt="">
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <div class="container">
                    <div class="row mb-3 mt-3">
                        <h4>Upload Bukti Pembayaran</h4>
                   
                    </div>
                    <div class="row mb-3 ">
                        <label for="myfile">Unggah Hasil    :</label>
                        <input type="file" id="myfile" name="myfile"> 
                    
                    </div>
                </div>
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">
                                <a href="#" class="btn">proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Checkout -->

<!-- Start Shop Services Area  -->
@endsection