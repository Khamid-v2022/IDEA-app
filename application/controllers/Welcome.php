<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_m');   
        $this->load->model('Comment_m');
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
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';      
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';    

        $this->pagination->initialize($config);


        $offset = ($page_number - 1) * $config['per_page'];
        
        $data["paginetionlinks"]   = $this->pagination->create_links();

        $list = $this->Post_m->get_list_by_page(NULL, $config['per_page'], $offset);
        if(count($list) > 0){
            for ($index = 0; $index < count($list); $index++){
                $list[$index]['created_at'] = $this->getTimeAgo($list[$index]['created_at']);
            }
        }
        
        $data['title'] = "Recent Projects";
        $data['list'] = $list;

        
        $this->load->view('header');
        $this->load->view('welcome', $data);
    }

    public function show_post($post_id){
        $post = $this->Post_m->get_post($post_id);
        if(!$post)
            redirect('/');

        $post['created_at'] = $this->getTimeAgo($post['created_at']);
        $data['post'] = $post;
        $comments = $this->Comment_m->get_comments($post_id);

        $main_comments = [];
        $sub_comments = [];

        foreach($comments as $comment){
            $comment['created_at'] = $this->getTimeAgo($comment['created_at']);
            if(!$comment['parent_comment_id']){
                $comment['reply_count'] = 0;
                // check how many reply is there
                foreach($comments as $sub_comment){
                    if($sub_comment['parent_comment_id'] && $comment['id'] == $sub_comment['parent_comment_id']){
                        $comment['reply_count'] ++;
                    }
                }

                array_push($main_comments, $comment);
            } else {
                array_push($sub_comments, $comment);
            }
        }

        $data['main_comments'] = $main_comments;
        $data['sub_comments'] = $sub_comments;

        $this->load->view('header');
        $this->load->view('post_show', $data);
    }

    public function my_project($page_number = 1){
        $total_posts = $this->Post_m->get_total_count(array('user_id' => $this->session->user_data['id']));
        // page nation
        $config['base_url'] = site_url() . 'welcome/my_project'; // Replace with your base URL
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
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';    
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';    

        $this->pagination->initialize($config);


        $offset = ($page_number - 1) * $config['per_page'];
        
        $data["paginetionlinks"]   = $this->pagination->create_links();

        $list = $this->Post_m->get_list_by_page($this->session->user_data['id'], $config['per_page'], $offset);

        if(count($list) > 0){
            for ($index = 0; $index < count($list); $index++){
                $list[$index]['created_at'] = $this->getTimeAgo($list[$index]['created_at']);
            }
        }
        
        $data['title'] = "My Projects";
        $data['list'] = $list;

        $this->load->view('header');
        $this->load->view('welcome', $data);
    }
    

    public function getTimeAgo($date)
    {
        $timestamp = strtotime($date);  
       
        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60","60","24","30","12","10");

        $currentTime = time();
        if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "s ago ";
        }
    }
}
