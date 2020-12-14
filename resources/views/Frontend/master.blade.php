<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Business | @yield('title')</title>
  @include('Frontend.include.link')
</head>
<body>
  @include('Frontend.include.topbar')

<!--========= ########## Main Content ########## --->
  @yield('frontend_content')
<!--========= ########## Main Content End########## --->


  @include('Frontend.include.footer')
  @include('Frontend.include.src')
</body>
</html>