@include('layouts/clients/header')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    @if(session()->get('cart')!=null)
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    @php
                    $total =0;
                    @endphp
                    <tbody class="align-middle">
                        @foreach($carts as $productId => $cart)
                        @php
                        $total +=  $cart['price'] * $cart['quantity'];
                        @endphp
                        <tr>
                            <td class="align-middle"><img src="{{ asset('images/products/' . $cart['image'] )}}" alt="" style="width: 50px;"> {{ $cart['name'] }}</td>
                            <td class="align-middle">{{ number_format($cart['price']) }} ₫</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" data-product-id="{{$productId}}">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center quantity" value=" {{ $cart['quantity'] }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" data-product-id="{{$productId}}">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{ number_format($cart['price'] * $cart['quantity']) }} ₫</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"data-product-id="{{$productId}}"><i class="fa fa-times"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6> {{ number_format($total) }} ₫</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">0 ₫</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{ number_format($total) }} ₫</h5>
                        </div>
                        <form method="GET" action="{{ route('client.checkoutpage') }}">
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="card-body text-center">
                    <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                    <a href="{{ route('client.homepage')}}" class="btn btn-warning rounded">Tiếp tục mua sắm</a>
                </div>
    @endif
    <!-- Cart End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script> 
    $(document).ready(function(){
        $('.btn-plus').on('click', function(){
            var productId = $(this).data('product-id')
            var quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                url:"{{ route('client.updatequantity') }}",
                type:"POST",
                data:{
                    "_token": "{{csrf_token()}}",
                    product_id:productId,
                    quantity:quantity,
                },
                success:function (data){
                   $('.cartpage').html(data.cartpage);
                },
            })
        });

        $('.btn-minus').on('click', function(){
            var productId = $(this).data('product-id')
            var quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                url:"{{ route('client.updatequantity') }}",
                type:"POST",
                data:{
                    "_token": "{{csrf_token()}}",
                    product_id:productId,
                    quantity:quantity,
                },
                success:function (data){
                    $('.cartpage').html(data.cartpage);
                },
            })
        });

        $('.btn-danger').on('click', function(){
            var productId = $(this).data('product-id')
            $.ajax({
                url:"{{ route('client.deleteproductcart') }}",
                type:"POST",
                data:{
                    "_token": "{{csrf_token()}}",
                    product_id:productId,
                },
                success:function (data){
                    $('.cartpage').html(data.cartpage);
                },
            })
        });
    })
    </script>

    @include('layouts/clients/footer')
