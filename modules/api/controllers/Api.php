<?php

use \WpOrg\Requests\Requests as RestapiRequests;

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('api_model');
        $this->load->library('app_modules');

        if (!$this->app_modules->is_active('api')) {
            access_denied("Api");
        }

        \modules\api\core\Apiinit::the_da_vinci_code('api');
    }

    public function api_management()
    {
        \modules\api\core\Apiinit::the_da_vinci_code('api');

        $data['user_api'] = $this->api_model->get_user();
        $data['title'] = _l('api_management');
        $this->load->view('api_management', $data);
    }

    /* API user statistics */
    public function user_stats($id = '')
    {
        \modules\api\core\Apiinit::ease_of_mind('api');

        if (!is_admin()) {
            access_denied('User Statistics');
        }

        $data['title'] = _l('user_statistics');
        $data['user_id'] = $id;
        
        if ($id) {
            $user_api = $this->api_model->get_user($id);
            $data['user_api'] = $user_api && count($user_api) ? $user_api[0] : null;
            
            if ($data['user_api']) {
                $data['quota_summary'] = $this->api_model->get_quota_summary($data['user_api']['token']);
                $data['quota_stats'] = $this->api_model->get_quota_stats($data['user_api']['token']);
                $data['top_endpoints'] = $this->api_model->get_top_endpoints($data['user_api']['token']);
            }
        }
        
        $data['api_users'] = $this->api_model->get_user();
        $this->load->view('user_stats', $data);
    }

    public function api_guide()
    { 
        fopen(APP_MODULES_PATH . 'api/views/apidoc/index.html', 'r');
    }

    /* Add new user or update existing*/
    public function user()
    {
        \modules\api\core\Apiinit::ease_of_mind('api');

        if (!is_admin()) {
            access_denied('Ticket Priorities');
        }
        if ($this->input->post()) {
            \modules\api\core\Apiinit::the_da_vinci_code('api');

            if (!$this->input->post('id')) {
                $id = $this->api_model->add_user($this->input->post());
               
                if ($id) {
                    set_alert('success', _l('added_successfully', _l('user_api')));
                }
                redirect(admin_url('api/api_management'));
            } else {
                $data           = $this->input->post();
                $id             = $data['id'];
                unset($data['id']);
                $success = $this->api_model->update_user($data, $id);
                if ($success) {
                    set_alert('success', _l('updated_successfully', _l('user_api')));
                }
                redirect(admin_url('api/api_management'));
            }
            die;
        }
    }

    /* Update user quotas */
    public function update_user_quotas()
    {
        \modules\api\core\Apiinit::ease_of_mind('api');

        if (!is_admin()) {
            access_denied('User Quotas');
        }
        
        if ($this->input->post()) {
            \modules\api\core\Apiinit::the_da_vinci_code('api');

            $data = $this->input->post();
            $id = $data['id'];
            unset($data['id']);
            
            // Add timestamp for quota update
            $data['quota_updated_at'] = date('Y-m-d H:i:s');
            
            $success = $this->api_model->update_user($data, $id);
            if ($success) {
                set_alert('success', _l('quota_updated_successfully'));
            } else {
                set_alert('danger', _l('quota_update_failed'));
            }
            redirect(admin_url('api/api_management'));
        }
    }

    /* Edit user */
    public function create_user()
    {
        \modules\api\core\Apiinit::ease_of_mind('api');

        if (!is_admin()) {
            access_denied('User');
        }
        $data['title'] = _l('new_user_api');
        $this->load->view('create_user_api', $data);
    }

    /* Edit user */
    public function edit_user($id)
    {
        \modules\api\core\Apiinit::ease_of_mind('api');

        if (!is_admin()) {
            access_denied('User');
        }
        if (!$id) {
            redirect(admin_url('api/api_management'));
        }
        $user_api = $this->api_model->get_user($id);
        $data['user_api'] = $user_api && count($user_api) ? $user_api[0] : null;
        $data['title'] = _l('edit_user_api');
        $this->load->view('edit_user_api', $data);
    }


    /* Delete user */
    public function delete_user($id)
    {
        \modules\api\core\Apiinit::ease_of_mind('api');
        
        if (!is_admin()) {
            access_denied('User');
        }
        if (!$id) {
            redirect(admin_url('api/api_management'));
        }
        $response = $this->api_model->delete_user($id);
        if ($response == true) {
            set_alert('success', _l('deleted', _l('user_api')));
        }
        redirect(admin_url('api/api_management'));
    }

    /* Get user statistics data via AJAX */
    public function get_user_stats_data()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $user_id = $this->input->post('user_id');
        $days = $this->input->post('days') ?: 30;
        
        if ($user_id) {
            $user_api = $this->api_model->get_user($user_id);
            if ($user_api && count($user_api)) {
                $api_key = $user_api[0]['token'];
                $quota_summary = $this->api_model->get_quota_summary($api_key);
                $quota_stats = $this->api_model->get_quota_stats($api_key, $days);
                $top_endpoints = $this->api_model->get_top_endpoints($api_key);
                
                echo json_encode([
                    'quota_summary' => $quota_summary,
                    'quota_stats' => $quota_stats,
                    'top_endpoints' => $top_endpoints
                ]);
                return;
            }
        }
        
        echo json_encode(['error' => 'User not found']);
    }

    /* Clean old logs */
    public function clean_logs()
    {
        if (!is_admin()) {
            access_denied('api_management');
        }

        $days = $this->input->post('days') ?: 90;
        
        if ($this->api_model->clean_old_logs($days)) {
            set_alert('success', _l('logs_cleaned_successfully'));
        } else {
            set_alert('danger', _l('log_cleaning_failed'));
        }
        
        redirect(admin_url('api/api_management'));
    }
}