@extends('user.template')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">dashboard</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Create Wall</h4>
                            <form method="get" action="http://demos.creative-tim.com/" class="form-horizontal">
                               <div class="form-group label-floating">
                                    <label class="control-label">Email address</label>
                                    <input type="email" class="form-control">
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection