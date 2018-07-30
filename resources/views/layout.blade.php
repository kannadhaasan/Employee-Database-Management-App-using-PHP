<!DOCTYPE html>
<html>
    <head>
        <title>ABC limited</title>
        {!! MaterializeCSS::include_css() !!}
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
    </head>

    <body>
      <div class="container">
          <div class="row" style="padding-top:30px;">
              <div class="center-align col s6">
                <a class="logo" style="color: #333; font-size: 26px;" href="/"><b>ACME Limited</b></a>
              </div>
              <div class="right-align col s6">
                
                <a class="btn blue waves-effect waves-light lighten-1 white-text" href="/"> Home </a>
                  @if(Auth::check())
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/logout"> Logout </a>
                    <a class="btn-flat disabled" href="#" style="text-transform:none;">{{ Auth::user()->email }}</a>
                  @else
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/login"> Login </a>
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/register"> Register </a>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col s12 m10 offset-m1 l8 offset-l2" style="margin-top:50px;">
                @yield('content')
              </div>
          </div>
      </div>
    </body>
    <script src="{{ URL::asset('jquery.min.js') }}"></script>
    {!! MaterializeCSS::include_js() !!}
    <script src="{{ URL::asset('init.js') }}"></script>
    @yield('scripts')
</html>
