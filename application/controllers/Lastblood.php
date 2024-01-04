<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lastblood extends CI_Controller {

   
    public function __construct() {
        parent::__construct();

        $this->load->model('Lastblood_model');
        $this->load->library('form_validation');
        $this->load->library('session');
         if ($this->session->userdata() == FALSE){
            redirect('lastblood/login');
         }
    }

    public function index() {
        $data['lastblood_data'] = $this->Lastblood_model->get_all_data();
        $this->load->view('lastblood/lastblood_view', $data);
    }

    public function create() {
        $this->load->view('lastblood/create_lastblood_view');
    }

    public function update_statu($id) {
        $status = $this->input->post('status');
        $this->Lastblood_model->update_status($id, $status);
        echo json_encode(array('status' => 'success', 'message' => 'Status updated successfully'));
    }


    public function store() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('lastblood/create_lastblood_view');
        } else {
            $pass = md5($this->input->post('password'));

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'password' => $pass,
                'gender' => $this->input->post('gender'),
            );

            $this->Lastblood_model->insert_data($data);

            $this->session->set_flashdata('status', 'successfully ');

            redirect('lastblood/index');
        }
    }

    public function edit($id) {
        $data['lastblood_data'] = $this->Lastblood_model->get_data_by_id($id);
        $this->load->view('lastblood/edit_lastblood_view', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
      log_message('error', $this->db->last_query());
        if ($this->form_validation->run() == FALSE) {
            $data['lastblood_data'] = $this->Lastblood_model->get_data_by_id($id);
            $this->load->view('lastblood/edit_lastblood_view', $data);
        } else {
            $pass = md5($this->input->post('password'));

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'password' => $pass,
                'gender' => $this->input->post('gender'),
            );

            $this->Lastblood_model->update_data($id, $data);
                        $this->session->set_flashdata('status', 'successfully updated ');

            redirect('lastblood/index');
        }
    }


    public function login() {
        $this->load->view('lastblood/login_view');
    }

    // public function authenticate() {
    //     $this->form_validation->set_rules('identity', 'Email or Phone', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->login();
    //     } else {
    //         $identity = $this->input->post('identity');
    //         $password = $this->input->post('password');

    //         if ($this->Lastblood_model->login_driver($identity, $password)) {
    //             $this->session->set_userdata('logged_in', TRUE);
    //             redirect('lastblood/index');
    //         } else {
    //             $data['error'] = 'Invalid email/phone or password';
    //             $this->load->view('lastblood/login_view', $data);
    //         }
    //     }
    // }

   public function authenticate() {
        $this->form_validation->set_rules('identity', 'Email or Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');

            if ($this->Lastblood_model->login_driver($identity, $password)) {

                // $this->session->set_userdata('logged_in', TRUE);

                redirect('lastblood/index');
            } else {
                $data['error'] = 'Invalid email/phone or password';
                $this->load->view('lastblood/login_view', $data);
            }
        }
    }
    public function update_status($id) {
        $status = $this->input->post('status');
        $this->Lastblood_model->update_status($id, $status);
        echo json_encode(array('status' => 'success', 'message' => 'Status updated successfully'));
    }
    public function logout() {
        $var =  $this->session->sess_destroy('logged_in', FALSE);
        if($var == true){
            redirect('lastblood/login');
    }
        }
        
}
