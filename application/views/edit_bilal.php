<div class="content-wrapper">
    <section class="content">
        <?php foreach ($bilal as $bilal) {//bilal as pcrmh diambil dari variable $data yg ada di controller ?>  
        <!-- membuat function update didlm controllers bilal -->
        <form action="<?php echo base_url().'bilal/update'; ?>" method="post"> 
        <!-- membuat inputnya -->
        <div class="form-group">
            <label >Nama Bilal</label>
            <input type="hidden" name="id_bilal" class="form-control" value="<?php echo $bilal->ID_BILAL ?>">
            <input type="text" name="nama_bilal" class="form-control" value="<?php echo $bilal->NAMA_BILAL ?>">
          </div> 
        
    
        <div class="form-group">
            <label >No Telp Bilal</label>
            <input type="text" name="no_telp_bilal" class="form-control" value="<?php echo $bilal->NO_TELP_BILAL ?>">
        </div>

        <div class="form-group">
            <label >Alamat bilal</label>
            <input type="text" name="alamat_bilal" class="form-control" value="<?php echo $bilal->ALAMAT_BILAL ?>">
        </div>
        
        <button type="reset" class="btn btn-danger" >Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <?php } ?>
    </section>

</div>