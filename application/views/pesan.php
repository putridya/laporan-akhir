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
            url: '<?php echo base_url() . "index.php/template_pesan" ?>',
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
            Daftar Pesan
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pesan</li>
        </ol>
    </section>

    <section class="content">
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Jenis Acara</th>
                <th>Nama Acara</th>
                <th>Tanggal Acara</th>
                <th>Nama Penceramah</th>
                <th>No Telp</th>
                <th>Isi Pesan</th>
                <th>Status</th>

                <!-- <th colspan="2" style="text-align:center">Aksi</th> -->
            </tr>
            <?php
            $no = 1;
            foreach ($kirim as $krm) :
                // $date = strtotime('-2 days',strtotime($krm->TGL_ACARA)); //2 hari sebelum tanggal
                $date = strtotime($krm->TGL_ACARA);
                $date_now = date('d M Y');
                $date_convert = date('d M Y', $date);

            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $krm->JENIS_ACARA ?></td>
                    <td><?php echo $krm->NAMA_ACARA ?></td>
                    <td><?php echo $date_convert ?></td>
                    <td><?php echo $krm->NAMA_PENCERAMAH ?></td>
                    <td><?php echo $krm->NO_TELP ?></td>
                    <td><?php echo $krm->ISI_PESAN ?></td>
                    <td><?php echo $krm->STATUS ?></td>
                    <!-- <td onclick="return confirm('Apakah Yakin Anda ingin menghapus?')">
                        <?php echo anchor('template_pesan/hapus/' . $krm->ID_TEMPLATE, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?>
                    </td> -->

                    <!-- <td>
                        <?php echo anchor('template_pesan/edit/' . $krm->ID_TEMPLATE, '<div class="btn btn-primary btn-sm"><i class ="fa fa-edit"></i></div>') ?>
                    </td> -->

                    <!-- <td>
                        <?php echo anchor('pesan/kirim_pesan/' . $krm->ID_TEMPLATE, '<button type="button" id="send" name="send' . $krm->ID_TEMPLATE . '" class="btn btn-primary btn-sm"><i class ="fa fa-edit"> Kirim Pesan</i></button>') ?>
                    </td> -->

                </tr>
            <?php


            endforeach ?>
        </table>




        <!-- buat button tambah data acara -->
        <!-- <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
            Tambah Pesan</button> -->
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Jenis Acara</th>
                <th>Nama Acara</th>
                <th>Tanggal Acara</th>
                <th>Nama Penceramah</th>
                <th>No Telp</th>
                <th>Isi Pesan</th>
                <th>Status</th>

                <!-- <th colspan="2" style="text-align:center">Aksi</th> -->
            </tr>
            <?php
            $no = 1;
            
            foreach ($pesan as $psn) :
                // $date = strtotime('-2 days',strtotime($psn->TGL_ACARA)); //2 hari sebelum tanggal
                $date = strtotime($psn->TGL_ACARA);
                $date_now = date('d M Y');
                $date_convert = date('d M Y', $date);

                // echo $date_now . "</br>";

                // echo $date_convert . "</br>";
                //     if ($date_convert == $date_now) {
                //     // echo base_url('pesan/kirim_pesan/' . $psn->ID_TEMPLATE);
                //     echo '<script type="text/javascript">

                //     var button=document.getElementById("send");
                //     setInterval(function(){ 
                //         button.click();
                //      }, 5000);

                // </script>';
                //     }
            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $psn->JENIS_ACARA ?></td>
                    <td><?php echo $psn->NAMA_ACARA ?></td>
                    <td><?php echo $date_convert ?></td>
                    <td><?php echo $psn->NAMA_PENCERAMAH ?></td>
                    <td><?php echo $psn->NO_TELP ?></td>
                    <td><?php echo $psn->ISI_PESAN ?></td>
                    <td><?php echo $psn->STATUS ?></td>
                    <!-- <td onclick="return confirm('Apakah Yakin Anda ingin menghapus?')">
                        <?php echo anchor('template_pesan/hapus/' . $psn->ID_TEMPLATE, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>') ?>
                    </td> -->

                    <!-- <td>
                        <?php echo anchor('template_pesan/edit/' . $psn->ID_TEMPLATE, '<div class="btn btn-primary btn-sm"><i class ="fa fa-edit"></i></div>') ?>
                    </td> -->

                    <!-- <td>
                        <?php echo anchor('pesan/kirim_pesan/' . $psn->ID_TEMPLATE, '<button type="button" id="send" name="send' . $psn->ID_TEMPLATE . '" class="btn btn-primary btn-sm"><i class ="fa fa-edit"> Kirim Pesan</i></button>') ?>
                    </td> -->

                </tr>
            <?php


            endforeach ?>
        </table>
    </section>






    <!-- Button trigger modal boostrap-->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Form Tambah Pesan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'template_pesan/tambah_aksi';
                                                ?>">
                        <div class="form-group">
                            <label>Isi Pesan</label><br>
                            <textarea name="ISI_PESAN" id="" cols="30" rows="10" style="width: 568px;height: 114px">

                        </textarea>
                            <!-- <input type="text" name="ISI_PESAN" class="form-control" required> -->
                        </div>

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
                                            // echo '<input type="hidden" value="' . $acr->ID_ACARA . '">';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        <?php
                            $count_acara++;
                        } ?>

                        <!-- <div class="form-group" id="ifYes" style="display: none;">
          <label>Nama Acara</label>
          <select class="form-control" name="ID_ACARA">
           
        </select>
    </div> -->

                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
function yesnoCheck(that) {
    if (that.value != "") {
      //   alert("check");
        var selectedJenis = $(this).children("option:selected").val();
        alert("You have selected the country - " + selectedJenis);
        document.getElementById("ifYes").style.display = "block";
  } else {
      document.getElementById("ifYes").style.display = "none";
  }
}
</script> -->