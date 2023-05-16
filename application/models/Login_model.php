<?php
class Login_model extends CI_model{

public function login_user($username,$password){
  // var_dump($password);
$this->db->select('*');
$this->db->from('user');
$this->db->join('shop','user.us_shop=shop.id','left');
$this->db->where('user.us_username',$username);
$this->db->where('user.us_password',$password);
$query=$this->db->get();

  return $query->row_array();
// else{
//  return false;
// }


}


public function save_register($data){
  $this->db->insert('user', $data);
}
}