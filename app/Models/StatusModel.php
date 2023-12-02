<?php

namespace App\Models;
use CodeIgniter\Model;

class StatusModel extends Model {
    
	protected $table = 'status';
	protected $primaryKey = 'id_status';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nama_status'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [
		'nama_status' => ['label' => 'nama_status', 'rules' => 'required|min_length[0]|max_length[100]'],

	];
	protected $validationMessages = [];
	protected $skipValidation     = false;  
	protected $cleanValidationRules = true;
	protected $allowCallbacks = true;
    
    
    public function getColumnTable()
	{
        $db      = \Config\Database::connect();
		$query = $db->query("SHOW COLUMNS FROM $this->table");

		$columns = array();

		foreach( $query->getResult() as $row)

			{

			$columns[$row->Field] = '';

			}

		return (object)$columns;
	}

	public function getstatusidbyname($name)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($this->table);
		$builder->where('nama_status',$name);
		$query = $builder->countAllResults();

		if ($query > 0)
		{
			$db      = \Config\Database::connect();
			$builder = $db->table($this->table);
			$builder->where('nama_status',$name);
			$query = $builder->get();
			
			foreach ($query->getResult() as $row) {
				return $row->id_status;
			}
		}
		else
		{
			return 0;
		}

	}

	public function totalrecord()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($this->table);
		$query = $builder->countAllResults();
		return $query;
	}
	
}