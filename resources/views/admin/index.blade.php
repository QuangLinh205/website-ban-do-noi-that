@extends('admin.master')

@section('main')

<div class="col-sm-12 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-product-hunt"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{$product}}</span>
												<div class="infobox-content"> Sản phẩm</div>
											</div>

											<!-- <div class="stat stat-success">8%</div> -->
										</div>

										<!-- <div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-bookmark"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"></span>
												<div class="infobox-content">danh mục</div>
											</div>

											<div class="badge badge-success">
												+32%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div>
										</div> -->

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-genderless"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{$customer}}</span>
												<div class="infobox-content">Khách hàng</div>
											</div>
											<!-- <div class="stat stat-important">4%</div> -->
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-newspaper-o"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{$new}}</span>
												<div class="infobox-content">Tin tức</div>
											</div>
										</div>

										<div class="infobox infobox-orange2">
											<div class="infobox-chart">
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"><canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas></span>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">{{$banner}}</span>
												<div class="infobox-content">Banner</div>
											</div>

											<!-- <div class="badge badge-success">
												7.2%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div> -->
										</div>
									</div>
@stop
