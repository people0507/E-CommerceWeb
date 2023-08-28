@include('layouts/clients/header')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Register</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Register</span></h2>
        <div class="row px-xl-5 offset-md-4">
            <div class="col-lg-7 mb-5 ">
                <div class="contact-form bg-light p-100">
                    <div id="success"></div>
                    <form method="POST" action="{{ route('auth.store' )}}" >
                        @csrf
                    <p class="text-center font-weight-bold">Register</p>
                        <div class="control-group p-1 rounded">
                            <label class="" for="username">User Name</label>
                            <input type="text" class="form-control " name="user_name"  placeholder="User Name"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1 rounded">
                            <label class="" for="username">Full Name</label>
                            <input type="text" class="form-control " name="userdetail_fullname"  placeholder="Full Name"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1">
                            <label class="" for="username">User Email</label>
                            <input type="text" class="form-control " name="user_email" placeholder="Your Email"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1">
                            <label class="" for="username">Password</label>
                            <input type="password" class="form-control" name="user_password" placeholder="*********">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1">
                        <label  for="username">Confirm Password</label>
                            <input type="password" class="form-control" name="user_confirm" placeholder="*********">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="p-1">
                            <button class="btn btn-primary py-2 px-4" type="submit" >Register</button>
                        </div>
                        <a class="font-weight-bold" href="{{ route('auth.loginuser') }}">Already have an account ?</a>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->
    @include('layouts/clients/footer')