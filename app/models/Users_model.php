<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Users_model extends Model {
	public function read(){
        return $this->db->table('fitnessgymusers')->get_all();
    }
    public function create($first_name, $middle_name, $last_name, $username, $email, $contact, $gender, $address, $password){
        $userdata = array(
            'first_name' => $first_name, 'middle_name' => $middle_name, 'last_name' => $last_name, 'username' => $username, 'email' => $email, 'contact' => $contact, 'gender' => $gender, 'address' => $address, 'password' => $password
        );
        return $this->db->table('fitnessgymusers')->insert($userdata);
    }
    public function get_one($id){
        return $this->db->table('fitnessgymusers')->where('id', $id)->get();
    }
    // public function update($id, $data){
    //     $userdata = array(
    //         $first_name = $data['first_name'],
    //         $middle_name = $data['middle_name'],
    //         $last_name = $data['last_name'],
    //         $username = $data['username'],
    //         $email = $data['email'],
    //         $contact = $data['contact'],
    //         $gender = $data['gender'],
    //         $address = $data['address'],
    //         $password = $data['password']
    //  );
    //     return $this->db->table('fitnessgymusers')->where('id', $id)->update($userdata);
    // }
    public function delete($id){
        return $this->db->table('fitnessgymusers')->where('id', $id)->delete();
    }
}
?>
