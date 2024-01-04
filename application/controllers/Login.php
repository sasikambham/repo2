<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	parent::__construct

}
public function login()
{
 
    if ($this->input->post('submit')) {
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');

       
        if ($this->UserController->login($username, $password)) {
           
            redirect('UserController');
        } else {
            $data['error'] = 'worng password';
        }
    }

 
    $this->load->view('user_list', $data);
}



?>



