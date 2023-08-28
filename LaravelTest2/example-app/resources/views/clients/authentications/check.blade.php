@include('layouts/clients/header')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Forgot Password</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Forgot Password</span></h2>
        <div class="row px-xl-5 offset-md-4">
            <div class="col-lg-7 mb-5 ">
                <div class="contact-form bg-light p-100">
                    <div id="success"></div>
                    <form action="{{route('client.handleToken')}}" method="POST"  >
                        @csrf
                    <p class="text-center font-weight-bold">Check Token</p>
                        <div class="control-group p-1">
                            <label  for="username">User Email</label>
                            <input type="text" class="form-control "  placeholder="User Email" name="user_email" value="{{$user_email}}"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                        <label  for="username">User Token</label>
                            <input type="text" class="form-control "   name="user_token" placeholder="Please check your email to get the code !!!" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="p-1">
                            <button class="btn btn-primary py-2 px-4" type="submit" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->
    @include('layouts/clients/footer')