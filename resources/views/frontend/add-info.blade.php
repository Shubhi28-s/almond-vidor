<!-- <form method="post" action="{{ route('frontend.user.saved') }}" enctype="multipart/form-data">
                     @csrf 
                     <p>
                             Video_Name: <input type="text" name="name" />
                     </p>
                     <p>
                            Email: <input type="email" name="email" />
                     </p>
                     <p>
                            Upload: <input type="file" name="url" />
                            <button type="submit" class="form-control">Submit</button>
                     </p>
              </form> -->


<!-- <form>
  <div class="form-group">
    <label for="exampleforVideoName">Video_Name</label><br>
    <input type="video_name" class="form-control" id="Teachers Day" aria-describedby="emailHelp" placeholder="Enter name">
    <br>
    <small id="emailHelp" class="form-text text-muted">Your videoName should be different from previous one.</small>
    <br>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Upload:</label><br>
    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
<!-- <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Video Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> -->
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
                <h2> Create Campaign</h2>
                <form method="post" action="{{ route('frontend.user.submission') }}" enctype="multipart/form-data">
                  @csrf
                  <!-- <div class="form-group">
                    <label for="videoname">Name:</label>
                    <input type="videoname" class="form-control" id="videoname" placeholder="Enter name for the video" name="values">
                  </div> -->
                  <div class="form-group">
                    <label for="videoname">Video Name:</label>
                    <input type="text" class="form-control" id="videoname" placeholder="Enter video name" name="video_name">
                  </div>
      
                  <div class="form-group">
                    <label for="link">Video Upload:</label>
                    <input type="file" class="form-control" id="fup" placeholder="" name="url">
                  </div>
                  
                  <span style=display:none> Duration: <input type="text" name="duration" id="f_du" /> seconds<br></span>
                  <!-- <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
                  <button type="submit" class="btn btn-outline-primary btn-lg pull-right">Submit</button>
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
              @endsection

              <!-- </body>
</html> -->