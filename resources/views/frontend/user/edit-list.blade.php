<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
</body> -->
<!-- <a class="btn btn-outline-success pull-right" href="{{ route('frontend.user.survey.create') }}" target="_self" title="Add Polls"><i class="fa fa-plus"></i> Create Videos</a> -->
@extends('frontend.layouts.expo')

@section('title', __('Edit Campaign Dashboard'))

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
                            <div class="card-header">
                                <div class="col-sm-5"></div>
                                <!-- <a class="btn btn-outline-success pull-right" href="{{ route('frontend.user.survey.create') }}" target="_self" title="Add Polls"><i class="fa fa-plus"></i> Create Videos</a>  -->


                            </div>
                            <div class="container">
                                <h1 class="text-center">Update data</h1>
                                <form method="post" action="{{ route('frontend.user.new', ['id'=>$posts->id]) }}" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label>Video Name</label>
                                        <input type="text" class="form-control col-md-6" style="max-width:1000px;" name="video_name" value="{{old('video_name', $posts->video_name)}}" placeholder="Video Name" />
                                    </div>

                                    <div class="mb-3">
                                        Upload: <input type="file" class="form-control" name="url" />
                                    </div>
                                    <span style=display:none> Duration: <input type="text" name="duration" id="f_du" /> seconds<br></span>
                                    <input type="Submit" name="url" value="Update" class="btn btn-success">
                            </div>
                            </form>
                            <video id="video" style=display:none></video>
              </div>
              <script>
                var f_duration = 0; //store duration
                document.getElementById('video').addEventListener('canplaythrough', function(e) {
                  //add duration in the input field #f_du
                  f_duration = Math.round(e.currentTarget.duration);
                  console.log("duration",f_duration);
                  document.getElementById('f_du').value = f_duration;
                  //   URL.revokeObjectURL(obUrl);
                },false);


                //when select a file, create an ObjectURL with the file and add it in the #audio element
                var obUrl;
                document.getElementById('fup').addEventListener('change', function(e) {
                  var file = e.currentTarget.files[0];
                  //check file extension for audio/video type
                  if (file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)) {
                    obUrl = URL.createObjectURL(file);
                    document.getElementById('video').setAttribute('src', obUrl);
                  }
                });
              </script>
                        <!-- </div> -->
                        @endsection
                        <!-- </body>
</html> -->