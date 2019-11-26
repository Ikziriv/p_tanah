 @extends('layouts.app')

@section('content')
<div class="col">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">Home</a></li>
    </ul>
    <div class="tab-content py-3">
    {{-- // --}}
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row">
  	  <div class="col-md-12">
	      <h2 class="text-muted lead pull-right">
	      	Menu Jabatan
	      </h2>
	      <br>
  	  </div>
      <div class="col-12">
	      <div class="card border-light mb-3">
	      	<div class="card-body">
	      	 	<nav class="nav nav-tabs flex-column flex-sm-row pull-right">
					<a class="flex-sm-fill text-sm-center nav-link active" data-toggle="modal" data-target=".tambah-data">
				  	Tambah Data	
					</a>
				</nav>
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="jabatan">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
		            			<td widtd="70%">Name</td>
		            			<td></td>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach($roles as $role)
		            		<tr>
		            			<td>{{$loop->iteration}}</td>
		            			<td>{{$role->nama}}</td>
		            			<td>
		            				<div class="btn-group" role="group" aria-label="Basic example">
									  <button type="button" class="btn btn-outline-dark">Ubah</button>
									  <button type="button" class="btn btn-outline-dark">Hapus</button>
									</div>
		            			</td>
		            		</tr>
		            		@endforeach
		            	</tbody>
		            </table>
		      	</div>
	          	
	            <div class="col-md-12">
	            	{{$roles->links()}}
	            </div>
	        </div>
	      </div>
      </div>
      	
      </div>
      </div>
    </div>
	{{-- // --}}
</div>
@endsection

@section('footer-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#jabatan').DataTable();
} );
</script>
@endsection
