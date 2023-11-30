<?php

namespace App\Models;
use CodeIgniter\Model;

class LoketModel extends Model {
    
	protected $table = 'loket';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['loket','suara','aktif'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [
		'loket' => ['label' => 'Loket', 'rules' => 'required|min_length[0]|max_length[150]'],

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
	
}