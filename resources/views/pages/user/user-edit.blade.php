@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset('vendor/froala/css/froala_editor.pkgd.min.css')}}">
@endsection

@section('content')
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link text-uppercase active" href="{{route('user.index')}}">
	    	Kembali
	    </a>
	  </li>
    </ul>
    <div class="tab-content py-3">
    {{-- // --}}
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <h2 class="text-muted lead text-right">
      	Edit Data {{-- <span class="text-success text-uppercase text-right">{{$penjual->ktp}} - {{$penjual->nama}}</span> --}}
      </h2>
      <div class="row">
      <div class="col-12">
    		<div class="card-body">
        <form role="form">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="hidden" name="id" id="edit_id" value="{{$user->id}}">
            <input type="text" class="form-control error_nama" id="edit_nama" value="{{$user->nama}}" name="nama">
          <div class="invalid-name">
          </div>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control error_username" id="edit_username" {{$user->username}} name="username">
          <div class="invalid-username">
          </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control error_email" id="edit_email" value="{{$user->email}}" name="email">
          <div class="invalid-email">
          </div>
          </div>
          <div class="form-group">
            <label for="tlp">Telephone</label>
            <input type="number" class="form-control error_tlp" id="edit_tlp" value="{{$user->tlp}}" name="tlp">
          <div class="invalid-tlp">
          </div>
          </div>
          <div class="form-group">
            <label for="role">Jabatan</label>
            <select class="form-control" id="edit_role" name="role">
              <option selected disable>- Pilih Jabatan -</option>
              <option value="admin">Admin</option>
              <option value="manager">Manager</option>
              <option value="staff">Staff</option>
            </select>
          </div>
        {{--   <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control error_password" id="password" value="{{$user->password}}" name="password">
          <div class="invalid-password">
          </div>
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control error_password" id="password_confirmation" placeholder="Enter the field" name="password_confirmation">
          <div class="invalid-password">
          </div>
          </div> --}}
          <div class="form-group">
            <label>Status</label>
            <select class="form-control error_blok" name="is_active" id="edit_is_active">
              <option disabled selected>- Pilihan -</option>
              <option value="0">No Aktif</option>
              <option value="1">Aktif</option>
            </select>
            <div class="invalid-is_active">
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
$(document).ready(function(){
    // Tambah Data
    var id = $('#edit_id').val();
    $('.option').on('click', '.edit', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'PUT',
            url: '/user/update/' + id,
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'nama': $('#edit_nama').val(),
                'username': $('#edit_username').val(),
                'role': $('#edit_role').val(),
                'email': $('#edit_email').val(),
                // 'password': $('#edit_password').val(),
                'tlp': $('#edit_tlp').val(),
                'is_active': $('#edit_is_active').val()
            },
            success: function(data) {
              console.log(data);
                if ((data.errors)) {
                    setTimeout(function () {
                        // $('#edit_data').modal('show');
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.harga) {
                        $('.error_harga').addClass('is-invalid');
                        $('.invalid-harga').addClass('invalid-feedback');
                        $('.invalid-harga').removeClass('hidden');
                        $('.invalid-harga').text(data.errors.harga);
                    }

                    if (data.errors.keterangan) {
                        $('.error_keterangan').addClass('is-invalid');
                        $('.invalid-keterangan').addClass('invalid-feedback');
                        $('.invalid-keterangan').removeClass('hidden');
                        $('.invalid-keterangan').text(data.errors.keterangan);
                    }  

                    if (data.errors.status) {
                        $('.error_status').addClass('is-invalid');
                        $('.invalid-status').addClass('invalid-feedback');
                        $('.invalid-status').removeClass('hidden');
                        $('.invalid-status').text(data.errors.status);
                    }  
                } else {
                    toastr.success('Tambah Data Berhasil!', 'Success', {timeOut: 5000});
                    window.location.reload();
                }
            },
        });
    });
});
</script>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/froala/js/froala_editor.pkgd.min.js')}}">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

		var editor = new FroalaEditor('textarea#tambah_notes', {
		iconsTemplate: 'font_awesome_5'
		})
    });
</script>
@endsection
