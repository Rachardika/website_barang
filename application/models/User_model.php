<?php

class User_model extends CI_Model
{
    public function editProfil($nama, $nip, $tempat, $gelar, $jenis, $pangkat, $pendidikan, $mapel, $jabatan, $kerja)
    {
        $this->db->set('nama_guru', $nama);
        $this->db->set('gelar', $gelar);
        $this->db->set('tempat_lahir', $tempat);
        $this->db->set('jenis_kelamin', $jenis);
        $this->db->set('pangkat_golongan', $pangkat);
        $this->db->set('pendidikan_terakhir', $pendidikan);
        $this->db->set('mata_pelajaran', $mapel);
        $this->db->set('jabatan_fungsional', $jabatan);
        $this->db->set('masa_kerja', $kerja);
        $this->db->where('nip', $nip);
        return $this->db->update('tbl_guru');
    }
    public function cariRiwayatPkg($nip)
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian');
        $this->db->where('guru_dinilai', $nip);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function cariRiwayatAisyiah($nip)
    {
        $this->db->select('*');
        $this->db->from('tbl_keaisyiahan');
        $this->db->where('guru_dinilai', $nip);
        $data = $this->db->get();
        return $data->result_array();
    }
    function getNilai($id)
    {
        $this->db->select('kompetensi1.k1_kompetensi as k1,kompetensi2.k2_kompetensi as k2,kompetensi3.k3_kompetensi as k3,kompetensi4.k4_kompetensi as k4,kompetensi5.k5_kompetensi as k5,kompetensi6.k6_kompetensi as k6,kompetensi7.k7_kompetensi as k7,kompetensi8.k8_kompetensi as k8,kompetensi9.k9_kompetensi as k9,kompetensi10.k10_kompetensi as k10,kompetensi11.k11_kompetensi as k11,kompetensi12.k12_kompetensi as k12,kompetensi13.k13_kompetensi as k13,kompetensi14.k14_kompetensi as k14,kompetensi15.k15_kompetensi as k15, tbl_penilaian.jml_nilai as jumlah, tbl_penilaian.nilai_pkg as pkg');
        $this->db->from('kompetensi1');
        $this->db->join('kompetensi2', 'kompetensi1.id_kp1=kompetensi2.id_kp2');
        $this->db->join('kompetensi3', 'kompetensi1.id_kp1=kompetensi3.id_kp3');
        $this->db->join('kompetensi4', 'kompetensi1.id_kp1=kompetensi4.id_kp4');
        $this->db->join('kompetensi5', 'kompetensi1.id_kp1=kompetensi5.id_kp5');
        $this->db->join('kompetensi6', 'kompetensi1.id_kp1=kompetensi6.id_kp6');
        $this->db->join('kompetensi7', 'kompetensi1.id_kp1=kompetensi7.id_kp7');
        $this->db->join('kompetensi8', 'kompetensi1.id_kp1=kompetensi8.id_kp8');
        $this->db->join('kompetensi9', 'kompetensi1.id_kp1=kompetensi9.id_kp9');
        $this->db->join('kompetensi10', 'kompetensi1.id_kp1=kompetensi10.id_kp10');
        $this->db->join('kompetensi11', 'kompetensi1.id_kp1=kompetensi11.id_kp11');
        $this->db->join('kompetensi12', 'kompetensi1.id_kp1=kompetensi12.id_kp12');
        $this->db->join('kompetensi13', 'kompetensi1.id_kp1=kompetensi13.id_kp13');
        $this->db->join('kompetensi14', 'kompetensi1.id_kp1=kompetensi14.id_kp14');
        $this->db->join('kompetensi15', 'kompetensi1.id_kp1=kompetensi15.id_kp15');
        $this->db->join('tbl_penilaian', 'kompetensi1.id_kp1=tbl_penilaian.id_nilai');
        $this->db->where('kompetensi1.id_kp1', $id);
        return $this->db->get()->row();
    }
    function getNilai1($id)
    {
        $this->db->select('kompetensi16.k16_kompetensi as k16, kompetensi17.k17_kompetensi as k17,kompetensi18.k18_kompetensi as k18,kompetensi19.k19_kompetensi as k19, tbl_keaisyiahan.jml_nilai as jumlah, tbl_keaisyiahan.nilai_aisiyah as aisyiah');
        $this->db->from('kompetensi16');
        $this->db->join('kompetensi17', 'kompetensi16.id_kp16=kompetensi17.id_kp17');
        $this->db->join('kompetensi18', 'kompetensi16.id_kp16=kompetensi18.id_kp18');
        $this->db->join('kompetensi19', 'kompetensi16.id_kp16=kompetensi19.id_kp19');
        $this->db->join('tbl_keaisyiahan', 'kompetensi16.id_kp16=tbl_keaisyiahan.id');
        $this->db->where('kompetensi16.id_kp16', $id);
        return $this->db->get()->row();
    }
    function getnilaiguru($id, $guru)
    {
        $this->db->select('kompetensi1.k1_kompetensi as k1,kompetensi2.k2_kompetensi as k2,kompetensi3.k3_kompetensi as k3,kompetensi4.k4_kompetensi as k4,kompetensi5.k5_kompetensi as k5,kompetensi6.k6_kompetensi as k6,kompetensi7.k7_kompetensi as k7,kompetensi8.k8_kompetensi as k8,kompetensi9.k9_kompetensi as k9,kompetensi10.k10_kompetensi as k10,kompetensi11.k11_kompetensi as k11,kompetensi12.k12_kompetensi as k12,kompetensi13.k13_kompetensi as k13,kompetensi14.k14_kompetensi as k14,kompetensi15.k15_kompetensi as k15,tbl_penilaian.jml_nilai as jumlah, tbl_penilaian.nilai_pkg as pkg');
        $this->db->from('kompetensi1');
        $this->db->join('kompetensi2', 'kompetensi1.id_kp1=kompetensi2.id_kp2');
        $this->db->join('kompetensi3', 'kompetensi1.id_kp1=kompetensi3.id_kp3');
        $this->db->join('kompetensi4', 'kompetensi1.id_kp1=kompetensi4.id_kp4');
        $this->db->join('kompetensi5', 'kompetensi1.id_kp1=kompetensi5.id_kp5');
        $this->db->join('kompetensi6', 'kompetensi1.id_kp1=kompetensi6.id_kp6');
        $this->db->join('kompetensi7', 'kompetensi1.id_kp1=kompetensi7.id_kp7');
        $this->db->join('kompetensi8', 'kompetensi1.id_kp1=kompetensi8.id_kp8');
        $this->db->join('kompetensi9', 'kompetensi1.id_kp1=kompetensi9.id_kp9');
        $this->db->join('kompetensi10', 'kompetensi1.id_kp1=kompetensi10.id_kp10');
        $this->db->join('kompetensi11', 'kompetensi1.id_kp1=kompetensi11.id_kp11');
        $this->db->join('kompetensi12', 'kompetensi1.id_kp1=kompetensi12.id_kp12');
        $this->db->join('kompetensi13', 'kompetensi1.id_kp1=kompetensi13.id_kp13');
        $this->db->join('kompetensi14', 'kompetensi1.id_kp1=kompetensi14.id_kp14');
        $this->db->join('kompetensi15', 'kompetensi1.id_kp1=kompetensi15.id_kp15');
        $this->db->join('tbl_penilaian', 'kompetensi1.id_kp1=tbl_penilaian.id_nilai');
        $this->db->where('kompetensi1.id_kp1', $id);
        $this->db->where('kompetensi1.guru_dinilai', $guru);
        return $this->db->get()->row();
    }
}
