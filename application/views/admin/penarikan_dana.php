<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penarikan Dana Asuransi</h1>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow p-3">
                <form action="" method="POST">
                    <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota']; ?>">
                    <div class="mb-3">
                        <label for="ktp" class="form-label">Nama Peserta</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Nasabah" value="<?= $anggota['nama']; ?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Tanggal penarikan</label>
                        <input type="date" class="form-control" name="tanggal_penarikan" id="tanggal_penarikan" placeholder="Tanggl Pembayaran" value="<?= set_value('tanggal_penarikan') ?>" required>
                        <?= form_error('tanggal_penarikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Jumlah Penarikan </label>
                        <input type="number" class="form-control" name="jumlah_penarikan" id="jumlah_penarikan" placeholder="Jumlah Bayar" value="<?= set_value('jumlah_penarikan') ?>" required>
                        <?= form_error('jumlah_penarikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Tarik Dana</button>
                </form>
            </div>
        </div>
    </div>
</div>