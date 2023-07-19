<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/ciri/tambahKriteria'); ?>" method="post">
            <div class="input-group mb-3">
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Kode Kriteria</label>
                    </div>
                    <div class="col">
                        <input type="kode_kriteria" class="form-control" id="kode_kriteria" name="kode_kriteria" placeholder="Masukan Kode Kriteria..." value="<?= set_value('kode_kriteria'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Nama Kriteria</label>
                    </div>
                    <div class="col">
                        <input type="nama_kriteria" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Masukan Nama Kriteria ..." value="<?= set_value('nama_kriteria'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Deskripsi</label>
                    </div>
                    <div class="col">
                        <input type="deskripsi" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi ..." value="<?= set_value('deskripsi'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>