<?php
class Register_model extends CI_Model
{
 function insert($data)
 {
  $this->db->insert('codeigniter1_register', $data);
  return $this->db->insert_id();
 }

 function verify_email($key)
 {
  $this->db->where('verification_key', $key);
  $this->db->where('is_email_verified', 'no');
  $query = $this->db->get('codeigniter1_register');
  if($query->num_rows() > 0)
  {
   $data = array(
    'is_email_verified'  => 'yes'
   );
   $this->db->where('verification_key', $key);
   $this->db->update('codeigniter1_register', $data);
   return true;
  }
  else
  {
   return false;
  }
 }
}

?>
