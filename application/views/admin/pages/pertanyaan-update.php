<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">

        <div class="row my-4">
            <!-- alert -->
            <?php if ($this->session->flashdata('success_message')) : ?>
                <div class="alert alert-success w-100" role="alert">
                    <?php echo $this->session->flashdata('success_message'); ?>
                </div>
            <?php endif; ?>
            <!-- end alert -->
        </div>

        <?php echo form_open('admin/pertanyaan/editPertanyaan/' . $pertanyaan->id_pertanyaan); ?>
        <div class="input-group mb-3">
            <?php echo form_hidden('id_pertanyaan', $pertanyaan->id_pertanyaan) ?>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="id_kriteria">Kriteria</label>
                </div>
                <div class="col">
                    <select class="custom-select" name="kode_kriteria" id="kode_kriteria">
                        <option value="">Pilih Kriteria</option>
                        <?php foreach ($kriteria as $data) : ?>
                            <?php $selected = ($pertanyaan->id_kriteria == set_value('id_kriteria', $data->id_kriteria)) ? 'selected' : ''; ?>
                            <option value="<?php echo $data->id_kriteria ?>" <?php echo $selected; ?>>
                                <?php echo $data->nama_kriteria ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="id_gejala">Gejala</label>
                </div>
                <div class="col">
                    <select class="custom-select" name="kode_gejala" id="kode_gejala">
                        <option value="">Pilih Gejala</option>
                        <?php foreach ($gejala as $data) : ?>
                            <?php $selected = ($pertanyaan->kode_gejala == set_value('kode_gejala', $data->kode_gejala)) ? 'selected' : ''; ?>
                            <option value="<?php echo $data->kode_gejala ?>" <?php echo $selected; ?>>
                                <?php echo $data->nama_gejala ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

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