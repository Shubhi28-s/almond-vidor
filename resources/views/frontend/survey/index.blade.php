@extends('frontend.layouts.expo')

@section('title', __('Campaign Dashboard'))

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
                                <a class="btn btn-outline-success pull-right" href="{{ route('frontend.user.survey.create') }}" target="_self" title="Add Polls"><i class="fa fa-plus"></i> Add Campaign</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table id="list_table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Sr. No</th>
                                                        <th>Campaign Code</th>
                                                        <th>First Popup</th>
                                                        <th>Last Popup</th>
                                                        <th>Desktop Image</th>
                                                        <th>Mobile Image</th>
                                                        <th>Login Desktop Image</th>
                                                        <th>Login Mobile Image</th>
                                                        <th>Logo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
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
@stop

@section('script')
<script type="text/javascript">
    var list_table_tab;
    var hidden_columns = true;
  
    // $(document)[0].oncontextmenu = function() {
    //     return false;
    // }
    // $(document).mousedown(function(e) {
    //     console.log(e.button);
    //     if (e.button == 2) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // });

    jQuery(function() {
        var tu = "{{ route('frontend.user.survey.index') }}";
        if (jQuery(window).width() <= 375) {
            jQuery.fn.DataTable.ext.pager.numbers_length = 7;
        }

        var cols = [{
                "data": "DT_RowIndex",
                "name": 'DT_RowIndex'
            },
            {
                "data": "hexa_code",
                "name": 'hexa_code'
            },
            {
                "data": "first_popup",
                "name": 'first_popup'
            },
            {
                "data": "last_popup",
                "name": 'last_popup'
            },
            {
                "data": "desktop_image",
                "name": 'desktop_image',
                "render": function(data) {
                    return "<a href=\"" + data + "\" target='_blank'><img src= \"" + data + "\" width='150'></a>";
                }
            },
            {
                "data": "mobile_image",
                "name": 'mobile_image',
                "render": function(data) {
                    return "<a href=\"" + data + "\" target='_blank'><img src= \"" + data + "\" width='150'></a>";
                }
            },
            {
                "data": "login_desktop_image",
                "name": 'login_desktop_image',
                "render": function(data) {
                    return "<a href=\"" + data + "\" target='_blank'><img src= \"" + data + "\" width='150'></a>";
                }
            },
            {
                "data": "login_mobile_image",
                "name": 'login_mobile_image',
                "render": function(data) {
                    return "<a href=\"" + data + "\" target='_blank'><img src= \"" + data + "\" width='150'></a>";
                }
            },
            {
                "data": "logo",
                "name": 'logo',
                "render": function(data) {
                    return "<a href=\"" + data + "\" target='_blank'><img src= \"" + data + "\" width='150'></a>";
                }
            },
            {
                "data": "operations",
                "name": "operations",
                'orderable': false,
                'searchable': false
            },
        ];

        var order = [
            [1, 'asc']
        ];

        var list_table_tab = jQuery("#list_table").DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            buttons: [
                'csv', 'excel', 'pdf', 'pageLength'
            ],
            destroy: true,
            processing: true,
            stateSave: true,
            stateSaveParams: function(settings, data) {
                data.start = 0;
                data.search.search = "";
                data.columns.forEach(function(a) {
                    a.search.search = "";
                });
                if (order.length > 0) {
                    if (order[0].length) {
                        data.order[0] = order[0][0];
                        data.order[1] = order[0][1];
                    }

                }
            },
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            pagingType: "simple_numbers",
            paging: true,
            ordering: true,
            serverSide: true,
            ajax: tu,
            columns: cols,
            order: order,
        });
    });
</script>
@endsection