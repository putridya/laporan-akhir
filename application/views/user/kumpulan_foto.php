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
                        <h2 class="right-line">Foto Kegiatan</h2>
                        <?php foreach($foto as $ft){ ?>
                        <div class="col-md-6">
                            <div class="img-caption-ar wow fadeInUp">
                            <img class="img-responsive" alt="Image" src="<?php echo base_url(); ?>upload/<?php echo $ft->FOTO ?>">
                                <div class="caption-ar">
                                    <div class="caption-content">
                                        <h4 class="caption-title"><?php echo $ft->NAMA_ACARA ?></h4>
                                        <p>Oleh <?php echo $ft->NAMA_PENCERAMAH ?><br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- <div class="col-md-6">
                            <div class="img-caption-ar wow fadeInUp">
                                <img src="upload/Foto__1570087524.jpg" class="img-responsive" alt="Image">
                                <div class="caption-ar">
                                    <div class="caption-content">
                                        <h4 class="caption-title">Kajian Senin Malam</h4>
                                        <p>Oleh Buya Hasanuddin<br></p>
                                    </div>
                                </div>
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