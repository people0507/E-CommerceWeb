@include('layouts/clients/header')


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <div class="notification"></div>

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter By</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('client.searchbyprice') }}" method="GET">
                        <h6 class="text-uppercase mb-3"><span class=" pr-3">Price</span></h6>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input"  id="price-all" name="price_ranges[]" value="all" >
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">{{ $pricecounts['all'] }}</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1" name="price_ranges[]" value="0-10000000">
                            <label class="custom-control-label" for="price-1"> << 10.000.000 ₫</label>
                            <span class="badge border font-weight-normal">{{ $pricecounts['0-10000000'] }}</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2" name="price_ranges[]" value="10000000-15000000">
                            <label class="custom-control-label" for="price-2">10.000.000 ₫ - 15.000.000 ₫</label>
                            <span class="badge border font-weight-normal">{{ $pricecounts['10000000-15000000'] }}</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3" name="price_ranges[]" value="15000000-25000000">
                            <label class="custom-control-label" for="price-3">15.000.000 ₫ - 25.000.000 ₫</label>
                            <span class="badge border font-weight-normal">{{ $pricecounts['15000000-25000000'] }}</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4" name="price_ranges[]" value="25000000-40000000">
                            <label class="custom-control-label" for="price-4">25.000.000 ₫ - 40.000.000 ₫</label>
                            <span class="badge border font-weight-normal">{{ $pricecounts['25000000-40000000'] }}</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-4">
                            <input type="checkbox" class="custom-control-input" id="price-5" name="price_ranges[]" value="25000000-40000000">
                            <label class="custom-control-label" for="price-5">40.000.000 ₫  >> </label>
                            <span class="badge border font-weight-normal">{{ $pricecounts['40000000-above'] }}</span>
                        </div>
                        <h6 class="text-uppercase mb-4"><span class=" pr-3">Category</span></h6>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-1" name="categories[]" value="1">
                            <label class="custom-control-label" for="catrgory-1">TV</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-2" name="categories[]" value="2">
                            <label class="custom-control-label" for="catrgory-2">Camera</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-3" name="categories[]" value="3">
                            <label class="custom-control-label" for="catrgory-3">Shoes</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-4" name="categories[]" value="4">
                            <label class="custom-control-label" for="catrgory-4">Washing Machine</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-5" name="categories[]" value="5">
                            <label class="custom-control-label" for="catrgory-5">Fridge</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-6" name="categories[]" value="6">
                            <label class="custom-control-label" for="catrgory-6">Smart Watch</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-7" name="categories[]" value="7">
                            <label class="custom-control-label" for="catrgory-7">Smart Phone</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="catrgory-8" name="categories[]" value="8">
                            <label class="custom-control-label" for="catrgory-8">AC</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        <div class="p-1">
                            <button class="btn btn-primary py-2 px-4 mt-4 offset-md-9 " type="submit" >Filter</button>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        {{$products->links()}}
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('client.shoppage') }}">Price - All</a>
                                        <a class="dropdown-item" href="{{ route('client.searchbydecrease') }}">Price - High to Low</a>
                                        <a class="dropdown-item" href="{{ route('client.searchbyincrease') }}">Price - Price to High</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style="width: 200px; height: 450px;"  src="{{ asset('images/products/' . $product->product_image )}}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square add-to-cart-btn" href="#" data-product-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('client.homepage_show',['id' => $product->id]) }}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="{{ route('client.homepage_show',['id' => $product->id]) }}">{{ $product->product_name}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($product->product_price * 0.8) }} ₫</h5><h6 class="text-muted ml-2"><del>{{ number_format($product->product_price) }} ₫</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function(){
            
            $('.add-to-cart-btn').on('click', function(event){
                event.preventDefault();
                var productId =  $(this).data('product-id');

            $.ajax({
                url:'{{route('client.addtocart')}}',
                method:'POST',
                data:{
                    "_token": "{{csrf_token()}}",
                    product_id:productId,
                },
                dataType:"json",
                success:function(response){
                    showNotification(response.message);
                    $('.cart-item-count').text(response.cartItemCount);
                },
            })    
            });
            function showNotification(message) {
            $('.notification').text(message).fadeIn();
            setTimeout(function() {
                $('.notification').fadeOut();
            }, 2500);
                } 
        });
    </script>
@include('layouts/clients/footer')

