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
      <div class="col-md-12">
          <h2 class="text-muted lead pull-right">
            Menu Status
          </h2>
          <br>
      </div>
      <div class="col-12">
	      <div class="card border-light mb-3">
	      	<div class="card-body">
		  	 	{{-- <nav class="nav nav-tabs flex-column flex-sm-row pull-right">
					<a class="flex-sm-fill text-sm-center nav-link active" data-toggle="modal" data-target=".tambah-data">
				  	Tambah Data	
					</a>
				</nav> --}}
		      	<div class="table-responsive justify-content-center">
		      		<table class="table table-hover table-sm text-center" id="stat" cellspacing="0" width="100%"
		      				style="visibility: hidden;">
		            	<thead class="thead-inverse">
		            		<tr>
		            			<td>#</td>
		            			<td width="70%">Name</td>
                                <td>Action</td>
		            		</tr>
                            {{ csrf_field() }}
		            	</thead>
		            	<tbody>
                            @foreach($status as $key => $stat)
                            <tr class="item{{$stat->id}}">
                                <td class="col1">{{$key+1}}</td>
		            			<td>{{$stat->nama}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                      <button class="btn btn-sm btn-outline-dark edit-modal" 
                                                data-id="{{$stat->id}}"
                                                data-nama="{{$stat->nama}}">
                                        Ubah
                                      </button>
                                      <button class="btn btn-sm btn-outline-dark delete-modal"
                                                data-id="{{$stat->id}}"
                                                data-nama="{{$stat->nama}}">
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
	            	{{$status->links()}}
	            </div> --}}
	        </div>
	      </div>
      </div>
      	
      </div>
      </div>
    </div>
	{{-- // --}}
	{{-- Modal Add --}}
	@include('pages.stat.popup.create')
    {{-- Modal Edit --}}
    @include('pages.stat.popup.edit')
	{{-- Modal Delete --}}
	@include('pages.stat.popup.delete')
</div>
@endsection

@section('footer-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#stat').DataTable();
} );
</script>
<script>
    $(window).on('load', function(){
        $('#stat').removeAttr('style');
    })
</script>
<script type="text/javascript">
    // Tambah Data
    $('.btn-group').on('click', '.simpan', function() {
        $.ajax({
            type: 'POST',
            url: 'status/simpan',
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'nama': $('#tambah_nama').val()
            },
            success: function(data) {
                $('.invalid-nama').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        // $('#tambah_data').modal('show');
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    } 
                } else {
                    toastr.success('Tambah Data Berhasil!', 'Success', {timeOut: 5000});
                    var stat_stat = '<tr class="item'+data.id+'">'
	                    			   +'<td class="col">'+data.id+'</td>'
	                    			   +'<td>'+data.nama+'</td>'
	                    			   +'<td>'
	                    			   	+'<div class="btn-group" role="group">'
	                    			   		+'<button class="btn btn-outline-dark edit-modal" data-id="'+data.id+'" data-nama="'+data.nama+'" data-slug="'+data.slug+'">Ubah</button>'
	                    			   		+'<button class="btn btn-outline-dark delete-modal" data-id="'+data.id+'" data-nama="'+data.nama+'" data-slug="'+data.slug+'">Hapus</button>'
	                    			   	+'</div>'
	                    			   +'</td'
                    			   +'</tr>';
                    $('#stat').prepend(stat_stat);
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
        $('#edit_nama').val($(this).data('nama'));
        id = $('#edit_id').val();
        $('#edit_data').modal('show');
    });
    $('.btn-group').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: 'status/update/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#edit_id").val(),
                'nama': $('#edit_nama').val()
            },
            success: function(data) {
                $('.invalid-nama').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    } 
                } else {
                    toastr.success('Edit Data Berhasil!', 'Success', {timeOut: 5000});
                    var data_sppt = '<tr class="item'+data.id+'">'
                                       +'<td class="col1">'+data.id+'</td>'
                                       +'<td>'+data.nama+'</td>'
                                       +'<td>'
                                        +'<div class="btn-group" role="group">'
                                            +'<button class="btn btn-outline-dark edit-modal" data-id="'+data.id+'" data-nama="'+data.nama+'">Ubah</button>'
                                            +'<button class="btn btn-outline-dark delete-modal" data-id="'+data.id+'" data-nama="'+data.nama+'">Hapus</button>'
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
        $('#del_nama').val($(this).data('nama'));
        $('#delete_data').modal('show');
        id = $('#del_id').val();
    });
    $('.btn-group').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'status/hapus/' + id,
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