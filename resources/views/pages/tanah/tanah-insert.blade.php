@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link text-uppercase active" href="{{route('tanah-index')}}">
	    	Kembali
	    </a>
	  </li>
    </ul>
    <div class="tab-content py-3">
    {{-- // --}}
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <h2 class="text-muted lead text-center">
      	Tambah Data {{-- <span class="text-success text-uppercase text-right">{{$penjual->ktp}} - {{$penjual->nama}}</span> --}}
      </h2>
      <div class="row">
      <div class="col-12">
		<div class="card-body">
			<form class="container" method="POST" id="validasi-tanah" novalidate>
			  <div class="form-row">
			    <div class="form-group col-md-11">
			      <label for="inputEmail4" class="col-form-label">Nama Penjual<span class="text-danger">*</span></label>
					<select class="form-control error_letak js-example-basic-single" name="penjual_id" id="tambah_penjual_id">
                      <option disabled selected>- Pilihan -</option>
					  @foreach($penjual as $d)
					  <option value="{{ $d->id }}">{{ $d->ktp }} - {{ $d->nama }}</option>
					  @endforeach 
					</select>
			    </div>
			    <div class="form-group col-md-8">
			      <label for="inputEmail4" class="col-form-label">Nama SPPT<span class="text-danger">*</span></label>
			     {{--  <input type="hidden" class="form-control" value="{{$penjual->id}}" name="penjual_id" id="penjual_id" readonly="true"> --}}
			      <input type="text" class="form-control error_nama" name="nama" id="tambah_nama" required>
			      <input type="hidden" name="tgl_pembuatan" id="tgl_pembuatan" value="{{date('Y-m-d')}}" required>
			      <div class="invalid-nama">
		          </div>
			    </div>
				<div class="form-group col-md-4">
				  <label for="inputZip" class="col-form-label">Status</label>
					<select class="form-control errostat_id" name="stat_id" id="tambah_stat_id">
                      <option disabled selected>- Pilihan -</option>
					  @foreach($status as $key => $s)
					  <option value="{{ $s->id }}"{{--  @if ($key == 1) selected @endif --}}>{{ $s->nama }}</option>
					  @endforeach 
					</select>
			      	{{-- <input type="hidden" class="form-control" value="{{$status->id}}" name="stat_id" id="tambah_stat_id" required>
			      	<input type="text" class="form-control" value="{{$status->nama}}" disabled>
			      	<small id="emailHelp" class="form-text text-danger">Default Status</small> --}}
					<div class="invalid-stat_id">
					</div>
				</div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputPassword4" class="col-form-label">SPPT</label>
			      <input type="text" class="form-control error_sppt" name="sppt" id="tambah_sppt" required>
			      <small id="emailHelp" class="form-text text-danger">Luas M2</small>
			    	<div class="invalid-sppt">
		        	</div>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputPassword4" class="col-form-label">GPS</label>
			      <input type="text" class="form-control error_gps" name="gps" id="tambah_gps" required>
			      <small id="emailHelp" class="form-text text-danger">Luas M2</small>
			    	<div class="invalid-gps">
		        	</div>
			    </div>
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-6">
				    <label for="inputAddress" class="col-form-label">Luas M2 (Terbayar)</label>
				    <input type="text" class="form-control error_luas_terbayar" name="luas_terbayar" id="tambah_luas_terbayar" required>
			    	<div class="invalid-luas">
		        	</div>
				  </div>
				  <div class="form-group col-md-6">
				    <label for="inputAddress2" class="col-form-label">Letak OP</label>
					<select class="form-control error_letak" name="desa_id" id="tambah_desa_id">
                      <option disabled selected>- Pilihan -</option>
					  @foreach($desa as $d)
					  <option value="{{ $d->id }}">{{ $d->nama }}</option>
					  @endforeach 
					</select>
			    	<div class="invalid-desa_id">
		        	</div>
				  </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity" class="col-form-label">Blok</label>
					<select class="form-control error_blok" name="blok_id" id="tambah_blok_id">
                      <option disabled selected>- Pilihan -</option>
					  @foreach($blok as $b)
					  <option value="{{ $b->id }}">{{ $b->kode }}</option>
					  @endforeach 
					</select>
			      	<small id="emailHelp" class="form-text text-danger">NOP</small>
			    	<div class="invalid-blok_id">
		        	</div>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputState" class="col-form-label">SPPT</label>
					<select class="form-control error_sppt_id" name="sppt_id" id="tambah_sppt_id">
                      <option disabled selected>- Pilihan -</option>
					  @foreach($sppt as $s)
					  <option value="{{ $s->id }}">{{ $s->kode }}</option>
					  @endforeach 
					</select>
			      	<small id="emailHelp" class="form-text text-danger">SPPT</small>
			    	<div class="invalid-sppt_id">
		        	</div>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity" class="col-form-label">Nomer</label>
			      <input type="text" class="form-control error_nomer_sph" name="nomer_sph" id="tambah_nomer_sph" required>
			      <small id="emailHelp" class="form-text text-danger">SPH</small>
			    	<div class="invalid-nomer_sph">
		        	</div>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputState" class="col-form-label">Tanggal</label>
			      <input type="date" class="form-control error_tgl_sph" value="{{date('m-d-y')}}" name="tgl_sph" id="tambah_tgl_sph" required>
			      <small id="emailHelp" class="form-text text-danger">SPH</small>
			    	<div class="invalid-tgl_sph">
		        	</div>
			    </div>
			  </div>
			  <hr>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity" class="col-form-label">Nomer</label>
			      <input type="text" class="form-control error_nomer_bpn" name="nomer_bpn" id="tambah_nomer_bpn" required>
			      <small id="emailHelp" class="form-text text-danger">BPN</small>
			    	<div class="invalid-nomer_bpn">
		        	</div>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputState" class="col-form-label">Tanggal</label>
			      <input type="date" class="form-control error_tgl_bpn" name="tgl_bpn" id="tambah_tgl_bpn" required>
			      <small id="emailHelp" class="form-text text-danger">BPN</small>
			    	<div class="invalid-tgl_bpn">
		        	</div>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-12">
			      <label for="inputCity" class="col-form-label">Catatan</label>
    				<textarea class="form-control error_notes" rows="3" id="tambah_notes">
    					Kekurangan Berkas Milik :
    				</textarea>
			    	<div class="invalid-notes">
		        	</div>
			    </div>
			  </div>
			  	<hr>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_ppjb" name="s_ppjb">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">PPJB (2 Rangkap)</span>
				    	<div class="invalid-tgl_sph">
			        	</div>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_sph" name="s_sph">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">SPH (4 Rangkap)</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_sppt" name="s_sppt">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">SPPT 2015</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="ktp_penjual" name="ktp_penjual">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">KTP Penjual</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="ktp_lain" name="ktp_lain">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">KTP Suami / Istri</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_kk" name="s_kk">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Kartu Keluarga</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_jual" name="s_jual">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Pernyataan Menjual</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_sengketa" name="s_sengketa">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">S. Pernyataan Tdk Sengketa</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_riwayat_tanah" name="s_riwayat_tanah">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">S. Ket. Riwayat tanah</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_persetujuan" name="s_persetujuan">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">S. Persetujuan Suami / Istri</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_ket_menikah" name="s_ket_menikah">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Ket. Menikah</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="buku_nikah" name="buku_nikah">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Buku Nikah</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_beda_nama" name="s_beda_nama">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Ket. Beda Nama</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_beda_luas" name="s_beda_luas">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">S. Pernyataan Beda Luas</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_kematian" name="s_kematian">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Kematian</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_ahli_waris" name="s_ahli_waris">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">S. Ket. Ahli Waris</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_kuasa_waris" name="s_kuasa_waris">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">S. Kuasa waris</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="ktp_ahli_waris" name="ktp_ahli_waris">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">KTP ahli waris</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="kk_ahli_waris" name="kk_ahli_waris">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">KK Ahli Waris</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_girik_hilang" name="s_girik_hilang">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Girik Hilang</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="letter_c" name="letter_c">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Letter C</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="foto_transaksi" name="foto_transaksi">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Foto Transaksi</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="kwitansi_pembayaran" name="kwitansi_pembayaran">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Kwitansi Pembayaran</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="gambar_situasi" name="gambar_situasi">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Gambar Situasi</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="bap" name="bap">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">BAP</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="dhkp" name="dhkp">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">DHKP</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="npwp" name="npwp">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">NPWP</span>
					</label>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_kuasa" name="s_kuasa">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Kuasa</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_pengakuan_tanah" name="s_pengakuan_tanah">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Pengakuan Tanah</span>
					</label>
			    </div>
			    <div class="form-group col-md-4">
				    <label class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" value="0" id="s_kesepakatan_bersama" name="s_kesepakatan_bersama">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Surat Kesepakatan Bersama</span>
					</label>
			    </div>
			  </div>
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
	// BPN Valdiasi
	$('#tambah_stat_id').change(function() {
	    if( $(this).val() == 1) {
	        $('#tambah_nomer_bpn').prop( "disabled", false );
	        $('#tambah_tgl_bpn').prop( "disabled", false );
	    } else {       
	        $('#tambah_nomer_bpn').prop( "disabled", true );
	        $('#tambah_tgl_bpn').prop( "disabled", true );
	    }
	});
	$("input[type='checkbox']").change(function(){
	     if($(this).prop('checked')){
	          $(this).val(1);
	     }
	});
    // Tambah Data
    $('.option').on('click', '.simpan', function() {
        $.ajax({
            type: 'POST',
            url: 'tanahsimpan',
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'penjual_id': $('#tambah_penjual_id').val(),
                'nama': $('#tambah_nama').val(),
                'sppt': $('#tambah_sppt').val(),
                'gps': $('#tambah_gps').val(),
                'luas_terbayar': $('#tambah_luas_terbayar').val(),
                'desa_id': $('#tambah_desa_id').val(),
                'blok_id': $('#tambah_blok_id').val(),
                'sppt_id': $('#tambah_sppt_id').val(),
                'nomer_sph': $('#tambah_nomer_sph').val(),
                'tgl_sph': $('#tambah_tgl_sph').val(),
                'stat_id': $('#tambah_stat_id').val(),
                'nomer_bpn': $('#tambah_nomer_bpn').val(),
                'tgl_bpn': $('#tambah_tgl_bpn').val(),
                'notes': $('#tambah_notes').val(),
                'tgl_pembuatan': $('#tgl_pembuatan').val(),
                's_ppjb': $('#s_ppjb').val(),
                's_sph': $('#s_sph').val(),
                's_sppt': $('#s_sppt').val(),
                'ktp_penjual': $('#ktp_penjual').val(),
                'ktp_lain': $('#ktp_lain').val(),
                's_kk': $('#s_kk').val(),
                's_jual': $('#s_jual').val(),
                's_sengketa': $('#s_sengketa').val(),
                's_riwayat_tanah': $('#s_riwayat_tanah').val(),
                's_persetujuan': $('#s_persetujuan').val(),
                's_ket_menikah': $('#s_ket_menikah').val(),
                'buku_nikah': $('#buku_nikah').val(),
                's_beda_nama': $('#s_beda_nama').val(),
                's_beda_luas': $('#s_beda_luas').val(),
                's_kematian': $('#s_kematian').val(),
                's_ahli_waris': $('#s_ahli_waris').val(),
                's_kuasa_waris': $('#s_kuasa_waris').val(),
                'ktp_ahli_waris': $('#ktp_ahli_waris').val(),
                'kk_ahli_waris': $('#kk_ahli_waris').val(),
                's_girik_hilang': $('#s_girik_hilang').val(),
                'letter_c': $('#letter_c').val(),
                'foto_transaksi': $('#foto_transaksi').val(),
                'gambar_situasi': $('#gambar_situasi').val(),
                'kwitansi_pembayaran': $('#kwitansi_pembayaran').val(),
                'bap': $('#bap').val(),
                'dhkp': $('#dhkp').val(),
                'npwp': $('#npwp').val(),
                's_kuasa': $('#s_kuasa').val(),
                's_pengakuan_tanah': $('#s_pengakuan_tanah').val(),
                's_kesepakatan_bersama': $('#s_kesepakatan_bersama').val()
            },
            success: function(data) {
                $('.invalid-nama').addClass('hidden');
                if ((data.errors)) {
                	// console.log(data.errors);
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

                    if (data.errors.nama) {
                        $('.error_nama').addClass('is-invalid');
                        $('.invalid-nama').addClass('invalid-feedback');
                        $('.invalid-nama').removeClass('hidden');
                        $('.invalid-nama').text(data.errors.nama);
                    } 

                    if (data.errors.sppt) {
                        $('.error_sppt').addClass('is-invalid');
                        $('.invalid-sppt').addClass('invalid-feedback');
                        $('.invalid-sppt').removeClass('hidden');
                        $('.invalid-sppt').text(data.errors.sppt);
                    } 

                    if (data.errors.gps) {
                        $('.error_gps').addClass('is-invalid');
                        $('.invalid-gps').addClass('invalid-feedback');
                        $('.invalid-gps').removeClass('hidden');
                        $('.invalid-gps').text(data.errors.gps);
                    } 

                    if (data.errors.luas_terbayar) {
                        $('.error_luas_terbayar').addClass('is-invalid');
                        $('.invalid-luas_terbayar').addClass('invalid-feedback');
                        $('.invalid-luas_terbayar').removeClass('hidden');
                        $('.invalid-luas_terbayar').text(data.errors.luas_terbayar);
                    } 

                    if (data.errors.desa_id) {
                        $('.error_letak').addClass('is-invalid');
                        $('.invalid-desa_id').addClass('invalid-feedback');
                        $('.invalid-desa_id').removeClass('hidden');
                        $('.invalid-desa_id').text(data.errors.desa_id);
                    } 

                    if (data.errors.blok_id) {
                        $('.error_blok').addClass('is-invalid');
                        $('.invalid-blok_id').addClass('invalid-feedback');
                        $('.invalid-blok_id').removeClass('hidden');
                        $('.invalid-blok_id').text(data.errors.blok_id);
                    } 

                    if (data.errors.sppt_id) {
                        $('.error_sppt_id').addClass('is-invalid');
                        $('.invalid-sppt_id').addClass('invalid-feedback');
                        $('.invalid-sppt_id').removeClass('hidden');
                        $('.invalid-sppt_id').text(data.errors.sppt_id);
                    } 

                    if (data.errors.nomer_sph) {
                        $('.error_nomer_sph').addClass('is-invalid');
                        $('.invalid-nomer_sph').addClass('invalid-feedback');
                        $('.invalid-nomer_sph').removeClass('hidden');
                        $('.invalid-nomer_sph').text(data.errors.nomer_sph);
                    } 

                    if (data.errors.tgl_sph) {
                        $('.error_tgl_sph').addClass('is-invalid');
                        $('.invalid-tgl_sph').addClass('invalid-feedback');
                        $('.invalid-tgl_sph').removeClass('hidden');
                        $('.invalid-tgl_sph').text(data.errors.tgl_sph);
                    } 

                    if (data.errors.stat_id) {
                        $('.error_stat_id').addClass('is-invalid');
                        $('.invalid-stat_id').addClass('invalid-feedback');
                        $('.invalid-stat_id').removeClass('hidden');
                        $('.invalid-stat_id').text(data.errors.stat_id);
                    } 

                    if (data.errors.nomer_bpn) {
                        $('.error_nomer_bpn').addClass('is-invalid');
                        $('.invalid-nomer_bpn').addClass('invalid-feedback');
                        $('.invalid-nomer_bpn').removeClass('hidden');
                        $('.invalid-nomer_bpn').text(data.errors.nomer_bpn);
                    } 

                    if (data.errors.tgl_bpn) {
                        $('.error_tgl_bpn').addClass('is-invalid');
                        $('.invalid-tgl_bpn').addClass('invalid-feedback');
                        $('.invalid-tgl_bpn').removeClass('hidden');
                        $('.invalid-tgl_bpn').text(data.errors.tgl_bpn);
                    } 

                    if (data.errors.notes) {
                        $('.error_notes').addClass('is-invalid');
                        $('.invalid-notes').addClass('invalid-feedback');
                        $('.invalid-notes').removeClass('hidden');
                        $('.invalid-notes').text(data.errors.notes);
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection
