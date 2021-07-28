@extends('frontend.layouts.auth')

@section('title', __('Login Page'))

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="https://almondvirtex.s3.ap-south-1.amazonaws.com/gpi/logo.png" style="width: 100%;" alt="Almond Virtex">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Login</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">Please login to your account.</p>
                                    <div class="card-content">
                                        @include('includes.partials.messages')

                                        <div class="card-body pt-1">
                                            <x-forms.post :action="route('frontend.auth.login')">
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="email" name="email" id="user-name" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />

                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Username</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="password">Password</label>
                                                </fieldset>


                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <x-utils.link :href="route('frontend.auth.password.request')" class="btn btn-link" :text="__('Forgot Your Password?')" />
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </div>

                                            </x-forms.post>
                                        </div>
                                    </div>
                                    <div class="login-footer">
                                        <div class="divider">
                                            <!-- <div class="divider-text">OR</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection