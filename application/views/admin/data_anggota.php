<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <a class="btn btn-primary mb-3" href="<?= base_url('Admin/tambahAnggota'); ?>">Tambah Data Anggota</a>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No KTP </th>
                                    <th>Nama Nasabah</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggota as $value) : ?>
                                    <tr>
                                        <td><?= $value['ktp']; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['umur']; ?></td>
                                        <td><?= $value['alamat']; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/editAnggota/') . $value['id_anggota']; ?>">Edit</a>
                                                    <a class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="<?= base_url('Admin/hapusAnggota/') .  $value['id_anggota']; ?> ">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>