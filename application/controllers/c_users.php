<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->library(['form_validation', 'upload', 'image_lib']);
    }

    public function index($user_id = null) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        if ($user_id === null) {
            $user_id = $this->session->userdata('user_id');
        }

        $data['user'] = $this->m_users->get_user_by_id($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_users/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit($user_id) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $data['user'] = $this->m_users->get_user_by_id($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_users/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($user_id) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        // Form validation rules
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        // Validate password if provided
        if (!empty($this->input->post('password'))) {
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        }
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            $this->edit($user_id);
        } else {
            $data = [
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email')
            ];
    
            // Update password if provided
            if (!empty($this->input->post('password'))) {
                $new_password = $this->input->post('password');
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $data['password'] = $hashed_password;
            }
    
            // Handle profile picture upload
            $existing_user = $this->m_users->get_user_by_id($user_id);
            $existing_profile_picture = $existing_user['profile_picture'];
    
            if (!empty($_FILES['profile_picture']['name'])) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048; // 2MB
                $config['file_name'] = $user_id . '_' . time();
    
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('profile_picture')) {
                    $upload_data = $this->upload->data();
                    $data['profile_picture'] = $upload_data['file_name'];
    
                    // Resize image to 160x160
                    $this->resize_image($upload_data['full_path']);
    
                    // Delete the old profile picture file
                    $this->delete_old_profile_picture($existing_profile_picture);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $this->edit($user_id);
                    return;
                }
            }
    
            if ($this->m_users->update_user($user_id, $data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
            }
            redirect('user-profile/index/' . $user_id);
        }
    }
    
    
    
    public function upload_profile_picture() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = uniqid();
        $config['max_size'] = 2048; // 2MB
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_picture')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(['status' => 'error', 'message' => $error]);
        } else {
            $upload_data = $this->upload->data();
            $user_id = $this->session->userdata('user_id');

            // Resize image to 160x160
            $this->resize_image($upload_data['full_path']);

            $data = array(
                'profile_picture' => $upload_data['file_name']
            );

            // Update user profile picture in the database
            $this->m_users->update_user($user_id, $data);

            echo json_encode(['status' => 'success', 'message' => 'Profile picture uploaded successfully.']);
        }
    }

    public function delete_profile_picture($user_id) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        // Get the existing profile picture filename
        $existing_user = $this->m_users->get_user_by_id($user_id);
        $existing_profile_picture = $existing_user['profile_picture'];
    
        // Delete the old profile picture file
        $this->delete_old_profile_picture($existing_profile_picture);
    
        // Update database to remove profile picture reference
        $data = ['profile_picture' => NULL];
        if ($this->m_users->update_user($user_id, $data)) {
            $this->session->set_flashdata('success', 'Profile picture deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete profile picture.');
        }
    
        redirect('user-profile/index/' . $user_id);
    }

    private function resize_image($full_path) {
        $resize_config = [
            'image_library' => 'gd2',
            'source_image' => $full_path,
            'maintain_ratio' => TRUE,
            'width' => 160,
            'height' => 160
        ];

        $this->image_lib->initialize($resize_config);
        if (!$this->image_lib->resize()) {
            // Handle resizing errors
            echo json_encode(['status' => 'error', 'message' => $this->image_lib->display_errors()]);
            return;
        }
    }

    private function delete_old_profile_picture($filename) {
        if ($filename && file_exists('./assets/img/profile/' . $filename)) {
            unlink('./assets/img/profile/' . $filename);
        }
    }

}
?>
