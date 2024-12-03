<div class="main-panel">
    <div class="content-wrapper">
        <h2 class="text-center">Form Registrasi Pengguna</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?php echo site_url('usercontroller/process_register'); ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?php echo set_value('username'); ?>" required>
                <div class="invalid-feedback">
                    <?php echo form_error('username'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" required>
                <div class="invalid-feedback">
                    <?php echo form_error('password'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>

        <h3 class="mt-4">Daftar Pengguna Terdaftar</h3>

        <!-- Tabel Data Pengguna -->
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                 
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $user['username']; ?></td>
                        
                            <td>
                                <?php
                                    // Menampilkan level sebagai Admin/Siswa
                                    echo ($user['level'] == 1) ? 'Admin' : 'Siswa';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data pengguna.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
