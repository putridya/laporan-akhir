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

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
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
                            <p class="animated fadeInRight">Raya Annur Polinema</p>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <?php foreach($artikel as $art){ ?>
                        <img class="gambar-artikel" src="<?php echo base_url(); ?>upload/artikel/<?php echo $art->FOTO_ARTIKEL ?>" width=" 100%" alt="">
                        <div class="post-date"><?php 
                        $date = strtotime($art->TGL_ARTIKEL); 
                        echo date('d/M/Y', $date);
                          ?></div>
                        <a class="judul" href="<?php echo base_url(); ?>user/artikel_user/deskripsi/<?php echo $art->ID_ARTIKEL ?>"><?php echo $art->JUDUL_ARTIKEL ?></a>
                        <div class="konten-artikel">
                            <p>
                                <p><?php echo (str_word_count($art->ISI_ARTIKEL) > 20 ? substr($art->ISI_ARTIKEL,0,100)."[..]" : $art->ISI_ARTIKEL)  ?></p>
                            </p>
                        </div>
                        <a href="<?php echo base_url(); ?>user/artikel_user/deskripsi/<?php echo $art->ID_ARTIKEL ?>" class="btn button-custom">Baca Selengkapnya</a>
                        <hr>
                        <?php } ?>






                        <!-- <img class="gambar-artikel" src="upload/foto_artikel/Foto__1571322129.jpg"" width=" 100%" alt="">
                        <div class="post-date">2019-10-17</div>
                        <a class="judul" href="#">Menabur Berkah di hari yang gerah</a>
                        <div class="konten-artikel">
                            <p>Hai Gaes, ini uji coba aja<br>...</p>
                        </div>
                        <a href="Artikel/detail/14/menabur-berkah-di-hari-yang-gerah.html" class="btn button-custom">Baca Selengkapnya</a>
                        <hr>
                        <img class="gambar-artikel" src="upload/foto_artikel/Foto__1569053638.jpg"" width=" 100%" alt="">
                        <div class="post-date">2019-09-21</div>
                        <a class="judul" href="#">Islam yang Berkebangsaan Indonesia</a>
                        <div class="konten-artikel">
                            <p>uhuy...</p>
                        </div>
                        <a href="Artikel/detail/13/islam-yang-berkebangsaan-indonesia.html" class="btn button-custom">Baca Selengkapnya</a>
                        <hr> -->
                    </div>
                    <div class="col-md-4">



                        <h2 class="right-line">Artikel Lainnya</h2>
                        <?php foreach($artikelLainnya as $al){ ?>
                            <div class="row">

                            
                        <div class="col-md-4">
                            <img src="<?php echo base_url(); ?>upload/artikel/<?php echo $al->FOTO_ARTIKEL ?>" width=" 80px" height="80px">
                        </div>
                        <div class="col-md-8">
                            <a class="judul2" href="<?php echo base_url(); ?>user/artikel_user/deskripsi/<?php echo $al->ID_ARTIKEL ?>"><?php echo $al->JUDUL_ARTIKEL ?></a>
                            <div class="post-date">
                                <?php 
                                    $date = strtotime($al->TGL_ARTIKEL); 
                                    echo date('d/M/Y', $date);
                                ?>
                            </div>
                            
                        </div>
                        
                        </div>
                        <hr>
                        <?php } ?>
                        <!-- <div class="col-md-4">
                            <img src="upload/foto_artikel/Foto__1569053638.jpg"" width=" 80px" height="80px">
                        </div>
                        <div class="col-md-8">
                            <a class="judul2" href="Artikel/detail/13/islam-yang-berkebangsaan-indonesia.html">Islam yang Berkebangsaan Indonesia</a>
                            <div class="post-date">2019-09-21</div>
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <img src="upload/foto_artikel/Foto__1571322129.jpg"" width=" 80px" height="80px">
                        </div>
                        <div class="col-md-8">
                            <a class="judul2" href="Artikel/detail/13/islam-yang-berkebangsaan-indonesia.html">Menabur Berkah di hari yang gerah</a>
                            <div class="post-date">2019-10-17</div>
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <img src="upload/foto_artikel/Foto__1571326060.jpg"" width=" 80px" height="80px">
                        </div>
                        <div class="col-md-8">
                            <a class="judul2" href="Artikel/detail/13/islam-yang-berkebangsaan-indonesia.html">Go</a>
                            <div class="post-date">2019-10-17</div>
                        </div> -->
                        

                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <center>
            <div class="pagination" style="margin-bottom:8%;">

                <!-- <a class="active" href="Artikel/show/1.html">1</a>
                <a href="Artikel/show/2.html">2</a> -->
                <!--<a href="#">&laquo;</a>-->
                <!--<a href="#">1</a>-->
                <!--<a href="#" class="active">2</a>-->
                <!--<a href="#">3</a>-->
                <!--<a href="#">4</a>-->
                <!--<a href="#">5</a>-->
                <!--<a href="#">6</a>-->
                <!--<a href="#">&raquo;</a>-->

            </div>
        </center>



    </div> <!-- boxed -->
    </div> <!-- sb-site -->

    <div id="back-top">
        <a href="#header"><i class="fa fa-chevron-up"></i></a>
    </div>


</body>



</html>