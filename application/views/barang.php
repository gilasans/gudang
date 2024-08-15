<!-- barang.php -->
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
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Waktu Nambah Data</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
              $no = 1;
              foreach ($barang as $key) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $key->barang ?></td>
                  <td><?= $key->kategori ?></td>
                  <td><?= $key->stok ?></td>
                  <td><?= $key->created_at ?></td>
                  <td>
                    <!-- Edit Button -->
                    <button type="button" data-toggle="modal" data-target="#edit<?= $key->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <!-- Hapus Button -->
                    <a href="<?= base_url('barang/hapus/' . $key->id) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
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
                        <h5 class="modal-title" id="editModalLabel<?= $key->id ?>">Edit Data Barang</h5>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('barang/update') ?>" method="POST">
                          <input type="hidden" name="id" value="<?= $key->id ?>">
                          <div class="form-group">
                            <label for="editBarang<?= $key->id ?>">Nama Barang</label>
                            <input type="text" name="barang" class="form-control" id="editBarang<?= $key->id ?>" placeholder="Nama Barang" value="<?= $key->barang ?>">
                            <?= form_error('barang', '<div class="text-small text-danger">', '</div>') ?>
                          </div>
                          <div class="form-group">
                            <label for="editStok<?= $key->id ?>">Stok</label>
                            <input type="number" name="stok" class="form-control" id="editStok<?= $key->id ?>" placeholder="Stok" value="<?= $key->stok ?>">
                            <?= form_error('stok', '<div class="text-small text-danger">', '</div>') ?>
                          </div>
                          <div class="form-group">
                            <label for="editKategori<?= $key->id ?>">Kategori</label>
                            <select name="kategori" class="form-control select2" id="editKategori<?= $key->id ?>" style="width: 100%;">
                              <option hidden>Masukan Kategori</option>
                              <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k->id ?>" <?= $k->id == $key->kategori_id ? 'selected' : '' ?>><?= $k->kategori ?></option>
                              <?php endforeach; ?>
                            </select>
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
