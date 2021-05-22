<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Peserta Asuransi</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Pemegang Polis
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2">NIK </div>
                                <div class="col-lg-9">: <?= $polis['ktp']; ?> </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">Nama </div>
                                <div class="col-lg-9">: <?= $polis['nama']; ?> </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">Jenis Kelamin </div>
                                <div class="col-lg-9">: <?= $polis['jenis_kelamin']; ?> </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">Umur </div>
                                <div class="col-lg-9">: <?= $polis['umur']; ?> </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">Tanggal Lahir </div>
                                <div class="col-lg-9">: <?= $polis['tanggal_lahir']; ?> </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">Telepon </div>
                                <div class="col-lg-9">: <?= $polis['telepon']; ?> </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">Pendidikan </div>
                                <div class="col-lg-9">: <?= $polis['pendidikan']; ?> </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">Alamat </div>
                                <div class="col-lg-9">: <?= $polis['alamat']; ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                peserta
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <a href="<?= base_url('Admin/tambahPeserta/') . $id_anggota; ?>" class="btn btn-primary mb-3">Tambah Peserta</a>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Peserta Asuransi</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>NIK</th>
                                                            <th>Nama Peserta</th>
                                                            <th>Umur</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th>Pendidikan</th>
                                                            <th>Hubungan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($anggota as $value) : ?>
                                                            <tr>
                                                                <td><?= $value['ktp']; ?></td>
                                                                <td> <?= $value['nama']; ?></td>
                                                                <td><?= $value['umur']; ?></td>
                                                                <td><?= $value['tanggal_lahir']; ?></td>
                                                                <td><?= $value['pendidikan']; ?></td>
                                                                <td><?= $value['status_hubungan']; ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>