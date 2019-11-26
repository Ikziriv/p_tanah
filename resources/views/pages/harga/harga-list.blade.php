@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('content')
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
        <li class="nav-item">
        	<a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">Home</a>
        </li>
    </ul>
    <div class="tab-content py-3">
    {{-- // --}}
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row">
      <div class="col-12">
	      <div class="card border-light mb-3">
            <div class="card-header">
                <div class="clearfix">
                    <h2 class="text-muted lead float-left">
                        Menu Harga
                    </h2>
                    <a href="{{route('harga-create')}}" class="btn btn-dark btn-sm text-sm-center text-white float-right active">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="harga" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
                                <td>Status</td>
		            			<td>Harga</td>
                                <td width="70%">Keterangan</td>
		            			<td>Option</td>
		            		</tr>
                            {{ csrf_field() }}
		            	</thead>
		            	<tbody>
		            		@foreach($harga as $key => $h)
		            		<tr class="item{{$h->id}}">
		            			<td class="col1">{{$key+1}}</td>
                                <td>
                                @if($h->status == 1)
                                <span class="badge badge-success">
                                Aktif</span>
                                @else
                                <span class="badge badge-danger">
                                Non Aktif</span>
                                @endif
                                </td>
		            			<td>{{$h->harga}}</td>
                                <td>{{$h->keterangan}}</td>
		            			<td>
		            				<div class="btn-group" role="group">
                                    <a href="{{route('harga-edit', $h->id)}}" class="btn btn-sm btn-outline-dark edit-modal">
                                    	Ubah
                                    </a>
                                    <form id="delete-form-{{$h['id']}}" 
                                        method="post" 
                                        action="{{route('hapus-harga', $h['id'])}}"
                                        style="display: none;">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                    </form>
                                    <a href="" class="btn btn-sm btn-outline-dark" onclick="
                                      if(confirm('Are You Sure?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$h['id']}}').submit();
                                      } else {
                                        event.preventDefault();
                                      }
                                    ">
                                      Hapus
                                    </a>
									</div>
		            			</td>
		            		</tr>
		            		@endforeach
		            	</tbody>
		            </table>
		      	</div>
	          	{{-- 
	            <div class="col-md-12">
	            	{{$harga->links()}}
	            </div> --}}
	        </div>
	      </div>
      </div>
      	
      </div>
      </div>
    </div>
	{{-- // --}}
	{{-- Modal Delete --}}
	@include('pages.harga.popup.delete')
</div>
@endsection

@section('footer-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#harga').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#harga').removeAttr('style');
    })
</script>
@endsection
