<div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Bilal
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Bilal</li>
      </ol>
    </section>

    <section class = "content">
    <!-- buat button tambah data bilal -->
    <button class = "btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class ="fa fa-plus"></i>
    Tambah Data Bilal</button>
    <table class="table"> 
            <tr>
                <th>No.</th>
                <th>Nama Bilal</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th colspan = "2" style="text-align:center" >Aksi</th>
            </tr>
            <?php
              $no = 1 ;
              foreach ($bilal as $bil) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $bil->NAMA_BILAL ?></td>
                <td><?php echo $bil->NO_TELP_BILAL ?></td>
                <td><?php echo $bil->ALAMAT_BILAL ?></td>
                <td onclick="return confirm('Apakah Yakin Anda ingin menghapus?')">
                  <?php echo anchor('bilal/hapus/'.$bil->ID_BILAL, '<div class="btn btn-danger btn-sm"><i class ="fa fa-trash"></i></div>')?>
                </td>
                
                <td>
                  <?php echo anchor('bilal/edit/'.$bil->ID_BILAL, '<div class="btn btn-primary btn-sm"><i class ="fa fa-edit"></i></div>')?>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Bilal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" 
        action="<?php echo base_url().'bilal/tambah_aksi';//method tambah aksi u/penambah data didb ?>">
          
          <div class="form-group">
            <label >Nama Bilal</label>
            <input type="text" name="nama_bilal" class="form-control" required>
          </div> 
        
          <div class="form-group">
            <label >No Telp Bilal</label>
            <input type="text" name="no_telp_bilal" class="form-control" required>
          </div>

          <div class="form-group">
            <label >Alamat Bilal</label>
            <input type="text" name="alamat_bilal" class="form-control" required>
          </div>
        
        <button type="reset" class="btn btn-danger" >Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form> 
      </div>
    
    </div>
  </div>
</div>
</div>
