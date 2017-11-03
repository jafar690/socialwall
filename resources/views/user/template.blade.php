<!doctype html>
<html lang="en">

<head>

    @include('user.layout._head')

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="{{ url("users/assets/img/sidebar-1.jpg") }}">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="" class="simple-text logo-mini">
                    FP
                </a>
                <a href="" class="simple-text logo-normal">
                    Fun Pics
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ route_is_active('user.home') }}">
                        <a href="{{ url('user/home') }}">
                            <i class="material-icons">dashboard</i>
                            <p>My Walls</p>
                        </a>
                    </li>
                    <li class="{{ route_is_active('user.wall.create') }}">
                        <a href="{{ url('user/wall/create') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Create Wall</p>
                        </a>
                    </li>
                    <li class="{{ routes_are_active(['user.facebook','user.instagram','user.twitter']) }}">
                        <a data-toggle="collapse" href="#pagesExamples" aria-expanded="true">
                            <i class="fa fa-comments-o"></i>
                            <p>Social Networks
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse in" id="pagesExamples">
                            <ul class="nav">
                                <li class="{{ route_is_active('user.facebook') }}">
                                    <a href="{{ url('user/facebook') }}">
                                        <span class="sidebar-mini">FB</span>
                                        <span class="sidebar-normal">Facebook</span>
                                    </a>
                                </li>
                                <li class="{{ route_is_active('user.instagram') }}">
                                    <a href="{{ url('user/instagram') }}">
                                        <span class="sidebar-mini">IG</span>
                                        <span class="sidebar-normal">Instagram</span>
                                    </a>
                                </li>
                                <li class="{{ route_is_active('user.twitter') }}">
                                    <a href="{{ url('user/twitter') }}">
                                        <span class="sidebar-mini">TW</span>
                                        <span class="sidebar-normal">Twitter</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">

            @include('user.layout._nav')

            @yield('content')

            @include('user.layout._footer')

        </div>
    </div>

    @include('user.layout._settings')

</body>

    @include('user.layout._scripts')

</html>