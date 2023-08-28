<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/admins/styles.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <style>
        .login{
            background: url('{{ asset('images/logins/login-new.jpeg') }}');
        }
    </style>
    <title>Detail</title>
</head>
<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form method="POST" action="{{ route('userdetail.update' , Auth::user()->detail->id)}}" enctype="multipart/form-data" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            @csrf
                <p class="text-gray-800 font-medium">User Detail</p>
                <div class="">
                    <label class="block text-sm text-gray-00" >Full Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  name="userdetail_fullname" type="text"  placeholder="Full Name" value="{{ Auth::user()->detail->userdetail_fullname }}">
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" >Birth</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded"  name="userdetail_birth" type="date"  value="{{ Auth::user()->detail->userdetail_birth }}">
                </div>
                <div class="mt-2">
                    <label class=" block text-sm text-gray-600" >Phone Number</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="userdetail_phonenumber" type="text" value="{{ Auth::user()->detail->userdetail_phonenumber }}">
                </div>
                <div class="mt-2">
                    <label class=" text-sm block text-gray-600" >Address</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="userdetail_address" type="text" value="{{ Auth::user()->detail->userdetail_address }}">
                </div>
                <div class="mt-2">
                    <label class=" text-sm block text-gray-600" >Avatar</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="userdetail_avatar" type="file" >
                </div>
                <div class="mt-4">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Update</button>
                    <a href="{{ route('user.index') }}" class="px-4" >Cancel </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>