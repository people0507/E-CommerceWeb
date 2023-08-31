@include('layouts/clients/header')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Login</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Login</span></h2>
        <div class="row px-xl-5 offset-md-3">
            <div class="col-lg-7 mb-5 ">
                <div class="contact-form bg-light p-100">
                    <div id="success"></div>
                    <form action="{{ route('auth.checkLoginUser') }}" method="POST"  >
                        @csrf
                    <p class="text-center font-weight-bold">Login</p>
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
                        <div class="control-group p-1">
                        <label  for="username">Username</label>
                            <input type="text" class="form-control "  placeholder="User Name" name="user_name"  maxlength="256" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1">
                        <label  for="username">Password</label>
                            <input type="password" class="form-control"  placeholder="*********" name="password" minlength="8" maxlength="256" pattern=".{8,256}" title="The password must be at least 8 characters and no more than 256 characters"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="p-1">
                            <button class="btn btn-primary py-2 px-4" type="submit" >Login</button>
                            <a class="font-weight-bold" href="{{ route('client.forgotpassword') }}">Forgot Password?</a>
                        </div>
                        <a class="font-weight-bold" href="{{ route('auth.register') }}">Not registered ?</a>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->
    @include('layouts/clients/footer')