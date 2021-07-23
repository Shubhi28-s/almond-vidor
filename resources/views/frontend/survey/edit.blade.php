@extends('frontend.layouts.expo')

@section('title', __('Edit Survey Dashboard'))

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
                                <div>
                                    <h4 class="card-title">Survey Details</h4>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="label label-default">Hexa Code</span>
                                            <label class="label pull-right"> {{ @$survey->hexa_code }}</label>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="label label-default">First Popup</span>
                                            <label class="label pull-right"> {{ @$survey->first_popup }}</label>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="label label-default">Last Popup</span>
                                            <label class="label pull-right">{{ @$survey->last_popup }}</label>
                                        </li>

                                        <li class="list-group-item">
                                            <span class="label label-default">Desktop Image (900px x 1600px)</span>
                                            @if(!empty(@$survey->desktop_image))
                                            <a href="{{ @$survey->desktop_image }}" target="_blank">
                                                <img class="pull-right" src="{{ @$survey->desktop_image }}" width="200px">
                                            </a>
                                            @endif
                                        </li>

                                        <li class="list-group-item">
                                            <span class="label label-default">Mobile Image (900px x 1600px)</span>
                                            @if(!empty(@$survey->mobile_image))
                                            <a href="{{ @$survey->mobile_image }}" target="_blank">
                                                <img class="pull-right" src="{{ @$survey->mobile_image }}" width="200px">
                                            </a>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            <span class="label label-default">Login Desktop Image (900px x 1600px)</span>
                                            @if(!empty(@$survey->login_desktop_image))
                                            <a href="{{ @$survey->login_desktop_image }}" target="_blank">
                                                <img class="pull-right" src="{{ @$survey->login_desktop_image }}" width="200px">
                                            </a>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            <span class="label label-default">Login Mobile Image (900px x 1600px)</span>
                                            @if(!empty(@$survey->login_mobile_image))
                                            <a href="{{ @$survey->login_mobile_image }}" target="_blank">
                                                <img class="pull-right" src="{{ @$survey->login_mobile_image }}" width="200px">
                                            </a>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            <span class="label label-default">Logo (900px x 1600px)</span>
                                            @if(!empty(@$survey->logo))
                                            <a href="{{ @$survey->logo }}" target="_blank">
                                                <img class="pull-right" src="{{ @$survey->logo }}" width="200px">
                                            </a>
                                            @endif
                                        </li>

                                        <li class="list-group-item">
                                            <span class="label label-default">Video Url (900px x 1600px)</span>
                                            @if(!empty(@$survey->video_url))
                                            <a href="{{ @$survey->video_url }}" target="_blank">
                                                <img class="pull-right" src="{{ @$survey->video_url }}" width="200px">
                                            </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h4 class="card-title">Question Section</h4>
                                </div>
                            </div>

                            <div class="card-body card-block">
                                <div class="col-12 col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('frontend.user.survey.update',$survey->id) }}" id="user-profile">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <div class="addMoreService">
                                            @if(isset($survey) && count($survey->question) > 0)
                                            @foreach($survey->question as $key => $question)
                                            @include('frontend.survey._partials.question',['question'=>$question,'count'=>$key])
                                            @endforeach
                                            @else
                                            @include('frontend.survey._partials.question')
                                            @endif
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-12">
                                                <a href="javascript:void(0);" class="btn btn-outline-primary pull-right add_more_button">
                                                    Add More</a>
                                            </div>
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
    $(document).ready(function() {
        $(document).on('click', '.add_more_button', function() {
            var count = $(".htmlToaddQuestion").length;
            $.ajax({
                type: 'GET',
                data: {
                    count: count
                },
                url: "{{ route('frontend.user.survey.add_more_question') }}",
                cache: true,
                beforeSend: function() {
                    $('.loader_class').show();
                },
                success: function(response) {
                    console.log(response);
                    if (response) {
                        if (response.contents != '') {
                            $('.addMoreService').append(response.question);
                            $('.remove_field').click(function(e) {
                                $('.addMoreService .htmlToaddQuestion:last').remove();
                            });
                        }
                    }
                },
                complete: function() {
                    $('.loader_class').hide();
                },
                error: function() {
                    alert('Sorry!');
                }
            });
        });
    });
</script>
@endsection