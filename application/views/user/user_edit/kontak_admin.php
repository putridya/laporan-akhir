<div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Kritik dan Saran dari Pengguna
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Kritik dan Saran dari Pengguna</li>
      </ol>
    </section>

    <section class = "content">
    
    <table class="table"> 
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Email User</th>
                <th>Kritik dan Saran</th>
                <th colspan = "2" style="text-align:center" >Aksi</th>
            </tr>
            <?php
              $no = 1 ;
              foreach ($kontak as $kntk) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $kntk->NAMA_USER ?></td>
                <td><?php echo $kntk->EMAIL_USER ?></td>
                <td><?php echo $kntk->KRITIK_SARAN_USER ?></td>
                <td style="text-align: center" onclick="return confirm('Apakah Yakin Anda ingin menghapus?')">
                  <?php echo anchor('user/edit/kontak_admin/hapus/'.$kntk->ID_KONTAK, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>')?>
                </td>
                
                
            </tr>
          <?php endforeach ?>
        </table>
  
        
    
    </section>


<!-- Button trigger modal boostrap-->


<!-- Modal -->

</div>
