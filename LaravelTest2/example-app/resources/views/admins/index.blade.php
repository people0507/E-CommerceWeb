@include('layouts/admins/header')


            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Stats Row Starts Here -->
                    @if (session('success'))
                    <div class="alert success-alert">
                        {{ session('success') }}
                    </div>

                    <style>
                        .alert {
                            padding: 10px;
                            border-radius: 4px;
                            font-weight: bold;
                            margin-bottom: 10px;
                        }

                        .success-alert {
                            background-color: #4CAF50;
                            color: #ffffff;
                        }
                    </style>

                    <script>
                        setTimeout(function() {
                            document.querySelector('.alert').style.display = 'none';
                        }, 3000); 
                    </script>
                @endif
                
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{ route('category.index') }}" class="no-underline text-white text-2xl">
                                    {{$categories}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Categories
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{ route('producer.index') }}" class="no-underline text-white text-2xl">
                                    {{$producers}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Producers
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{ route('product.index') }}" class="no-underline text-white text-2xl">
                                {{$products}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Products
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{ route('order.index') }}" class="no-underline text-white text-2xl">
                                {{$orders}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Orders
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- /Stats Row Ends Here -->
                    <script src="asset('js/admins/main.js')"></script>
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey flex justify-between ">
                                <div class="font-bold text-xl ">Lastest Orders</div>
                                <div id="current-time-container" class= "font-bold"></div>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                    <tr>
                                        <th scope="col">#Order ID</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Order Status</th>
                                        <th scope="col">Order Total Price</th>
                                        <th scope="col">Delivery Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderDetails as $orderDetail)
                                    <tr>
                                        <th class="text-blue-500 font-bold" scope="row"> #{{ $orderDetail->id}}</th>
                                        <td>
                                            <button class="bg-green-500 font-bold hover:bg-green-800 text-white font-light py-1 px-2 rounded-full">
                                                {{ $orderDetail->order_name}}
                                            </button>
                                        </td>
                                        @if($orderDetail->order_status == "New")
                                        <td class="text-red-500 font-bold"> {{ $orderDetail->order_status}}</td>
                                        @elseif($orderDetail->order_status == "Shipping")
                                        <td class="text-yellow-500 font-bold"> {{ $orderDetail->order_status}}</td>
                                        @else
                                        <td class="text-green-500 font-bold"> {{ $orderDetail->order_status}}</td>
                                        @endif
                                        <td class="text-orange-500 font-bold"> {{ number_format($orderDetail->order_totalprice)}} đ</td>
                                        <td>
                                            @if($orderDetail->delivery_time == null)
                                            <time  class="text-red-500 font-bold"><i class="fa-solid fa-circle-exclamation"></i> Need To Update</time>
                                            @else
                                            <time  class="text-green-500 font-bold"><i class="fa-regular fa-calendar-days"></i> {{ $orderDetail->delivery_time}}</time>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->

                </div>
            </main>
            <!--/Main-->
        </div>
        @include('layouts/admins/footer')
