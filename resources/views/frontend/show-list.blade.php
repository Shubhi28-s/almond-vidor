<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <div class="container"> -->

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
                                <a class="btn btn-outline-success mb-1 pull-right" href="{{ route('frontend.user.information') }}" target="_self" title="Create campaign"><i class="fa fa-plus"></i> Create Campaign</a>


                            </div>

                            <div class="container">

                                <!-- <h2> Videos list </h2> -->
                                <table class="table table-bordered shadow text-center table-string mt-3" style="background:#eee">
                                    <tr>
                                        <th>Id</th>
                                        <th>Video Name</th>
                                        <th> Video_Upload</th>
                                        <th> Status </th>

                                        <th colspan="2" align="center"> Action</th>
                                        <!-- <th>Video_Delete</th>
                <th>Video_Edit</th> -->

                                    </tr>
                                    @foreach ($posts as $post)

                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->video_name}}</td>
                                        <td style="  display: block; width: 150px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;
"><a href="{{$post->url}}?id= {{$post->id}}"> View content</a> </td>
                                        <td>
                                            <?php
                                            if ($post->status == 1) { ?>
                                                <a class="btn btn-success btn-sm" href="/InActive/{{$post->id}}" ONCLICK="return ActiveFunction()"><i class="fa fa-user fa-lg"></i></a>
                                            <?php } else { ?>
                                                <a class="btn btn-danger btn-sm" href="/Active/{{$post->id}}" ONCLICK="return InActiveFunction()"><i class="fa fa-user fa-lg"></i></a>
                                            <?php }
                                            ?>

                                            <script type="text/javascript">
                                                function ActiveFunction() {
                                                    //  alert("hi");

                                                    if (confirm("Do you want to inactive this?") == true) {
                                                        {
                                                            // alert("User wants to continue!");
                                                            return true;
                                                        }

                                                    } else {


                                                        return false;
                                                    }
                                                }
                                            </script>

                                            <script type="text/javascript">
                                                function InActiveFunction() {
                                                    // alert("hi");
                                                    if (confirm("Do you want to active this?") == true) {
                                                        {
                                                            // alert("User wants to continue!");
                                                            return true;
                                                        }

                                                    } else {


                                                        return false;
                                                    }
                                                }
                                            </script>



                                        </td>


                                        <td><a href="viewVideo/{{$post->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye fa-lg"></i></a></td>
                                        <td><a class="btn btn-danger btn-sm" href="/delete/{{$post->id}}" ONCLICK=" return confirmFunction()"><i class="fa fa-trash"></i></a></td>

                                        <script type="text/javascript">
                                            function confirmFunction() {
                                                if (confirm("Do you want to delete this?") == true) {
                                                    {
                                                        //alert("User wants to continue!");
                                                        return true;
                                                    }

                                                } else {

                                                    // alert("User  doesnt wants to continue!");
                                                    return false;
                                                }
                                            }
                                        </script>

                                        <td><a href="/edit/{{$post->id}}" class="btn btn-primary btn-sm"> <i class="fa fa-pencil fa-lg"></i></a></td>
                                        <td><a href="http://localhost/vidor2/videos.php?id={{$post->id}}" target="_blank" class="btn btn-info btn-sm"> <i class="fa fa-camera-retro fa-lg"></i></a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endsection

                        </script>
                        </body>

                        </html>