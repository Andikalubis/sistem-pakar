<h3 class="text-center my-4">Hasil Deteksi</h3>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header text-center">
                <h5 class="text-center mt-2">Pria (6 tahun)</h5>
                <p> Hasil deteksi untuk kriteria kecerdasan adalah</p>
            </div>
            <div class="bg0 m-t-150 p-b-100">
                <div class="container">
                    <div class="container rounded bg-white mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="p-3 py-5">

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="mtext-112 cl2">Certainty Factor</h4>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kriteria</th>
                                                    <th>Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($hasil_cf as $data) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data['kode_ciri'] ?></td>
                                                        <td><?= $data['nilai'] ?>%</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 border-left">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right mtext-112 cl2 ">Naive Bayes</h4>
                                    </div>

                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kriteria</th>
                                                    <th>Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($hasil_bayes as $data) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data['kode_ciri'] ?></td>
                                                        <td><?= $data['nilai'] ?>%</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col text-center bg-info py-2">Kecerdasan Kinestik: 88%</div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <strong class="mb-2 d-inline-block">Dengan ciri-ciri:</strong>
                                        <p>Suka melakukan berbagai kegiatan fisik seperti bersepeda, berenang, suka menari, suka olahraga, atau bela diri, suka menirukan gerak, suka menggunakan banyak gerak tubuh untuk berbicara. </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-success">Cetak Hasil</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>