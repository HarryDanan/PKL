  <!-- Content Wrapper. Contains page content -->
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
     
     <!-- FORM -->
 <!-- FORM -->
<!--  -->
    <section class="container-fluid">
      <div class="row">
        <div class="form-input clearfix">
          <div class="col-md-12">
            
            <?php
              if(isset($_SESSION['input_sukses']))
              {
            ?>
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sukses!</strong> <?php echo $_SESSION['input_sukses']; ?>
                </div>
            <?php
              }else if (isset($_SESSION['input_gagal'])){
            ?>
              <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sukses!</strong> <?php echo $_SESSION['input_gagal']; ?>
              </div>
            <?php
              }
            ?>

            <div class="panel panel-primary">
              <div class="panel-heading"><h4>Data Dokumen Tugas Akhir</h4></div>
              <div class="panel-body">
  
                
                <?= form_open_multipart('upload/tambah');?>

                <div hidden class="form-group">
                  <label for="nim" class="control-label col-sm-2">nim : </label><?= form_error('nim','<small class="text-danger">','</small>'); ?>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nim" value="<?=  set_value('nim');?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="judul" class="control-label col-sm-2">Judul Proposal : </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul" value="<?=  set_value('judul');?>">
                    <?= form_error('judul','<small class="text-danger">','</small>'); ?>
                  </div>
                </div>
                  
                  
                  <br>

                  <div class="form-group">
                    <label for="deskripsi" class="control-label col-sm-2">Deskripsi Proposal : </label></label><br>
                    <div class="col-sm-10">
                      <textarea type="text" style="height : 200px;"class="form-control" name="deskripsi" value="<?= set_value('deskripsi'); ?>"></textarea>
                      <?= form_error('deskripsi','<small class="text-danger">','</small>'); ?>
                    </div>
                  </div>              

                  <div class="form-group">
                    <label for="pembimbing1" class="control-label col-sm-2">Nama Pembimbing 1 : </label></label><br>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pembimbing1" value="<?= set_value('pembimbing1'); ?>">
                      <?= form_error('pembimbing1','<small class="text-danger">','</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pembimbing2" class="control-label col-sm-2">Nama Pembimbing 2 : </label></label><br>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pembimbing2" value="<?= set_value('pembimbing2'); ?>">
                      <?= form_error('pembimbing2','<small class="text-danger">','</small>'); ?>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="kompetensi" class="control-label col-sm-2">Nama Pembimbing 2 : </label></label><br>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kompetensi" value="<?= set_value('kompetensi'); ?>">
                      <?= form_error('kompetensi','<small class="text-danger">','</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tipe_file" class="control-label col-sm-2">Tipe File :</label><br>
                    <!-- <div class="control-label col-sm-1"> -->
                    <div style="padding-left : 18%;">
                    <input type="radio" name="tipe_file" value="Proposal" <?php echo set_radio('tipe_file', 'Proposal'); ?> />Proposal
                    <input type="radio" name="tipe_file" value="Skripsi" <?php echo set_radio('tipe_file', 'Skripsi'); ?> /> Skripsi  
                    <br><?= form_error('tipe_file','<small class="text-danger">','</small>'); ?>
                    </div> 
                    <!-- </div>                      -->
                  </div>

                  <div hidden class="form-group">
                    <label for="email" class="control-label col-sm-2">email : </label></label><br>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" value="<?= $mahasiswa['email']; ?>"readonly>
                      <?= form_error('email','<small class="text-danger">','</small>'); ?>
                    </div>
                  </div>

                  <div hidden class="form-group">
                    <label for="status" class="control-label col-sm-2">status : </label></label><br>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="status" value="BELUM DIPERIKSA"readonly>
                      <?= form_error('status','<small class="text-danger">','</small>'); ?>
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <label  class="control-label col-sm-2"for="file">File Dokumen :</label>
                      <div class="col-sm">
                        <div class="row">
                          <div class="col-sm">
                            <div style="padding-left : 18.5%;" class="custom-file">
                              <input type="file" class="custom-file-input" id="file" name="file">
                              <label class="custom-file-label" for="file">Choose file</label>
                              
                              <div style="padding-left :%;">
                              <?= form_error('file','<small class="text-danger">','</small>'); ?>
                                <h6 >*Extension File yang diterima : PDF, DOC, DOCX</h6>
                                <h6>*Ukuran file Maximum : 10mb</h6><br>
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>
                   </div>

                  <div class="form-group">
                    <div class="btn-form col-sm-12">
                      <a href="<?= base_url().'upload/lihatdata'; ?>"><button type="button" class='btn btn-default'>Batal</button></a>
                      <button type="submit" class='btn btn-primary'>Simpan</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!--  -->
</section>
      <!-- /.row (main row) -->
    <!-- /.content -->
</div>