
<?php
    if (!isset($uriSegments[2]) || $uriSegments[2] == "") {
        echo '<script>window.location="/"</script>';
        exit();
    }

    $produk = str_replace('_', ' ', $uriSegments[2]);
    $paket  = $uriSegments[3];
?>

<?php include("components/navbar-product.php"); ?>

<div class="container-fluid mb-5">
    <div class="row title text-center mb-2">
        <div class="col-12">
        <h1 class="display-4">Pembayaran Web <?= ucwords($produk); ?> dengan Paket <?= ucwords($paket); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-5 offset-2">
            <form name="konfirmasi">
                <fieldset>
                    <?php if($produk == "Toko Online") { ?>
                        <?php if($paket == "Basic") { ?>
                            <legend>Total tagihan : Rp2.999.000</legend>
                        <?php } else if($paket == "Medium") { ?>
                            <legend>Total tagihan : Rp3.999.000</legend>
                        <?php } else if($paket == "Advanced") { ?>
                            <legend>Total tagihan : Rp4.999.000</legend>
                        <?php } ?>
                    <?php } else if($produk == "Perusahaan") { ?>
                        <?php if($paket == "Basic") { ?>
                            <legend>Total tagihan : Rp1.999.000</legend>
                        <?php } else if($paket == "Medium") { ?>
                            <legend>Total tagihan : Rp2.999.000</legend>
                        <?php } else if($paket == "Advanced") { ?>
                            <legend>Total tagihan : Rp3.999.000</legend>
                        <?php } ?>
                    <?php } else if($produk == "Custom") { ?>
                        <?php if($paket == "Basic") { ?>
                            <legend>Total tagihan : Rp1.999.000</legend>
                        <?php } else if($paket == "Medium") { ?>
                            <legend>Total tagihan : Rp2.999.000</legend>
                        <?php } else if($paket == "Advanced") { ?>
                            <legend>Total tagihan : Rp3.999.000</legend>
                        <?php } ?>
                    <?php } ?>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-12 col-form-label">Informasi Rekening <?= APP_NAME ?></label>
                        <label for="staticEmail" class="col-sm-12 col-form-label">Rekening Bank BNI : 009 555 5554</label>
                        <label for="staticEmail" class="col-sm-12 col-form-label">Rekening Bank BCA : 6860 1487 55</label>
                        <label for="staticEmail" class="col-sm-12 col-form-label">Rekening Bank Mandiri : 070-00-0185555-5</label>
                        <label for="staticEmail" class="col-sm-12 col-form-label">Atas nama PT. <?= APP_NAME ?></label>
                    </div>
                    <?php if($produk == "Custom") { ?>
                    <div class="form-group">
                        <label for="detailWeb">Masukan Detail Web</label>
                        <textarea class="form-control" id="detailWeb" rows="3" onblur="validasiDetailWeb()"></textarea>
                        <small id="detailWebError" class="form-text text-muted" style="display: none;"></small>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="buktiPembayaran">Foto Bukti Pembayaran</label>
                        <input type="file" class="form-control-file" id="buktiPembayaran" aria-describedby="fileHelp" onblur="validasiBuktiPembayaran()">
                        <small id="buktiPembayaranError" class="form-text text-muted" style="display: none;"></small>
                    </div>
                </fieldset>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="modalKonfirmasi" data-target="#successModal" onclick="konfirmasiPembayaran()">Simpan</button>
            </form>
        </div>
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr class="table-success"><th >Detail</th></tr>
                </thead>
                <tbody>
                    <?php if($produk == "Toko Online") {?>
                        <?php if($paket == "Basic") {?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Ongkir JNT, POS, Sicepat, Wahana</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >Jumlah Produk 150+</th></tr>
                            <tr><th >1 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung <i class="fas fa-times"></i></th></tr>
                            <tr><th >Kode Pembayaran <i class="fas fa-times"></i></th></tr>
                            <tr><th >Konfirmasi Pembayaran <i class="fas fa-times"></i></th></tr>
                        <?php } else if($paket == "Medium") {?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Ongkir JNT, POS, Sicepat, Wahana</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >Jumlah Produk 350+</th></tr>
                            <tr><th >3 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung</i></th></tr>
                            <tr><th >Kode Pembayaran <i class="fas fa-times"></i></th></tr>
                            <tr><th >Konfirmasi Pembayaran <i class="fas fa-times"></i></th></tr>
                        <?php } else if($paket == "Advanced") { ?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Ongkir JNT, POS, Sicepat, Wahana</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >Jumlah Produk 850+</th></tr>
                            <tr><th >5 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung</i></th></tr>
                            <tr><th >Kode Pembayaran</th></tr>
                            <tr><th >Konfirmasi Pembayaran</th></tr>
                        <?php } ?>
                    <?php } else if($produk == "Perusahaan") { ?>
                        <?php if($paket == "Basic") { ?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >1 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung<i class="fas fa-times"></i></th></tr>
                            <tr><th >Penyimpanan 1GB</th></tr>
                            <tr><th >Support 24/7</th></tr> 
                        <?php } else if($paket == "Medium") { ?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >3 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung</th></tr>
                            <tr><th >Penyimpanan 3GB</th></tr>
                            <tr><th >Support 24/7</th></tr>                        
                        <?php } else if($paket == "Advanced") { ?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >5 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung</th></tr>
                            <tr><th >Penyimpanan 5GB</th></tr>
                            <tr><th >Support 24/7</th></tr>                        
                        <?php } ?>
                    <?php } else if($produk == "Custom") { ?>
                        <?php if($paket == "Basic") { ?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >1 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung<i class="fas fa-times"></i></th></tr>
                            <tr><th >Penyimpanan 1GB</th></tr>
                            <tr><th >Support 24/7</th></tr> 
                        <?php } else if($paket == "Medium") { ?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >3 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung</th></tr>
                            <tr><th >Penyimpanan 3GB</th></tr>
                            <tr><th >Support 24/7</th></tr>                        
                        <?php } else if($paket == "Advanced") { ?>
                            <tr><th >Gratis Domain</th></tr>
                            <tr><th >Bandwith Unlimited</th></tr>
                            <tr><th >5 Pilihan Theme</th></tr>
                            <tr><th >Statistik Pengunjung</th></tr>
                            <tr><th >Penyimpanan 5GB</th></tr>
                            <tr><th >Support 24/7</th></tr>                        
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Sukses!</h5>
      </div>
      <div class="modal-body">
        <p>Pembayaran yang anda lakukan telah sukses!</p>
        <p>Langkah selanjutya akan kami kirim lewat email anda.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="closeModal(event);">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?php include("components/footer.php"); ?>