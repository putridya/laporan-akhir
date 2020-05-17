<div class="content-wrapper">
    <section class="content">
        <?php foreach ($penceramah as $pcrmh) {//penceramah as pcrmh diambil dari variable $data yg ada di controller ?>  
        <!-- membuat function update didlm controllers penceramah -->
        <form action="<?php echo base_url().'penceramah/update'; ?>" method="post"> 
        <!-- membuat inputnya -->
        <div class="form-group">
            <label >Nama Penceramah</label>
            <input type="hidden" name="id_penceramah" class="form-control" value="<?php echo $pcrmh->ID_PENCERAMAH ?>">
            <input type="text" name="nama_penceramah" class="form-control" value="<?php echo $pcrmh->NAMA_PENCERAMAH ?>">
          </div> 
        
    
        <div class="form-group">
            <label >No Telp</label>
            <input type="text" name="no_telp" class="form-control" value="<?php echo $pcrmh->NO_TELP ?>">
        </div>

        <div class="form-group">
            <label >Alamat Penceramah</label>
            <input type="text" name="alamat_penceramah" class="form-control" value="<?php echo $pcrmh->ALAMAT_PENCERAMAH ?>">
        </div>
        
        <button type="reset" class="btn btn-danger" >Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <?php } ?>
    </section>

</div>