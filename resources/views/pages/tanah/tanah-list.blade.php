 @extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/timeline.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.css">
@endsection

@section('content')
<div class="col">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">Data</a></li>
    </ul>
    <div class="tab-content py-3">
    {{-- // --}}
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row">
     {{--  <div class="col-12">
	      <div class="card border-light mb-3">
	      	<div class="card-body">
			   <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    <i class="fa fa-filter"></i> Form Pencarian 
			   </button>
			   <div class="collapse" id="collapseExample">
				  <div class="card card-body">
		      		<div class="justify-content-center">
				      	<form class="form-inline justify-content-center">
						  <div class="form-group">
						    <input type="text" class="form-control datepicker" id="" placeholder="Tanggal Pembuatan">
						  </div>
						  <div class="form-group">
						    <input type="text" class="form-control datepicker" id="" placeholder="Tanggal SPH">
						  </div>
						  <div class="form-group">
						    <input type="text" class="form-control datepicker" id="" placeholder="Tanggal BPN">
						  </div>
						  <button type="submit" class="btn btn-sm btn-default">
						  	 Cari
						  </button>
						</form>
		      		</div>
				  </div>
			    </div>
	      	</div>
	      </div>
      </div> --}}
      <div class="col-12">
	      <div class="card border-light mb-3">
            <div class="card-header">
                <div class="clearfix">
                    <h2 class="text-muted lead float-left">
                        Menu Tanah
                    </h2>
                    <a href="{{route("tanah-create")}}" class="btn btn-dark btn-sm text-sm-center text-white float-right active">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="tanah" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
		            			<td>Tanggal</td>
		            			<td width="30%">Name Penjual</td>
		            			<td width="30%">Name SPPT</td>
		            			<td>Luas Terbayar</td>
		            			<td>Option</td>
		            		</tr>
                            {{ csrf_field() }}
		            	</thead>
		            	<tbody>
				  		@forelse($tanah as $key => $t)
		            		<tr class="item{{$t->id}}">
		            			<td class="col1">{{$key+1}}</td>
			            		<td>{{$t->tgl_pembuatan}}</td>
			            		@php 
			            		$penjual = App\Modules\Backend\Penjual\Penjual::where('id', $t->penjual_id)->first(); 
			            		@endphp
			            		<td>{{$penjual['nama']}}</td>
			            		<td>{{$t->nama}}</td>
			            		<td>{{$t->luas_terbayar}}</td>
							  	<td>
							  		<div class="dropdown show">
									  <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <i class="fa fa-gear"></i>
									  </a>

									  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									    <a class="dropdown-item" href="/tanah/editdoc/{{$t->id}}">Ubah Data Berkas</a>
    									<div class="dropdown-divider"></div>
									    {{-- <a href="{{route("tanah-cetak", $t->id)}}" class="dropdown-item">Cetak Data</a> --}}
									    <a href="{{route("tanah-detail", $t->id)}}" class="dropdown-item">Lihat Data</a>
									    <a class="dropdown-item" href="/tanah/edit/{{$t->id}}">Ubah Data</a>
									    <a class="dropdown-item delete-modal" href="#"
									    	data-id="{{$t->id}}" 
									    	data-nama="{{$t->nama}}">Hapus Data</a>
									  </div>
									</div>
							  	</td>
								@empty
							  	 <tr>
							  		<td></td>
							  		<td><h6>Kosong <b>:(</b></h6></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  	 </tr>
			            	</tr>
						@endforelse	
		            	</tbody>
		            	<tfoot>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td><h6>TOTAL : {{$tanah->sum('luas_terbayar')}} </h6></td>
					  		<td></td>
		            	</tfoot>
		            </table>
		      	</div>
	        </div>
	      </div>
      </div>

      <div class="col-12">
          <div class="card border-light mb-3">
            <div class="card-body">
              <h6>History Tanah</h6>
              <ul class="timeline">
                @foreach($h_tanah as $v)
                <li>
                  <a target="_blank" href="https://www.totoprayogo.com/#">{{$v->nomor_berkas}}</a>
                  <a href="#" class="float-right">{{Carbon\Carbon::parse($v->created_at)->format('d-m-Y')}}</a>
                  <p>{{$v->user->nama}} : {{$v->deskripsi}} <br>
                     <small class="text-danger">{{ucfirst($v->user->role)}}</small></p>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
      </div>
      	
      </div>
      </div>
    </div>
	{{-- // --}}
</div>
{{-- Delete Modal --}}
@include('pages.tanah.popup.delete')
@endsection

@section('footer-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#tanah').DataTable();
	});
</script>
<script type="text/javascript">
	$('.datepicker').datepicker({
	    format: 'mm/dd/yyyy'
	});
</script>
<script>
    $(window).on('load', function(){
        $('#tanah').removeAttr('style');
    })
</script>
<script type="text/javascript">
    // Hapus Data
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Form Hapus Data');
        $('#del_id').val($(this).data('id'));
        $('#del_nama').val($(this).data('nama'));
        $('#delete_data').modal('show');
        id = $('#del_id').val();
    });
    $('.btn-group').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'tanahhapus/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                $('.item' + data['id']).remove();
                $('.col1').each(function (index) {
                    $(this).html(index+1);
                });
                $('#delete_data').modal('hide');
                toastr.success('Penghapusan Data Berhasil!', 'Success Alert', {timeOut: 5000});
                setTimeout(function(){
                   window.location.reload(1);
                }, 5000);
            }
        });
    });
</script>
@endsection
