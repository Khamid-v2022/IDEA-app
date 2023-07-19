<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	public function __construct()
    {
        parent::__construct('');
        $this->load->model('job_m');
        $this->load->model('post_m');
        $this->load->model('comment_m');
    }

	public function index()
	{
	}

	public function new(){
		$data['jobs'] = $this->job_m->get_list();
		$this->load->view('header');
		$this->load->view('post_new', $data);
	}

	public function submit_post(){
		$req = $this->input->post();

		$req['user_id'] = $this->session->user_data['id'];
		$exist = $this->post_m->add_item($req);
		if($exist){
			$this->generate_json("Added", true);
			return;
		}
		$this->generate_json("failed", false);
	}

	public function show_post($post_id){
		$data['post'] = $this->post_m->get_post($post_id);
		if(!$data['post'])
			redirect('/');
		$comments = $this->comment_m->get_comments($post_id);

		$main_comments = [];
		$sub_comments = [];

		foreach($comments as $comment){
			if(!$comment['parent_comment_id']){
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

	public function submit_comment(){
		$req = $this->input->post();

		$req['user_id'] = $this->session->user_data['id'];
		$exist = $this->comment_m->add_item($req);
		if($exist){
			$this->generate_json("Added", true);
			return;
		}
		$this->generate_json("failed", false);
	}
}
