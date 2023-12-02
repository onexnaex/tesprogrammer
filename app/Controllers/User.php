<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GroupModel;

class User extends BaseController
{
	
    protected $userModel;
	protected $groupModel;
    protected $validation;
	protected $data;
	protected $session;
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
	    $this->userModel = new UserModel();
		$this->groupModel = new GroupModel();
       	$this->validation =  \Config\Services::validation();
		$this->data['title'] = 'User';
		$this->data['controller'] = 'user';
		$this->data['session'] = $this->session;
		$this->data['group'] = $this->groupModel->findAll();

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

	public function getView($id)
    {
        $this->data['model'] = $this->userModel->where('id',$id)->first();
		$group = $this->groupModel->where('id',$this->data['model']->fk_group)->first();
		$this->data['model']->group = $group->group;
		$this->data['model']->aktif = $this->data['model']->aktif == "1" ? "Aktif":"Non Aktif";

        return view($this->data['controller'].'/view',$this->data);
    }

    public function getAdd($id='')
    {
        if (!empty($id))
        {
            $this->data['model'] = $this->userModel->where('id',$id)->first();
        }
        else
        {
            $this->data['model'] = $this->userModel->getColumnTable();
        }


        return view($this->data['controller'].'/form',$this->data);
    }

	public function postAll()
	{
 		$response = $data['data'] = array();	

		//$result = $this->userModel->select()->findAll();
		$result = $this->userModel->showingalldata();
		//var_dump($result);
		//die();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
            $ops .= '<a class="col px-1 text-info" href="'.site_url( $this->data['controller'].'/view/'.$value->id).'" title="view"><i class="fa-solid fa-eye"></i> </a>';
			$ops .= '<a class="col px-1 text-orange" href="'.site_url( $this->data['controller'].'/add/'.$value->id).'" title="edit"><i class="fa-solid fa-pen-to-square"></i>  </a>';
			$ops .= '<a class="col px-1 text-danger" href="#" onClick="remove('. $value->id .')" title="delete"><i class="fa-solid fa-trash"></i></a>';
			$ops .= '</div>';

			$data['data'][$key] = array(
				$value->username,
				$value->email,
				$value->no_telp,
				$value->group,
				$value->aktif =="1"?"Aktif":"Non Aktif",

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function postSave()
    {
        $response = array();
       

		$fields['id'] = $this->request->getPost('id');
		$fields['username'] = $this->request->getPost('username');
		$fields['password'] = $this->request->getPost('password');
		$fields['confirm_password'] = $this->request->getPost('confirm_password');
		$fields['email'] = $this->request->getPost('email');
		$fields['avatar'] = $this->request->getPost('avatar');
		$fields['no_telp'] = $this->request->getPost('no_telp');
		$fields['fk_group'] = $this->request->getPost('fk_group');
      
            if (!empty($fields['id']))
            {
				
				$modeluser =  $this->userModel->where('id', $fields['id'])->first();
				if(empty($fields['password']))
				{		
					$fields['password'] = $modeluser->password;
					$fields['confirm_password'] = $modeluser->password;
				}
				
				
				

                if ($this->userModel->update($fields['id'], $fields)) {
												
                    $response['success'] = 'success';
                    $response['messages'] = lang("App.update-success") ;	
                    
                } else {
                    
                    $response['success'] = 'error';
                    $response['messages'] = $this->userModel->validation->getErrors() ;
                    
                }
            }
            else
            {
				
                if ($this->userModel->insert($fields)) {
												
                    $response['success'] = 'success';
                    $response['messages'] = lang("App.insert-success") ;	
                    
                } else {
                    
                    $response['success'] = 'error';
                    $response['messages'] =  $this->userModel->validation->getErrors() ;

                }
				
            }
			

			if($response['success']=="success")
			{
				$this->session->setFlashdata($response['success'],$response['messages'] );
               	$this->response->redirect(site_url($this->data['controller']));
			}
			else
			{
				$this->session->setFlashdata($response['success'],$response['messages']);
				return redirect()->back()->withInput(); 
			}
           
        
    }

	
	
	public function postRemove()
	{
		$response = array();
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->userModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
