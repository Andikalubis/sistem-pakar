<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Auth/login'); ?>" method="post">
            <div class="input-group mb-3">
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Kriteria</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" id="username" name="username" placeholder="Masukan Kriteria Kecerdasan..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Deskripsi</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" id="username" name="username" placeholder="Masukan Deskripsi ..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Kode</label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" id="username" name="username" placeholder="Masukan Kode ..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">
                        Perbarui
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>