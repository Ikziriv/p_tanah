 @extends('layouts.app')

@section('style')

@endsection

@section('content')
<div class="col">
    <div class="tab-content py-3">

        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
          <div class="row">
          <div class="col-md-12">
            <h2 class="text-muted lead pull-left">
              Detail Data
            </h2>
            <div class="btn-group pull-right" role="group" aria-label="Basic example">
              <a href="{{route('tanah-edit-doc', $data->id)}}" class="btn btn-sm btn-outline-dark pull-right">
                Ubah Data Berkas
              </a>
              <a href="{{route('tanah-unggah', $data->id)}}" class="btn btn-sm btn-outline-dark pull-right">
                Unggah Berkas
              </a>
              <a href="{{route('tanah-cetak', $data->id)}}" class="btn btn-sm btn-outline-dark pull-right">
                Cetak
              </a>
              <a href="{{route('tanah-index')}}" class="btn btn-sm btn-outline-dark pull-right">
                Kembali
              </a>
            </div>
            <br>
          </div>
          <div class="col-12">
            <div class="card border-light mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 well">
                    <h4 class="pull-left">{{$data->nama}}</h4>
                    <label class="pull-right">{{$data->status->nama}}<br>{{$data->tgl_pembuatan}}</label>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="col-md-6">
                    <table class="text-left pull-left">
                      <tr>
                        <td>Letak OP</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->desa->nama}}</td>
                      </tr>
                      <tr>
                        <td>SPPT</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->sppt}}</td>
                      </tr>
                      <tr>
                        <td>GPS</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->sppt}}</td>
                      </tr>
                      <tr>
                        <td>Luas M2 Terbayar</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->luas_terbayar}}</td>
                      </tr>
                      <tr>
                        <td>Blok (NOP)</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->blok->kode}}</td>
                      </tr>
                      <tr>
                        <td>SPPT (NOP)</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->kodesppt->kode}}</td>
                      </tr>
                      <tr>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                      </tr>
                      <tr>
                        <td>PPJB (2 Rangkap)</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_ppjb == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>SPH (4 Rangkap)</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_sph == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>SPPT {{date('Y')}}</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_sppt == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>KTP Penjual</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->ktp_penjual == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>KTP Suami / Istri</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->ktp_lain == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Kartu Keluarga</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_kk == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Surat Pernyataan Menjual</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_jual == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>S. Pernyataan Tdk Sengketa</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_sengketa == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>S. Ket. Riwayat tanah</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_riwayat_tanah == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>S. Persetujuan Suami / Istri</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_persetujuan == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                    </table>
                  </div>
                  {{-- // --}}
                  <div class="col-md-6">
                    <table class="text-right pull-right">
                      <tr>
                        <td>Surat Ket. Menikah</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_ket_menikah == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Buku Nikah</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->buku_nikah == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Surat Ket. Beda Nama</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_beda_nama == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>S. Pernyataan Beda Luas</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_beda_luas == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Surat Girik Hilang</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_girik_hilang == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Letter C</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->letter_c == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Foto Transaksi</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->foto_transaksi == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Kwitansi Pembayaran</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->kwitansi_pembayaran == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Gambar Situasi</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->gambar_situasi == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>BAP</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->bap == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>DHKP</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->dhkp == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>NPWP</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->npwp == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                      </tr>
                      <tr>
                        <td>Nomer (SPH)</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->nomer_sph}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal (SPH)</td>
                        <td>:</td>
                        <td>&nbsp;{{$data->tgl_sph}}</td>
                      </tr>
                    </table>
                  </div>
                    
                  <div class="col-md-12">
                    <hr>
                    <div class="well">
                      <p class="text-center">{{$data->notes}}</p>
                    </div>
                    <hr>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <table class="text-left pull-left">
                      <tr>
                        <td>Surat Kematian</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_kematian == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>S. Ket. Ahli Waris</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_ahli_waris == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>S. Kuasa Waris</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_kuasa_waris == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>KTP Ahli Waris</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->ktp_ahli_waris == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>KK Ahli Waris</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->kk_ahli_waris == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Surat Kuasa</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_kuasa == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                    </table>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <table class="text-right pull-right">
                      <tr>
                        <td>Nomer (BPN)</td>
                        <td>:</td>
                        @if($data->nomer_bpn == NULL)
                        <td><small class="text-danger">Pembayaran 80%</small></td>
                        @else
                        <td>&nbsp;{{$data->nomer_bpn}}</td>
                        @endif
                      </tr>
                      <tr>
                        <td>Tanggal (BPN)</td>
                        <td>:</td>
                        @if($data->tgl_bpn == NULL)
                        <td><small class="text-danger">Pembayaran 80%</small></td>
                        @else
                        <td>&nbsp;{{$data->tgl_bpn}}</td>
                        @endif
                      </tr>
                      <tr>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                      </tr>
                      <tr>
                        <td>Surat Pengakuan tanah</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_pengakuan_tanah == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Surat Kesepakatan Bersama</td>
                        <td>:</td>
                        <td>&nbsp;
                          @if($data->s_kesepakatan_bersama == 1)
                            <i class="fa fa-check text-success"></i>
                          @else
                            <i class="fa fa-times text-danger"></i>
                          @endif
                        </td>
                      </tr>
                    </table>
                  </div>

                  <div class="col-md-12">
                    <hr>
                    <div class="well">
                      <h4>Riwayat Pembayaran</h4>
                      <table class="table">
                        <thead class="thead-inverse">
                          <tr>
                            <td>Tanggal</td>
                            <td>Nama</td>
                            <td>Terbayar</td>
                            <td>Belum Bayar</td>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($bayar as $b)
                        <tr>
                        @php 
                          $penjual = App\Modules\Backend\Tanah\Tanah::where('id', $b->tanah_id)->first(); 
                          $ktp_penjual = App\Modules\Backend\Penjual\Penjual::where('id', $penjual->penjual_id)->first();
                        @endphp
                          <td>{{date('d-m-Y', strtotime($b->tgl_pembuatan))}}</td>
                          <td>{{$ktp_penjual->ktp}} - {{$penjual->nama}}</td>
                          <td>Rp. {{ number_format($b->rp_terbayar, 0 , ',' , '.' ) }}</td>
                          <td>Rp. {{ number_format($b->rp_blm_terbayar, 0 , ',' , '.' ) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    {{-- <hr> --}}
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card border-light mb-3">
              <div class="card-body">
                <div class="row">
                  {{--  --}}
                </div>
              </div>
            </div>
          </div>
            
          </div>
          </div>
        </div>

    </div>
</div>
@endsection

@section('footer-script')

@endsection
