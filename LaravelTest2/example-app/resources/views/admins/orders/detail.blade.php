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


                            <div class="p-1 sm:float-right">
                            <form action="" method="GET">
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
                                        <th class="border w-1/6 px-4 py-2">Product Name</th>
                                        <th class="border w-1/7 px-4 py-2">Product Price</th>
                                        <th class="border w-1/4 px-4 py-2">Product Quantity</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $details as $detail )
                                        <tr>
                                            <td class="border px-4 py-2 text-blue-600 font-bold">#{{$order->id}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$detail->product_name}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$detail->pivot->price}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$detail->pivot->quantity}}</td> 
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                    
                </div>
            </main>
            <!--/Main-->
        </div>
    @include('layouts/admins/footer')
