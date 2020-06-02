<div class="content-wrapper">
    <section class="content">
        <?php foreach ($foto as $ft) {
            ?>
            <!-- membuat function update didlm controllers acara -->
            <form action="<?php echo base_url() . 'foto/update'; ?>" method="post">
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
                        <label>Upload Pamflet</label>
                        <img width="200" src="<?php echo base_url(); ?>upload/pamflet/<?php echo $ft->PAMFLET_ACARA ?>" alt=""> <?php } ?>
                    <input type="file" name="FOTO" class="form-control" style="width: 50%">
                </div>

                <?php
                if ($ft->FOTO == '') { ?>
                    <label>Belum Ada Gambar</label><br>
                <?php } else { ?>
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <img width="200" src="<?php echo base_url(); ?>upload/<?php echo $ft->FOTO ?>" alt=""> <?php } ?>
                    <input type="file" name="FOTO" class="form-control" style="width: 50%">
                </div>


                <div class="form-group">
                    <label>Video Acara</label>
                    <input type="text" name="VIDEO_ACARA" class="form-control" required value="<?php echo $ft->VIDEO_ACARA; ?>" </div> <button type="reset" class="btn btn-danger">Reset</button>
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