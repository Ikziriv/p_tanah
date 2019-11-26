@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('content')
<div class="col">
    <ul class="nav nav-tabs small" role="tablist">
        <li class="nav-item"><a class="nav-link text-uppercase active" href="{{route('tanah-index')}}">Beranda</a></li>
    </ul>
    <div class="tab-content py-3">
    {{-- // --}}
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row">
      <div class="col-md-6">
        <p class="text-muted pull-left">
          Ubah Data Berkas :
        </p>
        <h5 class="pull-left">
          &nbsp;{{$data->nama}}
        </h5>
      </div>
      <div class="col-md-6">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
          <a href="{{route('tanah-detail', $data->id)}}" class="btn btn-sm btn-outline-dark pull-right">
            Lihat Data
          </a>
          <a href="{{route('tanah-unggah', $data->id)}}" class="btn btn-sm btn-outline-dark pull-right">
            Unggah Berkas
          </a>
          <a href="{{route('tanah-index')}}" class="btn btn-sm btn-outline-dark pull-right">
            Kembali
          </a>
        </div>
      </div>
      <div class="col-12 d-flex justify-content-center">
		    <div class="card-body">
          <form class="container text-center" method="PUT" role="form">
            <input type="hidden" name="id" id="edit_id" value="{{$data->id}}">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" 
                        value="{{$data->s_ppjb}}" 
                        @if($data->s_ppjb == 1)
                            checked
                        @endif 
                        id="s_ppjb" 
                        name="s_ppjb">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">PPJB (2 Rangkap)</span>
                  <div class="invalid-tgl_sph">
                    </div>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" 
                        value="{{$data->s_sph}}" 
                        @if($data->s_sph == 1)
                            checked
                        @endif 
                        id="s_sph" name="s_sph">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">SPH (4 Rangkap)</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"  
                        value="{{$data->s_sppt}}" 
                        @if($data->s_sppt == 1)
                            checked
                        @endif 
                        id="s_sppt" name="s_sppt">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">SPPT 2015</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"   
                        value="{{$data->ktp_penjual}}" 
                        @if($data->ktp_penjual == 1)
                            checked
                        @endif 
                        id="ktp_penjual" name="ktp_penjual">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">KTP Penjual</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->ktp_lain}}" 
                        @if($data->ktp_lain == 1)
                            checked
                        @endif 
                        id="ktp_lain" name="ktp_lain">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">KTP Suami / Istri</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_kk}}" 
                        @if($data->s_kk == 1)
                            checked
                        @endif 
                        id="s_kk" name="s_kk">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Kartu Keluarga</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_jual}}" 
                        @if($data->s_jual == 1)
                            checked
                        @endif 
                        id="s_jual" name="s_jual">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Pernyataan Menjual</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_sengketa}}" 
                        @if($data->s_sengketa == 1)
                            checked
                        @endif 
                        id="s_sengketa" name="s_sengketa">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">S. Pernyataan Tdk Sengketa</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_riwayat_tanah}}" 
                        @if($data->s_riwayat_tanah == 1)
                            checked
                        @endif 
                        id="s_riwayat_tanah" name="s_riwayat_tanah">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">S. Ket. Riwayat tanah</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_persetujuan}}" 
                        @if($data->s_persetujuan == 1)
                            checked
                        @endif 
                        id="s_persetujuan" name="s_persetujuan">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">S. Persetujuan Suami / Istri</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_ket_menikah}}" 
                        @if($data->s_ket_menikah == 1)
                            checked
                        @endif 
                        id="s_ket_menikah" name="s_ket_menikah">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Ket. Menikah</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->buku_nikah}}" 
                        @if($data->buku_nikah == 1)
                            checked
                        @endif 
                        id="buku_nikah" name="buku_nikah">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Buku Nikah</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_beda_nama}}" 
                        @if($data->s_beda_nama == 1)
                            checked
                        @endif 
                        id="s_beda_nama" name="s_beda_nama">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Ket. Beda Nama</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_beda_luas}}" 
                        @if($data->s_beda_luas == 1)
                            checked
                        @endif 
                        id="s_beda_luas" name="s_beda_luas">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">S. Pernyataan Beda Luas</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_kematian}}" 
                        @if($data->s_kematian == 1)
                            checked
                        @endif 
                        id="s_kematian" name="s_kematian">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Kematian</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_ahli_waris}}" 
                        @if($data->s_ahli_waris == 1)
                            checked
                        @endif 
                        id="s_ahli_waris" name="s_ahli_waris">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">S. Ket. Ahli Waris</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_kuasa_waris}}" 
                        @if($data->s_kuasa_waris == 1)
                            checked
                        @endif 
                        id="s_kuasa_waris" name="s_kuasa_waris">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">S. Kuasa waris</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->ktp_ahli_waris}}" 
                        @if($data->ktp_ahli_waris == 1)
                            checked
                        @endif 
                        id="ktp_ahli_waris" name="ktp_ahli_waris">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">KTP ahli waris</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->kk_ahli_waris}}" 
                        @if($data->kk_ahli_waris == 1)
                            checked
                        @endif 
                        id="kk_ahli_waris" name="kk_ahli_waris">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">KK Ahli Waris</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_girik_hilang}}" 
                        @if($data->s_girik_hilang == 1)
                            checked
                        @endif 
                        id="s_girik_hilang" name="s_girik_hilang">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Girik Hilang</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->letter_c}}" 
                        @if($data->letter_c == 1)
                            checked
                        @endif 
                        id="letter_c" name="letter_c">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Letter C</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->foto_transaksi}}" 
                        @if($data->foto_transaksi == 1)
                            checked
                        @endif 
                        id="foto_transaksi" name="foto_transaksi">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Foto Transaksi</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->kwitansi_pembayaran}}" 
                        @if($data->kwitansi_pembayaran == 1)
                            checked
                        @endif 
                        id="kwitansi_pembayaran" name="kwitansi_pembayaran">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Kwitansi Pembayaran</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->gambar_situasi}}" 
                        @if($data->gambar_situasi == 1)
                            checked
                        @endif 
                        id="gambar_situasi" name="gambar_situasi">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Gambar Situasi</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->bap}}" 
                        @if($data->bap == 1)
                            checked
                        @endif 
                        id="bap" name="bap">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">BAP</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->dhkp}}" 
                        @if($data->dhkp == 1)
                            checked
                        @endif 
                        id="dhkp" name="dhkp">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">DHKP</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->npwp}}" 
                        @if($data->npwp == 1)
                            checked
                        @endif 
                        id="npwp" name="npwp">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">NPWP</span>
              </label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_kuasa}}" 
                        @if($data->s_kuasa == 1)
                            checked
                        @endif 
                        id="s_kuasa" name="s_kuasa">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Kuasa</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_pengakuan_tanah}}" 
                        @if($data->s_pengakuan_tanah == 1)
                            checked
                        @endif 
                        id="s_pengakuan_tanah" name="s_pengakuan_tanah">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Pengakuan Tanah</span>
              </label>
              </div>
              <div class="form-group col-md-4">
                <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"    
                        value="{{$data->s_kesepakatan_bersama}}" 
                        @if($data->s_kesepakatan_bersama == 1)
                            checked
                        @endif 
                        id="s_kesepakatan_bersama" name="s_kesepakatan_bersama">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Surat Kesepakatan Bersama</span>
              </label>
              </div>
              <div class="form-group col-md-12">
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                <div class="option">
                    <button type="button" class="btn btn-outline-primary btn-sm btn-block editdoc">Ubah</button>
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
    $("input[type='checkbox']").change(function(){
         if($(this).prop('checked')){
              $(this).val(1);
         } else {
              $(this).val(0);
         }
    });
    // Tambah Data
    var id = $('#edit_id').val();
    $('.option').on('click', '.editdoc', function() {
        $.ajax({
            type: 'PUT',
            url: '/tanah/tanaheditdoc/' + id,
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                's_ppjb': $('#s_ppjb').val(),
                's_sph': $('#s_sph').val(),
                's_sppt': $('#s_sppt').val(),
                'ktp_penjual': $('#ktp_penjual').val(),
                'ktp_lain': $('#ktp_lain').val(),
                's_kk': $('#s_kk').val(),
                's_jual': $('#s_jual').val(),
                's_sengketa': $('#s_sengketa').val(),
                's_riwayat_tanah': $('#s_riwayat_tanah').val(),
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
                // console.log(data);
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
                    toastr.success('Edit Berkas Berhasil!', 'Success', {timeOut: 5000});
        			window.location.reload();
                    $('.col').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            },
        });
    });
</script>
@endsection
