<aside class="col-md-2">
    <div class="mt-5 mb-3" id="sidemenu">
        <ul class="nav flex-md-column flex-row justify-content-between">
        @if (Auth::user())
            <li class="nav-item">
              <a class="nav-link pl-0 {{Request::is('home*') ? 'active' : 'not-active'}}" href="{{route('home')}}">
              Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0" href="{{route('master-berkas-index')}}">
              Master Berkas </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0" href="{{route('ruang-diskusi-index')}}">
              Ruang Diskusi </a>
            </li>
             @if(Auth::user()->role === 'admin') 
              <li class="nav-item">
                <a class="nav-link pl-0 {{Request::is('user*') ? 'active' : 'not-active'}}" href="{{route('user.index')}}">
                Pengguna </a>
              </li>
           {{--    @if(Auth::user()->roles(1)) 
              <li class="nav-item">
                <a class="nav-link pl-0 {{Request::is('role*') ? 'active' : 'not-active'}}" href="{{route('role-index')}}">
                Jabatan</a>
              </li>
              @endif --}}
            @endif
            <li class="nav-item">
              <a class="nav-link pl-0 {{Request::is('tanah*') ? 'active' : 'not-active'}}" href="{{route('tanah-index')}}">Tanah</a>
                @if(Auth::user()->role === 'admin' || Auth::user()->role === 'staff') 
                <ul class="nav flex-md-column ml-2 hidden-sm-down">
                  <li class="nav-item">
                    <a class="nav-link {{Request::is('status*') ? 'active' : 'not-active'}}" href="{{route('penjual-index')}}">Penjual</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{Request::is('desa*') ? 'active' : 'not-active'}}" href="{{route('desa-index')}}">Desa</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link {{Request::is('berkas*') ? 'active' : 'not-active'}}" href="{{route('berkas-index')}}">Berkas</a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link {{Request::is('sppt*') ? 'active' : 'not-active'}}" href="{{route('sppt-index')}}">Kode SPPT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{Request::is('blok*') ? 'active' : 'not-active'}}" href="{{route('blok-index')}}">Blok Kode</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{Request::is('status*') ? 'active' : 'not-active'}}" href="{{route('harga-index')}}">Harga Tanah</a>
                  </li>
{{--                   <li class="nav-item">
                    <a class="nav-link {{Request::is('status*') ? 'active' : 'not-active'}}" href="{{route('stat-index')}}">Status <small style="font-size: 10px;" class="text-danger">BAYAR</small></a>
                  </li> --}}
                </ul>
                @endif
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0 {{Request::is('status*') ? 'active' : 'not-active'}}" href="/user/settings/{{ Auth::user()->id }}">Setting</a>
            </li>
        </ul>
        @endif
    </div>
</aside>