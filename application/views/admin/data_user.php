<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <a class="btn btn-primary mb-3" href="<?= base_url('Admin/tambahDataUser'); ?>">Tambah Data User</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user as $value) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/editUser/') . $value['id']; ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?= base_url('Admin/gantiPassword/') . $value['id']; ?>">Ganti Password</a>
                                                    <a class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?= base_url('Admin/hapusUser/') . $value['id']; ?>">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>