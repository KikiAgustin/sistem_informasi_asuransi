<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Anggota</h1>
    </div>

    <?=
        $this->session->flashdata('message');
    ?>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow p-3">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="ktp" class="form-label">Nomor KTP</label>
                        <input type="number" name="ktp" class="form-control" id="ktp" placeholder="No KTP" value="<?= set_value('ktp') ?>">
                        <?= form_error('ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Nasabah</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Nasabah" value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" mb-3">
                        <label for="nama" class="form-label">Jenis kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="">Pilih</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="" value="<?= set_value('tanggal_lahir') ?>">
                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?= set_value('telepon') ?>">
                        <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= set_value('alamat') ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" mb-3">
                        <label for="pendidikan" class="form-label">pendidikan</label>
                        <select class="form-control" name="pendidikan" id="pendidikan" required>
                            <option value="">Pilih</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                        <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Tambah Anggota</button>
                </form>
            </div>
        </div>
    </div>
</div>