<?php

class friend extends CI_Model {
	function __construct() {
		$this->load->database();
	}
	function register($post) {
		$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', "trim|required");
		$this->form_validation->set_rules('alias', 'Alias', "trim|required");
		$this->form_validation->set_rules('email', "email", "trim|required|valid_email");
		$this->form_validation->set_rules('password', 'Password', "trim|required|matches[password_confirm]|min_length[8]|md5");
		$this->form_validation->set_rules('password_confirm', "Confirm Password");
		$this->form_validation->set_rules('birth_date', 'Birth Date', "trim|required");
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/");
		} else {
			$query = "INSERT INTO `red_belt`.`users` (`name`, `alias`, `email`, `password`, `birth_date`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
			$values = [$post["name"], $post['alias'], $post['email'], md5($post['password']), $post['birth_date']];
			$this->db->query($query, $values);
			$this->session->set_flashdata('errors', '<h5>User Succesfully Created</h5>');
			redirect("/");
		}
	}
	function login($post) {
		$user = $this->db->query("SELECT * FROM users WHERE email = ?", array($post['email']))->row_array();
		if ($user['password'] == md5($post['password'])) {
			$this->session->set_userdata($user);
			$this->session->set_userdata('logged_in', TRUE);
			redirect('/');
		} else {
			$this->session->set_flashdata('errors', '<p>email and password don\'t match');
			redirect("/");
		}
	}
	function find_friends($id) {
		$query = "SELECT friends.id AS friend_table_id, users.id, users.name, users.alias, friend.id AS friend_id, friend.name AS friend_name, friend.alias AS friend_alias FROM users
		LEFT JOIN friends
		ON users.id = friends.user_id
		LEFT JOIN users AS friend
		ON friend.id = friends.friend
		WHERE friends.user_id = ? OR friends.friend = ?";
		return $this->db->query($query, array($id, $id))->result_array();
	}
	function other_users($id) {
		$query = "SELECT * FROM users
				WHERE id NOT IN (SELECT users.id FROM friends
				LEFT JOIN users
				ON friends.user_id = users.id
				LEFT JOIN users AS users1
				ON friends.friend = users1.id
				WHERE friends.friend = ?) AND id NOT IN (SELECT users.id FROM friends
				LEFT JOIN users
				ON friends.friend = users.id
				LEFT JOIN users AS users1
				ON friends.user_id = users1.id
				WHERE friends.user_id = ?) AND id != ?";
	 	return $this->db->query($query, array($id, $id, $id))->result_array();
	}
	function remove($post) {
		$this->db->query("DELETE FROM `red_belt`.`friends` WHERE `id`=?", array($post['remove']));
	}
	function get_user($id) {
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
	}
	function add_friend($post) {
		$query = "INSERT INTO `red_belt`.`friends` (`user_id`, `friend`) VALUES (?, ?)";
		$this->db->query($query, array($post['to_add'], $post['adding']));
	}
}


 ?>
