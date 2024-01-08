<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> - Sistem Pakar Anak</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .title {
            text-align: center;
            margin-top: 4rem;
        }

        h3 {
            text-align: center;
            margin-top: 1rem;
        }

        h5 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        .row {
            margin-top: 20px;
        }

        .border-left {
            border-left: 1px solid #000;
            padding-left: 10px;
        }

        .italic {
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title" style="text-align:center;">
            Hasil Deteksi Riwayat Untuk Kriteria Kecerdasan Berdasarkan Perbandingan Metode Certainty Factor dan Teorema Bayes
            <br> Sistem Pakar Anak
            <br> Kabupaten Cirebon Jawa Barat
        </div>
        <hr class="line-title">
        <h3>Hasil Deteksi</h3>
        <p>Nama : <?= $hasil->nama ?></p>
        <p>Usia : <?= $hasil->usia ?> tahun</p>
        <p>Tanggal : <?= $hasil->tanggal ?></p>

        <div class="row">
            <div class="col-md-6">
                <h4 class="mtext-112 cl2">Certainty Factor</h4>
                <table>
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
                                <td><?= $data->kriteria_data->nama_kriteria ?></td>
                                <td><?= $data->bobot ?>%</td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h4 class="mtext-112 cl2">Teorema Bayes</h4>
                <table>
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
                        foreach ($hasil_nb as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->kriteria_data->nama_kriteria ?></td>
                                <td><?= $data->bobot ?>%</td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row p-4 justify-content-between">
            <div class="col-md-6">
                <?php foreach ($hasil_cf as $data) : ?>
                    <strong class="mb-2 d-inline-block">
                        <?= $data->kriteria_data->nama_kriteria ?>
                    </strong>
                    <p><?= $data->kriteria_data->deskripsi ?></p>
                    <div class="px-4 border-left border-info mb-4">
                        <small style="font-style: italic;">stimulus</small>
                        <p><?= $data->kriteria_data->stimulasi ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>