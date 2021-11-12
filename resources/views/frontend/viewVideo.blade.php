@extends('frontend.layouts.expo')

@section('title', __('Edit Campaign Dashboard'))

@section('content')

<?php $baseurl = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>

<style>
    .table th,
    .table td {
        padding: 4px 3px !important;
        font-size: 12px;
    }

    .form-control {
        font-size: 12px !important;

    }

    .pdrw {
        padding: 20px;
    }

    .iframe video {
        width: 100%;
        height: 410px;
        background: black;
    }

    .form-group {
        margin-bottom: 10px !important;
    }

    /* video{
        min-height: 500px !important;
    } */
</style>


<div id="sidebar" class="app-content content">
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
                            <a href="{{ url()->previous() }}" style="padding:5px 10px; color:#000;background:red;width:40px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <!-- <a href="{{ url()->previous() }}" class="btn btn-warning" style=display:inline;><i class="fa fa-angle-left"></i></a> -->
                            <div class="row pdrw">
                                <div class="col-sm-6">
                                    <div class="iframe">
                                        <video controls>
                                            <source src="/VIDEO/{{$posts->url}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="formdiv" style="background:#eee;padding:10px">
                                        <form method="post" action="{{ route('frontend.user.formSaveSubmit') }}" enctype="multipart/form-data" id="addSlide">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" class="form-control" name="video_id" value="" id="vvid">
                                                <input type="hidden" class="form-control" name="id" value="" id="vid">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="videoname">Slide Name:</label>
                                                        <input type="text" class="form-control" id="slideValues" placeholder="Name" name="values">
                                                    </div>

                                                </div>
                                                <!-- sm-6 end here -->

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Slide keys:</label>
                                                        <input type="text" class="form-control" id="slideKeys" placeholder="Name" name="keys">
                                                    </div>

                                                </div>
                                                <!-- sm-6 end here -->


                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Start Time:</label>
                                                        <input type="text" class="form-control" id="startTime" placeholder="Name" name="start_time">
                                                    </div>

                                                </div>
                                                <!-- sm-6 end here -->

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">End Time:</label>
                                                        <input type="text" class="form-control" id="endTime" placeholder="End Time" name="end_time">
                                                    </div>

                                                </div>
                                                <!-- sm-6 end here -->

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Left:</label>
                                                        <input type="text" class="form-control" id="left" placeholder="" name="left">
                                                    </div>

                                                </div>
                                                <!-- sm-6 end here -->

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Right:</label>
                                                        <input type="text" class="form-control" id="right" placeholder="" name="right">
                                                    </div>

                                                </div>
                                                <!-- sm-6 end here -->
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Top:</label>
                                                        <input type="text" class="form-control" id="top" placeholder="" name="top">
                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Bottom:</label>
                                                        <input type="text" class="form-control" id="bottom" placeholder="" name="bottom">
                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Width:</label>
                                                        <input type="text" class="form-control" id="width" placeholder="" name="width">
                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Height:</label>
                                                        <input type="text" class="form-control" id="height" placeholder="" name="height">
                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->
                                                <!-- <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Text-Align:</label>
                                                        <input type="text" class="form-control" id="textAlign" placeholder="" name="text-align">
                                                    </div>

                                                </div> -->



                                                <!--sm-6 end here-->
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Font Family:</label>
                                                        <select class="form-control" name="fontFamily" id="font">
                                                            <option value="Lobster">Lobster</option>
                                                            <option value="Roboto">Roboto</option>
                                                            <option value="Poppins">Poppins</option>
                                                        </select>

                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Font Size:</label>
                                                        <input type="text" class="form-control" id="fontSize" placeholder="" name="font_size">
                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Colors:</label>
                                                        <!-- <input type="text" class="form-control" id="colors" placeholder="" name="colors"> -->
                                                        <input type="color" id="colorpicker" value="#0000ff" name="colors">
                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Effect:</label>
                                                        <select class="form-control" name="effect" id="effect">
                                                            <option value=" ">Select</option>
                                                            <option value="fade-in">fade-in</option>
                                                            <option value="fade-up">fade-up</option>
                                                            <option value="fade-down">fade-down</option>
                                                            <option value="fade-left">fade-left</option>
                                                            <option value="fade-right">fade-right</option>
                                                        </select>

                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="videoname">Rotate:</label>
                                                        <input type="text" class="form-control" id="rotate" placeholder="" name="rotation">
                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->


                                                <div class="col-sm-4 ml-auto">

                                                    <div class="form-group">
                                                        <button type="submit" id="formSubmit" class="btn btn-outline-primary btn-lg pull-right add-data mt-1">Submit</button>

                                                    </div>

                                                </div>
                                                <!--sm-6 end here-->


                                                <!-- row end -->

                                            </div>
                                            <!-- formdiv end -->

                                        </form>

                                    </div>


                                </div>

                                <!-- <div class="card-header" > -->

                                <div class="data-details" style="overflow:hidden;padding:10px 15px;">
                                    <table class="table table-responsive  mt-2" style="background:#eee;" id="table_field">
                                        <tr>
                                            <th style="min-width:100px !important;"> Slide Name</th>
                                            <th style="min-width:100px !important;">Slide Keys</th>
                                            <th style="min-width:80px !important;"> Start Time</th>
                                            <th style="min-width:80px !important;"> End Time </th>
                                            <th style="min-width:60px !important;">Left</th>
                                            <th style="min-width:60px !important;">Right</th>
                                            <th style="min-width:60px !important;">Top</th>
                                            <th style="min-width:70px !important;">Bottom</th>
                                        
                                            <th style="min-width:70px !important;">Width</th>
                                             <th style="min-width:70px !important;">Height</th>
                                             <!-- <th style="min-width:70px !important;">Text-Align</th> -->
                                            <th style="min-width:100px !important;">fontfamily</th>
                                          
                                            <th style="min-width:100px !important;">Effect</th>
                                            <th style="min-width:90px !important;">Colors</th>
                                            <th style="min-width:90px !important;">Font-Size</th>
                                            <th style="min-width:90px !important;">Rotation</th>
                                            <th style="min-width:200px !important;">Action</th>
                                        </tr>


                                        <tbody id="table_field1">

                                            <!-- @foreach ($parts as $part)
                                            <tr>

                                                <td>{{$part->values}}</td>
                                                <td>{{$part->keys}}</td>
                                                <td>{{$part->start_time}}</td>
                                                <td>{{$part->end_time}}</td>
                                                <td>{{$part->left}}</td>
                                                <td>{{$part->right}}</td>
                                                <td>{{$part->top}}</td>
                                                <td>{{$part->bottom}}</td>
                                                <td>{{$part->fontFamily}}</td>
                                                <td>{{$part->font_size}}</td>
                                                <td>{{$part->colors}}</td>
                                                <td>{{$part->effect}}</td>
                                                <td>{{$part->rotation}}</td>
                                                <td><a href="" class="btn btn-primary btn-sm"> <i class="fa fa-pencil fa-lg"></i></a></td>
                                                <td> <a class="btn btn-danger btn-sm" href="" ONCLICK=" return confirmFunction()"><i class="fa fa-trash"></i></a></td>

                                                @endforeach -->

                                        </tbody>
                                        <table>
                                </div>
                                <!-- </div> -->





                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                <script src="js/bootstrap.min.js"></script>
                                <script type="text/javascript">
                           

                                    $(document).ready(function() {
                                        // $body.addClass('menu-collapsed')="";
                                        $("#table_field").on('click', '#remove', function() {
                                            $(this).closest('tr').remove();
                                        });
                                        fetchData();


                                        function fetchData() {
                                            console.log('hi');
                                            // var obj;
                                            var full_url = document.URL;
                                            var id = full_url.substring(full_url.lastIndexOf('/') + 1);
                                            document.getElementById('vvid').value = id;
                                            console.log(id);
                                            $.ajax({
                                                type: "get",
                                                url: `/fetchData/${id}`,
                                                // data: jQuery('#form').serialize(),
                                                // datatype: "json",

                                                success: function(response) {
                                                    // obj= JSON.parse(response);
                                                    // alert('hi');

                                                    var result = response.parts;
                                                    $('#table_field1').empty();

                                                    result.map(function(item, index) {
                                                        console.log(item);
                                                        var res = JSON.stringify(item);
                                                        $('#table_field1').append("<tr><td>" + item.values + "</td><td>" + item.keys + "</td><td>" + item.start_time + "</td><td>" + item.end_time + "</td><td>" + item.left + "</td><td>" + item.right + "</td><td>" + item.top + "</td><td>" + item.bottom + "</td><td>" + item.width +"</td><td>"+item.height+"</td><td>"+ item.fontFamily + "</td><td>" + item.effect + "</td><td>" + item.colors + "</td><td>" + item.font_size + "</td><td>" + item.rotation + "</td><td>" + "<p onclick='forminsert(" + JSON.stringify(item) + ")' class='btn btn-primary btn-sm mt-1 mr-1'> <i class='fa fa-pencil fa-lg'></i></p>" + '<a class=" remove btn btn-danger btn-sm" onclick="deletedata(' + item.id + ')" id="remove"><i class="fa fa-trash"></i></a>' + "</td></tr>");

                                                    });

                                                }
                                            });
                                        }

                                        $(document).on('click', '.add-data', function(e) {
                                            e.preventDefault();
                                            // window.alert(name);
                                            // console.log('hello');
                                            // alert('hi');
                                            $.ajax({
                                                type: "post",
                                                url: '/videoInfo',
                                                data: jQuery('#addSlide').serialize(),
                                                datatype: "json",
                                                success: function(response) {

                                                    console.log(response)
                                                    jQuery('#addSlide')['0'].reset();
                                                    // var dataResult = JSON.parse(response);
                                                    // if (response.status == 200) {
                                                    //     window.location = "/videoInfo";

                                                    // }
                                                    fetchData();
                                                }

                                            });

                                            // else {
                                            //     alert('Please fill all the field !');
                                            // }
                                        });

                                    });


                                    const forminsert = (item) => {
                                        console.log(item);
                                        document.getElementById('vid').value = item.id;
                                        document.getElementById('slideValues').value = item.values;
                                        document.getElementById('slideKeys').value = item.keys;
                                        document.getElementById('left').value = item.left;
                                        document.getElementById('right').value = item.right;
                                        document.getElementById('top').value = item.top;
                                        document.getElementById('bottom').value = item.bottom;
                                        document.getElementById('width').value = item.width;
                                        document.getElementById('height').value = item.height;
                                        document.getElementById('startTime').value = item.start_time;
                                        document.getElementById('endTime').value = item.end_time;
                                        document.getElementById('font').value = item.fontFamily;
                                        document.getElementById('fontSize').value = item.font_size;

                                        document.getElementById('effect').value = item.effect;
                                        document.getElementById('colors').value = item.colors;
                                        // document.getElementById('width').value = item.width;
                                        // document.getElementById('height').value = item.height;
                                        // document.getElementById('text-align').value = item.text-align;
                                        document.getElementById('rotate').value = item.rotation;




                                    }

                    
                                    const deletedata = (id) => {
                                        if (confirm("Do you really want to delete this?")) {
                                            console.log(id);
                                            $.ajax({
                                                type: "delete",
                                                url: '/deleteSlides/' + id,
                                                data: {
                                                    "_token": "{{csrf_token()}}",
                                                    "id": id
                                                },
                                                datatype: "json",
                                                success: function(response) {
                                                    console.log(response)
                                                    // table.ajax.reload();
                                                }


                                            })
                                        }
                                    }
                                </script>
                                @endsection