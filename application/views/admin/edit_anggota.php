<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Anggota</h1>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow p-3">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="ktp" class="form-label">Nomor KTP</label>
                        <input type="number" name="ktp" class="form-control" id="ktp" placeholder="No KTP" value="<?= $anggota['ktp']; ?>" readonly>
                        <?= form_error('ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Nasabah</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Nasabah" value="<?= $anggota['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" name="umur" id="umur" placeholder="Umur" value="<?= $anggota['umur']; ?>">
                        <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $anggota['alamat']; ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Edit Anggota</button>
                </form>
            </div>
        </div>
    </div>
</div>