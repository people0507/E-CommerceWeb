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
                                User Table
                                <button  data-modal='centeredModal'
                                    class="m-9  bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded sm:float-right">
                                    <a href="{{ route('user.create' )}}" >Add User</a>
                                </button>
                            </div>


                            <div class="p-1 sm:float-right">
                            <form action="{{ route('user.search') }}" method="GET">
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
                                        <th class="border w-1/7 px-4 py-2">User Id</th>
                                        <th class="border w-1/5 px-4 py-2">User Email</th>
                                        <th class="border w-1/6 px-4 py-2">User Name</th>
                                        <th class="border w-1/7 px-4 py-2">User Password</th>
                                        <th class="border w-1/4 px-4 py-2">User Role</th>
                                        <th class="border w-1/6 px-4 py-2">Status</th>
                                        <th class="border w-1/6 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $users as $user )
                                        <tr>
                                            <td class="border px-4 py-2 text-blue-600 font-bold">#{{$user->id}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$user->user_email}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$user->user_name}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$user->user_password}}</td>
                                            @if($user->roles->role_name == "admin")
                                            <td class="border px-4 py-2 text-red-600 font-bold">{{$user->roles->role_name}}</td>
                                            @else
                                            <td class="border px-4 py-2 text-yellow-500 font-bold">{{$user->roles->role_name}}</td>
                                            @endif
                                            @if($user->detail->created_at == $user->detail->updated_at )
                                            <td class="border px-4 py-2 font-bold text-red-600">Not Update</td>
                                            @else 
                                            <td class="border px-4 py-2 font-bold text-green-600">Updated</td>
                                            @endif
                                            <td class="border px-4 py-2">  
                                            <form method="POST" action="{{route('user.delete',['id' => $user->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <a  class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a  href="{{ route('user.edit',['id' => $user->id]) }}" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
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
                    {{$users->links()}}
                </div>
            </main>
            <!--/Main-->
        </div>
    @include('layouts/admins/footer')
