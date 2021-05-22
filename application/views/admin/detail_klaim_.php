<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Klaim Asuransi</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Klaim Asuransi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Peserta</th>
                                    <th>jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($klaim as $value) : ?>

                                    <?php

                                    $peserta = $this->db->get_where('data_anggota', ['id_anggota' => $value['id_anggota']])->row_array();

                                    ?>

                                    <tr>
                                        <td><?= $peserta['nama']; ?></td>
                                        <td><?= $peserta['jenis_kelamin']; ?></td>
                                        <td><?= $value['usia']; ?> Tahun</td>
                                        <td>
                                            <?php if ($value['status'] == 1) : ?>
                                                <button class="btn btn-warning">Menunggu Konfirmasi</button>
                                            <?php elseif ($value['status'] == 2) : ?>
                                                <button class="btn btn-success">Disetujui</button>
                                            <?php elseif ($value['status'] == 3) : ?>
                                                <button class="btn btn-danger">Ditolak</button>
                                            <?php endif; ?>
                                        </td>
                                        <td>aksi</td>

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