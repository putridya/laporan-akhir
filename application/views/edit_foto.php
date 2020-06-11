<div class="content-wrapper">
    <section class="content">
        <?php foreach ($foto as $ft) {
            echo form_open_multipart('foto/update');
            ?>
            <!-- membuat function update didlm controllers acara -->
                <!-- membuat inputnya -->
                <div class="form-group">
                    <label>Jenis Acara</label>
                    <select onchange="yesnoCheck(this);" class="form-control" name="JENIS_ACARA" value="<?php echo $acr->JENIS_ACARA ?>">
                        <?php $jenis = array("Kajian", "Jumatan", "Hari Besar Islam"); ?>
                        <option value="" disabled selected>---Pilih Jenis Acara---</option>
                        <?php foreach ($jenis as $jns) {
                            if ($jns == $ft->JENIS_ACARA) {
                                echo "<option name='JENIS_ACARA' value='$jns' selected>$jns</option>";
                            } else {
                                echo "<option name='JENIS_ACARA' value='$jns'>$jns</option>";
                            }
                        } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Acara</label>
                    <input type="hidden" name="ID_ACARA" class="form-control" value="<?php echo $ft->ID_ACARA; ?>">
                    <input type="text" name="NAMA_ACARA" class="form-control" placeholder="Isikan Nama Acara" required value="<?php echo $ft->NAMA_ACARA; ?>">
                </div>

                <?php
                if ($ft->PAMFLET_ACARA == '') { ?>
                    <label>Belum Ada Gambar</label><br>
                <?php } else { ?>
                    <div class="form-group">
                        <label>Upload Pamflet</label><br>
                        <img width="200" src="<?php echo base_url(); ?>upload/foto/<?php echo $ft->PAMFLET_ACARA ?>" alt=""> <?php } ?>
                    <input type="file" name="PAMFLET_ACARA" class="form-control" >
                </div>

                <?php
                if ($ft->FOTO == '') { ?>
                    <label>Belum Ada Gambar</label><br>
                <?php } else { ?>
                    <div class="form-group">
                        <label>Upload Foto</label><br>
                        <img width="200" src="<?php echo base_url(); ?>upload/foto/<?php echo $ft->FOTO ?>" alt=""> <?php } ?>
                    <input type="file" name="FOTO" class="form-control" >
                </div>


                <div class="form-group">
                    <label>Video Acara</label>
                    <input type="text" name="VIDEO_ACARA" class="form-control" required value="<?php echo $ft->VIDEO_ACARA; ?>" > 
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
            
        <?php echo form_close();
    } ?>
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