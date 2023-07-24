<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <?php echo form_open('admin/pertanyaan/editPertanyaan/'.$pertanyaan->id_pertanyaan); ?>
            <div class="input-group mb-3">
                <?php echo form_hidden('id_pertanyaan', $pertanyaan->id_pertanyaan) ?>
                <div class="row input-group mb-3">
                    <div class="col">
                            <label for="kode_gejala">Kode Gejala</label>
                        </div>
                        <div class="col">
                            <input type="text" name="kode_gejala" class="form-control" value="<?php echo $pertanyaan->kode_gejala ?>">
                        </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="kode_pertanyaan">Kode Pertanyaan</label>
                    </div>
                    <div class="col">
                    <input type="text" name="kode_pertanyaan" class="form-control" value="<?php echo $pertanyaan->kode_pertanyaan ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="pertanyaan">Pertanyaan</label>
                    </div>
                    <div class="col">
                    <input type="text" name="pertanyaan" class="form-control" value="<?php echo $pertanyaan->pertanyaan ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">
                        Perbarui Pertanyaan
                    </button>
                </div>
            </div>
        <?php echo form_close() ?>
    </div>
    <!-- /.card-body -->
</div>