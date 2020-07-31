@extends('admin.master')
@section('title')
<title>thống kê</title>
@stop
@section('main')


<div class="col-md-6">
	<div class="nav-search" id="nav-search">
		<form class="form-search" action="{{route('onedayReport')}}">
			<!-- <label > Tìm kiếm trên một ngày </label> -->
			<span class="input-icon" >
				<input type="date" placeholder="" class="nav-search-input" id="nav-search-input" autocomplete="off" name="key">
					@if($errors->has('key'))
					<div class="help-block">
						{{$errors->first('key')}}
					</div>
					@endif
				<i class="ace-icon fa fa-search nav-search-icon"></i>

			</span>
			<button class="submit">một ngày</button>
		</form>
	</div><!-- /.nav-search -->
</div>

<div class="col-md-6">
	<div class="nav-search" id="nav-search">
		<form class="form-search" action="{{route('manydayReport')}}">
			<!-- <label > Tìm kiếm trên nhiều ngày </label> -->
			<span class="input-icon" >
				<input type="date" placeholder="" class="nav-search-input" id="nav-search-input" autocomplete="off" name="key_1">
					@if($errors->has('key_1'))
					<div class="help-block">
						{{$errors->first('key_1')}}
					</div>
					@endif
				<i class="ace-icon fa fa-search nav-search-icon"></i>
			</span>
			<span class="input-icon" >
				<input type="date" placeholder="" class="nav-search-input" id="nav-search-input" autocomplete="off" name="key_2">
					@if($errors->has('key_2'))
					<div class="help-block">
						{{$errors->first('key_2')}}
					</div>
					@endif
				<i class="ace-icon fa fa-search nav-search-icon"></i>
			</span>
			<button class="submit">nhiều ngày</button>
		</form>
	</div><!-- /.nav-search -->
</div>
@stop