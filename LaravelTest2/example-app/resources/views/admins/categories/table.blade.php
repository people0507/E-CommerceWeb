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
                                Category Table
                                <button  data-modal='centeredModal'
                                    class="m-9  bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded sm:float-right">
                                    <a href="{{ route('category.create' )}}" >Add Category</a>
                                </button>
                            </div>
                            
                            <div class="p-1 sm:float-right">
                            <form action="{{ route('category.search') }}" method="GET">
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
                                        <th class="border w-1/4 px-4 py-2">Category Id</th>
                                        <th class="border w-1/4 px-4 py-2">Category Name</th>
                                        <th class="border w-1/4 px-4 py-2">Category Image</th>
                                        <th class="border w-1/4 px-4 py-2">Created Time</th>
                                        <th class="border w-1/4 px-4 py-2">Updated Time</th>
                                        <th class="border w-1/4 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $categories as $category )
                                        <tr>
                                            <td class="border px-4 py-2 text-blue-600 font-bold">#{{$category->id}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$category->category_name}}</td>
                                            <td class="border px-4 py-2"><img src="{{ asset('images/categories/' . $category->category_image) }}" alt="{{ $category->category_image }}"></td>
                                            <td class="border px-4 py-2 font-bold">{{$category->created_at}}</td>
                                            <td class="border px-4 py-2 font-bold">{{$category->updated_at}}</td>
                                            <td class="border px-4 py-2">  
                                            <form method="POST" action="{{route('category.delete',['id' => $category->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <a  href="{{ route('category.edit',['id' => $category->id]) }}" class="bg-teal-300 cursor-pointer rounded p-1  text-white">
                                                        <i class="fas fa-edit"></i></a>
                                                <button type="submit" class="bg-teal-300 cursor-pointer rounded p-1  text-red-500">
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
                    {{$categories->links()}}
                </div>
                
            </main>
            <!--/Main-->
        </div>
    @include('layouts/admins/footer')
