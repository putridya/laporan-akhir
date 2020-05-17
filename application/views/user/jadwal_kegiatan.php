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
    <h2 class="right-line">Jadwal Agenda Rutin</h2>
        <div class="col-md-12 " >
            <ul class="timeline-2">
                <?php foreach($jadwal as $jk){ 
                 ?>
                <li class="animated fadeInRight animation-delay-2">
                    <p  class="timeline-time" datetime=""><span>
                        <?php 
                        $date = strtotime($jk->TGL_ACARA); 
                        echo date('d/M/y', $date); ?>
                    </span></p>
                    <i class="timeline-2-point"></i>
                    <div class="panel panel-default">
                        <div class="panel-heading"><?php 
                        $hari = date('D', $date);
                        switch($hari){
                            case 'Sun':
                                $hari_ini = "Minggu";
                            break;
                     
                            case 'Mon':			
                                $hari_ini = "Senin";
                            break;
                     
                            case 'Tue':
                                $hari_ini = "Selasa";
                            break;
                     
                            case 'Wed':
                                $hari_ini = "Rabu";
                            break;
                     
                            case 'Thu':
                                $hari_ini = "Kamis";
                            break;
                     
                            case 'Fri':
                                $hari_ini = "Jumat";
                            break;
                     
                            case 'Sat':
                                $hari_ini = "Sabtu";
                            break;
                            
                            default:
                                $hari_ini = "Tidak di ketahui";		
                            break;
                        }
                        echo $jk->JENIS_ACARA ?> Pada Hari <?php echo $hari_ini ?></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b><?php echo $jk->NAMA_ACARA ?></b>
                                    <br><b>Penceramah :</b><br>
                                        <ul class="small-font">
                                            <p><?php echo $jk->NAMA_PENCERAMAH ?></p>
                                        </ul></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Tema Acara <?php echo $jk->NAMA_ACARA ?></b>
                                    <br><?php echo $jk->TEMA_ACARA ?>
                                    <div style="display: <?php echo ($jk->ID_BILAL==NULL ? 'none' : 'block'); ?>">
                                    <b>Bilal :</b><br>
                                        <ul class="small-font">
                                            <li><?php echo $jk->NAMA_BILAL ?></li>

                                        </ul>
                                    </div>
                                    <?php if($jk->FOTO){ ?>
                                        <p><b>Foto Kegiatan</b></p>
                                        <img class="img-responsive" alt="Image" src="<?php echo base_url(); ?>upload/<?php echo $jk->FOTO ?>">
                                    <?php } else { ?>
                                        <img width="10px" class="img-responsive" alt="Image" src="<?php echo base_url(); ?>upload/putih.png">
                                        <?php } ?>
                                    </p>
                                    
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>

                <!-- <li  class="animated fadeInRight animation-delay-8">
                    <time class="timeline-time" datetime="">&nbsp;<span>Selasa</span></time>
                    <i class="timeline-2-point"></i>
                    <div class="panel panel-success">
                        <div class="panel-heading">Agenda Rutin Pada Hari Selasa</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Kajian Dinul Islam</b>(Kultum)<br>Bertempat di Masjid Raya Annur Polinema Ba'dha Ashar
                                    <br><b>Pemateri:</b><br>
                                        <ul class="small-font">
                                            <li>Ust. A. Bahaudin</li>
                                            <li>Ust. H. Fadholi</li>
                                            <li>Ust. Muh. Amin</li>
                                            <li>Ust. H. Abdul Chalim</li>
                                        </ul></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Pelatihan Sholawat Albanjari</b><br>Bertempat di Masjid Raya Annur Polinema Ba'dha Isya'</p>
                                    <img src="assets/img/colors/blue/n1.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="animated fadeInRight animation-delay-2">
                    <time class="timeline-time" datetime="">&nbsp;<span>Rabu</span></time>
                    <i class="timeline-2-point"></i>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Agenda Rutinan Pada Hari Rabu</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Kajian Dinul Islam</b>(Kultum)<br>Bertempat di Masjid Raya Annur Polinema Ba'dha Ashar
                                    <br><b>Pemateri:</b><br>
                                        <ul class="small-font">
                                            <li>Ust. H. M. Vinan Viyus</li>
                                            <li>Ust. A. Muallif</li>
                                        </ul></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Pembinaan Tilawatil Al-Qur'an</b><br>Bertempat di Masjid Raya Annur Polinema Ba'dha Isya'
                                    <br><b>Pemateri:</b><br>
                                        <ul class="small-font">
                                            <li>Ust. Hasan Bashri (Pembina MTQ Kota Malang)</li>
                                        </ul></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="animated fadeInRight animation-delay-2">
                    <time class="timeline-time" datetime="">&nbsp;<span>Kamis</span></time>
                    <i class="timeline-2-point"></i>
                    <div class="panel panel-warning">
                        <div class="panel-heading">Agenda Rutinan Pada Hari Kamis</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Kajian Dinul Islam</b>(Kultum)<br>Bertempat di Masjid Raya Annur Polinema Ba'dha Ashar
                                    <br><b>Pemateri:</b><br>
                                        <ul class="small-font">
                                            <li>Ust. H. Nur Salam</li>
                                        </ul></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Kajian Rutin Kamis Malam Jum'at</b><br>Bertempat di Masjid Raya Annur Polinema Ba'dha Isya' 
                                    <br><b>Pemateri:</b><br>
                                        <ul class="small-font">
                                            <li>KH> Marzuki Mustamar</li>
                                            <li>Ust. H. M. Muwidha</li>
                                        </ul></p>
                                    <p><b>Sholawatan Rutin (Majlis Sholawat Syifaul Qolbi) </b><br>Bertempat di Masjid Raya Annur Polinema Ba'dha Isya' (Setiap Awal Bulan)</p>
                                    <img src="assets/img/colors/blue/n3.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="animated fadeInRight animation-delay-2">
                    <time class="timeline-time" datetime="">&nbsp;<span>Jum'at</span></time>
                    <i class="timeline-2-point"></i>
                    <div class="panel panel-danger">
                        <div class="panel-heading">Agenda Rutinan Pada Hari Jumat</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Khotmil Qur'an Dan Doa Bersama</b><br>Bertempat di Masjid Raya Annur Polinema Ba'dha Sholat Jum'at
                                    <br><b>Peserta:</b><br>
                                        <ul class="small-font">
                                            <li>Takmir</li>
                                            <li>Remas</li>
                                            <li>Mahasiswa</li>
                                        </ul></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Kajian Jum'at</b><br>Bertempat di Masjid Raya Annur  Polinema Ba'dha Isya' (Setiap Jum'at ke-2 dan Jum'at ke 4)
                                    <br><b>Pemateri:</b><br>
                                        <ul class="small-font">
                                            <li>Habib Taufiq bin Muhammad Baroqbah</li>
                                        </ul></p>
                                    <img src="assets/img/colors/blue/n2_n.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</div>



</div> <!-- boxed -->
</div> <!-- sb-site -->

<div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
</div>

</body>


    
</html>
