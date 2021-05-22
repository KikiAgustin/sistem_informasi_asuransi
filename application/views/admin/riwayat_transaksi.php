<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi <?= $anggota['nama']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($transaksi as $value) : ?>
                            <?php if ($value['status_bayar'] == 1) : ?>
                                <div class="col-lg-12">
                                    <div class="card mb-4 py-3 border-left-primary">
                                        <div class="card-body">
                                            <span><?= date('d F Y', strtotime($value['tanggal'])); ?></span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="color: blue;">Uang Masuk : Rp. <?= number_format($value['jumlah_transaksi']); ?></span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span>Keterangan : <?= $value['status']; ?> </span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="color: black; font-weight: bold; ">Saldo : Rp. <?= number_format($value['saldo']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-lg-12">
                                    <div class="card mb-4 py-3 border-left-danger">
                                        <div class="card-body">
                                            <span><?= date('d F Y', strtotime($value['tanggal'])); ?></span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="color: red;">Uang Keluar : Rp. <?= number_format($value['jumlah_transaksi']); ?></span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span>Keterangan : <?= $value['status']; ?></span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="color: black; font-weight: bold; ">Saldo : Rp. <?= number_format($value['saldo']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>