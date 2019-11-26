 

<?php $__env->startSection('style'); ?>
<style type="text/css">
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 5px;;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 12px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

/*.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}*/

.invoice table .no {
    color: #fff;
    font-size: 14px;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media  print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col">
	<div id="invoice">

	    <div class="toolbar hidden-print">
	    	<div class="clearfix">
	    		<div class="pull-left">
		            <a href="<?php echo e(route('master-berkas-index')); ?>" class="text-left"> Kembali</a>
		        </div>
		        <div class="pull-right">
		            <a href="<?php echo e(route('master-berkas-print', $berkas->id)); ?>" target="_blank" class="text-right"> Print</a>
		        </div>
	    	</div>
	        <hr>
	    </div>
	    <div class="invoice overflow-auto">
	        <div style="min-width: 600px">
	            <header>
	                <div class="row">
	                    <div class="col-1">
	                        <a target="_blank" href="https://lobianijs.com">
	                            <img src="<?php echo e(asset('backend/image1.png')); ?>" width="80px" data-holder-rendered="true" />
	                        </a>
	                    </div>
	                    <div class="col-11 company-details text-center">
	                        <h6 class="name">
	                            <b>PEMERINTAH KABUPATEN LEBAK</b>
	                        </h6>
	                        <div><b>KECAMATAN CURUG BITUNG</b></div>
	                        <div><small><b>KANTOR KEPALA DESA CILAYANG</b></small></div>
	                        <div><p><small>JL Raya Maja - Koleang KM 12 No. 5 Desa Cilayang</small><br>
	                        		<small>Kec. Curug Bitung Kab. Lebak - Banten</small></p></div>
	                    </div>
	                </div>
	            </header>
	            <main>
	                <div class="row contacts">
	                    <div class="col invoice-to text-center ml-5">
	                        <div class="text-gray-light"><b>SURAT KETERANGAN AHLI WARIS</b></div>
	                        <div class="text-gray-light"><b>NOMOR : <?php echo e($berkas->nomor); ?></b></div>
	                    </div>
	                    
	                    <div class="p-3">
	                    <p>
    					Kami yang bertanda tangan dibawah ini, para ahli waris dari almarhum atau almarhumah
    					<?php echo e($berkas->nama); ?> menerangkan dengan sesungguhnya dengan sanggup diangkat sumpah bahwa almarhum atau almarhumah <?php echo e($berkas->nama); ?> tempat tinggal terakhir di <?php echo e($berkas->tmpt_tgl); ?> dan pada tanggal <?php echo e($berkas->tgl); ?> telah meninggal dunia di <?php echo e($berkas->tmpt); ?>


    					Bahwa almarhum atau almarhumah <?php echo e($berkas->nama); ?> semasa hidupnya untuk pertama dan terakhir kalinya telah melangsungkan perkawinan dengan istri / suami nya <?php echo e($berkas->nama_relasi); ?> yang dikaruniai anak sebanyak <?php echo e($berkas->jml_anak); ?> orang dan atau saudara kandung <?php echo e($berkas->jml_sdr); ?> orang maka yang menjadi ahli waris yaitu :
	                    </p>
	                    </div>
	                </div>
	                <table class="table table-sm" border="0" cellspacing="0" cellpadding="0">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th class="text-center">NAMA</th>
	                            <th class="text-center">TL & UMUR</th>
	                            <th class="text-center">HUBUNGAN</th>
	                            <th class="text-center">ALAMAT</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $__currentLoopData = $berkas_d; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tr>
	                            <td class="no"><?php echo e($key++); ?></td>
	                            <td class="text-center" width="30%"><?php echo e($v->nama_hub); ?></td>
	                            <td class="text-center" width="10%"><?php echo e($v->tgl_umur); ?></td>
	                            <td class="text-center" width="10%"><?php echo e($v->hubungan); ?></td>
	                            <td width="50%" class="text-center"><h3>
	                                <p><?php echo e($v->alamat); ?></p>
	                            </td>
	                        </tr>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </tbody>
	                </table>
	                
	                <p>
	                	Bahwa almarhum atau almarhumah …………………… selain meninggalkan istri / anak kandung / sdr kandung sebagai ahli waris, juga meninggalkan harta kekayaan yang merupakan harta warisan berupa 1 (satu) bidang tanah, adalah sebagai berikut :		
						Sertifikat No.		: …………..				
						Bidang			: …………..			
						Blok No.		: …………..			
						SPPT No.		: 36.02.191. ____________________	
						Luas 			: ………….. M2			
						Nama SPPT		: ....………..				
						Demikian surat keterangan ahli waris ini kami buat benar adanya dan dapat dipertanggung jawabkan secara hukum jika terdapat masalah dikemudian hari.	

						Para Ahli Waris :
						……………………………	
										     				
						……………………………			
										     								
						……………………………			
										     				
						……………………………			
										     								
						……………………………			
										     				
									





						LEBAK,                                   

						Disaksikan dan dibenarkan oleh kami
						Kepala Desa Cilayang

	                </p>
	            </main>
	            <footer>
	                Document was created on a computer and is valid without the signature and seal.
	            </footer>
	        </div>
	        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
	        <div></div>
	    </div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-script'); ?>
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>