<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\StatusModel;

class Produk extends BaseController
{
	
    protected $produkModel;
    protected $kategoriModel;
    protected $statusModel;
    protected $validation;
    protected $data;
    protected $session;
	
	public function __construct()
	{
	    $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
        $this->statusModel = new StatusModel();
        $this->session = \Config\Services::session();
       	$this->validation =  \Config\Services::validation();
		$this->data['title'] = 'Produk';
        $this->data['controller'] = 'produk';
        $this->data['session'] = $this->session;
        $this->data['kategori'] = $this->kategoriModel->findAll();
        $this->data['status'] = $this->statusModel->findAll();

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
        $this->data['model'] = $this->produkModel->showingdetaildata($id);
        return view($this->data['controller'].'/view',$this->data);
    }

    public function getAdd($id='')
    {
        if (!empty($id))
        {
            $this->data['model'] = $this->produkModel->where('id_produk',$id)->first();
        }
        else
        {
            $this->data['model'] = $this->produkModel->getColumnTable();
        }

        return view($this->data['controller'].'/form',$this->data);
    }

	public function postAll()
	{
 		$response = $data['data'] = array();	

		//$result = $this->produkModel->select()->findAll();
        $result = $this->produkModel->showingalldata();
        
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
            $ops .= '<a class="col px-1 text-info" href="'.site_url( $this->data['controller'].'/view/'.$value->id_produk).'" title="view"><i class="fa-solid fa-eye"></i> </a>';
			$ops .= '<a class="col px-1 text-orange" href="'.site_url( $this->data['controller'].'/add/'.$value->id_produk).'" title="edit"><i class="fa-solid fa-pen-to-square"></i>  </a>';
			$ops .= '<a class="col px-1 text-danger" href="#" onClick="remove('. $value->id_produk .')" title="delete"><i class="fa-solid fa-trash"></i></a>';
			$ops .= '</div>';

			$data['data'][$key] = array(
				$value->nama_produk,
                $value->harga,
                $value->nama_kategori,
                $value->nama_status,
				$ops				
			);
		} 
		return $this->response->setJSON($data);		
	}

    public function postSave()
    {
        $response = array();
        $session = \Config\Services::session();

		$fields['id_produk'] = $this->request->getPost('id');
        $fields['nama_produk'] = $this->request->getPost('nama_produk');
        $fields['harga'] = $this->request->getPost('harga');
        $fields['kategori_id'] = $this->request->getPost('kategori_id');
        $fields['status_id'] = $this->request->getPost('status_id');

       

       
            if (!empty($fields['id_produk']))
            {
                if ($this->produkModel->update($fields['id_produk'], $fields)) {
												
                    $response['success'] = "success";
                    $response['messages'] = lang("App.update-success") ;	
                    
                } else {
                    
                    $response['success'] = "error";
                    $response['messages'] = $this->produkModel->validation->getErrors() ;
                    
                }

            }
            else
            {
                if ($this->produkModel->insert($fields)) {
												
                    $response['success'] = "success";
                    $response['messages'] = lang("App.insert-success") ;	

                    
                } else {
                    
                    $response['success'] =  "error";
                    $response['messages'] = $this->produkModel->validation->getErrors() ;
                    
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
		
			if ($this->produkModel->where('id_produk', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}
    
    public function getSynproduk(){

        $response = array();
      
        // Send request
        try {
            $apiURL = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
         
        /* eCurl */
        $curl = curl_init($apiURL);
        date_default_timezone_set('Asia/Ujung_Pandang');
        /* Data */
        $tempformatusername = "tesprogrammer".date('dmy')."C".date("H");
        $temppassword = md5('bisacoding-'.date('d-m-y'));
        //var_dump($tempformatusername);
        $data = [
            'username'=>$tempformatusername,'password'=>  $temppassword];
   
        /* Set JSON data to POST */
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
       
        /* Return json */
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
        /* make request */
        $result = curl_exec($curl);

        $tempproduk = json_decode($result);
       
       
       
       
       
        foreach ($tempproduk->data as $key => $value) {
            $cek = $this->produkModel->getRecord($value->nama_produk);
            //var_dump($cek);
            //die();

            if($cek > 0 )
            {
                $data = [
                    'nama_produk'   =>  $value->nama_produk,
                    'harga'   =>  $value->harga,
                    'kategori_id'   => $this->kategoriModel->getkategoriidbyname($value->kategori),
                    'status_id'   => $this->statusModel->getstatusidbyname($value->status),
                ];
                
                // Inserts data and returns inserted row's primary key
                $this->produkModel->update($value->id_produk,$data);         
            }
            else
            {
                $data = [
                    'id_produk' =>  $value->id_produk,
                    'nama_produk'   =>  $value->nama_produk,
                    'harga'   =>  $value->harga,
                    'kategori_id'   => $this->kategoriModel->getkategoriidbyname($value->kategori),
                    'status_id'   => $this->statusModel->getstatusidbyname($value->status),
                ];
                
                // Inserts data and returns inserted row's primary key
                $this->produkModel->insert($data);
                
            }   
           
        }
             
        /* close curl */
        curl_close($curl);
        $this->session->setFlashdata('success','Sinkron data sukses' );	
          
        } catch (\Exception $e) {
           // echo 'Message: ' .$e->getMessage();
            $this->session->setFlashdata('error',"gagal sinkron data" );			
        }
        //return redirect()->back()->withInput(); 
        $this->response->redirect(site_url($this->data['controller']));
       

   }

		
}	
