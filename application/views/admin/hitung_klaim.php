<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Klaim Asuransi</h1>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow p-3">
                <form action="" method="POST">
                    <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota']; ?>">
                    <div class="mb-3">
                        <label for="ktp" class="form-label">Nama Nasabah</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Nasabah" value="<?= $anggota['nama']; ?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tanggal klaim</label>
                        <input type="date" class="form-control" name="tanggal_klaim" id="tanggal_klaim" placeholder="Tanggl Pembayaran" value="<?= set_value('tanggal_klaim') ?>" required>
                        <?= form_error('tanggal_klaim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Usia</label>
                        <input type="number" class="form-control" name="usia" id="usia" placeholder="Usia" value="<?= set_value('usia') ?>" required>
                        <?= form_error('usia', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Tambah Klaim</button>
                </form>
            </div>
        </div>
    </div>
</div>