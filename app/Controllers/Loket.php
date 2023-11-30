<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\LoketModel;

class Loket extends BaseController
{
	
    protected $LoketModel;
    protected $validation;
    protected $data;
    protected $session;
	
	public function __construct()
	{
	    $this->LoketModel = new LoketModel();
        $this->session = \Config\Services::session();
       	$this->validation =  \Config\Services::validation();
		$this->data['title'] = 'Loket';
        $this->data['controller'] = 'loket';
        $this->data['session'] = $this->session;

	}
	
	public function getIndex()
	{
		return view($this->data['controller'].'/index', $this->data);		
	}

    public function getView($id)
    {
        $this->data['model'] = $this->LoketModel->where('id',$id)->first();
        return view($this->data['controller'].'/view',$this->data);
    }

    public function getAdd($id='')
    {
        if (!empty($id))
        {
            $this->data['model'] = $this->LoketModel->where('id',$id)->first();
        }
        else
        {
            $this->data['model'] = $this->LoketModel->getColumnTable();
        }

        return view($this->data['controller'].'/form',$this->data);
    }

	public function postAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->LoketModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
            $ops .= '<a class="col px-1 text-info" href="'.site_url( $this->data['controller'].'/view/'.$value->id).'" title="view"><i class="fa-solid fa-eye"></i> </a>';
			$ops .= '<a class="col px-1 text-orange" href="'.site_url( $this->data['controller'].'/add/'.$value->id).'" title="edit"><i class="fa-solid fa-pen-to-square"></i>  </a>';
			$ops .= '<a class="col px-1 text-danger" href="#" onClick="remove('. $value->id .')" title="delete"><i class="fa-solid fa-trash"></i></a>';
			$ops .= '</div>';

			$data['data'][$key] = array(
				$value->loket,
                $value->suara,
                $value->aktif == 0 ? "Non Aktif":"Aktif",
				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}

    public function postSave()
    {
        $response = array();
        $session = \Config\Services::session();

		$fields['id'] = $this->request->getPost('id');
        $fields['loket'] = $this->request->getPost('loket');
        $fields['suara'] = $this->request->getPost('suara');
        $fields['aktif'] = $this->request->getPost('aktif');


       

       
            if (!empty($fields['id']))
            {
                if ($this->LoketModel->update($fields['id'], $fields)) {
												
                    $response['success'] = "success";
                    $response['messages'] = lang("App.update-success") ;	
                    
                } else {
                    
                    $response['success'] = "error";
                    $response['messages'] = $this->LoketModel->validation->getErrors() ;
                    
                }

            }
            else
            {
                if ($this->LoketModel->insert($fields)) {
												
                    $response['success'] = "success";
                    $response['messages'] = lang("App.insert-success") ;	

                    
                } else {
                    
                    $response['success'] =  "error";
                    $response['messages'] = $this->LoketModel->validation->getErrors() ;
                    
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
		
			if ($this->LoketModel->where('id', $id)->delete()) {
								
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
