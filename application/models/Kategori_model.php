<?php
class Kategori_model extends CI_Model
{
    // start datatables
    var $column_order = array(null, 'nama'); //set column field database for datatable orderable
    var $column_search = array('nama'); //set column field database for datatable searchable
    var $order = array('nama' => 'desc'); // default order


    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('t_kategori');

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
        $this->db->from('t_kategori');


        return $this->db->count_all_results();
    }
    // end datatables
    public function getKategori()
    {
        return $this->db->get('t_kategori')->result();
    }

    public function inputKategori($data)
    {
        $this->db->insert('t_kategori', $data);
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('t_kategori', ['kategori_id' => $id])->row_array();
    }

    public function editKategori($id, $nama, $tanggal, $jam)
    {
        $this->db->set('nama', $nama);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('jam', $jam);
        $this->db->where('kategori_id', $id);
        return $this->db->update('t_kategori');
    }

    public function deleteKategori($id)
    {
        $this->db->where('kategori_id', $id);
        return $this->db->delete('t_kategori');
    }
}
