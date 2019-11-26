<aside class="col-md-2">
    <div class="mt-5 mb-3" id="sidemenu">
        <ul class="nav flex-md-column flex-row justify-content-between">
        <?php if(Auth::user()): ?>
            <li class="nav-item">
              <a class="nav-link pl-0 <?php echo e(Request::is('home*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('home')); ?>">
              Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0" href="<?php echo e(route('master-berkas-index')); ?>">
              Master Berkas </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0" href="<?php echo e(route('ruang-diskusi-index')); ?>">
              Ruang Diskusi </a>
            </li>
             <?php if(Auth::user()->role === 'admin'): ?> 
              <li class="nav-item">
                <a class="nav-link pl-0 <?php echo e(Request::is('user*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('user.index')); ?>">
                Pengguna </a>
              </li>
           
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link pl-0 <?php echo e(Request::is('tanah*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('tanah-index')); ?>">Tanah</a>
                <?php if(Auth::user()->role === 'admin' || Auth::user()->role === 'staff'): ?> 
                <ul class="nav flex-md-column ml-2 hidden-sm-down">
                  <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('status*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('penjual-index')); ?>">Penjual</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('desa*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('desa-index')); ?>">Desa</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('sppt*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('sppt-index')); ?>">Kode SPPT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('blok*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('blok-index')); ?>">Blok Kode</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('status*') ? 'active' : 'not-active'); ?>" href="<?php echo e(route('harga-index')); ?>">Harga Tanah</a>
                  </li>

                </ul>
                <?php endif; ?>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0 <?php echo e(Request::is('status*') ? 'active' : 'not-active'); ?>" href="/user/settings/<?php echo e(Auth::user()->id); ?>">Setting</a>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</aside>