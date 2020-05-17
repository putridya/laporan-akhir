<!-- <link href="<?php echo base_url() ?>assets/css/style-blue.css" rel="stylesheet" title="default"> -->

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Profile Pengguna
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Profile Pengguna</li>
    </ol>
  </section>

  <section class="content">
    <!-- buat button tambah data penceramah -->
    <!-- <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
      Tambah Data Penceramah</button> -->
      <div class="container-fluid" style="background-color: white;padding: 20px">
        <div class="row">
        
          <!-- <div class="col-md-12"><br>
            <div class="title-logo animated fadeInDown animation-delay-5">Ketakmiran <span>Masjid</span></a></h1><br>
              <p class="animated fadeInRight">Raya Annur Polinema</p>
            </div> -->
          </div>
          <?php foreach($profile as $pf){
            ?>
          <div class="col-md-7">
            <!-- <h2 class="right-line">Tentang Kami</h2> -->
            
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
                    <p><?php echo $pf->VISI ?></p>
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
                    <p><?php echo $pf->MISI ?></p>
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
                  <img src="<?php echo base_url() ?>assets2/global/images/avatars/RISPOL-BIRU.png" alt="" width="50%" height="50%">

                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <a href="<?php echo base_url() ?>user/edit/profile_edit/tampil_profile" class="btn btn-primary">Edit</a>
        </div> <!-- row -->
      </div>



  </section>


  <!-- Button trigger modal boostrap-->


  <!-- Modal -->
  
</div>