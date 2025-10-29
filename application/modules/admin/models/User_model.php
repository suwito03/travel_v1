<?php

class User_model extends CI_Model
{

   public $_table = 'users';
   public $primary_key = 'id';
   public $name = 'username';
   public $email = 'email';
   public $active = 'active';


   function __construct()
   {
      parent::__construct();
   }

   // Insert New records
   public function create($insertData)
   {
      $result = $this->db->insert($this->_table, $insertData);

      return $result;
   }

   // get all records
   public function get_all()
   {
      $this->db->select('*')
        ->from($this->_table)
        ->order_by($this->primary_key, 'DESC');
      $query = $this->db->get();
      if ($query->num_rows() != 0) {
         return $query->result_array();
      } else {
         return false;
      }
   }

   public function get_all_users()
   {
      $this->db->select('u.*,GROUP_CONCAT(g.name) as group_name')
        ->from('users as u')
        ->join('users_groups as ug', 'ug.user_id = u.id', 'left')
        ->join('groups as g', 'g.id = ug.group_id', 'left')
        ->group_by('ug.user_id')
        ->order_by('u.id', 'DESC');
      $query = $this->db->get();
      if ($query->num_rows() != 0) {
         return $query->result_array();
      } else {
         return false;
      }
   }

    public function get($id = null, $order_by = null)
    {
        if (is_numeric($id)) {
            $this->db->where($this->primary_key, $id);
        }
        if (is_array($id)) {
            foreach ($id as $_key => $_values) {
                $this->db->where($_key, $_values);
            }
        }
        $q = $this->db->get($this->_table);
        return $q->result_array();

    }

    public function get_all_users_staff()
    {
        $this->db->select('u.*,GROUP_CONCAT(g.name) as group_name')
            ->from('users as u')
            ->join('users_groups as ug', 'ug.user_id = u.id', 'left')
            ->join('groups as g', 'g.id = ug.group_id', 'left')
            ->where('g.id=','4')
            ->group_by('ug.user_id')
            ->order_by('u.id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_all_users_agent()
    {
        $this->db->select('u.*,GROUP_CONCAT(g.name) as group_name, a.nama as namaagent, a.jenis')
            ->from('users as u')
            ->join('users_groups as ug', 'ug.user_id = u.id', 'left')
            ->join('groups as g', 'g.id = ug.group_id', 'left')
            ->join('agent as a', 'u.id = a.iduser', 'left')
            ->where('g.id=','2')
            ->group_by('ug.user_id')
            ->order_by('u.id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_all_users_not_admin()
    {
        $this->db->select('u.*,GROUP_CONCAT(g.name) as group_name')
            ->from('users as u')
            ->join('users_groups as ug', 'ug.user_id = u.id', 'left')
            ->join('groups as g', 'g.id = ug.group_id', 'left')
            ->where('g.id>','1')
            ->group_by('ug.user_id')
            ->order_by('u.id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

   // get a record by id
   public function get_by_id($id)
   {
      $this->db->select('*')
        ->from($this->_table)
        ->where($this->primary_key, $id);
      $query = $this->db->get();
      if ($query->num_rows() != 0) {
         return $query->result_array();
      } else {
         return false;
      }
   }


   // check duplicate entry or already exists
   public function exist($data, $id)
   {
      $query = $this->db->select('*')
        ->from($this->_table)
        ->where($this->name, $data)
        ->where_not_in($this->primary_key, $id)
        ->get();
      $num = $query->num_rows();
      if ($num == 0) {
         return true;
      } else {
         return false;
      }
   }

   // edit a record
   public function edit($updateData, $updateId)
   {
      $result = $this->db->where($this->primary_key, $updateId)->update($this->_table, $updateData);

      return $result;
   }

    public function update($new_data, $where)
    {
        if (is_numeric($where)) {
            $this->db->where($this->primary_key, $where);
        } elseif (is_array($where)) {
            foreach ($where as $_key => $_values) {
                $this->db->where($_key, $_values);
            }
        } else {
            die("Use Parameter to update");
        }
        $this->db->update($this->_table, $new_data);
        $this->db->affected_rows();
        return true;
    }


    // delete a record
   public function delete($id)
   {
      $result = $this->db->delete($this->_table, array($this->primary_key => $id));

      return $result;
   }

}