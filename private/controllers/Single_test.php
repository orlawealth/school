<?php

/**
 * single test controller
 */
class Single_test extends Controller
{
	
	public function index($id = '')
	{
		// code...
		$errors = array();
		$tests = new Tests_model();
		$row = $tests->first('test_id', $id);

		$crumbs[] = ['Dashboard', ''];
		$crumbs[] = ['tests', 'tests'];
		if($row)
		{
			$crumbs[] = [$row->test, ''];
		}

		$limit = 10;
		$pager = new Pager($limit);
		$offset = $pager->offset;
		$quest = new Questions_model();

        $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'view';
		$results = false;

		$questions = $quest->where("test_id", $id);
		$total_questions = count($questions);

		$data['row'] = $row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['questions'] = $questions;
		$data['total_questions'] = $total_questions;
		$data['results'] = $results;
		$data['errors'] = $errors;
		$data['pager'] = $pager;

		$this->view('single-test', $data);
	}

	public function addsubjective($id = '')
	{
		// code...
		$errors = array();
		$tests = new Tests_model();
		$row = $tests->first('test_id', $id);

		$crumbs[] = ['Dashboard', ''];
		$crumbs[] = ['tests', 'tests'];
		if($row)
		{
			$crumbs[] = [$row->test, ''];
		}

        $page_tab = 'add-subjective';
		$limit = 10;
		$pager = new Pager($limit);
		$offset = $pager->offset;
		$quest = new Questions_model();

		if (count($_POST) > 0){
		

			if ($quest -> validate ($_POST))
			{
				// Check for files
				if($myimage = upload_image($_FILES))
				{
					$_POST['image'] = $myimage;
				}
				
				$_POST['test_id'] = $id;
				$_POST['date'] = date("Y-m-d H:i:s") ;
				if(isset($_GET['type']) && $_GET['type'] == "objective")
				{
					$_POST['question_type'] = 'objective' ;

				}else{
					$_POST['question_type'] = 'subjective' ;
				}
 
				$quest->insert($_POST);
				$this->redirect('single_test/'.$id);
			}else
			{
				//errors
				$errors = $quest->errors;
			}
		}

		$results = false;
		
		$data['row'] = $row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;
		$data['pager'] = $pager;

		$this->view('single-test', $data);
	}
	
}
