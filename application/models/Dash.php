<?php 
class Dash extends CI_Model{
	function __construct() 
	{
	}
	public function login($user_info)
	{
	$query = "SELECT * FROM users WHERE USERs.password = ? AND Users.email = ?";
	$values = array($user_info['pw'], $user_info['login']);
	return $this->db->query($query, $values)->row_array();
	}
	public function registration($user_info)
	{
		//add to database send back to login page if first user, make them admin.
		$queryadmin = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at, user_level) VALUES (?,?,?,?,now(),now(), admin)"; 
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at, user_level) VALUES (?,?,?,?,now(),now(), 'normal')"; 

		$values = (array($user_info['first_name'], $user_info['last_name'], $user_info['email'], $user_info['password']));
		
		$this->session->set_flashdata('login', 'registration complete proceed to login.');
	
		return $this->db->query($query, $values);
	}
	public function getusers()
	{
		return $this->db->query("SELECT * FROM users ORDER BY users.id DESC")->result_array();
	}
	public function getuser($id)
	{
		return $this->db->query("SELECT * FROM users WHERE users.id = ?
			", $id)->row_array();
	}
	public function postmessage($id)
	{
		$post = $this->input->post();
		$query = "INSERT INTO messages (user_id, message, created_at, updated_at, wall_id) VALUES (?, ?, now(), now(), ?)";
		$values = array($id, $post['message'], $post['wall_id']);
		$this->db->query($query, $values);
	}
	public function postcomment($post)
	{
		$post = $this->input->post();
		$query = "INSERT INTO comments (comment, created_at, updated_at, user_id, message_id) VALUES (?, now(), now(), ?, ?)";
		$values = array($post['comment'], $post['user_id'], $post['message_id']);
		$this->db->query($query, $values);
	}
	public function wallmessages($id)
	{
		return $this->db->query("SELECT * FROM messages WHERE user.id");
	}
	public function get_messages($id)
	{
		
		return $this->db->query("SELECT messages.id,messages.message,messages.created_at,messages.wall_id,messages.user_id,users.first_name,users.last_name FROM messages JOIN users ON messages.user_id = users.id WHERE wall_id = ?", $id)->result_array();
	}
	public function get_comments($message_id)
	{
		return $this->db->query("select users.first_name, users.last_name, comments.id, comments.comment, comments.created_at, comments.user_id, comments.message_id from comments JOIN users WHERE users.id = comments.user_id")->result_array();
	}
	public function update($user)
	{
		
		
		$post = $this->input->post();
		// var_dump($post);
		// die();
		$query = "UPDATE users SET email=?, first_name=?, last_name=?, description=?, password=?, updated_at=now() WHERE id=?";
		$values = array($post['email'], $post['first_name'], $post['last_name'], $post['description'], $post['password'], $post['id']);

		return $this->db->query($query, $values);
	}
	public function delete($id)
	{
		return $this->db->query("DELETE FROM users WHERE id=?", $id);
	}

//end model
}


?>