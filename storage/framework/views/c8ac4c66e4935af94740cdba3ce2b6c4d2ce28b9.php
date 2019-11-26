 

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item pull-left">
          <a class="nav-link text-uppercase active" data-toggle="tab" href="#tab1" role="tab">
          Laporan</a></li>
        <li class="nav-item pull-right">
          <a class="nav-link active" href="#">
            <span><i class="fa fa-info"></i></span></a></li>
    </ul>
    <div class="tab-content py-3">
    
    <?php if($tanah != NULL): ?>
    <div class="col-md-12">
        <canvas id="canvas" width="400" height="180"></canvas>
    </div>
    <?php else: ?>
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4>Tidak ada statistik laporan :(</h4>
            <a href="<?php echo e(route('penjual-index')); ?>" class="btn btn-default">Tambah Data</a>
          </div>
        </div>
    </div>
    <?php endif; ?>

	
	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
<script type="text/javascript">
  var url = "<?php echo e(url('/home/get/cond_a')); ?>";
  var Jumlah = new Array();
  var Tanggal = new Array();
  
  $(document).ready(function(){
    $.get(url, function(response){
      response.forEach(function(data){
          Jumlah.push(data.value);
          Tanggal.push(data.date);
      });
      var ctx = document.getElementById("canvas").getContext('2d');
        var myChart = new Chart(ctx, {
          responsive: true,
          type: 'line',
          data: {
              labels: Tanggal,
              datasets: [{
                  label: 'Statistik Laporan Tanah',
                  borderColor: "rgba(0, 209, 178)",
                  borderColor: "#505050",
                  pointBackgroundColor: "#505050",
                  pointBorderColor: "#fff",
                  pointHoverBackgroundColor: "#fff",
                  pointHoverBorderColor: "rgba(0, 209, 178)",
                  data: Jumlah,
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>