<!DOCTYPE html>

<html lang="en">

@include('fixed.head')

<body>
@include('fixed.navigation')

@include('partials.success')
@include('partials.error')

@yield('content')

@include('fixed.footer')
@include('fixed.scripts')

</body>


</html>
