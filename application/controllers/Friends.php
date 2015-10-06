<?php

class friends extends CI_Controller {
	function index() {
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('friends/friend');
		} else {
		$this->load->view('login');
		}
	}
	function register() {
		$this->load->model('friend');
		$this->friend->register($this->input->post());
	}
	function login() {
		$this->load->model('friend');
		$this->friend->login($this->input->post());
	}
	function logout() {
		$this->session->sess_destroy();
		redirect("/");
	}
	function friend() {
		$this->load->model('friend');
		$friends = $this->friend->find_friends($this->session->userdata('id'));
		$other_users = $this->friend->other_users($this->session->userdata('id'));
		$this->load->view("home", array('friends' =>$friends, 'other_users' => $other_users));
	}
	function remove() {
		$this->load->model('friend');
		$this->friend->remove($this->input->post());
		redirect('/');
	}
	function user($id) {
		$this->load->model('friend');
		$user = $this->friend->get_user($id);
		$this->load->view('profile', array('user' => $user));
	}
	function add_friend() {
		$this->load->model('friend');
		$this->friend->add_friend($this->input->post());
		redirect("/");
	}
}



 ?>
