@extends('user.template')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i style="font-size:36px;" class="fa fa-facebook"> </i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Facebook Account</h4>
                            @if(empty($facebook))
                                <p>No Facebook Account linked yet.</p>
                                <div class="row">
                                    <div class="col-md-3 col-sm-4">
                                        <a href="{{ url('user/facebook/auth') }}" class="btn btn-social btn-fill btn-facebook">
                                            <i class="fa fa-facebook"></i> Connect Facebook Account
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>UserName</th>
                                                <th>Facebook ID</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>{{$facebook->facebook_username}}</td>
                                                <td>{{$facebook->facebook_id}}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-success btn-xs">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                        Connected
                                                    </button>
                                                </td>
                                                <td class="td-actions text-center">
                                                    <a type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }
</script>
@endsection