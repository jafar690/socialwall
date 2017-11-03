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
                        <div class="row" style="padding-top: 15px;">
                          <div class="col-md-2"></div>
                          <div class="col-md-8 ">
                            <form method="get" action="{{ route('user.wall.create') }}" class="form-horizontal">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Wall Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" id="name" name="name" class="form-control" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Wall Tittle</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" name="title" id="title" class="form-control" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Instagram</label>
                                    <div class="col-sm-10" style="padding-top: 24px;">
                                        <div class="togglebutton">
                                            <label>
                                                <input id="instagramcheckbox" type="checkbox"> Pull posts from Instagram?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="intadiv" style="display:none;">
                                    <div class="col-sm-3"></div>
                                    @if(empty($instagram))
                                    <div class="col-sm-7">
                                        <p>No Instagram Account linked yet.</p>
                                        <a href="{{ url('user/instagram/auth') }}" style="background-color:#ea4c89;" class="btn btn-social btn-fill ">
                                            <i class="fa fa-instagram"></i> Connect Instagram Account
                                        </a>
                                    </div>
                                    @else
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6 col-sm-3">
                                                <select id="igselect" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                                                    <option value="2" selected>Hashtag</option>
                                                    <option value="3">User Feed</option>
                                                </select>
                                            </div>
                                            <div id="ighashtag" class="col-lg-5 col-md-6 col-sm-3">
                                                <input type="text" name="instahashtag" id="instahashtag" class="form-control" value="#">
                                            </div>
                                            <div id="igdropdown" style="display:none;" class="col-lg-5 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Choose Page" data-size="7" id="iguserdd" name="iguserdd">
                                                    <option value="{{ $instagram->instagram_username }}" selected>
                                                        {{ $instagram->instagram_username }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Facebook</label>
                                    <div class="col-sm-10" style="padding-top: 24px;">
                                        <div class="togglebutton">
                                            <label>
                                                <input id="fbcheckbox" type="checkbox"> Pull posts from Facebook?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="fbdiv" style="display:none;">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7" required="true">
                                                    <option value="2" selected>Page Feed</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-5 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Choose Page" data-size="7" id="fbpage" name="fbpage">
                                                    <option disabled> Choose page</option>
                                                    @foreach($pages as $page)
                                                    <option value="{{ $page->facebook_id }}">
                                                        {{ $page->page_name }} 
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Twitter</label>
                                    <div class="col-sm-10" style="padding-top: 24px;">
                                        <div class="togglebutton">
                                            <label>
                                                <input id="twittercheckbox" type="checkbox"> Pull posts from Twitter?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="twitterdiv" style="display:none;">
                                    <div class="col-sm-3"></div>
                                    @if(empty($twitter))
                                    <div class="col-sm-7">
                                        <p>No Twitter Account linked yet.</p>
                                        <a href="{{ url('user/twitter/auth') }}" class="btn btn-social btn-fill btn-twitter">
                                            <i class="fa fa-twitter"></i> Connect Twitter Account
                                        </a>
                                    </div>
                                    @else
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6 col-sm-3">
                                                <select id="twitterselect" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="3">
                                                    <option value="2" selected>Hashtag</option>
                                                    <option value="3">User Tweets</option>
                                                </select>
                                            </div>
                                            <div id="twitterhashdiv" class="col-lg-5 col-md-6 col-sm-3">
                                                <input type="text" name="titterhash" class="form-control" value="#">
                                            </div>
                                            <div id="twitterdropdown" style="display:none;" class="col-lg-5 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Choose Page" data-size="7" id="twitteruser" name="twitteruser">
                                                    <option value="{{ $twitter->twitter_username }}" selected>
                                                        {{ $twitter->twitter_username }} 
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <label class="col-md-5"></label>
                                    <div class="col-md-7" style="padding-top:20px;">
                                        <div class="form-group form-button">
                                            <button type="submit" class="btn btn-fill btn-rose">Create Wall</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                          <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#instagramcheckbox').change(function () {
            if (this.checked) 
               $('#intadiv').fadeIn('slow');
            else 
                $('#intadiv').fadeOut('slow');
        });

        $('#twittercheckbox').change(function () {
            if (this.checked) 
               $('#twitterdiv').fadeIn('slow');
            else 
                $('#twitterdiv').fadeOut('slow');
        });

        $('#fbcheckbox').change(function () {
            if (this.checked) {
                $('#fbdiv').fadeIn('slow');
                document.getElementById("fbpage").required = true;
                console.log('ghjk');
            }
            else {
                $('#fbdiv').fadeOut('slow');
                document.getElementById("fbpage").required = false;
            }
        });

        $('#igselect').on('change', function() {
            if ( this.value == '3')
            {
                $("#igdropdown").show();
                $("#ighashtag").hide();
                document.getElementById("iguserdd").required = true;
                document.getElementById("instahashtag").required = false;
            }
            else
            {
                $("#igdropdown").hide();
                $("#ighashtag").show();
                document.getElementById("iguserdd").required = false;
                document.getElementById("instahashtag").required = true;
            }
        });

        $('#twitterselect').on('change', function() {
            if ( this.value == '3')
            {
                $("#twitterdropdown").show();
                $("#twitterhashdiv").hide();
                document.getElementById("twitteruser").required = true;
                document.getElementById("titterhash").required = false;
            }
            else
            {
                $("#twitterdropdown").hide();
                $("#twitterhashdiv").show();
                document.getElementById("twitteruser").required = false;
                document.getElementById("titterhash").required = true;
            }
        });

    });
</script>

@endsection 