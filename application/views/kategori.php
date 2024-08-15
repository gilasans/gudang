
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
    <div class="col-xs-12">
      <div class="box">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="box-header">
          <h3 class="box-title"><?= $title ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
              $no = 1;
              foreach ($kategori as $key) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $key->kategori ?></td>
                  <td>
                    <!-- Edit Button -->
                    <button type="button" data-toggle="modal" data-target="#edit<?= $key->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <!-- Hapus Button -->
                    <a href="<?= base_url('kategori/hapus/' . $key->id) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <!-- Modal Edit -->
                <div class="modal fade" id="edit<?= $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $key->id ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <h5 class="modal-title" id="editModalLabel<?= $key->id ?>">Edit Data Kategori</h5>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('kategori/update') ?>" method="POST">
                          <input type="hidden" name="id" value="<?= $key->id ?>">
                          <div class="form-group">
                            <label for="editKategori<?= $key->id ?>">Nama Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="editKategori<?= $key->id ?>" placeholder="Nama Kategori" value="<?= $key->kategori ?>">
                            <?= form_error('kategori', '<div class="text-small text-danger">', '</div>') ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>
