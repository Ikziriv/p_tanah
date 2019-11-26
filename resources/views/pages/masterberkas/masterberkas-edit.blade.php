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
	    <a class="nav-link text-uppercase active" href="{{route('master-berkas-index')}}">
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
			<form class="container" method="POST" id="master-berkas" novalidate>
			  <div class="form-row">
			    <div class="form-group col-md-12">
			      <label for="inputCity" class="col-form-label">Nomer</label>
			      <input type="text" class="form-control form-control-sm error_nomor" name="nomor" id="tambah_nomor" required>
			      <small id="emailHelp" class="form-text text-danger">SURAT KETERANGAN AHLI WARIS</small>
			    	<div class="invalid-nomor">
		        </div>
			    </div>
                <div class="form-group col-md-12">
                  <label for="inputCity" class="col-form-label">Nama (Almarhum / Almarhumah)</label>
                  <input type="text" class="form-control form-control-sm error_nama" name="nama" id="tambah_nama" required>
                    <div class="invalid-nama">
                    </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputCity" class="col-form-label">Tempat Tinggal (Terakhir)</label>
                  <input type="text" class="form-control form-control-sm error_tmpt_tgl" name="tmpt_tgl" id="tambah_tmpt_tgl" required>
                    <div class="invalid-tmpt_tgl">
                    </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity" class="col-form-label">Tanggal (Meninggal)</label>
                  <input type="text" class="form-control form-control-sm error_tgl" name="tgl" id="tambah_tgl" required>
                    <div class="invalid-tgl">
                    </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity" class="col-form-label">Tempat (Meninggal)</label>
                  <input type="text" class="form-control form-control-sm error_tmpt" name="tmpt" id="tambah_tmpt" required>
                    <div class="invalid-tmpt">
                    </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity" class="col-form-label">Nama (Istri / Suami)</label>
                  <input type="text" class="form-control form-control-sm error_nama_relasi" name="nama_relasi" id="tambah_nama_relasi" required>
                    <div class="invalid-nama_relasi">
                    </div>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputCity" class="col-form-label">Jumlah Anak</label>
                  <input type="number" class="form-control form-control-sm error_jml_anak" name="jml_anak" id="tambah_jml_anak" required>
                    <div class="invalid-jml_anak">
                    </div>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCity" class="col-form-label">Jumlah Saudara Kandung</label>
                  <input type="number" class="form-control form-control-sm error_jml_sdr" name="jml_sdr" id="tambah_jml_sdr" required>
                    <div class="invalid-jml_sdr">
                    </div>
                </div>
			  </div>
              <div class="row">
                  <div class="col-12">
                       <div class="table-responsive">
                         <span id="result"></span>
                         <table class="table table-bordered table-striped" id="user_table">
                            <thead>
                            <tr>
                                <th width="20%">Nama</th>
                                <th width="30%">Tanggal Lahir & Umur</th>
                                <th width="20%">Hubungan</th>
                                <th width="30%">Alamat</th>
                                <th>Action</th>
                            </tr>
                           </thead>
                           <tbody>
                            @foreach($berkas_d as $v)
                            <tr>
                              <td><input type="text" name="nama_hub[]" value="{{$v->nama_hub}}" class="form-control form-control-sm" /></td>
                              <td><input type="text" name="tgl_umur[]" value="{{$v->tgl_umur}}" class="form-control form-control-sm" /></td>
                              <td><input type="text" name="hubungan[]" value="{{$v->hubungan}}" class="form-control form-control-sm" /></td>
                              <td><input type="text" name="alamat[]" value="{{$v->alamat}}" class="form-control form-control-sm" /></td>
                              <td><button type="button" name="remove" id="" class="btn btn-danger remove btn-sm" disabled>Remove</button></td>
                            </tr>
                            @endforeach
                           </tbody>
                       </table>
                       </div>
                  </div>
              </div>
			  <hr>
              <div class="form-row">
                {{ csrf_field() }}
                <div class="form-group col-md-12">
    	  		  <div class="option">
    	  	        <button type="button" class="btn btn-outline-primary btn-sm btn-block simpan">Simpan</button>
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
$(document).ready(function(){
    // Tambah Data
    $('.option').on('click', '.simpan', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url:'{{ route("simpan-master-berkas") }}',
            dataType: 'json',
            data:$('#master-berkas').serialize(),
            // data: {
            //     '_token': $('input[name=_token]').val(),
            //     'nomor': $('#tambah_nomor').val(),
            //     'nama': $('#tambah_nama').val(),
            //     'tmpt_tgl': $('#tambah_tmpt_tgl').val(),
            //     'tgl': $('#tambah_tgl').val(),
            //     'tmpt': $('#tambah_tmpt').val(),
            //     'nama_relasi': $('#tambah_nama_relasi').val(),
            //     'jml_anak': $('#tambah_jml_anak').val(),
            //     'jml_sdr': $('#tambah_jml_sdr').val(),
            //     'nama_hub': $('#tambah_nama_hub').val(),
            //     'tgl_umur': $('#tambah_tgl_umur').val(),
            //     'hubungan': $('#tambah_hubungan').val(),
            //     'alamat': $('#tambah_alamat').val()
            // },
            success: function(data) {
              console.log(data);
                if ((data.errors)) {
                    var error_html = '';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        error_html += '<p>'+data.errors[count]+'</p>';
                    }
                    setTimeout(function () {
                        // $('#tambah_data').modal('show');
                        toastr.error(error_html, 'Error', {timeOut: 5000});
                    }, 500);
                    // $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                } else {
                    dynamic_field(1);
                    toastr.success('Tambah Data Berhasil!', 'Success', {timeOut: 5000});
                    window.location.reload();
                    $('.col').each(function (index) {
                        $(this).html(index+1);
                    });
                }
                $('#save').attr('disabled', false);
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

		// If you want to use the regular/light icons, change the template to the following.
		// iconsTemplate: 'font_awesome_5r'
		// iconsTemplate: 'font_awesome_5l'
		})
    });
</script>
@endsection
