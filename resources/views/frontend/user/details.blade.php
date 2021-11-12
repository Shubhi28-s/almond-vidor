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
                    <input type="video" class="form-control" id="video" placeholder="Enter video name" name="video_name">
                  </div>
                   <div class="form-group">
                    <label for="videoname">SenderName</label>
                    <input type="videoname" class="form-control" id="videoname" placeholder="Enter sender name" name="keys">
                  </div>  -->
                  <div class="form-group">
                    <label for="videoname">Receiver Name:</label>
                    <input type="videoname" class="form-control" id="videoname" placeholder="Enter video name" name="keys">
                  </div>
                  <div class="form-group">
                    <label for="videoname">Start Time</label>
                    <input type="videoname" class="form-control" id="videoname" placeholder="Enter video name" name="start_time">
                  </div>
                  <div class="form-group">
                    <label for="videoname">End Time:</label>
                    <input type="videoname" class="form-control" id="videoname" placeholder="Enter video name" name="end_time">
                  </div>
                 
                  <!-- <div class="form-group">
                    <label for="link">Video Upload:</label>
                    <input type="file" class="form-control" id="fup" placeholder="" name="url">
                  </div> -->
                  @endsection