<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Auth/login'); ?>" method="post">
            <div class="input-group mb-3">
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Pertanyaan</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" id="username" name="username" placeholder="Masukan Pertanyaan..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Kode Pertanyaan</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" id="username" name="username" placeholder="Masukan Kode Pertanyaan ..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Kode Gejala</label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" id="username" name="username" placeholder="Masukan Kode Gejala ..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">
                        Tambah Pertanyaan
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>