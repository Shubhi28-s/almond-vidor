<div style="display:inline-flex">
    <a title="Edit" class="btn btn-outline-success btn-table btn-icon" href="{{ route('frontend.user.survey.edit',$row->id) }}" style="margin-right:10px;">
        <i class="feather icon-edit"></i>
    </a>

    <!-- <a title="Edit Info" class="btn btn-outline-warning btn-table btn-icon" href="{{ route('frontend.user.survey.edit',$row->id) }}" style="margin-right:10px;">
        Edit Info </a> -->

    <form class="form-horizontal" method="POST" action="{{ route('frontend.user.survey.destroy',$row->id) }}" enctype="multipart/form-data" id="user-profile">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-outline-danger btn-table btn-icon"><i class="feather icon-trash"></i></button>
    </form>
</div>