@include('layouts/clients/header')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form action="{{ route('client.addorder') }}" method ="POST">
        @csrf
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-6">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                        <div class="col form-group">
                            <label>Customer Name</label>
                            <input class="form-control" type="text" name="order_name" placeholder="John" value ="{{ Auth::user()->detail->userdetail_fullname }}">
                        </div>
                        <div class="col form-group">
                            <label>Customer Email</label>
                            <input class="form-control" type="text" name="order_email" placeholder="123@gmail.com" value ="{{ Auth::user()->user_email }}">
                        </div>
                        <div class="col form-group">
                            <label>Customer Address</label>
                            <input class="form-control" type="text" name="order_address" placeholder="Ex: Wall Street" value ="{{ Auth::user()->detail->userdetail_address }}">
                        </div>
                        <div class="col form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" type="text" name="order_phonenumber" placeholder="+123 456 789" value ="{{ Auth::user()->detail->userdetail_phonenumber }}">
                        </div>
                        <div class="col form-group hidden">
                            <label>Customer Status</label>
                            <input class="form-control" type="text" name="order_status" placeholder="123 Street" value="New">
                        </div>
                        <div class="col form-group">
                            <label>Customer Note</label>
                            <input class="form-control" type="text" name="order_note" placeholder="Something want to tell us">
                        </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Delivery Method</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="delivery_method1" value="GHTK">
                                <label class="custom-control-label" for="delivery_method1">GHTK</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="delivery_method2" value="NINJA VAN">
                                <label class="custom-control-label" for="delivery_method2">Ninja Van</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="delivery_method3" value="LALAMOVE">
                                <label class="custom-control-label" for="delivery_method3">Lalamove</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        @php
                        $total = 0;
                        @endphp
                        @foreach($carts as $productId => $cart)
                        @php
                        $total =$total + $cart['price'] * $cart['quantity'];
                        @endphp
                        <div class="d-flex justify-content-between">
                            <div class="row-1">
                                <p>{{$cart['name']}} ₫</p>
                                <p>{{number_format($cart['price'])}} ₫</p>
                            </div>
                            <div class="row-1">
                                <p>{{$cart['quantity']}}</p>
                                <p>{{number_format($cart['price'] * $cart['quantity'])}} ₫</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$0</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{number_format($total)}} ₫</h5>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </form>
    <!-- Checkout End -->
    @include('layouts/clients/footer')
