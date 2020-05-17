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
                    <div class="col-md-12">
                        <h2 class="right-line">Video Kegiatan</h2>

                        <?php 
                            foreach($video as $vd){
                            if($vd->VIDEO_ACARA){

                            
                        ?>
                        <div class="card">
                            <div class="col-md-6">
                                <iframe width="100%" height="315" src="<?php echo $vd->VIDEO_ACARA?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <a class="judul"><b><?php echo $vd->NAMA_ACARA?></b></a>
                                <p class="content-artikel" style="margin-bottom: 3%">Oleh <?php echo $vd->NAMA_PENCERAMAH?></p>
                                <hr>

                            </div>
                        </div>
                        <?php 
                            }
                        }
                        ?>

                        <!-- <div class="card">
                            <div class="col-md-6">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/0gcqMHzaFNg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <a class="judul"><b>KAJIAN SIROH NABAWIYAH</b></a>
                                <p class="content-artikel" style="margin-bottom: 3%">Oleh Habib Taufiq bin Muhammad Baroqbah</p>
                                <hr>

                            </div>
                        </div>


                        <div class="card">
                            <div class="col-md-6">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/1XgCMNfOHFU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <a class="judul"><b>KAJIAN SIROH NABAWIYAH</b></a>
                                <p class="content-artikel" style="margin-bottom: 3%">Oleh Habib Taufiq bin Muhammad Baroqbah<br></p>
                                <hr>

                            </div>
                        </div> -->


                    </div>

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