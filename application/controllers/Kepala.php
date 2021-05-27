<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Ciqrcode');
    }


    public function index()
    {
        $this->check_login();

        $data = [
            'tittle' => 'Dashboard Kepala',
            'aktif' => 'dashboard'
        ];
        // var_dump($this->session->userdata('id_role'));
        // die;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // echo 'selamat datang ' . $data['user']['username'];
        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/index', $data);
        $this->load->view('template/kepala_footer');
    }
    public function profil()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Kepala ',
            'aktif' => 'profil',
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['profil'] = $this->db->get_where('tbl_guru', ['nip' => $this->session->userdata('nip')])->row_array();
        // echo 'selamat datang ' . $data['user']['username'];
        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/profil', $data);
        $this->load->view('template/kepala_footer');
    }

    public function guru404()
    {
        $data['tittle'] = 'tidak ditemukan';
        $this->load->view('template/kepala_header', $data);
        $this->load->view('kepala/guru404');
        $this->load->view('template/kepala_footer');
    }

    public function check_login()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('id_role') == '1') {
                redirect('user');
                // } else if ($this->session->userdata('level') == 'Admin') {
                //     redirect('auth/logout');
                // }
            }
            $this->session->unset_userdata('hasil');
            $this->session->unset_userdata('id_nilai');
        }
    }

    public function check_cari()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('id_role') == '1') {
                redirect('user');
                // } else if ($this->session->userdata('level') == 'Admin') {
                //     redirect('auth/logout');
                // }
            }
            $this->session->unset_userdata('id_nilai');
        }
    }
    public function check_id()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('id_role') == '1') {
                redirect('user');
                // } else if ($this->session->userdata('level') == 'Admin') {
                //     redirect('auth/logout');
                // }
            }
        }
    }
    public function editProfil()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Profil Kepala',
            'aktif' => 'profil',

        ];

        // $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('no_identitas', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/edit_profil', $data);
            $this->load->view('template/kepala_footer');
        } else {
            $nama = $this->input->post('nama');
            $nip = $this->input->post('no_identitas');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $pangkat = $this->input->post('pangkat');
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
                        redirect('kepala/editProfil/' . $data['user']['id_user']);
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
                        redirect('kepala/editProfil/' . $data['user']['id_user']);
                    }
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('nip', $nip);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('pangkat', $pangkat);
            $this->db->set('jenkel', $jenkel);
            $this->db->set('username', $username);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('profil', 'Diubah');
            redirect('kepala/profil');
        }
    }

    function get_ajax_admin()
    {
        $list = $this->Admin_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama;
            $row[] = $item->nip;
            $row[] = $item->pangkat;

            $row[] = '<a href="' . base_url('assets/images/avatar/' . $item->image) . '" target="_blank"><img src="' . base_url('assets/images/avatar/' . $item->image) . '" class="img" style="width:100px"></a>';
            $row[] = '<a href="' . base_url('kepala/editAdmin/' . $item->id_user) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('kepala/deleteAdmin/' . $item->id_user) . '" class="btn btn-danger btn-xs float-center hapus-member"><i class="fas fa-trash-alt"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Admin_model->count_all(),
            "recordsFiltered" => $this->Admin_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function admin()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Kepala',
            'aktif' => 'pegawai'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $this->load->library('pagination');



        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/admin', $data);
    }

    public function addAdmin()
    {
        $this->check_login();

        $data = [
            'tittle' => 'Tambah Data Pegawai',
            'aktif' => 'pegawai',

        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[user.nip]', [
            'is_unique' => 'Nomor identitas sudah terdaftar!'
        ]);
        // $this->form_validation->set_rules('username', 'username', 'required|trim|valid_username|is_unique[user.username]', [
        //     'is_unique' => 'This username has already registered!'
        // ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');



        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/tambah_pegawai', $data);
            $this->load->view('template/kepala_footer');
        } else {

            $tipe_member = 1;
            $nama = $this->input->post('nama');
            $img = 'default.png';
            $no_identitas = $this->input->post('nip');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $pangkat = $this->input->post('pangkat');
            $jenkel = $this->input->post('jenkel');

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));




            $data = [

                'id_role' => $tipe_member,
                'nama' => $nama,
                'image' => $img,
                'username' => $username,
                'password' => $password,
                'nip' => $no_identitas,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'pangkat' => $pangkat,
                'jenkel' => $jenkel,
            ];


            $this->Admin_model->inputAdmin($data, 'user');
            $this->session->set_flashdata('user', 'Ditambah');
            redirect('kepala/admin');
        }
    }

    public function editAdmin($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Pegawai',
            'aktif' => 'pegawai',

        ];

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->Admin_model->getAdminById($id);



        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'Nomor Identitas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/edit_pegawai', $data);
            $this->load->view('template/kepala_footer');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $pangkat = $this->input->post('pangkat');
            $tmt = $this->input->post('tmt');
            $pendidikan = $this->input->post('pendidikan');
            $keahlian = $this->input->post('keahlian');






            $file_lama = $this->Admin_model->getAdminById($id);
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $nama_file = './assets/images/avatar/' . $file_lama['image'];
                if (is_readable($nama_file) && unlink($nama_file)) {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('image', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('super/editAdmin/' . $data['user']['id_user']);
                    }
                } else {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('image', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('kepala/editAdmin/' . $data['user']['id_user']);
                    }
                }
            }

            $this->Admin_model->editAdmin($id, $nama, $username, $tempat_lahir, $tgl_lahir, $pangkat, $tmt, $pendidikan, $keahlian);
            $this->session->set_flashdata('admin', 'Diubah');
            redirect('kepala/admin');
        }
    }

    public function deleteAdmin($id)
    {
        $data = $this->Admin_model->getAdminById($id);
        $nama_gambar = './assets/images/avatar/' . $data->image;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->Admin_model->deleteAdmin($id);
            $this->session->set_flashdata('admin', 'Dihapus');
            redirect('kepala/admin');
        }
        $this->Admin_model->deleteAdmin($id);
        $this->session->set_flashdata('admin', 'Dihapus');
        redirect('kepala/admin');
    }
    function get_ajax_kategori()
    {
        $list = $this->Kategori_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama;

            $row[] = '<a href="' . base_url('kepala/editKategori/' . $item->kategori_id) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('kepala/deleteKategori/' . $item->kategori_id) . '" class="btn btn-danger btn-xs float-center hapus-member"><i class="fas fa-trash-alt"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Kategori_model->count_all(),
            "recordsFiltered" => $this->Kategori_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    public function kategori()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Kepala',
            'aktif' => 'kategori'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/kategori', $data);
    }



    public function addKategori()
    {
        $this->check_login();

        $data = [
            'tittle' => 'Tambah Data Item',
            'aktif' => 'kategori',

        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/tambah_kategori', $data);
            $this->load->view('template/kepala_footer');
        } else {

            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');

            $data = [

                'nama' => $nama,
                'tanggal' => $tanggal,
                'jam' => $jam,
            ];


            $this->Kategori_model->inputKategori($data, 't_kategori');
            $this->session->set_flashdata('user', 'Ditambah');
            redirect('kepala/kategori');
        }
    }

    public function editKategori($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Kategori',
            'aktif' => 'kategori',

        ];

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->Kategori_model->getKategoriById($id);



        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/edit_kategori', $data);
            $this->load->view('template/kepala_footer');
        } else {
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');

            $data = [

                'nama' => $nama,
                'tanggal' => $tanggal,
                'jam' => $jam,
            ];

            $this->Kategori_model->editKategori($id, $nama, $tanggal, $jam);
            $this->session->set_flashdata('admin', 'Diubah');
            redirect('kepala/kategori');
        }
    }

    public function deleteKategori($id)
    {
        $data = $this->Kategori_model->getKategoriById($id);
        $this->Kategori_model->deleteKategori($id);
        $this->session->set_flashdata('admin', 'Dihapus');
        redirect('kepala/kategori');
    }



    public function item()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Kepala',
            'aktif' => 'item'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/item', $data);
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

            $row[] = '<a href="' . base_url('kepala/editItem/' . $item->item_id) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('kepala/deleteItem/' . $item->item_id) . '" class="btn btn-danger btn-xs float-center hapus-member"><i class="fas fa-trash-alt"></i> Hapus</a>
                   <a href="' . site_url('kepala/barcode_qrcode/' . $item->item_id) . '" class="btn btn-primary btn-xs float-center generate-member"><i class="fas fa-barcode"></i></a>
                   <a href="' . site_url('kepala/QRcode/' . $item->barcode) . '" class="btn btn-primary btn-xs float-center generate-member"><i class="fas fa-qrcode"></i></a>';
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
        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/barcode_qrcode', $data);
        $this->load->view('template/kepala_footer');
    }

    public function addItem()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Tambah Data Item',
            'aktif' => 'item',
            'kategori' => $this->Kategori_model->getKategori(),
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/tambah_item', $data);
            $this->load->view('template/kepala_footer');
        } else {

            $barcode = $this->input->post('barcode');
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $kategori = $this->input->post('kategori');
            $lokasi = $this->input->post('lokasi');
            $jam = $this->input->post('jam');
            $stock = $this->input->post('stock');

            $data = [

                'barcode' => $barcode,
                'nama' => $nama,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'kategori' => $kategori,
                'lokasi' => $lokasi,
                'stock' => $stock,
            ];

            $this->Item_model->inputItem($data, 't_item');
            $this->session->set_flashdata('user', 'Ditambah');
            redirect('kepala/item');
        }
    }


    public function editItem($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Kategori',
            'aktif' => 'item',

        ];

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->Item_model->getItemById($id);


        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/edit_item', $data);
            $this->load->view('template/kepala_footer');
        } else {
            $barcode = $this->input->post('barcode');
            $nama = $this->input->post('nama');
            $kategori = $this->input->post('kategori');
            $lokasi = $this->input->post('lokasi');
            $stock = $this->input->post('stock');
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');

            $data = [

                'barcode' => $barcode,
                'nama' => $nama,
                'kategori' => $kategori,
                'lokasi' => $lokasi,
                'stock' => $stock,
                'tanggal' => $tanggal,
                'jam' => $jam,
            ];

            $this->Item_model->editItem($id, $barcode, $nama, $tanggal, $jam, $kategori,  $lokasi, $stock);
            $this->session->set_flashdata('admin', 'Diubah');
            redirect('kepala/item');
        }
    }

    public function deleteItem($id)
    {
        $data = $this->Item_model->getItemById($id);
        $this->Item_model->deleteItem($id);
        $this->session->set_flashdata('admin', 'Dihapus');
        redirect('kepala/item');
    }

    public function stockIn()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Stock',
            'aktif' => 'stockin',
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/tabelbarangMasuk', $data);
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

            $row[] = '<a href="' . base_url('kepala/editStockin/' . $item->stockin_id) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('kepala/deleteStockin/' . $item->stockin_id) . '" class="btn btn-danger btn-xs float-center hapus-member"><i class="fas fa-trash-alt"></i> Hapus</a>
                   <a href="' . site_url('kepala/detailStockin/' . $item->stockin_id) . '" class="btn btn-info btn-xs float-center hapus-member"><i class="fas fa-search"></i> Detail</a>';
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
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/barangMasuk', $data);
            $this->load->view('template/kepala_footer');
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
            redirect('kepala/stockIn');
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
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/edit_stockin', $data);
            $this->load->view('template/kepala_footer');
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
            redirect('kepala/stockIn');
        }
    }
    public function deleteStockin($id)
    {
        $data = $this->Stockin_model->getStockinById($id);
        $this->Stockin_model->deleteStockin($id);
        $this->session->set_flashdata('admin', 'Dihapus');
        redirect('kepala/stockIn');
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

        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/detail_stockin', $data);
        $this->load->view('template/kepala_footer');
    }

    public function stockOut()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Stock',
            'aktif' => 'stockout',
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/tabelbarangKeluar', $data);
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

            $row[] = '<a href="' . base_url('kepala/editStockout/' . $item->stockout_id) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('kepala/deleteStockout/' . $item->stockout_id) . '" class="btn btn-danger btn-xs float-center hapus-member"><i class="fas fa-trash-alt"></i> Hapus</a>
                   <a href="' . site_url('kepala/detailStockout/' . $item->stockout_id) . '" class="btn btn-info btn-xs float-center hapus-member"><i class="fas fa-search"></i> Detail</a>';
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
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/barangKeluar', $data);
            $this->load->view('template/kepala_footer');
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
            redirect('kepala/stockOut');
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
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/edit_stockout', $data);
            $this->load->view('template/kepala_footer');
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
            redirect('kepala/stockOut');
        }
    }
    public function deleteStockout($id)
    {
        $data = $this->Stockout_model->getStockoutById($id);
        $this->Stockout_model->deleteStockout($id);
        $this->session->set_flashdata('admin', 'Dihapus');
        redirect('kepala/stockOut');
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

        $this->load->view('template/kepala_header', $data);
        $this->load->view('template/kepala_sidebar', $data);
        $this->load->view('template/kepala_topbar', $data);
        $this->load->view('kepala/detail_stockout', $data);
        $this->load->view('template/kepala_footer');
    }

    public function ubah_password()
    {

        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Kepala',
            'aktif' => 'dashboard',

        ];

        $data['title'] = 'Ubah Password | SUPER super';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/kepala_header', $data);
            $this->load->view('template/kepala_sidebar', $data);
            $this->load->view('template/kepala_topbar', $data);
            $this->load->view('kepala/ubah_password', $data);
            $this->load->view('template/kepala_footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
                redirect('kepala/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
                    redirect('kepala/ubah_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
                    $this->session->set_flashdata('password', 'Diubah');
                    redirect('kepala/index');
                }
            }
        }
    }
}
