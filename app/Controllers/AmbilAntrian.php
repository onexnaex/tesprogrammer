<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Filters\Auth;
use App\Models\LoketModel;

class AmbilAntrian extends BaseController
{
	
	protected $data;
	protected $session;
	protected $LoketModel;
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->LoketModel = new LoketModel();
		$this->data['title'] = 'Ambil Antrian';
		$this->data['controller'] = 'ambilantrian';
		$this->data['session'] = $this->session;
	
       
		
		
	}
	
	public function getIndex()
	{
		$this->data['loket'] = $this->LoketModel->select()->findAll();
	    return view($this->data['controller'].'/index', $this->data);
			
	}

	public function cetak($id)
	{
		$this->data = array();		
		/*$this->data['model'] = $this->tantrianmodel->showdatabyid($id);
		
		$arrayupdate['is_cetak'] = 1;
		$this->db->update('t_antrian', $arrayupdate,array('id'=>$id));
		echo $this->load->view('antrian/chskov',$this->data,true);
		*/
	}



	

		
}	
