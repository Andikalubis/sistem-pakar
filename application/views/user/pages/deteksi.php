<div class="container">
    <div class="card-body">
        <form action="../../index3.html" method="post">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Usia">
                    </div>
                </div>
            </div>


            <div class="row">
                <h4 class="my-4 text-center">Silahkan menjawab pertanyaan ini untuk mendapatkan kriteria kecerdasan pada anak</h4>
                <h10> PILIH 1 OPSI JAWABAN DI SETIAP PERTANYAAN...!!! </h10>
            </div>

            <!-- soal -->
            <div class="soal-wrapper">
                <div class="soal-wrapper-header">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <!-- <th scope="col">Kode</th> -->
                                <th scope="col">Pertanyaan</th>
                                <th scope="col">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                foreach($pertanyaan as $data) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <!-- <td><?php echo $data->kode_pertanyaan ?></td> -->
                                    <td><?php echo $data->pertanyaan ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="jawaban1" id="jawaban1" value="1">
                                            <label class="form-check-label" for="jawaban1">
                                                Sering
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="jawaban2" id="jawaban2" value="0.5">
                                            <label class="form-check-label" for="jawaban2">
                                                Jarang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="jawaban3" id="jawaban3" value="0">
                                            <label class="form-check-label" for="jawaban3">
                                                Tidak Pernah
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="soal-wrapper-footer">
                    <button class="btn btn-primary">Deteksi</button>
                </div>
            </div>
    </div>

    </form>
</div>
</div>