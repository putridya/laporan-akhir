<div class="content-wrapper">
    <section class="content">
        <?php foreach ($foto as $ft) {
            ?>
            <!-- membuat function update didlm controllers acara -->
            <form action="<?php echo base_url() . 'foto/update'; ?>" method="post">
                <!-- membuat inputnya -->
                <div class="form-group">
                    <label>Jenis Acara</label>
                    <select id="jenis" class="form-control jenis" name="JENIS_ACARA">
                        <option value="" disabled selected>---Pilih Jenis Acara---</option>
                        <?php
                        $count_jenis = 0;
                        foreach ($tampil_jenis as $acr) {
                            echo '<option value="' . $count_jenis . '_' . $acr->JENIS_ACARA . '_' . count($tampil_jenis) . '">' . $acr->JENIS_ACARA . '</option>';
                            $count_jenis++;
                        }
                        ?>
                    </select>
                </div>

                <?php
                $count_acara = 0;
                foreach ($tampil_jenis as $j_acr) {
                    ?>
                    <div class="form-group" id="<?php echo $count_acara . '_' . 'pilihanAcara'; ?>" style="display: none;">
                        <label>Nama Acara</label>
                        <select class="form-control" name="NAMA_ACARA">
                            <?php
                            echo '<option value="" disabled selected>---Pilih Nama Acara---</option>';
                            foreach ($tampil_acara as $acr) {
                                if ($j_acr->JENIS_ACARA == $acr->JENIS_ACARA) {
                                    echo '<option value="' . $acr->NAMA_ACARA . '">' . $acr->NAMA_ACARA;
                                    echo "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                    $count_acara++;
                } ?>

                <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="FOTO" class="form-control" placeholder="Isikan foto acara" required>
                </div>
                <div class="form-group">
                    <label>Upload Pamflet</label>
                    <input type="file" name="PAMFLET_ACARA" class="form-control" placeholder="Isikan Tema Acara" required>
                </div>
                <div class="form-group">
                    <label>Video Acara</label>
                    <input type="text" name="VIDEO_ACARA" class="form-control" placeholder="upload link acara " required>
                </div>


                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        <?php } ?>
    </section>

</div>