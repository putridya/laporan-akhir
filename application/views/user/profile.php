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
          <?php foreach($profile as $pf){
            ?>
          <div class="col-md-7">
            <h2 class="right-line">Tentang Kami</h2>
            <p>
            <?php echo $pf->TENTANG_KAMI ?>
            </p>
          </div>
          <div class="col-md-5">
            <h2 class="right-line">Visi, Misi, dan Kerjasama</h2>
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading panel-heading-link">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa fa-lightbulb-o"></i> Visi
                  </a>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                  <p>
            <?php echo $pf->VISI ?>
            </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading panel-heading-link">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                    <i class="fa fa-desktop"></i> Misi
                  </a>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                  <p>
            <?php echo $pf->MISI ?>
            </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading panel-heading-link">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                    <i class="fa fa-user"></i> Kerja Sama
                  </a>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body" style="text-align: center">
                    <img src="<?php echo base_url() ?>assets2/global/images/avatars/RISPOL-BIRU.png" alt="" width="50%" >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div> <!-- row -->
      </div> <!-- container -->


    </div> <!-- boxed -->
  </div> <!-- sb-site -->

  <div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
  </div>

</body>



</html>