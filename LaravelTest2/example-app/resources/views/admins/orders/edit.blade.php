@include('layouts/admins/header')


            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Update Order
                            </div>
                            <div class="p-3">
                            <form method="POST" action="{{ route('order.update',$orders->id) }}" class="w-full " enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 my-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Order Status
                                            </label>
                                            <select class="w-full bg-gray-300 p-3" name="order_status">
                                                <option  value="New" >New</option>
                                                <option  value="Shipping" >Shipping</option>
                                                <option  value="Completed" >Completed</option>
                                            </select>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 my-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Delivery Time
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   name="delivery_time" type="datetime-local" placeholder="Doe" value="{{$orders->delivery_time}}">
                                        </div>
                                    </div>
                                   

                                    <div class="md:flex md:items-center">
                                        <div class="md:w-3/6"></div>
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-12 rounded m-3"
                                                    type="submit">
                                                Update
                                            </button>
                                            <a href="{{ route('order.index') }}" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded " >Cancel </a>
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