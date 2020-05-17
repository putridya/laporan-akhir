<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Ringkasan Acara Bulan ini</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Jenis Acara</th>
                  <th>Nama Acara</th>
                  <th>Tanggal</th>
                </tr>
                <?php
                $no = 1;
                foreach ($thismonth as $acr) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $acr->JENIS_ACARA ?></td>
                    <td><?php echo $acr->NAMA_ACARA ?></td>
                    <td><?php echo $acr->TGL_ACARA ?></td>
                  </tr>
                <?php endforeach ?>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
        </div>
        <!-- /.box -->

        <!-- Form Element sizes -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Ringkasan Acara Minggu Depan</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Jenis Acara</th>
                  <th>Nama Acara</th>
                  <th>Tanggal</th>
                </tr>
                <?php
                $no = 1;
                foreach ($nextweek as $acr) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $acr->JENIS_ACARA ?></td>
                    <td><?php echo $acr->NAMA_ACARA ?></td>
                    <td><?php echo $acr->TGL_ACARA ?></td>
                  </tr>
                <?php endforeach ?>
              </table>
            </div>
            <!-- /.box-body -->
          </form>
        </div>
        <!-- /.box -->
        <!-- ------------------------------------------------------------------------ -->

      </div>
      <!--/.col (left) -->
      <!-- right column -->

      <div class="col-md-6">
        <div class="box box-warning">
          <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id="calendar1"></div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->