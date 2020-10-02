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
              <section class="container-fluid">
              <div class="row">
                <div class="form-input clearfix">
                  <div class="col-md-12">

                    <div class="panel panel-primary">
                      <div class="panel-heading"><h4>Edit Data Dokumen Tugas Akhir</h4></div>
                      <div class="panel-body">
                      
                        <?= form_open_multipart('upload/update/'.$berkas['id']); ?>
                        <div hidden class="form-group">
                          <label for="nama">id :</label>
                          <input type="text" class="form-control" id="email" name="email" value="<?= set_value('id', $berkas['id']);?>" readonly>
                        </div>
                          <div class="form-group">
                            <label for="judul" class="control-label col-sm-2">Judul Proposal : </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="judul" value="<?=  set_value('judul', $berkas['judul']);?>">
                              <?= form_error('judul','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>
                          <br>

                          <!-- propotery form textarea -->
                          <?php $data = array(
                                  'name'        => 'deskripsi',
                                  'id'          => 'deskripsi',
                                  'value'       => set_value('deskripsi',$berkas['deskripsi']),
                                  'class'       => 'form-control'
                              );
                          ?>
                          <!--  -->
                          

                          <div class="form-group">
                            <label for="deskripsi" class="control-label col-sm-2">Deskripsi Proposal : </label>
                            <div class="col-sm-10">
                            
                            <?= form_textarea($data);?>
                            <?= form_error('deskripsi','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div> 
                          <br>
                          <div class="form-group">
                            <label for="pembimbing1" class="control-label col-sm-2">Nama Pembimbing 1 :</label><br> 
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="pembimbing1" value="<?= set_value('pembimbing1', $berkas['pembimbing1']); ?>">
                              <?= form_error('pembimbing1','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>
                          <br>
                          <div class="form-group">
                            <label for="pembimbing2" class="control-label col-sm-2">Nama Pembimbing 2 : </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="pembimbing2" value="<?= set_value('pembimbing2', $berkas['pembimbing2']);?>">
                              <?= form_error('pembimbing2','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="kompetensi" class="control-label col-sm-2">Kompetensi : </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="kompetensi" value="<?= set_value('kompetensi', $berkas['kompetensi']);?>">
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
                              <a href="<?= base_url(). 'upload/lihatdata'; ?>"><button type="button" class='btn btn-default'>Batal</button></a>
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

          </form>
<!-- FORM -->

    </section>
    <!-- /.content -->
  </div>
  