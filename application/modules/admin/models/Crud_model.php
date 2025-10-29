<?php
class CRUD_model extends CI_Model
{
    protected $_table = null;
    protected $_primary_key = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null, $order_by = null)
    {
        if(is_numeric($id)) {
            $this->db->where($this->_primary_key,$id);
        }
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }
        $q = $this->db->get($this->_table);
        return $q ->result_array();

    }
    
    public function get_where($where)
    {
        $this->db->where($where);
        $q = $this->db->get($this->_table);
        return $q ->result_array();
    }
    
    public function get_where2($id = null, $order_by = null)
    {
        if(is_array($id)){
            $i=1;
            foreach ($id as $_key => $_values){
                if ($i % 2 === 0){
                    if ($i==6){
                        $this->db->where($_key, $_values);
                    }else{
                        $this->db->or_where($_key, $_values);
                    }
                   
                }else {
                    $this->db->where($_key, $_values);
                }
                
                $i++;
            }
        }
        $q = $this->db->get($this->_table);
        return $q ->result_array();
    }

    public function getlike($id = null, $order_by = null)
    {
        if(is_numeric($id)) {
            $this->db->where($this->_primary_key,$id);
        }
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->like($_key, $_values,'both');
            }
        }
        $q = $this->db->get($this->_table);
        return $q ->result_array();

    }
    
    public function getlikecompany($id = null)
    {

        $q = $this->db->query("SELECT * FROM docreq WHERE jenisdoc='Company' and proses LIKE '%$id%'");
        return $q ->result_array(); 
    }
    
    public function getlikepersonal($id = null)
    {
        
        $q = $this->db->query("SELECT * FROM docreq WHERE jenisdoc='Personal' and proses LIKE '%$id%'");
        return $q ->result_array();
    }

   public function getnotlike($id = null, $order_by = null)
    {
        if(is_numeric($id)) {
            $this->db->where($this->_primary_key,$id);
        }
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->not_like($_key, $_values);
            }
        }
        $q = $this->db->get($this->_table);
        return $q ->result_array();

    }

    public function get_order($id = null, $order_by = null)
    {

        if(is_numeric($id)) {
            $this->db->where($this->_primary_key,$id);
        }
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }
        $this->db->order_by($this->_primary_key, "DESC");
        $q = $this->db->get($this->_table);
        return $q ->result_array();

    }

    public function get_orderlimit1($id = null, $order_by = null)
    {

        if(is_numeric($id)) {
            $this->db->where($this->_primary_key,$id);
        }
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }
        $this->db->order_by($this->_primary_key, "DESC");
        $this->db->limit(1);
        $q = $this->db->get($this->_table);
        return $q ->result_array();
    }
    
    public function select_order_asc($select = null,$id = null, $kolom = null)
    {
        $this->db->select($select);
        if(is_numeric($id)) {
            $this->db->where($this->_primary_key,$id);
        }
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }
        $this->db->order_by($kolom, "ASC");
        $q = $this->db->get($this->_table);
        return $q ->result_array();
        
    }
    public function select_get($select = null,$id = null)
    {
        $this->db->select($select);
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }
        $q = $this->db->get($this->_table);
        return $q ->result_array(); 
    }
    
    public function select_count($id = null)
    {
        $this->db->select('count('.$this->_primary_key.')');
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }
        $q = $this->db->get($this->_table);
        return $q->result_array();
    }
    
    
    public function get_order_date($id = null, $order_by = null)
    {

        if(is_numeric($id)) {
            $this->db->where($this->_primary_key,$id);
        }
        if(is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }
        $this->db->order_by($this->_primary_key, "ASC");
        $q = $this->db->get($this->_table);
        return $q ->result_array();

    }

    public function insert($data)
    {
        $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
    }

    public function update($new_data, $where)
    {
        if(is_numeric($where)) {
            $this->db->where($this->_primary_key,$where);
        }
        elseif(is_array($where)){
            foreach ($where as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }else{
            die("Use Parameter to update");
        }
        $this->db->update($this->_table, $new_data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        if (is_numeric($id)){
            $this->db->where($this->_primary_key,$id);
        }
        elseif (is_array($id)){
            foreach ($id as $_key => $_values){
                $this->db->where($_key, $_values);
            }
        }else{
            die("Use Parameter to delete");
        }
        $this->db->delete($this->_table);
        return $this->db->affected_rows();
    }

    public function insertUpdate($data,$id = false)
    {
        if(!$id){
            die("Use Parameter to a second parameter to the insertupdate method");
        }
        $this->db->select($this->_primary_key);
        $this->db->where($this->_primary_key,$id);
        $q = $this->db->get($this->_table);
        $result = $q->num_rows();
        if ($result == 0){
            //insert
            return $this->insert($data);
        }else{
            //update
            return $this->update($data,$id);
        }
    }
}