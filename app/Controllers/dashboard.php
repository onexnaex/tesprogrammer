<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Filters\Auth;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\StatusModel;

class Dashboard extends BaseController
{
	
	protected $data;
	protected $session;
	protected $produkModel;
    protected $kategoriModel;
    protected $statusModel;
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
        $this->statusModel = new StatusModel();
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
		$this->data['totalproduk'] = $this->produkModel->totalrecord();
		$this->data['totalkategori'] = $this->kategoriModel->totalrecord();
		$this->data['totalstatus'] = $this->statusModel->totalrecord();
	    return view($this->data['controller'].'/index', $this->data);
			
	}



	

		
}	
