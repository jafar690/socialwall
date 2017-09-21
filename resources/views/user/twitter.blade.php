@extends('user.template')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i style="font-size:36px;" class="fa fa-twitter"> </i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Twitter</h4>
                            <div class="table-responsive">


                            </div>
                            <p>No Twitter Account linked yet.</p>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <a href="{{ url('user/twitter/auth') }}" class="btn btn-social btn-fill btn-twitter">
                                        <i class="fa fa-twitter"></i> Connect Twitter Account
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection