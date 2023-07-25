<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Profil</h4>
    </div>

    <div class="card-body">
        <?php echo form_open('admin/profil/editPengguna/' . $user['id_user']); ?>
        <div class="input-group mb-3">
            <?php echo form_hidden('id_user', $user['id_user']) ?>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="nama">Nama</label>
                </div>
                <div class="col">
                    <input type="text" name="nama" class="form-control" value="<?php echo $user['nama'] ?>">
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="alamat">Alamat</label>
                </div>
                <div class="col">
                    <input type="text" name="alamat" class="form-control" value="<?php echo $user['alamat'] ?>">
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="jk">Jenis Kelamin</label>
                </div>
                <div class="col">
                    <!-- <input type="text" name="jk" class="form-control" value="<?php echo $user['jenis_kelamin'] ?>"> -->
                    <select class="custom-select" name="jk">
                        <option value="">---Pilih Jenis Kelamin---</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="email">Email</label>
                </div>
                <div class="col">
                    <input type="text" name="email" class="form-control" value="<?php echo $user['email'] ?>">
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="tlp">No Telphone</label>
                </div>
                <div class="col">
                    <input type="text" name="tlp" class="form-control" value="<?php echo $user['tlp'] ?>">
                </div>
            </div>
            <!-- <div class="row input-group mb-3">
                <div class="col">
                    <label for="password">Password</label>
                </div>
                <div class="col">
                    <input type="password" name="password" class="form-control" value="<?php echo $user['password'] ?>">
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block">
                    Perbarui
                </button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
    <!-- /.card-body -->
</div>