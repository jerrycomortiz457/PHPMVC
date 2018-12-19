<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->library('session');
                // $this->output->enable_profiler(TRUE);
        }

        public function index()
        {
                $this->load->library('pagination');
                $config['base_url'] = "/pagination/index";
                $config['per_page'] = 10;
                $config['num_links'] = 5;
                $config['total_rows'] = $this->db->get('leads')->num_rows();

                $this->pagination->initialize($config);
                $data['query'] = $this->db->get('leads', $config['per_page'], $this->uri->segment(3));
                $page_links = $this->pagination->create_links();
                $this->load->view('index', array('query' => $data['query'], 'page_links' => $page_links));
        }

        public function search()
        {
                $this->load->library('pagination');
                $this->session->set_userdata('name', $this->input->post('name'));
                $this->session->set_userdata('from_date', $this->input->post('from_date'));

                $config['base_url'] = "/pagination/search";
                $config['per_page'] = 10;
                $config['num_links'] = 5;
                                
                if(!empty($this->session->userdata()))
                {         
                        if(!empty($this->session->userdata('name'))){      
                                $config['reuse_query_string'] = FALSE;        
                                $config['total_rows'] = $this->db->get_where('leads', array('last_name' => $this->session->userdata('name')))->num_rows();
                        }
                        else{
                                $config['total_rows'] = $this->db->get('leads')->num_rows();
                        }

                //        if(!empty($this->session->userdata('from_date'))){
                //                 $config['reuse_query_string'] = FALSE;   
                //                 $data['query'] = $this->db->get_where('leads', array('registered_datetime >=' => $this->session->userdata('from_date')))->num_rows();
                //         }
                //         else{
                //                 $config['total_rows'] = $this->db->get('leads')->num_rows();
                //         }
                }

                $this->pagination->initialize($config);
                if(!empty($this->session->userdata())){
                        if(!empty($this->session->userdata('name'))){
                                $config['reuse_query_string'] = FALSE;   
                                $data['query'] = $this->db->get_where('leads', array('last_name' => $this->session->userdata('name')), $config['per_page'], $this->uri->segment(3));
                        }

                        else{
                                $config['total_rows'] = $this->db->get('leads')->num_rows();
                        }
                //        if(!empty($this->session->userdata('from_date'))){
                //                 $config['reuse_query_string'] = FALSE;   
                //                 $data['query'] = $this->db->get_where('leads', array('registered_datetime >=' => $this->session->userdata('from_date')),$config['per_page'], $this->uri->segment(3));
                //         }
                //         else{
                //                 $data['query'] = $this->db->get('leads', $config['per_page'], $this->uri->segment(3));
                //         }
                }     
                        
                $page_links = $this->pagination->create_links();
                $this->load->view('index', array('query' => $data['query'], 'page_links' => $page_links));
        }

}
