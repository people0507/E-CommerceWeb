@include('layouts/admins/header')

            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">

                    <!--Grid Form-->
                    

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-4 py-5 border-solid border-gray-200 border-b font-bold">
                                User Detail Table
                            </div>


                            <div class="p-1 sm:float-right">
                            <form action="{{ route('userdetail.search') }}" method="GET">
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
                                        <th class="border w-1/7 px-4 py-2">Id</th>
                                        <th class="border w-1/6 px-4 py-2">Avatar</th>
                                        <th class="border w-1/6 px-4 py-2">Birth</th>
                                        <th class="border w-1/6 px-4 py-2">Phone Number</th>
                                        <th class="border w-1/4 px-4 py-2">Address</th>
                                        <th class="border w-1/6 px-4 py-2">Full Name</th>
                                        <th class="border w-1/7 px-4 py-2">User Id</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $user_details as $user_detail )
                                        <tr>
                                            <td class="border px-4 py-2 text-blue-600 font-bold">#{{$user_detail->id}}</td>
                                            @if($user_detail->created_at == $user_detail->updated_at)
                                            <td class="border px-4 py-2 text-red-600 font-bold"><i class="fa-solid fa-circle-exclamation"></i> This user has not update avatar</td>
                                            <td class="border px-4 py-2 text-red-600 font-bold"><i class="fa-solid fa-circle-exclamation"></i> This user has not update birth</td>
                                            <td class="border px-4 py-2 text-red-600 font-bold"><i class="fa-solid fa-circle-exclamation"></i> This user has not update phone number</td>
                                            <td class="border px-4 py-2 text-red-600 font-bold"><i class="fa-solid fa-circle-exclamation"></i> This user has not update address</td>
                                            @else
                                            <td class="border px-4 py-2"><img src="{{ asset('images/users/' . $user_detail->userdetail_avatar) }}" ></td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$user_detail->userdetail_birth}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$user_detail->userdetail_phonenumber}}</td>
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$user_detail->userdetail_address}}</td>
                                            @endif
                                            <td class="border px-4 py-2 text-gray-600 font-bold">{{$user_detail->userdetail_fullname}}</td>
                                            <td class="border px-4 py-2 text-blue-600 font-bold">#{{$user_detail->user_id}}</td>  
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                    {{$user_details->links()}}
                </div>
            </main>
            <!--/Main-->
        </div>
    @include('layouts/admins/footer')
