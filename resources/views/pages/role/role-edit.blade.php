@extends('backend.app')

@section('header-style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection

@section('content')

<div class="row">
	
	<div class="col-md-2 col-md-offset-5">
		<div class="page-header">
		  <h1>Edit  <small>Role</small></h1>
		</div>
	</div>
	
	<form action="{{route('role-update', $role->id)}}" method="post" id="formLocation">
	<div class="col-md-6 col-sm-offset-3">
		{{csrf_field()}}
	  <div class="form-group col-md-12 {{ $errors->has('name_r') ? ' has-error' : '' }}">
	    <label for="name">Name:</label>
	    <input type="text" class="form-control" id="name_r" placeholder="Enter the field" name="name_r" value="{{$role->name_r}}">
        @if ($errors->has('name_r'))
            <span class="help-block">
                <strong>{{ $errors->first('name_r') }}</strong>
            </span>
        @endif
	  </div>
	  <div class="col-md-12 text-center">
		  <div class="col-md-4">
		  	<label>Menu Permission</label>
		  	@foreach($permis as $p)
		  		@if($p->slug_p == 'menu')
			  	<div class="checkbox" style="text-align: left;">
				  <label><input type="checkbox" name="permission[]" value="{{$p->id}}"
				  			@foreach($role->permissions as $r_p)
				  				@if($r_p->id == $p->id)
				  					checked
				  				@endif
				  			@endforeach>{{$p->name_p}}</label>
				</div>
				@endif
			@endforeach
		  </div>
		  <div class="col-md-4">
		  	<label>Squad Permission</label>
		  	@foreach($permis as $p)
		  		@if($p->slug_p == 'squad')
			  	<div class="checkbox" style="text-align: left;">
				  <label><input type="checkbox" name="permission[]" value="{{$p->id}}"
				  			@foreach($role->permissions as $r_p)
				  				@if($r_p->id == $p->id)
				  					checked
				  				@endif
				  			@endforeach>{{$p->name_p}}
				  	</label>
				</div>
				@endif
			@endforeach
		  </div>
		  <div class="col-md-4">
		  	<label>Absence Permission</label>
		  	@foreach($permis as $p)
		  		@if($p->slug_p == 'absence')
			  	<div class="checkbox" style="text-align: left;">
				  <label><input type="checkbox" name="permission[]" value="{{$p->id}}"
				  			@foreach($role->permissions as $r_p)
				  				@if($r_p->id == $p->id)
				  					checked
				  				@endif
				  			@endforeach>{{$p->name_p}}</label>
				</div>
				@endif
			@endforeach
		  </div>
		  <div class="col-md-12">
		  	<hr>
		  </div>
		  <div class="col-md-4">
		  	<label>Noted Permission</label>
		  	@foreach($permis as $p)
		  		@if($p->slug_p == 'noted')
			  	<div class="checkbox" style="text-align: left;">
				  <label><input type="checkbox" name="permission[]" value="{{$p->id}}"
				  			@foreach($role->permissions as $r_p)
				  				@if($r_p->id == $p->id)
				  					checked
				  				@endif
				  			@endforeach>{{$p->name_p}}</label>
				</div>
				@endif
			@endforeach
		  </div>
		  <div class="col-md-4">
		  	<label>Blog Permission</label>
		  	@foreach($permis as $p)
		  		@if($p->slug_p == 'blog')
			  	<div class="checkbox" style="text-align: left;">
				  <label><input type="checkbox" name="permission[]" value="{{$p->id}}"
				  			@foreach($role->permissions as $r_p)
				  				@if($r_p->id == $p->id)
				  					checked
				  				@endif
				  			@endforeach>{{$p->name_p}}
				  	</label>
				</div>
				@endif
			@endforeach
		  </div>
		  <div class="col-md-4">
		  	<label>Event Permission</label>
		  	@foreach($permis as $p)
		  		@if($p->slug_p == 'event')
			  	<div class="checkbox" style="text-align: left;">
				  <label><input type="checkbox" name="permission[]" value="{{$p->id}}"
				  			@foreach($role->permissions as $r_p)
				  				@if($r_p->id == $p->id)
				  					checked
				  				@endif
				  			@endforeach>{{$p->name_p}}</label>
				</div>
				@endif
			@endforeach
		  </div>
	  	
	  </div>
	  <div class="form-group col-md-12">
	  	<hr>
		  <button type="submit" class="btn btn-primary">Edit</button>
		  <a href="{{route('roles')}}"> 
		  	<button type="button" class="btn btn-default">Cancel</button>
		  </a>
	  </div>
	</div>
	</form>
</div>

@endsection

@section('footer-script')
<script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
	$(function(){
		CKEDITOR.replace('editor', {
			toolbarLocation: 'bottom',
			removePlugins: 'elementspath,resize',
			height: 250
		} );
	});
	$('select').select2({
		  theme: "classic",
		  tags: true,
	  maximumSelectionLength: 3
	});
</script>
@endsection