
@extends('layout.layouts.index')

@section('title')
<title>Tin Tức</title>
@stop

@section('content')
<!-- Title page -->	


<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
	<div class="container">
			@foreach($tintuc as $new)
		<div class="row p-b-148">
			<div class="col-md-7 col-lg-8">
				<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
					<h3 class=" cl2 p-b-16">
						{{$new->title}}
					</h3>

					<p class=" cl6 p-b-26">
						{{$new->main_content}}
					</p>

					
				</div>
			</div>

			<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
				<div class="how-bor1 ">
					<div class="hov-img0">
						<img src="{{url('')}}/uploads/{{$new->image}}" alt="IMG" height=”10″ width=”10″>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		
	</div>
</section>


<!-- Map -->
<div class="map">
	<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>
@stop