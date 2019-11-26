@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('content')
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
      <li class="nav-item">
        <a class="nav-link text-uppercase active" href="{{route('tanah-unggah', $data->tanah_id)}}">
            Kembali
        </a>
      </li>
    </ul>
    <div class="tab-content py-3">
    {{-- // --}}
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <h2 class="text-muted lead text-center">
      	Ubah Data
      </h2>
      <div class="row">
      <div class="col-12">
        <div class="card-body">
            <div class="alert alert-info" role="alert">
              Tips merubah nama foto berkas!
              <ul class="list-unstyled"> 
                  <li>Isikan nama setelah /backend/image_berkas/(nama berkas).(format berkas)</li>
                  <li>Contoh 1 /backend/image_berkas/nama_berkas.jpg</li>
                  <li>Contoh 2 /backend/image_berkas/nama_berkas.png</li>
              </ul>
            </div>
        </div>
		<div class="card-body">
			<form class="container" method="PUT" id="validasi-tanah" novalidate>
			  <div class="form-row">
			    <div class="form-group col-md-12">
			      <label for="inputEmail4" class="col-form-label">Nama<span class="text-danger">*</span></label>
                  <input type="hidden" name="id" id="edit_id" value="{{$data->id}}">
			      <input type="text" class="form-control error_image_path" value="{{$data->image_path}}" name="image_path" id="tambah_image_path" required>
			      <div class="invalid-image_path">
		          </div>
			    </div>
			  </div>
              <div class="form-row">
                {{ csrf_field() }}
                <div class="form-group col-md-12">
    	  		  <div class="option">
    	  	        <button type="button" class="btn btn-outline-primary btn-sm btn-block edit">Ubah</button>
    	  		  </div>
                </div>
              </div>
              <hr>
			</form>
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
    // Tambah Data
    var id = $('#edit_id').val();
    $('.option').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: '/tanah/update/foto_berkas/' + id,
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                // 'id': id,
                'image_path': $('#tambah_image_path').val()
            },
            success: function(data) {
                $('.invalid-image_path').addClass('hidden');
                // console.log(data);
                if ((data.errors)) {
                    setTimeout(function () {
                        // $('#tambah_data').modal('show');
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.image_path) {
                        $('.error_image_path').addClass('is-invalid');
                        $('.invalid-image_path').addClass('invalid-feedback');
                        $('.invalid-image_path').removeClass('hidden');
                        $('.invalid-image_path').text(data.errors.image_path);
                    } 
                } else {
                    toastr.success('Ubah Data Berhasil!', 'Success', {timeOut: 5000});
        			window.location.reload();
                    // $('.col').each(function (index) {
                    //     $(this).html(index+1);
                    // });
                }
            },
        });
    });
</script>
@endsection
