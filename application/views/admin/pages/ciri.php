<div>
    <h3 class="text-center my-4">Manajemen Data Pertanyaan</h3>
    <div class="row my-4">
        <div class="col-6 col-lg-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <p>Insert Data Kriteria</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= base_url('admin/ciri/tambahKriteria'); ?>" class="small-box-footer">Add Kriteria <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <p>Insert Data Gejala</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?= base_url('admin/ciri/tambahGejala'); ?>" class="small-box-footer">Add Gejala <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Data Kriteria</h3>

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
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                        foreach($kriteria as $data) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->kode_kriteria ?></td>
                                                <td><?php echo $data->nama_kriteria ?></td>
                                                <td><?php echo $data->deskripsi ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/ciri/editKriteria').$data->id_kriteria ?>" class="btn btn-sm btn-success">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('admin/ciri/hapusKriteria').$data->id_kriteria ?>" class="btn btn-sm btn-danger">
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
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Data Gejala</h3>

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
                                        <th>Kode Gejala</th>
                                        <th>Nama Gejala</th>
                                        <th>Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                        foreach($gejala as $data) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->kode_gejala ?></td>
                                                <td><?php echo $data->nama_gejala ?></td>
                                                <td><?php echo $data->bobot ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/ciri/editGejala').$data->id_gejala ?>" class="btn btn-sm btn-success">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('admin/ciri/hapusGejala').$data->id_gejala ?>" class="btn btn-sm btn-danger">
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
                </div>
            </div>
        </div>
    </div>
</div>