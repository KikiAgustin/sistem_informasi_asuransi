<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

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
        $anggota = $this->db->get('data_anggota')->result_array();
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
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambah_anggota');
            $this->load->view('templates/footer');
        } else {
            $ktp = $this->input->post('ktp');
            $nama = $this->input->post('nama');
            $umur = $this->input->post('umur');
            $alamat = $this->input->post('alamat');

            $data = [
                'ktp'       => $ktp,
                'nama'      => $nama,
                'umur'      => $umur,
                'alamat'    => $alamat
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
        $anggota = $this->db->get('data_anggota')->result_array();
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
        $data = [
            'judul'     => "Halaman Admin | Bayar Premi",
            'anggota'   => $anggota
        ];

        $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required');

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

            if ($jumlah_bayar < 500000) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Pembayaran Minimal Rp. 500.000</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Admin/bayarPremi/' . $id_anggota . '');
            }

            $data = [
                'id_anggota'        => $id_anggota,
                'tanggal_bayar'     => $tanggal_bayar,
                'jumlah_bayar'      => $jumlah_bayar,
                'jenis'             => "Pendidikan"
            ];

            $this->db->insert('bayar_premi', $data);
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
        $pembayaran = $this->db->get_where('bayar_premi', ['id_anggota' => $id_anggota])->result_array();

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
}
