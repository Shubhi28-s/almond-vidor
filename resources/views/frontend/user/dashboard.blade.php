@extends('frontend.layouts.expo')
@section('title', __('Dashboard'))
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card bg-analytics text-white" style="background: linear-gradient(118deg, #2b3574, rgb(55, 111, 178));">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <img src="{{ asset('app-assets/images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                                    <img src="{{ asset('app-assets/images/elements/decore-right.png') }}" class="img-right" alt="card-img-right">
                                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-award white font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center mb-5">
                                        <h1 class="mb-2 text-white">Welcome {{ $logged_in_user->name }},</h1>
                                        <p class="m-auto w-75">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <h4 class="card-title">Total Campaign</h4>
                                <div class="dropdown chart-dropdown">

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                            <h1 class="font-large-2 text-bold-700 mt-2 mb-0">196</h1>
                                        </div>
                                        <div class="col-sm-10 col-12 d-flex justify-content-center">
                                            <div id="support-tracker-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <h4 class="card-title">Total Question</h4>
                                <div class="dropdown chart-dropdown">

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                            <h1 class="font-large-2 text-bold-700 mt-2 mb-0">15093</h1>
                                        </div>
                                        <div class="col-sm-10 col-12 d-flex justify-content-center">
                                            <div id="support-tracker-chart-one"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row pb-50">
                                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                            <div>
                                                <h2 class="text-bold-700 mb-25">2031087</h2>
                                                <p class="text-bold-500 mb-75">Total Submission</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column text-right order-lg-2 order-1">
                                            <div class="dropdown chart-dropdown">
                                            </div>
                                            <div id="avg-session-chart"></div>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row pb-50">
                                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                            <div>
                                                <h2 class="text-bold-700 mb-25">1692838</h2>
                                                <p class="text-bold-500 mb-75">Total Correct</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column text-right order-lg-2 order-1">
                                            <div class="dropdown chart-dropdown">
                                            </div>
                                            <div id="avg-session-chartone"></div>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">0</h2>
                                <p class="mb-0">Total Message</p>
                            </div>
                            <div class="card-content">
                                <div id="subscribe-gain-chart-one"></div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </section>
        </div>
    </div>
</div>
@endsection
@section('user_script')
@endsection