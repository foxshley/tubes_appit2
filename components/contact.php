<?php defined('BASE_URL') OR exit('No direct script access allowed'); ?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-4">Lokasi Kami</h3>
                <div class="map-responsive">
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=jalan%20sekeloa%20no%207&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
                <div class="row text-center" id="contact">
                    <div class="col-md-6">
                        <hr class="light">
                        <h5>Contact</h5>
                        <hr class="light">
                        <p>085-220-906-564</p>
                        <p>muhammadtheradea@gmail.com</p>
                        <p>Jl.Sasak Gantung IV</p>
                        <p>Bandung</p>
                    </div>
                    <div class="col-md-6">
                        <hr class="light">
                        <h5>Service Area</h5>
                        <hr class="light">
                        <p>UNIKOM</p>
                        <p>Jl.Dipatiukur</p>
                        <p>Lab 7</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mb-4">Kontak Kami</h3>
                <form action="/kirim_pesan" method="POST" name="contact">
                    <input type="hidden" name="kirim" value="true" />
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" onblur="validasiNama();">
                        <?php if(isset($_SESSION['errors']['nama'])) { ?>
                            <small id="namaError" class="form-text text-muted" style="display: block;"><?= $_SESSION['errors']['nama'] ?></small>
                        <?php } else { ?>
                            <small id="namaError" class="form-text text-muted" style="display: none;"></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" onblur="validasiEmail();">
                        <?php if(isset($_SESSION['errors']['email'])) { ?>
                            <small id="emailError" class="form-text text-muted" style="display: block;"><?= $_SESSION['errors']['email'] ?></small>
                        <?php } else { ?>
                            <small id="emailError" class="form-text text-muted" style="display: none;"></small>
                        <?php } ?>                    
                    </div>
                    <div class="form-group">
                        <label for="nama">Subjek</label>
                        <input type="text" class="form-control" name="subjek" id="subjek" onblur="validasiSubjek()">
                        <?php if(isset($_SESSION['errors']['subjek'])) { ?>
                            <small id="subjekError" class="form-text text-muted" style="display: block;"><?= $_SESSION['errors']['subjek'] ?></small>
                        <?php } else { ?>
                            <small id="subjekError" class="form-text text-muted" style="display: none;"></small>
                        <?php } ?>                    
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan Anda</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="5" onblur="validasiPesan()"></textarea>
                        <?php if(isset($_SESSION['errors']['pesan'])) { ?>
                            <small id="pesanError" class="form-text text-muted" style="display: block;"><?= $_SESSION['errors']['pesan'] ?></small>
                        <?php } else { ?>
                            <small id="pesanError" class="form-text text-muted" style="display: none;"></small>
                        <?php } ?>                    
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" onclick="kirimData(event)">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</section>
