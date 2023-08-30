<h3 class="text-center my-4">Riwayat Deteksi</h3>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Usia</th>
                                            <th>Sesi</th>
                                            <th>Bobot CF</th>
                                            <th>Bobot NB</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($hasil as $data) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data['tanggal'] ?></td>
                                                <td><?php echo $data['id_hasil'] ?></td>
                                                <td><?php echo $data['nama'] ?></td>
                                                <td><?php echo $data['usia'] ?> Tahun</td>
                                                <td><?php echo $data['sesi'] ?></td>
                                                <td>
                                                    <?php echo $data['cf_bobot'] ?> %
                                                    <br>
                                                    <small> <?= $data['cf_kriteria'] ?></small>
                                                </td>
                                                <td>
                                                    <?php echo $data['cf_bobot'] ?> %
                                                    <br>
                                                    <small> <?= $data['cf_kriteria'] ?></small>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('user/deteksi/hasil?id=' . $data['id_hasil'] . '&sesi=' . $data['sesi']) ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('user/riwayat/hapusRiwayat/') . $data['id_hasil'] ?>" class="btn btn-sm btn-danger">
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