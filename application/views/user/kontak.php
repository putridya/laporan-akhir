<!DOCTYPE html>
<html lang="en">



<head>
    

<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

</head>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<body>
    <div id="agm-configurator">

        <div id="agm-configurator-button">
            <button type="button" name="button" id="agm-configurator-btn"><i class="fa fa-gear"></i></button>
        </div>
    </div>
    <div class="sb-site-container">
        <div class="boxed">

            <div class="container">
  <div class="row">
    <div class="col-md-12"><br>
      <div class="title-logo animated fadeInDown animation-delay-5">Ketakmiran <span>Masjid</span></a></h1><br>
        <p class="animated fadeInRight">Raya Annur Polinema</p></div>
      </div>
      <div class="col-md-7">
        <h2 class="right-line">Lokasi Masjid</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4858921049886!2d112.6138665143281!3d-7.94863508138809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788276ede7b861%3A0x3674a5df9b3f0deb!2sMasjid%20Raya%20An-Nur%20POLINEMA!5e0!3m2!1sid!2sid!4v1567516868691!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
      <div class="col-md-5">
        <h2 class="right-line">Kontak Kami</h2>
        <p>Tinggalkan kritik dan saran untuk perbaikan lebih baik layanan kami</p>
        <form method="POST" action="<?php echo base_url(); ?>user/kontak_user/tambah_aksi">
          <div class="form-group">
            <input type="text" name="NAMA_USER" class="form-control" placeholder="Nama Anda" required>
          </div>
          <div class="form-group">
            <input type="email" name="EMAIL_USER" class="form-control" placeholder="Email Anda" required>
          </div>
          <div class="form-group">
            <textarea required name="KRITIK_SARAN_USER" class="form-control" rows="5" id="comment" placeholder="Kritik dan Saran Anda"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-send"></i> Kirim</button>
        </form>
        <h2 class="right-line">Hubungi Kami Di</h2>
        <div class="col-md-5">
          <p><i class="fa fa-phone"></i> (0341)404424</p>
          <p><i class="fa fa-whatsapp"></i> +62 857-5555-8654</p>
        </div>
        <div class="col-md-7">
           <p><i class="fa fa-instagram"></i> rayaannurpolinema</p>
           <p><i class="fa fa-envelope"></i> rayaannurpolinema@gmail.com</p>
        </div>
      </div>
    </div> <!-- row -->
  </div> <!-- container -->

  

</div> <!-- boxed -->
</div> <!-- sb-site -->

<div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
</div>

    
</body>


    
</html>
