 @extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/timeline.css')}}">
@endsection

@section('content')
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
        <li class="nav-item"><a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">Home</a></li>
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
                        Menu Master Berkas
                    </h2>
                    <a href="{{route('master-berkas-create')}}" class="btn btn-dark btn-sm text-sm-center text-white float-right active">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="berkas" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
                      <td>Tanggal Ubah</td>
		            			<td>Kode</td>
                      <td>Nomor</td>
                      <td width="20%">Nama</td>
		            			<td>Action</td>
		            		</tr>
                    {{ csrf_field() }}
		            	</thead>
		            	<tbody>
		            		@foreach($berkas as $key => $b)
		            		<tr class="item{{$b->id}}">
		            			<td class="col1">{{$key+1}}</td>
                      <td>{{Carbon\Carbon::parse($b->tgl_ubah)->format('d-m-Y')}}</td>
		            			<td><a href="{{route('master-berkas-show', $b->id)}}">{{$b->kode}}</a></td>
                      <td>{{$b->nomor}}</td>
                      <td>{{$b->nama}}</td>
                      <td>
                          <div class="btn-group" role="group">
                            <a href="{{route('master-berkas-edit', $b->id)}}" class="btn btn-sm btn-outline-dark">
                              Ubah
                            </a>
                            <form id="delete-form-{{$b['id']}}" 
                                method="post" 
                                action="{{route('hapus-master-berkas', $b['id'])}}"
                                style="display: none;">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                            </form>
                            <a href="" class="btn btn-sm btn-outline-dark" onclick="
                              if(confirm('Are You Sure?')) {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$b['id']}}').submit();
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
	          	
	            {{-- <div class="col-md-12">
	            	{{$blok->links()}}
	            </div> --}}
	        </div>
	      </div>
      </div>


      <div class="col-12">
          <div class="card border-light mb-3">
            <div class="card-body">
              <h6>History Berkas</h6>
              <ul class="timeline">
                @foreach($h_berkas as $v)
                <li>
                  <a target="_blank" href="https://www.totoprayogo.com/#">{{$v->nomor_berkas}}</a>
                  <a href="#" class="float-right">{{Carbon\Carbon::parse($v->created_at)->format('d-m-Y')}}</a>
                  <p>{{$v->user->nama}} : {{$v->deskripsi}} <br>
                     <small class="text-danger">{{ucfirst($v->user->role)}}</small></p>
                </li>
                @endforeach
              </ul>
              <div class="row">
                  <div class="col-12">
                      <a href="{{route('ruang-diskusi-index')}}" class="btn btn-sm btn-primary btn-block"> Ruang Diskusi</a>
                  </div>
              </div>
            </div>
          </div>
      </div>
      	
      </div>
      </div>
    </div>
	  {{-- // --}}
    {{-- Modal Delete --}}
    @include('pages.masterberkas.popup.delete')
</div>
@endsection

@section('footer-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#berkas').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#berkas').removeAttr('style');
    })
</script>
@endsection