<section class="content">
    <div class="row">
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class="panel-body">
                    <?php

                    if (isset($error_upload)) {
                        echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                    }
                    echo form_open_multipart('Toko/add');
                    ?>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input class="form-control" type="text" name="nama_operator" placeholder="Nama Toko" required>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="text" name="password" placeholder="Password" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>




                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>