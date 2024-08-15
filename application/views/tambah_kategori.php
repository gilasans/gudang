    
     <section class="content-header">
      <h1>
        <?= $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $title ?></li>
      </ol>
    </section>
  
    <section class="content">
        <div class="row">
            <div class="col-md-8">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('kategori/tambah_aksi') ?>" method="POST">
            <div class="box-body">
            <div class="form-group">
                                  <label for="exampleInputPassword1">Masukan Kategori</label>
                                  <input type="text" name="kategori" class="form-control" id="exampleInputKategori1" placeholder="Kategori">
                                  <?= form_error('Kategori', '<div class="text-small text-danger">', '</div>'); ?>
                                </div> 
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-danger"><i class="fas fa-paper-trash"></i> Reset</button>
            </div>
              <!-- /.box-body -->
            </form>
          </div>
            </div>
        </div>
        
    </section>
   