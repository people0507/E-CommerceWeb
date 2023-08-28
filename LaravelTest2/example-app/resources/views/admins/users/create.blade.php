@include('layouts/admins/header')


            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Add User
                            </div>
                            <div class="p-3">
                                <form method="POST" action="{{ route('user.store' )}}" class="w-full">
                                    @csrf
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                User Email
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   name="user_email" type="text" placeholder="Jane">
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                User Name
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   name="user_name" type="text" placeholder="Doe">
                                        </div>
                                        <div class="w-full md:w-full px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                Full Name
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   name="userdetail_fullname" type="text" placeholder="Doe">
                                        </div>
                                    </div>
                                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                                                User Role
                                            </label>
                                            <select class="w-full bg-gray-300 p-3 " name="role_id">
                                            @foreach($roles as $role)
                                                <option  value="{{$role->id}}">{{$role->role_name}}</option>
                                            @endforeach
                                            </select>
                                    </div>

                                    <div class="flex flex-wrap -mx-3 mb-6 my-4">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1">
                                                Password
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   name="user_password" type="password" placeholder="******************">
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1">
                                                Confirm Password
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                                   name="user_confirm" type="password" placeholder="******************">
                                        </div>
                                    </div>

                                    <div class="md:flex md:items-center">
                                        <div class="md:w-3/6"></div>
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-12 rounded m-3"
                                                    type="submit">
                                                Add
                                            </button>
                                            <a href="{{ route('user.index') }}" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-2 rounded " >Cancel </a>
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