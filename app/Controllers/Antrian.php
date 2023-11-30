<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Filters\Auth;

class Dashboard extends BaseController
{
	
	protected $data;
	protected $session;
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->data['title'] = 'Dashboard';
		$this->data['controller'] = 'dashboard';
		$this->data['session'] = $this->session;
       
       

		if($this->session->get('logged_in')==null) 
		{
			header('Location: '.base_url());
			exit();
		}
		
		
	}
	
	public function getIndex()
	{

	    return view($this->data['controller'].'/index', $this->data);
			
	}



	

		
}	
