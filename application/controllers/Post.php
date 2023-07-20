<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	public function __construct()
    {
        parent::__construct('');
        $this->load->model('Job_m');
        $this->load->model('Post_m');
        $this->load->model('Comment_m');
    }

	public function index()
	{
	}

	public function get_jobs(){
		$jobs = $this->Job_m->get_list();
		$this->generate_json(array('jobs' => $jobs), true);
	}

	public function new(){
		$data['jobs'] = $this->Job_m->get_list();
		$this->load->view('header');
		$this->load->view('post_new', $data);
	}

	public function submit_post(){
		$req = $this->input->post();

		$req['user_id'] = $this->session->user_data['id'];
		$req['title'] = strip_tags($req['title']);
		$req['detail'] = strip_tags($req['detail']);
		$req['created_at'] = date("Y-m-d H:i:s");
		
		$exist = $this->Post_m->add_item($req);
		if($exist){
			$this->generate_json("Added", true);
			return;
		}
		$this->generate_json("failed", false);
	}


	// Not using because post can be showed without login
	
	// public function show_post($post_id){
    //     $post = $this->Post_m->get_post($post_id);
    //     if(!$post)
    //         redirect('/');

    //     $post['created_at'] = $this->getTimeAgo($post['created_at']);
    //     $data['post'] = $post;
    //     $comments = $this->Comment_m->get_comments($post_id);

    //     $main_comments = [];
    //     $sub_comments = [];

    //     foreach($comments as $comment){
    //     	$comment['created_at'] = $this->getTimeAgo($comment['created_at']);
    //         if(!$comment['parent_comment_id']){
    //         	$comment['reply_count'] = 0;
    //         	// check how many reply is there
    //         	foreach($comments as $sub_comment){
    //         		if($sub_comment['parent_comment_id'] && $comment['id'] == $sub_comment['parent_comment_id']){
	// 					$comment['reply_count'] ++;
    //         		}
    //         	}

    //             array_push($main_comments, $comment);
    //         } else {
    //             array_push($sub_comments, $comment);
    //         }
    //     }

    //     $data['main_comments'] = $main_comments;
    //     $data['sub_comments'] = $sub_comments;

    //     $this->load->view('header');
    //     $this->load->view('post_show', $data);
    // }

	public function submit_comment(){
		$req = $this->input->post();

		$req['user_id'] = $this->session->user_data['id'];
		$req['content'] = strip_tags($req['content']);
		$req['created_at'] = date("Y-m-d H:i:s");

		$exist = $this->Comment_m->add_item($req);
		if($exist){
			$this->generate_json("Added", true);
			return;
		}
		$this->generate_json("failed", false);
	}
}
