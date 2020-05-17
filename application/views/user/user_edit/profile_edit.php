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
      <form method="POST" action="<?php echo base_url() ?>user/edit/profile_edit/update">
      
        <?php foreach ($profile as $pf) { ?>
          <div class="row">
            <!-- <div class="col-md-12"><br>
            <div class="title-logo animated fadeInDown animation-delay-5">Ketakmiran <span>Masjid</span></a></h1><br>
              <p class="animated fadeInRight">Raya Annur Polinema</p>
            </div> -->
          </div>
          <div class="col-md-7">
          <input type="hidden" name="ID_PROFILE" value="<?php echo $pf->ID_PROFILE ?>">
            <!-- <h2 class="right-line">Tentang Kami</h2> -->
            <textarea name="TENTANG_KAMI" id="" cols="30" rows="10" style="width: 100%;">
          <?php echo $pf->TENTANG_KAMI ?>

          </textarea>
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
                    <textarea name="VISI" id="" cols="30" rows="10" style="width: 100%;">
          <?php echo $pf->VISI ?>

          </textarea>
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
                    <textarea name="MISI" id="" cols="30" rows="10" style="width: 100%;">
          <?php echo $pf->MISI ?>

          </textarea>
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
                  <div class="panel-body">
                    <img src="<?php echo base_url() ?>assets2/global/images/avatars/RISPOL-BIRU.png" alt="" width="50%" height="50%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <a href="" class="btn btn-primary">Edit</a> -->
          <input type="submit" class="btn btn-success" value="Simpan Data">
        <?php } ?>
      </form>
    </div> <!-- row -->
</div>



</section>


<!-- Button trigger modal boostrap-->


<!-- Modal -->

</div>