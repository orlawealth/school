<?php

/**
 * login controller
 */
class Login extends Controller
{
	
	function index()
	{
		// code...
		$errors = array();

		if (count($_POST) > 0)
		{
			// I instantiated School class and added srow variable to add school name when we first log in 
			$user = new User();
			$school = new School();
			
			if($row = $user->where('email', $_POST['email']))
			{
				$row = $row[0];

				if(password_verify($_POST['password'], $row->password))
				{
					$school_row = $school->first('school_id', $row->school_id);
					$row->school_name = $school_row->school;
					Auth::authenticate($row);
					$this->redirect('/home');
				}
			}
			
			$errors['email'] = "wrong email or password";

		}

		$this->view('login', [
			'errors' => $errors
		]);
	}
}
