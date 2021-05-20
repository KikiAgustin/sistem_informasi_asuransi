<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembayaran Premi</h1>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow p-3">
                <form action="" method="POST">
                    <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota']; ?>">
                    <div class="mb-3">
                        <label for="ktp" class="form-label">Pemegang Polis</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Nasabah" value="<?= $anggota['nama']; ?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" mb-3">
                        <label for="nama" class="form-label">Peserta</label>
                        <select class="form-control" name="peserta" id="peserta" required>
                            <option>Pilih</option>
                            <?php foreach ($peserta as $value) : ?>
                                <option value="<?= $value['id_anggota']; ?>"><?= $value['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('peserta', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tanggal pembayaran</label>
                        <input type="date" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggl Pembayaran" value="<?= set_value('tanggal_bayar') ?>" required>
                        <?= form_error('tanggal_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Jumlah Bayar</label>
                        <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Bayar" value="<?= set_value('jumlah_bayar') ?>" required>
                        <?= form_error('jumlah_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="biaya_admin" class="form-label">Biaya Admin</label>
                        <input type="number" class="form-control" name="biaya_admin" id="biaya_admin" placeholder="Biaya Admin" value="<?= set_value('biaya_admin') ?>" required>
                        <?= form_error('biaya_admin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Tambah Premi</button>
                </form>
            </div>
        </div>
    </div>
</div>