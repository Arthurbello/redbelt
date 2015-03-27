<?php
class process extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function compare_login($thepost)
    {
        $query = $this->db->query('SELECT * FROM users');
        foreach ($query->result() as $user) {
	        if ($thepost['email'] != $user->email || md5($thepost['password']) != $user->password){
	        	$this->session->set_flashdata('login_error', 'Email/password is incorrect');
	        }
	        
	        else {
	        	$this->session->set_userdata('id',  $user->id);
		        $this->session->set_userdata('email',  $user->email);
		        $this->session->set_userdata('first_name',  $user->first_name);
		        $this->session->set_userdata('last_name',  $user->last_name);
		        
	        }
        };
		
    }
    
    function compare_registration($thepost)
    {
	   	$errors = array();
	   	$query = $this->db->query('SELECT * FROM users');
	        foreach ($query->result() as $user) {
		        if ($thepost['email'] == $user->email){
			        $errors[] = 'Email already exists';
		        	
		        };
		        
		        if (md5($thepost['password']) == $user->password){
			        $errors[] = 'Password already exists';
		        	
		        }
		    }
		    
			if (count($errors) > 0) {
				$this->session->set_flashdata('registration_error', $errors);
				return;
			}
	    
		    $this->db->query('INSERT INTO users (email, password, first_name, last_name, created_at) VALUES ("'.$thepost['email'].'", "'.md5($thepost['password']).'", "'.$thepost['first_name'].'", "'.$thepost['last_name'].'", NOW())');
		    $this->session->set_flashdata('success', 'You have successfully registered');
	    
	    
    }

    function get_friends()
    {
    	return $this->db->query('SELECT users.first_name, friends.first_name, friendships.user_id, friendships.friend_id, friends.id FROM users LEFT JOIN friendships ON friendships.user_id = users.id LEFT JOIN users as friends ON friends.id = friendships.friend_id WHERE users.id ='.$this->session->userdata('id'))->result_array();
    }

    function get_not_friends()
    {
    	return $this->db->query('SELECT * FROM users WHERE users.id NOT IN (SELECT friendships.friend_id from friendships WHERE user_id = '.$this->session->userdata('id').') AND id != '.$this->session->userdata('id'))->result_array();
    }
    
    function get_specific_user($id)
    {
    	return $this->db->query('SELECT * FROM users WHERE id ='. $id)->result_array();
    }
    
}

?>