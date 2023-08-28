@include('layouts/admins/header')

            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">

                    <!--Grid Form-->

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

                
                
                    

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                        <div class="bg-gray-200 px-4 py-5 border-solid border-gray-200 border-b font-bold">
                                Order Table
                            </div>

                            <div class="p-1 sm:float-right">
                            <form action="{{ route('order.search') }}" method="GET">
                                <input class="bg-gray-200 px-20 m-4 p-4" type="input" name="query" placeholder="Search for something ?"/>
                                <button type="submit" class="m-4 modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded">
                                    Search
                                </button>
                            </form>

                           
                            </div>

                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/7 px-4 py-2">Order Id</th>
                                        <th class="border w-1/7 px-4 py-2">Customer Name</th>
                                        <th class="border w-1/7 px-4 py-2">Customer Email</th>
                                        <th class="border w-1/7 px-4 py-2">Customer Address</th>
                                        <th class="border w-1/7 px-4 py-2">Customer Phone Number</th>
                                        <th class="border w-1/7 px-4 py-2">Order Status</th>
                                        <th class="border w-1/7 px-4 py-2">Order Total Price</th>
                                        <th class="border w-1/7 px-4 py-2">Delivery Method</th>
                                        <th class="border w-1/6 px-4 py-2">Customer Note</th>
                                        <th class="border w-1/7 px-4 py-2">Delivery Time</th>
                                        <th class="border w-1/7 px-4 py-2">Order Creation Time</th>
                                        <th class="border w-1/7 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $orders as $order )
                                        <tr>
                                            <td class="border px-4 py-2 text-blue-600 font-bold">#{{$order->id}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->order_name}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->order_email}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->order_address}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->order_phonenumber}}</td>
                                            @if($order->order_status == "New")
                                            <td class="border px-4 py-2 text-red-700 font-bold">{{$order->order_status}}</td>
                                            @elseif($order->order_status == "Shipping")
                                            <td class="border px-4 py-2 text-yellow-400 font-bold">{{$order->order_status}}</td>
                                            @else
                                            <td class="border px-4 py-2 text-green-400 font-bold">{{$order->order_status}}</td>
                                            @endif
                                            <td class="border px-4 py-2 text-orange-500 font-bold">{{number_format($order->order_totalprice)}} đ</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->order_method}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->order_note}}</td>
                                            @if($order->created_at == $order->updated_at)
                                            <td class="border px-4 py-2 text-red-600 font-bold">Updating Time</td>
                                            @else
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->delivery_time}}</td>
                                            @endif
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$order->created_at}}</td>
                                            <td class="border px-4 py-2">  
                                            <form >
                                                <a  href="{{ route('order.detail',['id' => $order->id]) }}"class="bg-teal-300 cursor-pointer rounded p-1 my-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a  href="{{ route('order.edit',['id' => $order->id]) }}" class="bg-teal-300 cursor-pointer rounded p-1 my-1 text-white">
                                                        <i class="fas fa-edit"></i></a>
                                                </form>

                                            </td>   
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                    {{$orders->links()}}
                </div>
            </main>
            <!--/Main-->
        </div>
    @include('layouts/admins/footer')
