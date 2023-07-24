<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/ciri/tambahGejala'); ?>" method="post">
            <div class="input-group mb-3">
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Kode Gejala</label>
                    </div>
                    <div class="col">
                        <input type="kode_gejala" class="form-control" id="kode_gejala" name="kode_gejala" placeholder="Masukan Kode Gejala..." value="<?= set_value('kode_gejala'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Nama Gejala</label>
                    </div>
                    <div class="col">
                        <input type="nama_gejala" class="form-control" id="nama_gejala" name="nama_gejala" placeholder="Masukan Nama Gejala ..." value="<?= set_value('nama_gejala'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Bobot</label>
                    </div>
                    <div class="col">
                        <input type="bobot" class="form-control" id="bobot" name="bobot" placeholder="Masukan Bobot ..." value="<?= set_value('bobot'); ?>">
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