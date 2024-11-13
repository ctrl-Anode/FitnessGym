<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Users extends Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->call->model('users_model');
    }
	public function read()
    {
        $userdata['users']=$this->users_model->read();
        $this->call->view('gymusers/userdisplay', $userdata);
    }
    public function create()
    {
        if($this->form_validation->submitted()){
            $this->form_validation
                ->name('fname')
                     ->required('First name is required!')
                ->name('mname')
                     ->required('Middle name is required!')
                ->name('lname')
                     ->required('Last name is required!')
                ->name('uname')
                     ->required('Username is required!')
                ->name('email')
                     ->required('Email is required!')
                ->name('contact')
                     ->required('Contact is required!')
                ->name('gender')
                     ->required('Gender is required!')
                ->name('address')
                     ->required('Address is required!')
                ->name('password')
                     ->required('Address is required!');
        if($this->form_validation->run()){
            $first_name = $this->io->post('fname');
            $middle_name = $this->io->post('mname');
            $last_name = $this->io->post('lname');
            $username = $this->io->post('uname');
            $email = $this->io->post('email');
            $contact = $this->io->post('contact');
            $gender = $this->io->post('gender');
            $address = $this->io->post('address');
            $password = $this->io->post('password');

            if($this->users_model->create($first_name, $middle_name, $last_name, $username, $email, $contact, $gender, $address, $password)){
               set_flash_alert('success', 'User was added successfully!');
               redirect('user/display');
            }
        }
        else{
               set_flash_alert('danger', $this->form_validation->errors());
               redirect('user/add');
        }
        }
        $this->call->view('gymusers/usercreate');
    }
    public function update($id){
        if($this->form_validation->submitted()){
            $this->form_validation
            ->name('fname')
                ->required('First name is required!')
            ->name('mname')
                ->required('Middle name is required!')
            ->name('lname')
                ->required('Last name is required!')
            ->name('uname')
                ->required('Username is required!')
            ->name('email')
                ->required('Email is required!')
            ->name('contact')
                ->required('Contact is required!')
            ->name('gender')
                ->required('Gender is required!')
            ->name('address')
                ->required('Address is required!')
            ->name('password')
                ->required('Address is required!');
        if($this->form_validation->run()){
            $first_name = $this->io->post('fname');
            $middle_name = $this->io->post('mname');
            $last_name = $this->io->post('lname');
            $username = $this->io->post('uname');
            $email = $this->io->post('email');
            $contact = $this->io->post('contact');
            $gender = $this->io->post('gender');
            $address = $this->io->post('address');
            $password = $this->io->post('password');

            if($this->users_model->update($first_name, $middle_name, $last_name, $username, $email, $contact, $gender, $address, $password, $id)){
               set_flash_alert('success', 'User data was updated successfully!');
               redirect('user/display');
            }
        }
        else{
               set_flash_alert('danger', $this->form_validation->errors());
               redirect('user/display');
        }
        }
       
        $userdata['user'] = $this->users_model->get_one($id);
        $this->call->view('gymusers/userupdate', $userdata);
    }
    public function delete($id){
        if($this->users_model->delete($id)){
            set_flash_alert('success', 'User data was deleted successfully!');
            redirect('user/display');
        }else{
            set_flash_alert('danger', 'Something Went Wrong!');
            redirect('user/display');
        }
    }
    
}
?>
