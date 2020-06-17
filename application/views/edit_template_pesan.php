<div class="content-wrapper">
    <section class="content">
        <?php foreach ($template_pesan as $acr) {
            ?>
            <!-- membuat function update didlm controllers penceramah -->
            <form action="<?php echo base_url() . 'template_pesan/update'; ?>" method="post">
                <!-- membuat inputnya -->
                <div class="form-group">
                    <label>Jenis Acara</label>
                    <select onchange="yesnoCheck(this);" class="form-control" name="JENIS_ACARA" value="<?php echo $acr->JENIS_ACARA ?>">
                        <?php $jenis = array("Kajian", "Jumatan", "Hari Besar Islam"); ?>
                        echo '<option value="" disabled selected>---Pilih Jenis Acara---</option>';
                        <?php foreach ($jenis as $jns) {
                            if ($jns == $acr->JENIS_ACARA) {
                                echo "<option name='JENIS_ACARA' value='$jns' selected>$jns</option>";
                            } else {
                                echo "<option name='JENIS_ACARA' value='$jns'>$jns</option>";
                            }
                        } ?>
                    </select>
                </div>

                <!-- <div class="form-group">
                                <label>Nama Acara</label>
                                <input type="hidden" name="ID_ACARA" class="form-control" value="<?php echo $acr->ID_ACARA; ?>">
                                <input type="text" name="NAMA_ACARA" class="form-control" placeholder="Isikan Nama Acara" required value="<?php echo $acr->NAMA_ACARA; ?>">
                            </div> -->

                <div class="form-group">
                    <label>Isi Pesan</label>
                    <input type="hidden" name="ID_TEMPLATE" class="form-control" value="<?php echo $acr->ID_TEMPLATE ?>">
                    <input type="text" name="ISI_PESAN" class="form-control" value="<?php echo $acr->ISI_PESAN ?>">
                </div>


                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        <?php } ?>
    </section>

</div>
<!-- <script type="text/javascript">
    function yesnoCheck(that) {
        if (that.value == "Jumatan") {
            //   alert("check");
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
</script> -->