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
                                Product Table
                                <button  data-modal='centeredModal'
                                    class="m-9  bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded sm:float-right">
                                    <a href="{{ route('product.create' )}}" >Add Product</a>
                                </button>
                                
                            </div>


                            <div class="p-1 sm:float-right">
                            <form action="{{ route('product.search') }}" method="GET">
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
                                        <th class="border w-1/7 px-4 py-2">Product Id</th>
                                        <th class="border w-1/6 px-4 py-2">Product Name</th>
                                        <th class="border w-1/6 px-4 py-2">Product Price</th>
                                        <th class="border w-1/6 px-4 py-2">Product Description</th>
                                        <th class="border w-1/7 px-4 py-2">Product Quantity</th>
                                        <th class="border w-1/4 px-4 py-2">Product Image</th>
                                        <th class="border w-1/7 px-4 py-2">Product Category</th>
                                        <th class="border w-1/7 px-4 py-2">Product Producer</th>
                                        <th class="border w-1/6 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $products as $product )
                                        <tr>
                                            <td class="border px-4 py-2 text-blue-600 font-bold">#{{$product->id}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$product->product_name}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$product->product_price}} đ</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$product->product_description}}</td>
                                            @if($product->product_quantity <= 5)
                                            <td class="border px-4 py-2 text-red-500 font-bold">{{$product->product_quantity}}</td>
                                            @elseif($product->product_quantity <= 20)
                                            <td class="border px-4 py-2 text-yellow-500 font-bold">{{$product->product_quantity}}</td>
                                            @else
                                            <td class="border px-4 py-2 text-green-600 font-bold">{{$product->product_quantity}}</td>
                                            @endif
                                            <td class="border px-4 py-2"><img src="{{ asset('images/products/' . $product->product_image) }}" alt="{{ $product->product_image }}"></td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$product->category->category_name}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$product->producer->producer_name}}</td>
                                            <td class="border px-4 py-2">  
                                            <form method="POST" action="{{route('product.delete',['id' => $product->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <a  class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a  href="{{ route('product.edit',['id' => $product->id]) }}" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>
                                                <button type="submit" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                            <i class="fas fa-trash"></i>
                                                </button>
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
                    {{$products->links()}}
                </div>
            </main>
            <!--/Main-->
        </div>
    @include('layouts/admins/footer')
