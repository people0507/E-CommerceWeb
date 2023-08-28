<!doctype html>
<html lang="en">

<head>
  <title>Login | Tailwind Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{asset('css/admins/styles.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <style>
  .login{
    background: url('{{ asset('images/logins/login-new.jpeg') }}');
  }
  </style>  
</head>

<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
  <div class="w-full max-w-lg">
    <div class="leading-loose">
      <form action="{{ route('auth.checkLogin') }}" method="POST" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
        @csrf
        <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>
        @if (session('failed'))
    <div class="alert danger-alert">
        {{ session('failed') }}
    </div>
    <style>
        .alert {
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .danger-alert {
            background-color: #ff3333; 
            color: #ffffff; 
        }
    </style>
     <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 3000); 
    </script>
        @endif
        <div class="">
          <label class="block text-sm text-gray-00" for="username">Username</label>
          <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  name="user_name" type="text"  placeholder="User Name" >
        </div>
        <div class="mt-2">
          <label class="block text-sm text-gray-600" for="password">Password</label>
          <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded"  name="password" type="password"  placeholder="*******" >
        </div>
        <div class="mt-4 items-center justify-between">
          <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Login</button>
        </div> 
      </form>
    </div>
  </div>
</div>
</body>

</html>
