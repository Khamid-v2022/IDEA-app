<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

	public function index()
	{
		$data['prayer_list'] = $this->pray_m->get_list();

		$this->load->view('manage', $data);

	}

	public function update_note(){
		$req = $this->input->post();
		$where['id'] = $req['id'];
		$this->pray_m->update_note($req, $where);

		echo 'ok';
	}

	public function delete_note(){
		$req = $this->input->post();
		$where['id'] = $req['id'];
		$this->pray_m->delete_note($where);
		
		echo 'ok';
	}
}
