<div class="content-wrapper">
    <section class="content" >
        <h3>Edit Data Artikel</h3><hr>
        <?php foreach ($artikel as $art) { //acara as acr diambil dari variable $data yg ada di controller 
            echo form_open_multipart('user/edit/artikel_admin/update'); ?>
            <!-- membuat function update didlm controllers acara -->

            <!-- membuat inputnya -->

            <input type="hidden" name="ID_ARTIKEL" value="<?php echo $art->ID_ARTIKEL ?>">
            <div class="form-group">
                <label>Judul Artikel</label>
                <input value="<?php echo $art->JUDUL_ARTIKEL ?>" style="width: 50%" type="text" name="JUDUL_ARTIKEL" class="form-control" placeholder="Isikan Nama Artikel" required>
            </div>

            <div class="form-group">
                <label>Isi Artikel</label><br>
                <textarea name="ISI_ARTIKEL" id="" cols="30" rows="10" style="width: 500px;height: 114px" placeholder="Isikan Tema Artikel" required>
                <?php echo $art->ISI_ARTIKEL ?>
                        </textarea>
            </div>

            <div class="form-group">
                <label>Tanggal Artikel</label>
                <input type="date" value="<?php echo $art->TGL_ARTIKEL ?>" style="width: 50%" name="TGL_ARTIKEL" class="form-control" required>
            </div>

            <?php
            if ($art->FOTO_ARTIKEL == '') { ?>
                <label>Belum Ada Gambar</label><br>
            <?php } else { ?>
                <div class="form-group">
            
            <img width="200" src="<?php echo base_url(); ?>upload/artikel/<?php echo $art->FOTO_ARTIKEL ?>" alt="">            <?php } ?>
            <input type="file" name="FOTO_ARTIKEL" class="form-control" style="width: 50%">
            </div>


            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
            <!-- </form> -->
        <?php
            echo form_close();
        } ?>
    </section>

</div>