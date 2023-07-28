<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Gejala Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <?php echo form_open('admin/ciri/editGejala/'.$gejala->id_gejala); ?>
            <div class="input-group mb-3">
                <?php echo form_hidden('id_gejala', $gejala->id_gejala) ?>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="kode_gejala">Kode Gejala</label>
                    </div>
                    <div class="col">
                        <input type="text" name="kode_gejala" class="form-control" value="<?php echo $gejala->kode_gejala ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama_gejala">Nama Gejala</label>
                    </div>
                    <div class="col">
                        <input type="text-area" name="nama_gejala" class="form-control" value="<?php echo $gejala->nama_gejala ?>">
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