<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Artikel
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Artikel</li>
        </ol>
    </section>

    <section class="content">
        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
            Tambah Data Artikel</button>
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Judul Artikel</th>
                <th>Isi Artikel</th>
                <th>Tanggal Artikel</th>
                <th>Foto Artikel</th>
                <th colspan="2" style="text-align:center">Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($artikel as $art) : ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $art->JUDUL_ARTIKEL ?></td>
                    <td><?php echo $art->ISI_ARTIKEL ?></td>
                    <td><?php echo $art->TGL_ARTIKEL ?></td>
                    <td><img width="200" src="<?php echo base_url(); ?>upload/artikel/<?php echo $art->FOTO_ARTIKEL ?>" alt="">
                    </td>
                    <td onclick="return confirm('Apakah Yakin Anda ingin menghapus?')">
                        <?php echo anchor('user/edit/artikel_admin/hapus/' . $art->ID_ARTIKEL, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?>
                    </td>

                    <td>
                        <?php echo anchor('user/edit/artikel_admin/edit/' . $art->ID_ARTIKEL, '<div class="btn btn-primary btn-sm"><i class ="fa fa-edit"></i></div>') ?>
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
                    <h4 class="modal-title" id="exampleModalLabel">Form Input Data Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('user/edit/artikel_admin/tambah_aksi'); ?>

                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="JUDUL_ARTIKEL" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea name="ISI_ARTIKEL" id="" cols="30" rows="10" style="width: 568px;height: 114px">

            </textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Artikel</label>
                        <input type="date" name="TGL_ARTIKEL" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto Artikel</label>
                        <input type="file" name="FOTO_ARTIKEL" class="form-control" required>
                    </div>

                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <?php echo form_close(); ?>

                </div>

            </div>
        </div>
    </div>
</div>