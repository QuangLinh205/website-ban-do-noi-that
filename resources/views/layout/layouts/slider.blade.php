<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				@foreach($slide as $sd)
				<div class="item-slick1" style="background-image: url({{url('')}}/uploads/{{$sd->image}});">					
				</div>
				@endforeach
			</div>
		</div>
	</section>