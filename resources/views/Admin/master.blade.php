<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin | @yield('title')</title>
  @include('Admin.include.link')
</head>
<body>
  
  @include('Admin.include.sidebar')
  @include('Admin.include.topbar')

<!--========= ########## Main Content ########## --->
  @yield('admin_content')
<!--========= ########## Main Content End########## --->

  @include('Admin.include.src')
</body>
</html>