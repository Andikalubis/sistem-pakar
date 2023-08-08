<h3 class="text-center my-4">Riwayat Deteksi</h3>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Riwayar Deteksi Pengguna</h3>

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
                                            <th>Nama</th>
                                            <th>Usia</th>
                                            <th>Tanggal</th>
                                            <th>Bobot</th>
                                            <th>Hasil</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($hasil as $data) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data['nama'] ?></td>
                                                <td><?php echo $data['usia'] ?></td>
                                                <td><?php echo $data['tanggal'] ?></td>
                                                <td><?php echo $data['bobot'] ?></td>
                                                <td><?php echo $data['hasil_kriteria'] ?></td>
                                                <td>
                                                    <!-- <a href="<?php echo base_url('admin/riwayat/') . $data['id_hasil'] ?>" class="btn btn-sm btn-success">
                                                        <i class="fas fa-show"></i>
                                                    </a> -->
                                                    <a href="<?php echo base_url('admin/riwayat/') . $data['id_hasil'] ?>" class="btn btn-sm btn-danger">
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