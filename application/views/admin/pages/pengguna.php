<div class="card card-outline card-primary m-4">
    <div class="card-header text-center">
        <h4>Manajemen Data Pengguna</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Auth/login'); ?>" method="post">
            <div class="input-group mb-3">
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" placeholder="Username" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Username</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" placeholder="Username" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Password</label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Username" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Confirm Password</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" placeholder="Username" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Email</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" placeholder="Username" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Telepon</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" placeholder="Username" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Jenis Kelamin</label>
                    </div>
                    <div class="col">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row input-group mb-3">
                    <div class="col">
                        <label for="nama">Alamat</label>
                    </div>
                    <div class="col">
                        <input type="username" class="form-control" placeholder="Username" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                    </div>
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="nama">Level</label>
                </div>
                <div class="col">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row input-group mb-3">
                <div class="col">
                    <label for="nama">Alamat</label>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Admin</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                <label class="form-check-label" for="exampleCheck2">User</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>