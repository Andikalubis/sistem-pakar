<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Kriteria Kecerdasan Anak</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/pertanyaan/tambahPertanyaan'); ?>" method="post">
            <div class="input-group mb-3">
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="id_kriteria">Kriteria</label>
                    </div>
                    <div class="col">
                        <select class="custom-select" name="id_kriteria" id="id_kriteria" value="<?= set_value('id_kriteria'); ?>">>
                            <option value="">Pilih Kriteria</option>
                            <?php foreach ($kriteria as $data) : ?>
                                <option value="<?php echo $data->id_kriteria ?>">
                                    <?php echo $data->nama_kriteria ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="id_gejala">Gejala</label>
                    </div>
                    <div class="col">
                        <select class="custom-select" name="id_gejala" id="id_gejala" value="<?= set_value('id_gejala'); ?>">>
                            <option value="">Pilih Gejala</option>
                            <?php foreach ($gejala as $data) : ?>
                                <option value="<?php echo $data->id_gejala ?>">
                                    <?php echo $data->nama_gejala ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="kode_gejala">Kode Gejala</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" placeholder="Masukan Kode Gejala ..." value="<?= set_value('kode_gejala'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="kode_pertanyaan">Kode Pertanyaan</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="kode_pertanyaan" name="kode_pertanyaan" placeholder="Masukan Kode Pertanyaan ..." value="<?= set_value('kode_pertanyaan'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="pertanyaan">Pertanyaan</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Masukan Pertanyaan ..." value="<?= set_value('pertanyaan'); ?>">
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