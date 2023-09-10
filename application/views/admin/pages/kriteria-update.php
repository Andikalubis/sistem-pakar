<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <?php echo form_open('admin/ciri/editkriteria/' . $kriteria->id_kriteria); ?>
        <div class="input-group mb-3">
            <?php echo form_hidden('id_kriteria', $kriteria->id_kriteria) ?>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="kode_kriteria">Kode Kriteria</label>
                </div>
                <div class="col">
                    <input type="text" name="kode_kriteria" class="form-control" value="<?php echo $kriteria->kode_kriteria ?>">
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="nama_kriteria">Nama Kriteria</label>
                </div>
                <div class="col">
                    <input type="text" name="nama_kriteria" class="form-control" value="<?php echo $kriteria->nama_kriteria ?>">
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="deskripsi">Deskripsi</label>
                </div>
                <div class="col">
                    <input type="text" name="deskripsi" class="form-control" value="<?php echo $kriteria->deskripsi ?>">
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="stimulasi">Stimulasi</label>
                </div>
                <div class="col">
                    <input type="text" name="stimulasi" class="form-control" value="<?php echo $kriteria->stimulasi ?>">
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
        <?php echo form_close() ?>
    </div>
    <!-- /.card-body -->
</div>