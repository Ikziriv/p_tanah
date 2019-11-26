@extends('backend.app')

@section('content')

<div class="row">
	<div class="col-md-2 col-md-offset-5">
		<div class="page-header">
		  <h1>Add  <small>Role</small></h1>
		</div>
	</div>
	
	<form action="{{route('role-save')}}" method="post" id="formLocation">
      <div class="col-12">
      	<div class="container">
		   <div class="card">
			  <div class="card-header">
			    Tambah Jabatan
			  </div>
			  <div class="card-body">
			  <form>
			  <div class="form-group col-12">
			    <label for="exampleInputEmail1">Nama</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Nama">
			    <small id="nama" class="form-text text-muted">Inputkan nama dengan baik dan benar!</small>
			  </div>
			  <div class="form-group col-12">
			  <a href="#" class="btn btn-outline-dark">Simpan</a>
			  </div>
			  </form>
			  </div>
			</div>
		</div>
      </div>
	</form>
</div>

@endsection
@section('footer-script')
<script>
    CKEDITOR.replace('descript')
</script>
@endsection