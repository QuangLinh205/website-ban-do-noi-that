<!DOCTYPE html>
<html lang="en">
@include('layout.layouts.head')
<body class="animsition">	
	<!-- Header -->
	@include('layout.layouts.header')	
	<!-- Product -->
	@yield('content')
	
	@include('layout.layouts.footer')

	

	@include('layout.layouts.script')
	

	@yield('script')
</body>
</html>