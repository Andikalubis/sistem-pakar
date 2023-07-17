<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/ciri/editKriteria'); ?>" method="post">
            <div class="input-group mb-3">
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Kode Kriteria</label>
                    </div>
                    <div class="col">
                        <input type="text" name="kode_kriteria" class="form-control" value="<?php echo $kriteria->kode_kriteria ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Nama Kriteria</label>
                    </div>
                    <div class="col">
                        <input type="text" name="nama_kriteria" class="form-control" value="<?php echo $kriteria->nama_kriteria ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Deskripsi</label>
                    </div>
                    <div class="col">
                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $kriteria->deskripsi ?>">
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