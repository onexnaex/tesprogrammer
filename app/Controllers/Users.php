<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
	
    protected $userModel;
	protected $data;
	protected $session;
	
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
	    $this->userModel = new UserModel();
		$this->data['title'] = 'User';
		$this->data['controller'] = 'users';
		$this->data['session'] = $this->session;
		
	}
	
	public function Index()
	{

	    return view($this->data['controller'].'/login', $this->data);
			
	}

    public function Login()
    {
        $data = array(
			'username'		=> trim($this->request->getPost('username')),
			'password'	=> md5(trim($this->request->getPost('password')))
		);

        $countuser = $this->userModel->where('username',$data['username'])
        ->where('password',$data['password'])
        ->countAllResults();
        $users = $this->userModel->where('username',$data['username'])
                        ->where('password',$data['password'])
                        ->first();
        if($countuser > 0 )
        {
            
			//var_dump($users->id);
			//die();
			$ardata = [
				'last_login' => date("Y-m-d H:i:s")
			];
			
			$tempdata = $this->userModel->update($users->id, $ardata);
         

			$this->session->set(array(
				'logged_in'	=> true,


				'uid'		=> $users->id,


				'gid'		=> $users->fk_group,


				'eid'		=> $users->email,


				'll'		=> $users->last_login,


				'usr'		=> $users->username,

				'ava'		=> $users->avatar
                


				


			));

			$this->response->redirect(site_url('dashboard'));
        }
		else
		{
			$this->session->setFlashdata('error',lang("App.failed-login") );
			header('Location: '.base_url());
			exit();
		}
       
    }

	public function Logout()
	{
		$this->session->destroy();
		$this->response->redirect(site_url());
	}

	

		
}	
