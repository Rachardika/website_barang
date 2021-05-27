<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
        $this->load->library('Ciqrcode');
    }

    public function index()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard User',
        ];
        $data['aktif'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // echo 'selamat datang ' . $data['user']['username'];
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/user_footer');
    }

    public function profil()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard User',
            'aktif' => 'profil'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // echo 'selamat datang ' . $data['user']['username'];
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('template/user_footer');
    }



    public function editProfil()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Profil User',
            'aktif' => 'profil'
        ];


        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/edit_profil', $data);
            $this->load->view('template/user_footer');
        } else {
            $id_user = $data['user']['id_user'];
            $nama = $this->input->post('nama');
            $no_identitas = $this->input->post('no_identitas');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $pangkat = $this->input->post('pangkat');
            $tmt = $this->input->post('tmt');
            $masa = $this->input->post('masa');
            $jenkel = $this->input->post('jenkel');
            $username = $this->input->post('username');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $nama_gambar = './assets/images/avatar/' . $data['user']['image'];
                if (is_readable($nama_gambar) && unlink($nama_gambar)) {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('user/editProfil/' . $data['user']['id_user']);
                    }
                } else {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('user/editProfil/' . $data['user']['id_user']);
                    }
                }
            }

            // $this->db->set('nama', $nama);
            $this->db->set('nip', $no_identitas);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('pangkat', $pangkat);
            $this->db->set('masa', $masa);
            $this->db->set('jenkel', $jenkel);
            $this->db->set('username', $username);
            $this->db->where('id_user', $id_user);
            $this->db->update('user');

            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profil anda telah diperbarui!</div>');
            $this->session->set_flashdata('profil', 'Diubah');
            redirect('user/profil');
        }
    }

    public function item()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Pegawai',
            'aktif' => 'item'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/item', $data);
    }
    function get_ajax_item()
    {
        $list = $this->Item_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->barcode;
            $row[] = $item->nama;
            $row[] = $item->lokasi;
            $row[] = $item->stock;

            $row[] = '
                   <a href="' . site_url('user/barcode_qrcode/' . $item->item_id) . '" class="btn btn-primary btn-xs float-center generate-member"><i class="fas fa-barcode"></i></a>
                   <a href="' . site_url('user/QRcode/' . $item->barcode) . '" class="btn btn-primary btn-xs float-center generate-member"><i class="fas fa-qrcode"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Item_model->count_all(),
            "recordsFiltered" => $this->Item_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    public function QRcode($item_id)
    {

        $data['admin'] = $this->Item_model->getItem1ById($item_id);
        //render  qr code dengan format gambar PNG
        QRcode::png(
            $item_id,
            $outfile = false,
            $level = QR_ECLEVEL_M,
            $size  = 100,
            $margin = 2
        );
    }


    public function barcode_qrcode($id)
    {

        $this->check_login();
        $data = [
            'tittle' => 'Barcode Generator',
            'aktif' => 'item',
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->Item_model->getItemById($id);
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/barcode_qrcode', $data);
        $this->load->view('template/user_footer');
    }

    public function stockIn()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Stock',
            'aktif' => 'stockin',
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/tabelbarangMasuk', $data);
    }

    function get_ajax_stockin()
    {
        $list = $this->Stockin_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->barcode;
            $row[] = $item->nama;
            $row[] = $item->tanggal;
            $row[] = $item->detail;

            $row[] = '<a href="' . base_url('user/editStockin/' . $item->stockin_id) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('user/detailStockin/' . $item->stockin_id) . '" class="btn btn-info btn-xs float-center hapus-member"><i class="fas fa-search"></i> Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Stockin_model->count_all(),
            "recordsFiltered" => $this->Stockin_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    public function addStockin()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Stock',
            'aktif' => 'stockin',
            'item' => $this->Item_model->getItem(),
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/barangMasuk', $data);
            $this->load->view('template/user_footer');
        } else {

            $barcode = $this->input->post('barcode');
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $kategori = $this->input->post('kategori');
            $jam = $this->input->post('jam');
            $stock = $this->input->post('stock');
            $detail = $this->input->post('detail');
            $jumlah = $this->input->post('jumlah');
            $username = $this->input->post('username');

            $data = [

                'barcode' => $barcode,
                'nama' => $nama,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'kategori' => $kategori,
                'stock' => $stock,
                'detail' => $detail,
                'jumlah' => $jumlah,
                'username' => $username,
            ];

            $this->Stockin_model->inputStockin($data, 't_stockin');
            $this->session->set_flashdata('user', 'Ditambah');
            redirect('user/stockIn');
        }
    }

    public function editStockin($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Stockin',
            'aktif' => 'stockin',
            'item' => $this->Item_model->getItem(),
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['stock'] = $this->Stockin_model->getStockinById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/edit_stockin', $data);
            $this->load->view('template/user_footer');
        } else {
            $barcode = $this->input->post('barcode');
            $kategori = $this->input->post('kategori');
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');
            $stock = $this->input->post('stock');
            $detail = $this->input->post('detail');
            $jumlah = $this->input->post('jumlah');
            $username = $this->input->post('username');

            $data = [

                'barcode' => $barcode,
                'nama' => $nama,
                'kategori' => $kategori,
                'stock' => $stock,
                'detail' => $detail,
                'jumlah' => $jumlah,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'username' => $username,
            ];

            $this->Stockin_model->editStockin($id, $barcode, $nama, $tanggal, $jam, $kategori, $detail, $jumlah, $username, $stock);
            $this->session->set_flashdata('admin', 'Diubah');
            redirect('user/stockIn');
        }
    }
    public function detailStockin($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Stockin',
            'aktif' => 'stockin',
            'item' => $this->Item_model->getItem(),
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['stock'] = $this->Stockin_model->getStockinById($id);

        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/detail_stockin', $data);
        $this->load->view('template/user_footer');
    }

    public function stockOut()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Stock',
            'aktif' => 'stockout',
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/tabelbarangKeluar', $data);
    }
    function get_ajax_stockout()
    {
        $list = $this->Stockout_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->barcode;
            $row[] = $item->nama;
            $row[] = $item->tanggal;
            $row[] = $item->penerima;

            $row[] = '<a href="' . base_url('user/editStockout/' . $item->stockout_id) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('user/detailStockout/' . $item->stockout_id) . '" class="btn btn-info btn-xs float-center hapus-member"><i class="fas fa-search"></i> Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Stockout_model->count_all(),
            "recordsFiltered" => $this->Stockout_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function addStockout()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Stock',
            'aktif' => 'stockout',
            'item' => $this->Item_model->getItem(),
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/barangKeluar', $data);
            $this->load->view('template/user_footer');
        } else {

            $barcode = $this->input->post('barcode');
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $kategori = $this->input->post('kategori');
            $jam = $this->input->post('jam');
            $stock = $this->input->post('stock');
            $detail = $this->input->post('detail');
            $jumlah = $this->input->post('jumlah');
            $penerima = $this->input->post('penerima');

            $data = [

                'barcode' => $barcode,
                'nama' => $nama,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'kategori' => $kategori,
                'stock' => $stock,
                'detail' => $detail,
                'jumlah' => $jumlah,
                'penerima' => $penerima,
            ];

            $this->Stockout_model->inputStockout($data, 't_stockout');
            $this->session->set_flashdata('user', 'Ditambah');
            redirect('user/stockOut');
        }
    }
    public function editStockout($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Stockout',
            'aktif' => 'stockout',
            'item' => $this->Item_model->getItem(),
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['stock'] = $this->Stockout_model->getStockoutById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/edit_stockout', $data);
            $this->load->view('template/user_footer');
        } else {
            $barcode = $this->input->post('barcode');
            $kategori = $this->input->post('kategori');
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');
            $stock = $this->input->post('stock');
            $detail = $this->input->post('detail');
            $jumlah = $this->input->post('jumlah');
            $penerima = $this->input->post('penerima');

            $data = [

                'barcode' => $barcode,
                'nama' => $nama,
                'kategori' => $kategori,
                'stock' => $stock,
                'detail' => $detail,
                'jumlah' => $jumlah,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'penerima' => $penerima,
            ];

            $this->Stockout_model->editStockout($id, $barcode, $nama, $tanggal, $jam, $kategori, $detail, $jumlah, $penerima, $stock);
            $this->session->set_flashdata('admin', 'Diubah');
            redirect('user/stockOut');
        }
    }
    public function detailStockout($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Stockin',
            'aktif' => 'stockout',
            'item' => $this->Item_model->getItem(),
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['stock'] = $this->Stockout_model->getStockoutById($id);

        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/detail_stockout', $data);
        $this->load->view('template/user_footer');
    }
    public function ubah_password()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Password Guru',
            'aktif' => 'profil'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/ubah_password', $data);
            $this->load->view('template/user_footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
                redirect('user/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
                    redirect('user/ubah_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
                    $this->session->set_flashdata('password', 'Diubah');
                    redirect('user/profil');
                }
            }
        }
    }
    public function check_login()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('id_role') != 1) {
                redirect('kepala');
            }
        }
    }
}
