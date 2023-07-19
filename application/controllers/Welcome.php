<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_m');   
        $this->load->library('pagination'); 
    }

    public function index($page_number = 1)
    {
        $total_posts = $this->Post_m->get_total_count();

        // page nation
        $config['base_url'] = site_url() . 'welcome/index'; // Replace with your base URL
        $config['total_rows'] = $total_posts; // Replace with the total number of items in your data set
        $config['per_page'] = 5; // Number of items to show per page
        $config['uri_segment'] = 3; // The URI segment that contains the page number

        // Optional configuration settings
        $config['num_links'] = 3; // Number of pagination links to display
        $config['use_page_numbers'] = TRUE; // Use page numbers instead of offset
        $config['reuse_query_string'] = TRUE; // Maintain existing query string parameters
        $config['full_tag_open'] = '<ul class="pagination">'; // Opening tag for pagination wrapper
        $config['full_tag_close'] = '</ul>'; // Closing tag for pagination wrapper
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">'; // Opening tag for pagination numbers
        $config['num_tag_close'] = '</span></li>'; // Closing tag for pagination numbers
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">'; // Opening tag for the current page number
        $config['cur_tag_close'] = '</span></li>'; // Closing tag for the current page number
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';       
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';    

        $this->pagination->initialize($config);


        $offset = ($page_number - 1) * $config['per_page'];
        
        $data["paginetionlinks"]   = $this->pagination->create_links();

        $list = $this->Post_m->get_list_by_page($config['per_page'], $offset);

        $data['list'] = $list;

        $this->load->view('header');
        $this->load->view('welcome', $data);
        $this->load->view('footer');
    }
    
}
