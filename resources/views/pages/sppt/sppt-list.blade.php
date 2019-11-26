 @extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
                        Menu SPPT
                    </h2>
                    <a class="btn btn-dark btn-sm text-sm-center text-white float-right active" data-toggle="modal" data-target=".tambah-data">
                    Tambah
                    </a>
                </div>
            </div>
	      	<div class="card-body">
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="sppt" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
		            			<td width="50%">Kode</td>
                                <td>Action</td>
		            		</tr>
                            {{ csrf_field() }}
		            	</thead>
		            	<tbody>
		            		@foreach($sppt as $key => $s)
                            <tr class="item{{$s->id}}">
                                <td class="col1">{{$key+1}}</td>
		            			<td>{{$s->kode}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                      <button class="btn btn-sm btn-outline-dark edit-modal" 
                                                data-id="{{$s->id}}"
                                                data-kode="{{$s->kode}}">
                                        Ubah
                                      </button>
                                      <button class="btn btn-sm btn-outline-dark delete-modal"
                                                data-id="{{$s->id}}"
                                                data-kode="{{$s->kode}}">
                                        Hapus
                                      </button>
                                    </div>
                                </td>
		            		</tr>
		            		@endforeach
		            	</tbody>
		            </table>
		      	</div>
	          	
	            {{-- <div class="col-md-12">
	            	{{$sppt->links()}}
	            </div> --}}
	        </div>
	      </div>
      </div>
      	
      </div>
      </div>
    </div>
	{{-- // --}}
	{{-- Modal Add --}}
	@include('pages.sppt.popup.create')
    {{-- Modal Edit --}}
    @include('pages.sppt.popup.edit')
	{{-- Modal Delete --}}
	@include('pages.sppt.popup.delete')
</div>
@endsection

@section('footer-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#sppt').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#sppt').removeAttr('style');
    })
</script>
<script type="text/javascript">
    // Tambah Data
    $('.btn-group').on('click', '.simpan', function() {
        $.ajax({
            type: 'POST',
            url: 'sppt/simpan',
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'kode': $('#tambah_kode').val()
            },
            success: function(data) {
                $('.invalid-kode').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.kode) {
                        $('.error_kode').addClass('is-invalid');
                        $('.invalid-kode').addClass('invalid-feedback');
                        $('.invalid-kode').removeClass('hidden');
                        $('.invalid-kode').text(data.errors.kode);
                    } 
                } else {
                    toastr.success('Tambah Data Berhasil!', 'Success', {timeOut: 5000});
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
                    $('.col').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            },
        });
    });
</script>
<script type="text/javascript">
    // Edit Data
    $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Form Edit Data');
        $('#edit_id').val($(this).data('id'));
        $('#edit_kode').val($(this).data('kode'));
        id = $('#edit_id').val();
        $('#edit_data').modal('show');
    });
    $('.btn-group').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: 'sppt/update/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#edit_id").val(),
                'kode': $('#edit_kode').val()
            },
            success: function(data) {
                $('.invalid-kode').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.kode) {
                        $('.error_kode').addClass('is-invalid');
                        $('.invalid-kode').addClass('invalid-feedback');
                        $('.invalid-kode').removeClass('hidden');
                        $('.invalid-kode').text(data.errors.kode);
                    } 
                } else {
                    toastr.success('Edit Data Berhasil!', 'Success', {timeOut: 5000});
                    var data_sppt = '<tr class="item'+data.id+'">'
                                       +'<td class="col1">'+data.id+'</td>'
                                       +'<td>'+data.kode+'</td>'
                                       +'<td>'
                                        +'<div class="btn-group" role="group">'
                                            +'<button class="btn btn-outline-dark edit-modal" data-id="'+data.id+'" data-kode="'+data.kode+'">Ubah</button>'
                                            +'<button class="btn btn-outline-dark delete-modal" data-id="'+data.id+'" data-kode="'+data.kode+'">Hapus</button>'
                                        +'</div>'
                                       +'</td'
                                   +'</tr>';
                    $('.item' + data.id).replaceWith(data_sppt);
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            }
        });
    });
</script>
<script type="text/javascript">
    // Hapus Data
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Form Hapus Data');
        $('#del_id').val($(this).data('id'));
        $('#del_kode').val($(this).data('kode'));
        $('#delete_data').modal('show');
        id = $('#del_id').val();
    });
    $('.btn-group').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'sppt/hapus/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                toastr.success('Penghapusan Data Berhasil!', 'Success Alert', {timeOut: 5000});
                $('.item' + data['id']).remove();
                $('.col1').each(function (index) {
                    $(this).html(index+1);
                });
                $('#delete_data').modal('hide');
            }
        });
    });
</script>
@endsection