<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Silahkan login dulu untuk masuk ke halaman admin</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Auth');
        }
    }

    public function index()
    {
        $data = [
            'judul'  => "Halaman Admin | Dashboard"
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function dataAnggota()
    {
        $anggota = $this->db->get_where('data_anggota', ['polis' => 1])->result_array();
        $data = [
            'judul'     => "Halaman Admin | Data Anggota",
            'anggota'   => $anggota
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/data_anggota');
        $this->load->view('templates/footer');
    }

    public function tambahAnggota()
    {
        $data = [
            'judul'  => "Halaman Admin | Tambah Anggota"
        ];

        $this->form_validation->set_rules('ktp', 'KTP', 'min_length[16]|required|is_unique[data_anggota.ktp]');
        $this->form_validation->set_rules('nama', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambah_anggota');
            $this->load->view('templates/footer');
        } else {
            $ktp            = $this->input->post('ktp');
            $nama           = $this->input->post('nama');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            // $umur           = $this->input->post('umur');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $telepon        = $this->input->post('telepon');
            $alamat         = $this->input->post('alamat');
            $pendidikan     = $this->input->post('pendidikan');

            $tanggal = new DateTime($tanggal_lahir);
            $today = new DateTime('today');
            $umur = $today->diff($tanggal)->y;

            if ($umur < 20) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>usia Minimal 20 Tahun</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Admin/tambahAnggota');
            } else if ($umur > 65) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>usia Maksimal 65 Tahun</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Admin/tambahAnggota');
            }

            $data = [
                'ktp'               => $ktp,
                'nama'              => $nama,
                'jenis_kelamin'     => $jenis_kelamin,
                'umur'              => $umur,
                'tanggal_lahir'     => $tanggal_lahir,
                'telepon'           => $telepon,
                'alamat'            => $alamat,
                'pendidikan'        => $pendidikan,
                'polis'             => 1
            ];

            $this->db->insert('data_anggota', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Anggota berhasil ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/dataAnggota');
        }
    }

    public function tambahPeserta($id_anggota)
    {

        $data = [
            'judul'  => "Halaman Admin | Tambah Peserta"
        ];

        $this->form_validation->set_rules('nik', 'nik', 'min_length[16]|required|is_unique[data_anggota.ktp]');
        $this->form_validation->set_rules('nama', 'Nama Peserta', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
        $this->form_validation->set_rules('status_hubungan', 'status_hubungan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambah_peserta');
            $this->load->view('templates/footer');
        } else {
            $nik                = $this->input->post('nik');
            $nama               = $this->input->post('nama');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            // $umur               = $this->input->post('umur');
            $tanggal_lahir      = $this->input->post('tanggal_lahir');
            $pendidikan         = $this->input->post('pendidikan');
            $status_hubungan    = $this->input->post('status_hubungan');

            $tanggal = new DateTime($tanggal_lahir);
            $today = new DateTime('today');
            $umur = $today->diff($tanggal)->y;

            if ($umur > 15) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>usia Maksimal 15 tahun</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('Admin/tambahPeserta/' . $id_anggota);
            }

            $data = [
                'id_polis'          => $id_anggota,
                'ktp'               => $nik,
                'nama'              => $nama,
                'umur'              => $umur,
                'jenis_kelamin'     => $jenis_kelamin,
                'tanggal_lahir'     => $tanggal_lahir,
                'pendidikan'        => $pendidikan,
                'status_hubungan'   => $status_hubungan
            ];

            $this->db->insert('data_anggota', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Peserta asuransi berhasil ditambah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('Admin/dataAnggota');
        }
    }

    public function detailPeserta($id_anggota)
    {
        $polis = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();
        $anggota = $this->db->get_where('data_anggota', ['id_polis' => $id_anggota])->result_array();
        $data = [
            'judul'         => "Halaman Admin | Data Anggota",
            'polis'         => $polis,
            'anggota'       => $anggota,
            'id_anggota'    => $id_anggota
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/detail_peserta');
        $this->load->view('templates/footer');
    }

    public function hapusAnggota($id_anggota)
    {
        $this->db->delete('data_anggota', ['id_anggota' => $id_anggota]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Anggota berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('Admin/dataAnggota');
    }

    public function editAnggota($id_anggota)
    {

        $anggota = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();

        $data = [
            'judul'     => "Halaman Admin | Edit Anggota",
            'anggota'   => $anggota
        ];

        // $this->form_validation->set_rules('ktp', 'KTP', 'min_length[16]|required|is_unique[data_anggota.ktp]');
        $this->form_validation->set_rules('nama', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/edit_anggota');
            $this->load->view('templates/footer');
        } else {
            $ktp = $this->input->post('ktp');
            $nama = $this->input->post('nama');
            $umur = $this->input->post('umur');
            $alamat = $this->input->post('alamat');

            $this->db->set('alamat', $alamat);
            $this->db->set('umur', $umur);
            $this->db->set('nama', $nama);
            $this->db->set('ktp', $ktp);
            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('data_anggota');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Anggota berhasil diedit</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/dataAnggota');
        }
    }

    // Polis
    public function premi()
    {
        $anggota = $this->db->get_where('data_anggota', ['polis' => 1])->result_array();
        $data = [
            'judul'     => "Halaman Admin | Premi",
            'anggota'   => $anggota
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/premi');
        $this->load->view('templates/footer');
    }

    public function bayarPremi($id_anggota)
    {
        $anggota = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();
        $peserta = $this->db->get_where('data_anggota', ['id_polis' => $id_anggota])->result_array();
        $data = [
            'judul'     => "Halaman Admin | Bayar Premi",
            'anggota'   => $anggota,
            'peserta'   => $peserta
        ];

        $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required');
        $this->form_validation->set_rules('biaya_admin', 'Biaya Admin', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/bayar_premi');
            $this->load->view('templates/footer');
        } else {
            $id_anggota = $this->input->post('id_anggota');
            $tanggal_bayar = $this->input->post('tanggal_bayar');
            $jumlah_bayar = $this->input->post('jumlah_bayar');
            $biaya_admin = $this->input->post('biaya_admin');
            $peserta = $this->input->post('peserta');

            if ($jumlah_bayar < 500000) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Pembayaran Minimal Rp. 500.000</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Admin/bayarPremi/' . $id_anggota . '');
            } else if ($biaya_admin < 37500) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Biaya Administrasi Minimal Rp. 37.500</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Admin/bayarPremi/' . $id_anggota . '');
            }

            $data = [
                'id_anggota'        => $peserta,
                'id_polis'          => $id_anggota,
                'tanggal_bayar'     => $tanggal_bayar,
                'jumlah_bayar'      => $jumlah_bayar,
                'biaya_admin'       => $biaya_admin,
                'jenis'             => "Pendidikan"
            ];

            $this->db->insert('bayar_premi', $data);

            $cekBayar = $this->db->get_where('jumlah_premi', ['id_anggota' => $peserta])->row_array();

            if ($cekBayar) {
                $hasilJumlah = $cekBayar['jumlah'] + $jumlah_bayar;
                $this->db->set('jumlah', $hasilJumlah);
                $this->db->where('id_anggota', $peserta);
                $this->db->update('jumlah_premi');
            } else {

                $data1 = [
                    'id_anggota' => $peserta,
                    'jumlah'     => $jumlah_bayar
                ];

                $this->db->insert('jumlah_premi', $data1);
            }

            $jumlahHasil = $cekBayar['jumlah'] + $jumlah_bayar;
            $data3 = [
                'id_anggota'        => $peserta,
                'tanggal'           => $tanggal_bayar,
                'jumlah_transaksi'  => $jumlah_bayar,
                'status'            => "pembayaran Premi",
                'saldo'             => $jumlahHasil,
                'status_bayar'      => 1
            ];
            $this->db->insert('riwayat_transaksi', $data3);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Premi berhasi dibayarkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/premi');
        }
    }


    public function detailPremi($id_anggota)
    {
        $anggota = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();
        $pembayaran = $this->db->get_where('bayar_premi', ['id_polis' => $id_anggota])->result_array();

        $data = [
            'judul'     => "Halaman Admin | Detail premi",
            'anggota'   => $anggota,
            'pembayaran'  => $pembayaran
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/detail_premi');
        $this->load->view('templates/footer');
    }


    public function klaim()
    {
        $anggota = $this->db->get_where('data_anggota', ['polis' => 1])->result_array();
        $data = [
            'judul'     => "Halaman Admin | Klaim",
            'anggota'   => $anggota
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/klaim');
        $this->load->view('templates/footer');
    }


    public function detailKlaim($id_anggota)
    {
        $anggota = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();
        $klaim = $this->db->get_where('klaim_asuransi', ['id_anggota' => $id_anggota])->result_array();

        if ($klaim) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . $anggota['nama'] . ' Sudah melakukan klaim</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/klaimSelesai/' . $id_anggota . ' ');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . $anggota['nama'] . ' Belum melakukan klaim</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/hitungKlaim/' . $id_anggota . ' ');
        }
    }

    public function klaimSelesai($id_anggota)
    {
        $anggota = $this->db->get_where('data_anggota', ['id_polis' => $id_anggota])->result_array();
        $klaim = $this->db->get('klaim_asuransi', ['id_anggota' => $id_anggota])->result_array();
        $data = [
            'judul'     => "Halaman Admin | Detail Klaim",
            'anggota'   => $anggota,
            'klaim'     => $klaim
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/detail_klaim');
        $this->load->view('templates/footer');
    }

    public function klaimSelesaiStatus()
    {
        $klaim = $this->db->get('klaim_asuransi')->result_array();
        $data = [
            'judul'     => "Halaman Admin | Detail Klaim",
            'klaim'     => $klaim,
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/detail_klaim_');
        $this->load->view('templates/footer');
    }

    public function updateStatusKlaim($id_anggota, $status)
    {

        $tanggal = date('Y-m-d');

        $this->db->set('status', $status);
        $this->db->set('tanggal_status', $tanggal);
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('klaim_asuransi');

        if ($status == 2) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Klaim berhasil diterima</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/klaimSelesaiStatus');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Klaim ditolak</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/klaimSelesaiStatus');
        }
    }

    public function hitungKlaim($id_anggota, $id_polis)
    {
        $anggota = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();
        $klaim = $this->db->get_where('klaim_asuransi', ['id_anggota' => $id_anggota])->result_array();

        $tanggal = new DateTime($anggota['tanggal_lahir']);
        $today = new DateTime('today');
        $tahun = $today->diff($tanggal)->y;

        if ($tahun < 18) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Usia Peserta tidak boleh kurang dari 18 tahun</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/klaimSelesai/' . $id_polis . '');
        } elseif ($klaim) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Peserta Sudah melakukan klaim</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/klaimSelesaiStatus');
        }

        $data = [
            'judul'     => "Halaman Admin | hitung Klaim",
            'anggota'   => $anggota,
            'klaim'     => $klaim
        ];

        $this->form_validation->set_rules('tanggal_klaim', 'Tanggal Klaim', 'required');
        $this->form_validation->set_rules('usia', 'Usia', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/hitung_klaim');
            $this->load->view('templates/footer');
        } else {
            $tanggal_klaim = $this->input->post('tanggal_klaim');
            $usia = $this->input->post('usia');

            $data = [
                'id_anggota'    => $id_anggota,
                'tanggal' => $tanggal_klaim,
                'usia'          => $usia,
                'status'        => 1
            ];

            $this->db->insert('klaim_asuransi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . $anggota['nama'] . ' sedang menunggu konfirmasi</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/klaimSelesai/' . $id_anggota . ' ');
        }
    }


    // Penarikan
    public function penarikan()
    {
        $anggota = $this->db->get_where('data_anggota', ['polis' => 0])->result_array();
        $data = [
            'judul'     => "Halaman Admin | Penarikan Saldo",
            'anggota'   => $anggota
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/penarikan');
        $this->load->view('templates/footer');
    }


    public function riwayatTransaksi($id_anggota)
    {
        $anggota = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();
        $transaksi = $this->db->get_where('riwayat_transaksi', ['id_anggota' => $id_anggota])->result_array();

        $data = [
            'judul'     => "Halaman Admin | Penarikan Saldo",
            'anggota'   => $anggota,
            'transaksi' => $transaksi
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/riwayat_transaksi');
        $this->load->view('templates/footer');
    }

    public function penarikanDana($id_anggota)
    {
        $anggota = $this->db->get_where('data_anggota', ['id_anggota' => $id_anggota])->row_array();
        $peserta = $this->db->get_where('data_anggota', ['id_polis' => $id_anggota])->result_array();
        $cekDana = $this->db->get_where('jumlah_premi', ['id_anggota' => $id_anggota])->row_array();

        if (!$cekDana) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Peserta ini tidak bisa melakukan penarikan dana</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('Admin/penarikan');
        } elseif ($cekDana['jumlah'] < 4000000) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Dana dari peserta ini belum cukup untuk melakukan penarikan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Admin/penarikan');
        }

        $data = [
            'judul'     => "Halaman Admin | Penarikan dana",
            'anggota'   => $anggota,
            'peserta'   => $peserta
        ];

        $this->form_validation->set_rules('jumlah_penarikan', 'Jumlah Penarikan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/penarikan_dana');
            $this->load->view('templates/footer');
        } else {
            $id_anggota = $this->input->post('id_anggota');
            $tanggal_penarikan = $this->input->post('tanggal_penarikan');
            $jumlah_penarikan = $this->input->post('jumlah_penarikan');

            if ($jumlah_penarikan < 100000) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Penarikan Minimal 1.000.000</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Admin/penarikanDana/' . $id_anggota . '');
            }

            $cekBayar = $this->db->get_where('jumlah_premi', ['id_anggota' => $id_anggota])->row_array();
            $sisaDana = $cekBayar['jumlah'] - $jumlah_penarikan;

            if ($sisaDana < 3000000) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Penarikan dana terlalu besar, saldo yang tersisia minimal harus Rp. 3.000.000</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Admin/penarikanDana/' . $id_anggota . '');
            } else {

                $hasilJumlah = $cekBayar['jumlah'] - $jumlah_penarikan;
                $this->db->set('jumlah', $hasilJumlah);
                $this->db->where('id_anggota', $id_anggota);
                $this->db->update('jumlah_premi');
            }

            $jumlahHasil = $cekBayar['jumlah'] - $jumlah_penarikan;
            $data3 = [
                'id_anggota'        => $id_anggota,
                'tanggal'           => $tanggal_penarikan,
                'jumlah_transaksi'  => $jumlah_penarikan,
                'status'            => "Penarikan Dana",
                'saldo'             => $jumlahHasil,
                'status_bayar'      => 2
            ];
            $this->db->insert('riwayat_transaksi', $data3);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Penarikan sebesar ' . number_format($jumlah_penarikan) . ' berhasil</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/penarikan');
        }
    }

    public function dataUser()
    {
        $user = $this->db->get_where('user', ['is_active' => 1])->result_array();
        $data = [
            'judul'     => "Halaman Admin | Data User",
            'user'      => $user
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/data_user');
        $this->load->view('templates/footer');
    }

    public function tambahDataUser()
    {
        $data = [
            'judul'  => "Halaman Admin | Tambah Data User"
        ];

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Kolom nama lengkap harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
            'required' => 'Kolom email harus diisi',
            'is_unique' => 'Email ini sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);
        $this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambah_user');
            $this->load->view('templates/footer');
        } else {
            $nama_lengkap = htmlspecialchars($_POST['nama_lengkap'], true);
            $email = htmlspecialchars($_POST['email'], true);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $data = [
                'name' => $nama_lengkap,
                'email' => $email,
                'image' => "default.png",
                'password' => $password,
                'date_created' => time(),
                'is_active' => 1,
                'role_id' => 2
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User berhasil ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/dataUser');
        }
    }

    public function EditUser($id_user)
    {
        $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
        $data = [
            'judul'  => "Halaman Admin | Edit Data User",
            'user'   => $user
        ];

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Kolom nama lengkap harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/edit_user');
            $this->load->view('templates/footer');
        } else {
            $nama_lengkap = htmlspecialchars($_POST['nama_lengkap'], true);

            $this->db->set('name', $nama_lengkap);
            $this->db->where('id', $id_user);
            $this->db->update('user');


            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User berhasil di edit</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/dataUser');
        }
    }

    public function gantiPassword($id_user)
    {
        $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
        $data = [
            'judul'  => "Halaman Admin | Ganti Password User",
            'user'   => $user
        ];

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);
        $this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/ganti_password');
            $this->load->view('templates/footer');
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->db->set('password', $password);
            $this->db->where('id', $id_user);
            $this->db->update('user');


            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password berhasil diganti</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Admin/dataUser');
        }
    }

    public function hapusUser($id_user)
    {

        $this->db->delete('user', ['id' => $id_user]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User Berhasil Dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('Admin/dataUser');
    }
}
