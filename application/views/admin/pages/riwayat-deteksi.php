<h3 class="text-center my-4">Riwayat Deteksi</h3>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Riwayat Deteksi User</h3>

                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Usia</th>
                                            <th>Bobot CF</th>
                                            <th>Bobot TB</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($hasil as $data) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['tanggal'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['nama'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['usia'] ?> Tahun
                                                </td>
                                                <td>
                                                    <?php echo $data['cf_bobot'] ?> %
                                                    <br>
                                                    <small>
                                                        <?= $data['cf_kriteria'] ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <?php echo $data['nb_bobot'] ?> %
                                                    <br>
                                                    <small>
                                                        <?= $data['nb_kriteria'] ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <!-- <a href="<?php echo base_url('admin/riwayat/') . $data['id_hasil'] ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-eye"></i>
                                                    </a> -->
                                                    <a href="<?php echo base_url('admin/riwayat/hapusRiwayat/') . $data['id_hasil'] ?>" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>