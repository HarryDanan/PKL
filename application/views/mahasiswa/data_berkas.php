  <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- <?= $title; ?> -->
        <!-- <small>Control panel</small> -->
      </h1>
      <!--  -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
          <h4>Pengumuman!</h4>
          <p>Dokumen Tugas Akhir baik Proposal maupun Tugas Akhir yang diupload merupakan dokumen yang telah direvisi dan akan diajukan</p>
        </div>
      <div class="row">  
      </div>
      <!-- /.row -->
          <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <?php
            if(isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
              $notif = '';

              isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
              isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
          ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sukses!</strong> <?php echo $notif; ?>
              </div>
          <?php
            endif;
            if(isset($_SESSION['update_gagal'])){
          ?>
              <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Gagal!</strong> <?php echo $notif; ?>
              </div>
          <?php
            }
          ?>

          <div class="panel panel-primary">
            <div class="panel-heading"><h4>Data Tugas Akhir</h4></div>
            <div class="panel-body">
              <div class="col-md-12" style="padding-bottom: 15px;">
                <a href="<?php echo base_url('upload/formtambah'); ?>">
                  <button type="button" class="btn btn-primary"><span class="fa fa-cloud-upload"></span> Submit Dokumen</button> 
                </a>
              </div>

              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Tipe Dokumen</th>
                        <th>File Dokumen</th>
                        <th>Status</th>
                        <th>Nilai</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($berkas as $db) : ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?= $db['judul']; ?></td>
                            <td><?= $db['tipe_file']; ?></td>
                            <td><?= $db['file']; ?></td>
                            <td><?= $db['status']; ?></td>
                            <td><?= $db['nilai']; ?></td>
                            <td>
                              <a href="<?php echo base_url().'upload/download_file/'.$db['id']; ?>"><button class="btn btn-success btn-sm"><span class="fa fa-cloud-download"></button></span></a>
                              <a href="<?php echo base_url().'upload/formedit/'.$db['id']; ?>"><button type="button" class="btn btn-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></button></a>
                              <a href="<?php echo base_url().'upload/hapusdata/'.$db['id']; ?>" onclick="return confirm('Anda yakin hapus ?')"><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button></a>
                            </td>
                          </tr>
                      <?php
                        $no++;
                        endforeach;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- Main row -->
    
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  