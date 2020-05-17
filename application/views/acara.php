<?php
$jenis = $_GET['jenis'];
$jenis_acara;
if ($jenis == 'Kajian') {
  $jenis_acara = 'kajian';
} else if ($jenis == 'Jumatan') {
  $jenis_acara = 'jumatan';
} else {

  $jenis_acara = 'haribesarislam';
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php
      echo $jenis;
      ?>
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Acara</li>
    </ol>
  </section>

  <section class="content">
    <!-- buat button tambah data acara -->
    <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
      Tambah Data Acara</button>
    <table class="table">
      <tr>
        <th>No.</th>
        <th>Jenis acara</th>
        <th>Nama Acara</th>
        <th>Tanggal Acara</th>
        <th>Nama Penceramah</th>
        <th colspan="2" style="text-align:center">Aksi</th>
      </tr>
      <?php
      $no = 1;
      foreach ($acara as $acr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $acr->JENIS_ACARA ?></td>
          <td><?php echo $acr->NAMA_ACARA ?></td>
          <td><?php echo $acr->TGL_ACARA ?></td>
          <td><?php echo $acr->NAMA_PENCERAMAH ?></td>
          <td onclick="return confirm('Apakah Yakin Anda ingin menghapus?')">
            <?php echo anchor('acara/hapus/' . $acr->ID_ACARA, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?>
          </td>

          <td>
            <?php echo anchor('acara/edit/' . $acr->ID_ACARA, '<div class="btn btn-primary btn-sm"><i class ="fa fa-edit"></i></div>') ?>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </section>


  <!-- Button trigger modal boostrap-->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Form Input Data Acara</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url() ?>acara/tambah_aksi/<?php echo $jenis_acara . '/' . $jenis ?>
                                      ">
            <!-- acara iki controller e, tambah_aksi function, / parameter e ada 2(method,ambe param) -->

            <div class="form-group">
              <label>Jenis Acara</label>
              <select onchange="yesnoCheck(this);" class="form-control" name="JENIS_ACARA" value="
            <?php echo $acr->JENIS_ACARA ?>">
                <option value="" disabled selected>---Pilih Jenis Acara---</option>
                <option value="Kajian">Kajian</option>
                <option value="Jumatan">Jumatan</option>
                <option value="Hari Besar Islam">Hari Besar Islam</option>
              </select>
            </div>

            <div class="form-group">
              <label>Nama Acara</label>
              <input type="text" name="NAMA_ACARA" class="form-control" placeholder="Isikan Nama Acara" required>
            </div>

            <div class="form-group">
              <label>Tema Acara</label>
              <input type="text" name="TEMA_ACARA" class="form-control" placeholder="Isikan Tema Acara" required>
            </div>

            <div class="form-group">
              <label>Tanggal Acara</label>
              <input type="date" name="TGL_ACARA" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Nama Penceramah</label>
              <select class="form-control" name="ID_PENCERAMAH">

                <?php
                echo '<option value="" disabled selected>---Pilih Nama Penceramah---</option>';
                foreach ($penceramah as $pcrmh) {
                  echo '<option value="' . $pcrmh->ID_PENCERAMAH . '">' . $pcrmh->NAMA_PENCERAMAH . '</option>';
                }
                ?>
              </select>
            </div>


            <div class="form-group" id="ifYes" style="display: none;">
              <label>Nama Bilal</label>
              <select class="form-control" name="ID_BILAL">

                <?php
                echo '<option value="" disabled selected>---Pilih Nama Bilal---</option>';
                foreach ($bilal as $bil) {
                  echo '<option value="' . $bil->ID_BILAL . '">' . $bil->NAMA_BILAL . '</option>';
                }
                ?>
              </select>
            </div>


            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function yesnoCheck(that) {
    if (that.value == "Jumatan") {
      //   alert("check");
      document.getElementById("ifYes").style.display = "block";
    } else {
      document.getElementById("ifYes").style.display = "none";
    }
  }
</script>