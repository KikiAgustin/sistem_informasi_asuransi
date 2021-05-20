<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Peserta Asuransi</h1>
    </div>

    <?=
    $this->session->flashdata('message');
    ?>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow p-3">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK" value="<?= set_value('nik') ?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Peserta</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Peserta" value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" mb-3">
                        <label for="nama" class="form-label">Jenis kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option>Pilih</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" name="umur" id="umur" placeholder="Usia maksimal 15 tahun" value="<?= set_value('umur') ?>">
                        <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="" value="<?= set_value('tanggal_lahir') ?>">
                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" mb-3">
                        <label for="pendidikan" class="form-label">pendidikan</label>
                        <select class="form-control" name="pendidikan" id="pendidikan" required>
                            <option>Pilih</option>
                            <option value="Belum Sokolah">Belum Sokolah</option>
                            <option value="TK">TK</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
                        <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" mb-3">
                        <label for="status_hubungan" class="form-label">Status Hubungan</label>
                        <select class="form-control" name="status_hubungan" id="status_hubungan" required>
                            <option>Pilih</option>
                            <option value="Anak Kandung">Anak Kandung</option>
                            <option value="Adik Kandung ">Adik Kandung </option>
                            <option value="Anak Tiri">Anak Tiri</option>
                            <option value="Adik Tiri">Adik Tiri</option>
                            <option value="Sodara">Sodara</option>
                        </select>
                        <?= form_error('status_hubungan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Tambah Peserta</button>
                </form>
            </div>
        </div>
    </div>
</div>