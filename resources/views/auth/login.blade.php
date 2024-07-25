@include('layouts/admin/header')
<div class="login-bg-overlay au-sign-in-basic h-100 "></div>

<!--start wrapper-->
<div class="wrapper">

    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                <div class="card radius-10">
                    <div class="card-body p-4">
                        <div class="text-center">
                            {{-- <h4>Sign In</h4> --}}
                            <p>Sign In to your account</p>
                        </div>
                        <form class="form-body row g-3" action="{{ route('login') }}" method ="post">
                            @csrf

                            <div class="col-12">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="abc@example.com"
                                    name="email" required autofocus autocomplete="username">
                                @if (session('error'))
                                    <div class="text-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword"
                                    placeholder="Your password" name="password" required
                                    autocomplete="current-password">
                            </div>

                            <div class="col-12 col-lg-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark bg-dark">Sign In</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--end wrapper-->
