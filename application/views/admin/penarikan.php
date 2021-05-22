<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penarikan Dana</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Silahkan Pilih Peserta yang mau di tarik Dana</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No KTP </th>
                                    <th>Peserta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggota as $value) : ?>
                                    <tr>
                                        <td><?= $value['ktp']; ?></td>
                                        <td><a href="<?= base_url('Admin/riwayatTransaksi/') . $value['id_anggota']; ?>"><?= $value['nama']; ?></a></td>
                                        <td>
                                            <a href="<?= base_url('Admin/penarikanDana/') . $value['id_anggota']; ?>" class="btn btn-primary">Pilih</a>
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