@include('layouts/admins/header')


            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Update Product
                            </div>
                            <div class="p-3">
                            <form method="POST" action="{{ route('product.update' ,$products->id)}} " class="w-full " enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Product Name
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   name="product_name" type="text" placeholder="Jane" value ="{{ $products->product_name }}">
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Product Price
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   name="product_price" type="number" placeholder="Doe" value ="{{ $products->product_price }}">
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Product Category
                                            </label>
                                            <select class="w-full bg-gray-300 p-3 " name="category_id" value ="{{ $products->category_id }}">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == $products->category_id) selected @endif>{{ $category->category_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Product Producer
                                            </label>
                                            <select class="w-full bg-gray-300 p-3" name="producer_id" value ="{{ $products->producer_id }}">
                                            @foreach($producers as $producer)
                                                <option  value="{{ $producer->id }}" @if($producer->id == $products->producer_id) selected @endif>{{ $producer->producer_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 my-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Product Quantity
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   name="product_quantity" type="number" placeholder="Doe" value ="{{ $products->product_quantity }}">
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 my-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Product Image
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   name="product_image" type="file" placeholder="Doe" value ="{{ $products->product_image }}">
                                                   <img src="{{ asset('images/products/' . $products->product_image) }}" alt="Product Image" style="max-width: 50px; max-height: 50px;">
                                        </div>
                                    </div>
                                   

                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1">
                                                Product Description
                                            </label>
                                            <input class="appearance-none h-24 block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-5 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   name="product_description" type="text" placeholder="Type someting ?" value ="{{ $products->product_description }} ">
                                        </div>
                                    </div>

                                    <div class="md:flex md:items-center">
                                        <div class="md:w-3/6"></div>
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-12 rounded m-3"
                                                    type="submit">
                                                Update
                                            </button>
                                            <a href="{{ route('product.index') }}" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded " >Cancel </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
        @include('layouts/admins/footer')