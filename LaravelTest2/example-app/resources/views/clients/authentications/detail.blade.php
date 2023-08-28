@include('layouts/clients/header')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Update Information</span></h2>
        <div class="row px-xl-5 offset-md-4">
            <div class="col-lg-7 mb-5 ">
                <div class="contact-form bg-light p-100">
                    <div id="success"></div>
                    <form method="POST" action="{{ route('client.update',Auth::user()->detail->id) }} "enctype="multipart/form-data" >
                        @csrf
                    <p class="text-center font-weight-bold">User Detail</p>
                    <div class="control-group p-1 rounded">
                            <label class="" for="username">Full Name</label>
                            <input type="text" class="form-control " name="userdetail_fullname"  value="{{ Auth::user()->detail->userdetail_fullname }}" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1 rounded">
                            <label class="" for="username">Birthday</label>
                            <input type="date" class="form-control " name="userdetail_birth"   value="{{ Auth::user()->detail->userdetail_birth }}" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1">
                            <label class="" for="username">Phone Number</label>
                            <input type="text" class="form-control " name="userdetail_phonenumber"  value="{{ Auth::user()->detail->userdetail_phonenumber }}" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1">
                            <label class="" for="username">Address</label>
                            <input type="text" class="form-control " name="userdetail_address"  value="{{ Auth::user()->detail->userdetail_address }}" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group p-1">
                            <label class="" for="username">Avatar</label>
                            <input type="file" class="form-control " name="userdetail_avatar" />
                            <p class="help-block text-danger"></p>
                        </div>
 
                        <div class="p-1">
                            <button class="btn btn-primary py-2 px-4" type="submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->
    @include('layouts/clients/footer')