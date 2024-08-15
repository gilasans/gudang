    
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
              <h3 class="box-title">Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('barang/tambah_aksi') ?>" method="POST">
            <div class="box-body">
                    <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                  <label for="exampleInputPassword1">Masukan barang</label>
                                  <input type="text" name="barang" class="form-control" id="exampleInputBarang1" placeholder="Barang">
                                </div> 
                                <?= form_error('barang', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Masukan Stok</label>
                                  <input type="number" name="stok" class="form-control" id="exampleInputStok1" placeholder="Stok">
                                  <?= form_error('stok'), '<div class="text-small text-danger">','</div>'?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                             <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option hidden> Masukan kategori</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k->id ?>"><?= $k->kategori ?></option>
                                <?php endforeach; ?>
                                <?= form_error('kategori'), '<div class="text-small text-danger">','</div>'?>
                               </div>
                            </div>
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
   