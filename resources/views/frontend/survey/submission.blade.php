@extends('frontend.layouts.expo')

@section('title', __('Survey Submission'))

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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table id="list_table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Sr. No</th>
                                                        <th>Hexa Code</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Number</th>
                                                        <th>Total Marks</th>
                                                        <th>Obtain Marks</th>
                                                        <!-- <th>Action</th> -->
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
    jQuery(function() {
        var tu = "{{ route('frontend.user.survey.submissions') }}";
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
                "data": "delegate.name",
                "name": 'delegate.name'
            },
            {
                "data": "delegate.email",
                "name": 'delegate.email'
            },
            {
                "data": "delegate.number",
                "name": 'delegate.number'
            },
            {
                "data": "survey_sum_marks",
                "name": 'survey_sum_marks',
            },
            {
                "data": "submission_sum_obtain_marks",
                "name": 'submission_sum_obtain_marks',
            },
            // {
            //     "data": "operations",
            //     "name": "operations",
            //     'orderable': false,
            //     'searchable': false
            // },
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