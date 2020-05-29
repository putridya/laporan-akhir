<div class="content-wrapper">
  <section class="content">
    <?php foreach ($acara as $acr) {
      ?>
      <!-- membuat function update didlm controllers acara -->
      <form action="<?php echo base_url() . 'acara/update'; ?>" method="post">
        <!-- membuat inputnya -->
        <div class="form-group">
          <label>Jenis Acara</label>
          <select onchange="yesnoCheck(this);" class="form-control" name="JENIS_ACARA" value="<?php echo $acr->JENIS_ACARA ?>">
            <?php $jenis = array("Kajian", "Jumatan", "Hari Besar Islam"); ?>
            <option value="" disabled selected>---Pilih Jenis Acara---</option>
            <?php foreach ($jenis as $jns) {
              if ($jns == $acr->JENIS_ACARA) {
                echo "<option name='JENIS_ACARA' value='$jns' selected>$jns</option>";
              } else {
                echo "<option name='JENIS_ACARA' value='$jns'>$jns</option>";
              }
            } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Nama Acara</label>
          <input type="hidden" name="ID_ACARA" class="form-control" value="<?php echo $acr->ID_ACARA; ?>">
          <input type="text" name="NAMA_ACARA" class="form-control" placeholder="Isikan Nama Acara" required value="<?php echo $acr->NAMA_ACARA; ?>">
        </div>

        <div class="form-group">
          <label>Tema Acara</label>
          <input type="text" name="TEMA_ACARA" class="form-control" placeholder="Isikan Tema Acara" required value="<?php echo $acr->TEMA_ACARA; ?>">
        </div>

        <div class="form-group">
          <label>Tanggal Acara</label>
          <input type="date" name="TGL_ACARA" class="form-control" required value="<?php echo $acr->TGL_ACARA; ?>">
        </div>

        <div class="form-group">
          <label>Nama Penceramah</label>
          <select class="form-control" name="ID_PENCERAMAH">
            <?php
            echo '<option value="" disabled selected>---Pilih Nama Penceramah---</option>';
            foreach ($penceramah as $pcrmh) {
              if ($pcrmh->ID_PENCERAMAH == $acr->ID_PENCERAMAH) {
                echo '<option name="ID_PENCERAMAH" value="' . $pcrmh->ID_PENCERAMAH . '" selected>' . $pcrmh->NAMA_PENCERAMAH . '</option>';
              } else {
                echo '<option name="ID_PENCERAMAH" value="' . $pcrmh->ID_PENCERAMAH . '">' . $pcrmh->NAMA_PENCERAMAH . '</option>';
              }
            }
            ?>
          </select>
        </div>
        <?php if ($acr->JENIS_ACARA == "Jumatan") {
          echo '<div class="form-group" id="ifYes" style="display: block;">';
        } else {
          echo '<div class="form-group" id="ifYes" style="display: none;">';
        }
        ?>
        <label>Nama Bilal</label>
        <select class="form-control" name="ID_BILAL">
          <?php
          echo '<option value="" disabled selected>---Pilih Nama Bilal---</option>';
          foreach ($bilal as $bil) {
            if ($bil->ID_BILAL == $acr->ID_BILAL) {
              echo '<option  value="' . $bil->ID_BILAL . '" selected>' . $bil->NAMA_BILAL . '</option>';
            } else {
              echo '<option  value="' . $bil->ID_BILAL . '">' . $bil->NAMA_BILAL . '</option>';
            }
          }
          ?>
        </select>

  </div>

  <button type="reset" class="btn btn-danger">Reset</button>
  <button type="submit" class="btn btn-primary">Save</button>
  </form>
<?php } ?>
</section>

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