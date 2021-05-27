<?php
class Stockout_model extends CI_Model
{
    // start datatables
    var $column_order = array(null, 'barcode', 'nama', 'tanggal', 'penerima'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'nama', 'penerima'); //set column field database for datatable searchable
    var $order = array('barcode' => 'desc'); // default order


    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('t_stockout');
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
        $this->db->from('t_stockout');


        return $this->db->count_all_results();
    }

    public function inputStockout($data)
    {
        $this->db->insert('t_stockout', $data);
    }

    public function getStockoutById($id)
    {
        return $this->db->get_where('t_stockout', ['stockout_id' => $id])->row_array();
    }


    public function editStockout($id, $barcode, $nama, $tanggal, $jam, $kategori, $detail, $jumlah, $penerima, $stock)
    {
        $this->db->set('barcode', $barcode);
        $this->db->set('kategori', $kategori);
        $this->db->set('nama', $nama);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('jam', $jam);
        $this->db->set('stock', $stock);
        $this->db->set('detail', $detail);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('penerima', $penerima);
        $this->db->where('stockout_id', $id);
        return $this->db->update('t_stockout');
    }

    public function deleteStockout($id)
    {
        $this->db->where('stockout_id', $id);
        return $this->db->delete('t_stockout');
    }
}
