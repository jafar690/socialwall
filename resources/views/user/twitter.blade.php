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
                            <h4 class="card-title">Twitter Account</h4>
                            @if(empty($twitter))
                                <p>No Twitter Account linked yet.</p>
                                <div class="row">
                                    <div class="col-md-3 col-sm-4">
                                        <a href="{{ url('user/twitter/auth') }}" class="btn btn-social btn-fill btn-twitter">
                                            <i class="fa fa-twitter"></i> Connect Twitter Account
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
                                                <th>twitter ID</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>{{$twitter->twitter_username}}</td>
                                                <td>{{$twitter->twitter_id}}</td>
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