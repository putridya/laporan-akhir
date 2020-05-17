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
                        <?php foreach($deskripsi as $desc){ ?>
                        <a class="judul" href=""><?php echo $desc->JUDUL_ARTIKEL ?></a>
                        <img class="gambar-artikel" src="<?php echo base_url(); ?>upload/artikel/<?php echo $desc->FOTO_ARTIKEL ?>" width="100%" alt="">
                        <div class="post-date"><?php 
                                    $date = strtotime($desc->TGL_ARTIKEL); 
                                    echo date('d/M/Y', $date);
                                ?></div>
                        <div class="konten-artikel" style="text-align: left;margin-bottom: 100px">
                            <p>
                                <p><?php echo $desc->ISI_ARTIKEL ?></p>
                            </p>
                        </div>
                    </div>
                        <?php } ?>
                    <div class="col-md-4">
                    
                        <h2 class="right-line">Artikel Terbaru</h2>
                        <?php foreach($artikel as $al){ ?>
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