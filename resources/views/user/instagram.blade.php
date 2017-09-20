@extends('user.template')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i style="font-size:36px;" class="fa fa-instagram"> </i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Instagram Account</h4>
                            @if(empty($instagram))
                                <p>No Instagram Account linked yet.</p>
                                <div class="row">
                                    <div class="col-md-3 col-sm-4">
                                        <a href="{{ url('user/instagram/auth') }}" style="background-color:#ea4c89;" class="btn btn-social btn-fill ">
                                            <i class="fa fa-instagram"></i> Connect Instagram Account
                                        </a>
                                    </div>
                                </div>
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection  