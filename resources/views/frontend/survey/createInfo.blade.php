@extends('frontend.layouts.expo')

@section('title', __('Add Campaign'))

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
                    <div class="col-md-12">
                        @include('includes.partials.messages')
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <h3 class="card-title">Create Campaign</h3>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">

                                        <form class="form-horizontal" method="POST" action="{{ route('frontend.user.survey.update',$survey->id) }}" id="user-profile">
                                            {{ csrf_field() }}
                                            @method('PUT')

                                            <input name="info" type="hidden" value="info">
                                            <div class="form-group">
                                                <label for="desktop_image" class=" form-control-label">Desktop Image</label>
                                                <input name="desktop_image" type="file" id="desktop_image" value="{{ old('desktop_image') }}" accept=".png,.jpg,jpeg" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile_image" class=" form-control-label">Mobile Image</label>
                                                <input name="mobile_image" type="file" id="mobile_image" value="{{ old('mobile_image') }}" accept=".png,.jpg,jpeg" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="login_desktop_image" class=" form-control-label">Login Desktop Image</label>
                                                <input name="login_desktop_image" type="file" id="login_desktop_image" value="{{ old('login_desktop_image') }}" accept=".png,.jpg,jpeg" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="login_mobile_image" class=" form-control-label">Login Mobile Image</label>
                                                <input name="login_mobile_image" type="file" id="login_mobile_image" value="{{ old('login_mobile_image') }}" accept=".png,.jpg,jpeg" class="form-control">
                                                <!-- @if(!empty(@$survey->login_mobile_image))
                                                <a href="{{ @$survey->login_mobile_image }}" target="_blank">
                                                    <img class="pull-right col-md-4" src="{{ @$survey->login_mobile_image }}" width="50px" height="50px">
                                                </a>
                                                @endif -->
                                            </div>
                                            <div class="form-group">
                                                <label for="logo" class=" form-control-label">Logo</label>
                                                <input name="logo" type="file" id="logo" value="{{ old('logo') }}" class="form-control" accept=".png,.jpg,jpeg">
                                                <!-- @if(!empty(@$survey->logo))
                                                <a href="{{ @$survey->logo }}" target="_blank">
                                                    <img class="pull-right col-md-4" src="{{ @$survey->logo }}" width="100px">
                                                </a>
                                                @endif -->
                                            </div>
                                            <div class="form-group">
                                                <label for="video_url" class=" form-control-label">Video</label>
                                                <input name="video_url" type="file" id="video_url" value="{{ old('video_url') }}" accept=".mp4" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="first_popup" class=" form-control-label">First Popup</label>
                                                <input name="first_popup" type="text" id="first_popup" value="{{ old('first_popup',$survey->first_popup) }}" placeholder="Enter First Popup" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_popup" class=" form-control-label">Last Popup</label>
                                                <input name="last_popup" type="text" id="last_popup" value="{{ old('last_popup',$survey->last_popup) }}" placeholder="Enter Last Popup" class="form-control" required>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <button type="submit" class="btn btn-outline-primary btn-lg pull-right">Save</button>
                                                    <a href="{{ route('frontend.user.survey.index') }}" class="btn btn-outline-danger btn-lg pull-left">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
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

@section('script')
<script>
    $(window).on('beforeunload', function() {
        $('.loader_class').show();
    });
    $(function() {
        $('.loader_class').hide();
    })

    $(document).on('change', '#video_url', function() {
        var data = $(this).val();
        var files = $(this)[0].files[0];
        // console.log(files.size);
        //            52428800 = 50 Mb
        if (files.size > 104857600) {
            alert('please upload max 100 MB Size.');
            $(this).val('');
            return false;
        }
        return true;
    });
</script>
@endsection