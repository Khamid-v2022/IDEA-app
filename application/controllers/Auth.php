<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }

	public function index()
	{
	}

	public function signin_page()
	{
		$this->load->view('header');
		$this->load->view('sign_in');
	}

	public function signup_page()
	{
		$this->load->view('header');
		$this->load->view('sign_up');
	}

	public function signup(){
		$req = $this->input->post();

		// check aleady exist
		$exist = $this->auth_m->get_item(array('email' => $req['email']));
		if($exist){
			echo 'exist';
			return;
		}

	    $req['email'] = strtolower($req['email']);
		$req['password'] = sha1($req['password']);
		
		$user_id = $this->auth_m->add_item($req);
		if($user_id){
			echo 'yes';
			return;
		}
		
		echo 'no';
	}

	public function signin(){
		$req = $this->input->post();
	    $where['email'] = strtolower($req['email']);
		$where['password'] = sha1($req['password']);
		
		$user = $this->auth_m->get_item($where);
		if(empty($user)){
			echo 'no';
			return;
		}

		$user['is_loggedin'] = true;
		$this->session->set_userdata('user_data', $user);
		echo 'yes';
	}

	public function logout(){
		$this->session->sess_destroy();
        redirect('/');
	}
	
	// public function reset_password(){
	// 	$req = $this->input->post();

	// 	$where['admin_id'] = strtolower($req['admin_id']);
		
	// 	$user = $this->auth_m->get_item($where);
	// 	if(empty($user)){
	// 		echo 'no';
	// 		return;
	// 	}

	// 	// send Email
	// 	$new_password = $this->randomPassword();
	// 	$result = $this->send_email($user['admin_id'], $new_password);

	// 	if($result){
	// 		// reset password
	// 		$update_info['password'] = sha1($new_password);

	// 		$this->auth_m->update_item($update_info, $where);
	// 		echo 'yes';
	// 	}else{
	// 		echo 'failed';	
	// 	}

	// }

	private function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array();
	    $alphaLength = strlen($alphabet) - 1;
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass);
	}

	// private function send_email($email, $password){
	// 	// return true;
	// 	$mail = new PHPMailer;

	// 	try {
	// 	    //Server settings
	// 	    $mail->isSMTP();
		   
	// 	   	// $mail->SMTPDebug = 4;
		    
	// 	    $mail->Host       = MAIL_HOST;  
	// 	    $mail->SMTPAuth   = true;       
	// 	    $mail->Username   = MAIL_USER;    
	// 	    $mail->Password   = MAIL_PASS; 
	// 	    $mail->CharSet 	  = 'utf-8';
	// 	    $mail->SMTPSecure = 'tls';
	// 	    $mail->Port       = MAIL_PORT; 
	// 	    $mail->setFrom(MAIL_TO_MAIL, MAIL_TO_NAME);
 
	// 	    $mail->addAddress($email); 
		    
	// 	    $mail->isHTML(true);                                  
	// 	    $mail->Subject = "Please reset password!";
	// 	    $mail->Body    = "<p>Please log in with this password: <b>" . $password . "</b></p>";
	// 	    $mail->send();
	// 	    return true;
	// 	} catch (Exception $e) {
	// 		// return $mail->ErrorInfo;
	// 		return false;
	// 	}
	// }
}