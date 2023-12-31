<div>
    <h3 class="text-center my-4">Manajemen Data Pertanyaan</h3>
    <div class="row my-4">
        <div class="col-6 col-lg-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <p>Insert Data Pertanyaan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= base_url('admin/pertanyaan/tambahPertanyaan'); ?>" class="small-box-footer">Add Pertanyaan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <!-- alert -->
        <?php if ($this->session->flashdata('success_message')) : ?>
            <div class="alert alert-success w-100" role="alert">
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
        <?php endif; ?>
        <!-- end alert -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Data Pertanyaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Kode Gejala</th> -->
                                        <th>Kode Pertanyaan</th>
                                        <th>Pertanyaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pertanyaan as $data) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <!-- <td><?php echo $data->kode_gejala ?></td> -->
                                            <td><?php echo $data->kode_pertanyaan ?></td>
                                            <td><?php echo $data->pertanyaan ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/pertanyaan/editPertanyaan/') . $data->id_pertanyaan ?>" class="btn btn-sm btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?php echo base_url('admin/pertanyaan/hapusPertanyaan/') . $data->id_pertanyaan ?>" class="btn btn-sm btn-danger">
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