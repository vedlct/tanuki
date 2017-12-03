<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$config = array (

	'userRes' => array (
		array(
		        'field' => 'Name',
		        'label' => 'UserName',
		        'rules' => 'required|max_length[45]|xss_clean|htmlspecialchars',

		     ),
		array(
		        'field' => 'address',
		        'label' => 'Address',
		        'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
		     ),
        array(
            'field' => 'city',
            'label' => 'City',
            'rules' => 'required|max_length[11]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'pcode',
            'label' => 'Post Code',
            'rules' => 'required|max_length[11]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'email',
            'label' => 'User Email',
            'rules' => 'required|max_length[80]|valid_email|is_unique[users.email]|xss_clean|htmlspecialchars',
            'errors' => array(
                'is_unique' => 'Email Allready Existed ! User  Existed !',
            ),

        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|max_length[80]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'conPassword',
            'label' => 'Confirm Password',
            'rules' => 'required|max_length[80]|matches[password]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'required|max_length[18]|numeric|xss_clean|htmlspecialchars'
        ),
    ),

);
