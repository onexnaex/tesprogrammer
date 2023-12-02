<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
	
    protected $kategoriModel;
    protected $validation;
    protected $data;
    protected $session;
	
	public function __construct()
	{
	    $this->kategoriModel = new KategoriModel();
        $this->session = \Config\Services::session();
       	$this->validation =  \Config\Services::validation();
		$this->data['title'] = 'Kategori';
        $this->data['controller'] = 'kategori';
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

    public function getView($id)
    {
        $this->data['model'] = $this->kategoriModel->where('id_kategori',$id)->first();
        return view($this->data['controller'].'/view',$this->data);
    }

    public function getAdd($id='')
    {
        if (!empty($id))
        {
            $this->data['model'] = $this->kategoriModel->where('id_kategori',$id)->first();
        }
        else
        {
            $this->data['model'] = $this->kategoriModel->getColumnTable();
        }

        return view($this->data['controller'].'/form',$this->data);
    }

	public function postAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->kategoriModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
            $ops .= '<a class="col px-1 text-info" href="'.site_url( $this->data['controller'].'/view/'.$value->id_kategori).'" title="view"><i class="fa-solid fa-eye"></i> </a>';
			$ops .= '<a class="col px-1 text-orange" href="'.site_url( $this->data['controller'].'/add/'.$value->id_kategori).'" title="edit"><i class="fa-solid fa-pen-to-square"></i>  </a>';
			$ops .= '<a class="col px-1 text-danger" href="#" onClick="remove('. $value->id_kategori .')" title="delete"><i class="fa-solid fa-trash"></i></a>';
			$ops .= '</div>';

			$data['data'][$key] = array(
				$value->nama_kategori,
				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}

    public function postSave()
    {
        $response = array();
        $session = \Config\Services::session();

		$fields['id_kategori'] = $this->request->getPost('id_kategori');
        $fields['nama_kategori'] = $this->request->getPost('nama_kategori');


       

       
            if (!empty($fields['id_kategori']))
            {
                if ($this->kategoriModel->update($fields['id_kategori'], $fields)) {
												
                    $response['success'] = "success";
                    $response['messages'] = lang("App.update-success") ;	
                    
                } else {
                    
                    $response['success'] = "error";
                    $response['messages'] = $this->kategoriModel->validation->getErrors() ;
                    
                }

            }
            else
            {
                if ($this->kategoriModel->insert($fields)) {
												
                    $response['success'] = "success";
                    $response['messages'] = lang("App.insert-success") ;	

                    
                } else {
                    
                    $response['success'] =  "error";
                    $response['messages'] = $this->kategoriModel->validation->getErrors() ;
                    
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
		
			if ($this->kategoriModel->where('id_kategori', $id)->delete()) {
								
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
