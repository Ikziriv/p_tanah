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
              <a href="#" id="cetak" class="btn btn-sm btn-outline-dark pull-right">
                Print
              </a>
              <a href="{{route('tanah-detail', $data->id)}}" class="btn btn-sm btn-outline-dark pull-right">
                Kembali
              </a>
            </div>
            <br>
          </div>
          <div class="col-12">
            <div class="card border-light mb-3">
              <div class="card-body">
                <div class="row cetak">
                  <div class="col-md-12 well">
                    <h4 class="pull-left">{{$data->nama}}</h4>
                    <label class="pull-right">{{$data->nomer_sph}}</label>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                    
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12 well">
                        <label class="pull-left">{{$data->tgl_pembuatan}}</label>
                        <label class="pull-left">{{$data->nomer_bpn}}</label>
                      </div>
                      <div class="col-md-12 well">
                        <p class="text-center">{{$data->notes}}</p>
                      </div>
                    </div>
                    <hr>
                  </div>

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
<script type="text/javascript">
    $('#cetak').on("click", function () {
      $('.cetak').printThis({
        base: false
      });
    });
</script>
@endsection
