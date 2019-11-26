@extends('backend.app')


@section('header-style')
<style type="text/css">
	#map{
		height: 400px;
		width: 100%;
	}
</style>
@endsection

@section('content')

<div class="row">
	<div class="col-sm-8 col-sm-push-2">
		<div class="panel panel-default">
			<div class="panel-heading">
 				<h1 class="panel-heading">
 					{{$event->title}}
 				</h1> 
 				<small class="padding-left-10">{{$event->address}}</small>
			</div>

			<div class="panel-body">
				<p><strong>Description:</strong></p>
					{{$event->descript}}
			</div>

			<div id="map"></div>

			<table class="table table-bordered table-hover table-striped">
				<tbody>
					<tr>
						<td>Start Date :</td>
						<td>{{$event->start_date}}</td>
					</tr>
					<tr>
						<td>End Date :</td>
						<td>{{$event->end_date}}</td>
					</tr>
					<tr>
						<td>Address :</td>
						<td>{{$event->address}}</td>
					</tr>
					<tr>
						<td>Created :</td>
						<td>{{$event->creator->name}}</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>

@endsection

@section('footer-script')
	<script type="text/javascript">
		function initMap(){
			var direct = {lat: {{$event->lat}}, lng: {{$event->long}} };
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 4,
				center: direct
			});
			var marker = new google.map.Marker({
				position: direct,
				map : map
			});
		}
	</script>
	<script async defer
			src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap">
	</script>
@endsection