<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Smarty Admin</title>
        <meta name="description" content="" />
        <meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

        <!-- WEB FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="{{ url("assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        
        <!-- THEME CSS -->
        <link href="{{ url("assets/css/essentials.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ url("assets/css/layout.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ url("assets/css/color_scheme/green.css") }}" rel="stylesheet" type="text/css" id="color_scheme" />

    </head>
    <!--
        .boxed = boxed version
    -->
    <body>


        <!-- WRAPPER -->
        <div id="wrapper">

              <aside-component></aside-component>

              <header-component></header-component>

            <!-- 
                MIDDLE 
            -->
            <section id="middle">


                <!-- page title -->
                <header id="page-header">
                    <h1>Blank Page</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Pages</a></li>
                        <li class="active">Blank Page</li>
                    </ol>
                </header>
                <!-- /page title -->


                <div id="content" class="padding-20">

                    content here...

                </div>
            </section>
            <!-- /MIDDLE -->

        </div>



    
        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript" src="{{ url("assets/app.js") }}"></script>
        <script type="text/javascript">var plugin_path = '{{ url("assets/plugins/") }}';</script>
        <script type="text/javascript" src="{{ url("assets/plugins/jquery/jquery-2.2.3.min.js") }}"></script>
        <script type="text/javascript" src="{{ url("assets/js/app.js") }}"></script>

    </body>
</html>