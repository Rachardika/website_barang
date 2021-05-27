<?php

class Kepala_model extends CI_Model
{
    public function editProfil($nama, $nip, $tempat, $gelar, $jenis, $pangkat,  $jabatan)
    {
        $this->db->set('nama_guru', $nama);
        $this->db->set('gelar', $gelar);
        $this->db->set('tempat_lahir', $tempat);
        $this->db->set('jenis_kelamin', $jenis);
        $this->db->set('pangkat_golongan', $pangkat);
        $this->db->set('jabatan_fungsional', $jabatan);
        $this->db->where('nip', $nip);
        return $this->db->update('tbl_guru');
    }

    public function cariWarga($nama)
    {
        $this->db->select('tbl_guru.nip as nip, tbl_guru.nama_guru as nama, tbl_guru.gelar as gelar, tbl_guru.mata_pelajaran as mapel, tbl_guru.jabatan_fungsional as jabatan, tbl_guru.masa_kerja as lama, tbl_penilaian.tanggal_nilai, tbl_penilaian.periode_nilai, tbl_penilaian.guru_penilai, tbl_penilaian.jumlah_nilai, tbl_penilaian.nilai_pkg, tbl_penilaian.angka_kredit');
        $this->db->from('tbl_warga');
        $this->db->join('tbl_penilaian', 'tbl_penilaian.guru_dinilai = tbl_guru.nip');
        $this->db->where('tbl_guru.nip', $nama);
        $this->db->or_where('tbl_guru.nama_guru', $nama);
        return $this->db->get()->row_array();
    }

    public function cariGuru2($nama)
    {
        $this->db->select('nip, nama, gelar, keahlian as mapel, pangkat, masa');
        $this->db->from('user');
        $this->db->where('username', $nama);
        return $this->db->get()->row_array();
    }
    public function cariRiwayatpkg($nip)
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian');
        $this->db->where('guru_dinilai', $nip);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function cariRiwayatkeaisyahan($nip)
    {
        $this->db->select('*');
        $this->db->from('tbl_keaisyiahan');
        $this->db->where('guru_dinilai', $nip);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function getGuruAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $query = "SELECT `*` FROM `tbl_guru`";
        return $this->db->get()->result_array();
    }

    public function getGuruLimit($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->select('*');
            $this->db->from('tbl_guru');
            $this->db->like('nama_guru', $keyword);
            $this->db->or_like('nip', $keyword);
            return $this->db->get()->result_array();
        } else {
            return $this->db->get('tbl_guru', $limit, $start)->result_array();
        }
    }

    public function countGuru()
    {
        return $this->db->get('tbl_guru')->num_rows();
    }


    var $column_order = array(null, 'nama', 'nip', 'keahlian'); //set column field database for datatable orderable
    var $column_search = array('nama', 'nip', 'keahlian'); //set column field database for datatable searchable
    var $order = array('nip' => 'desc'); // default order

    private function _get_datatables_query()
    {


        $this->db->select('*');
        $this->db->where('user.id_role = 1');
        $this->db->from('user');

        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->count_all_results();
    }
    function mulai($dinilai)
    {
        $data = [
            'guru_dinilai' => $dinilai,
            'jml_nilai' => 0,
            'nilai_pkg' => 0,
            'angka_kredit' => 0
        ];
        $this->db->insert('tbl_penilaian', $data);
        $id = $this->db->insert_id();
        $data2 = [
            'id' => $id,
            'guru_dinilai' => $dinilai,
            'jml_nilai' => 0,
            'nilai_aisiyah' => 0,
            'angka_kredit' => 0
        ];
        $this->db->insert('tbl_keaisyiahan', $data2);
        for ($i = 1; $i <= 19; $i++) {
            $data[$i] = [
                'id_kp' . $i => $id,
                'guru_dinilai' => $dinilai
            ];
            $this->db->insert('kompetensi' . $i, $data[$i]);
        }
    }

    // cari nama guru berdasar id kompetensi
    function cariHasil($id)
    {
        $this->db->select('guru_dinilai');
        $this->db->from('tbl_penilaian');
        $this->db->where('id_nilai', $id);
        $nip = $this->db->get()->row_array();
        $nip = $nip['guru_dinilai'];
        $this->db->select('nip, nama, gelar, keahlian as mapel, pangkat, masa');
        $this->db->from('user');
        $this->db->where('nip', $nip);
        return $this->db->get()->row_array();
    }
    //uname berdasar id penilaian
    function cariuname($id)
    {
        $this->db->select('guru_dinilai');
        $this->db->from('tbl_penilaian');
        $this->db->where('id_nilai', $id);
        $nip = $this->db->get()->row_array();
        $nip = $nip['guru_dinilai'];
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nip', $nip);
        return $this->db->get()->row_array();
    }

    public function getSek()
    {
        return $this->db->get_where('data_sekolah', ['id_kota' => 1])->row_array();
    }
    public function editSeko($kepsek, $nip, $instansi, $telp, $desa, $kec, $kab, $prov)
    {
        $this->db->set('kepsek', $kepsek);
        $this->db->set('nip', $nip);
        $this->db->set('instansi', $instansi);
        $this->db->set('telp', $telp);
        $this->db->set('desa', $desa);
        $this->db->set('kec', $kec);
        $this->db->set('kab', $kab);
        $this->db->set('prov', $prov);
        $this->db->where('id_kota', 1);
        return $this->db->update('data_sekolah');
    }
}
