<?php
$jenis = $_GET['jenis'];
$jenis_acara;
if ($jenis == 'Kajian') {
    $jenis_acara = 'kajian';
} else if ($jenis == 'Jumatan') {
    $jenis_acara = 'jumatan';
} else {

    $jenis_acara = 'haribesarislam';
}
?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('select.jenis').change(function() {
            var selectedJenis = $(this).children('option:selected').val();
            for (var i = 0; i < selectedJenis.split('_')[2]; i++) {
                if (selectedJenis.split('_')[0] == i) {
                    document.getElementById(i + '_pilihanAcara').style.display = 'block';
                } else {
                    document.getElementById(i + '_pilihanAcara').style.display = 'none';
                }
            }
            // document.getElementById('id' + selectedJenis).style.display = 'block';
        });
    });
</script>
<script type="text/javascript">
    ambilJenis();

    function ambilJenis() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "index.php/foto" ?>',
            dataType: 'json',
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo $jenis;
            ?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Acara</li>
        </ol>
    </section>

    <section class="content">
        <!-- buat button tambah data acara -->
        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
            Tambah Dokumentasi</button>
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Jenis acara</th>
                <th>Nama Acara</th>
                <th>Upload Foto</th>
                <!-- <th>Upload Pamflet</th>
                <th>Upload Video</th> -->
                <th colspan="2" style="text-align:center">Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($foto as $ft) : ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $ft->JENIS_ACARA ?></td>
                    <td><?php echo $ft->NAMA_ACARA ?></td>
                    <td>
                        <img width="200" src="<?php echo base_url(); ?>upload/<?php echo $ft->FOTO ?>" alt="">
                    </td>
                    <td style="text-align: center" onclick="return confirm('Apakah Yakin Anda ingin menghapus?')">
                        <?php echo anchor('foto/hapus/' . $ft->ID_FOTO, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?>
                        <?php echo anchor('foto/edit/' . $ft->ID_FOTO, '<div class="btn btn-primary btn-sm"><i class ="fa fa-edit"></i></div>') ?>
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
                    <h4 class="modal-title" id="exampleModalLabel">Form Input Dokumentasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('foto/tambah_aksi/' . $jenis_acara . '/' . $jenis); ?>

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
                        <label>Upload Video</label>
                        <input type="file" name="VIDEO_ACARA" class="form-control" placeholder="Isikan Tema Acara" required>
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    function yesnoCheck(that) {
        if (that.value == "jumatan") {
            //   alert("check");
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
</script> -->