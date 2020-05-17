<div class="content-wrapper">
    <section class="content">
        <?php foreach ($acara as $acr) {//acara as acr diambil dari variable $data yg ada di controller ?>  
        <!-- membuat function update didlm controllers acara -->
        <form action="<?php echo base_url().'acara/update'; ?>" method="post"> 
        <!-- membuat inputnya -->
        <div class="form-group">
            <label >Jenis Acara</label>
            <select onchange="yesnoCheck(this);" class="form-control" name="jenis_acara" value="
            <?php echo $acr->jenis_acara ?>" >
            <option value="" disabled selected>---Pilih Jenis Acara---</option>
                <option>Kajian</option>
                <option value="jumatan">Jumatan</option>
                <option>Hari Besar Islam</option>
            </select>
          </div> 
        
          <div class="form-group">
            <label >Nama Acara</label>
            <input type="text" name="nama_acara" class="form-control" placeholder="Isikan Nama Acara" required>
          </div>

          <div class="form-group">
            <label >Tema Acara</label>
            <input type="text" name="tema_acara" class="form-control" placeholder="Isikan Tema Acara" required>
          </div>

          <div class="form-group">
            <label >Tanggal Acara</label>
            <input type="date" name="tgl_acara" class="form-control" required>
          </div>

          <div class="form-group">
            <label >Nama Penceramah</label>
            <select class="form-control">
            
            <?php 
            echo '<option value="" disabled selected>---Pilih Nama Penceramah---</option>';  
            foreach($penceramah as $pcrmh)
            { 
              echo '<option name="id_penceramah" value="'.$pcrmh->ID_PENCERAMAH.'">'.$pcrmh->NAMA_PENCERAMAH.'</option>';
            }
            ?>
            </select>
          </div>   
          <div class="form-group" id="ifYes" style="display: none;">
            <label >Nama Bilal</label>
            <input type="text" name="tema_acara" class="form-control" placeholder="Isikan Nama Bilal" >
          </div>
        
        <button type="reset" class="btn btn-danger" >Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <?php } ?>
    </section>

</div>