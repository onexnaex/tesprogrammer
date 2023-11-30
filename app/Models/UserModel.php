<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    
	protected $table = 'tb_user';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['username', 'password', 'email', 'avatar','no_telp','fk_group','last_login','aktif'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $skipValidation     = false;    
	protected $cleanValidationRules = true;
	protected $allowCallbacks = true;
	protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

	protected $validationRules = [
        'username' => ['label' => 'Username', 'rules' => 'required|min_length[0]|max_length[150]'],
		'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]'],
		'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'required|min_length[0]|matches[password]'],
		'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[150]'],
		'avatar' => ['label' => 'Avatar', 'rules' => 'permit_empty|min_length[0]'],
		'no_telp' => ['label' => 'No telp', 'rules' => 'required|min_length[0]|max_length[50]'],
    ];
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
		'username' => [
            'is_unique' => 'Sorry. That username has already been taken. Please choose another.',
        ],
    ];

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

	protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = md5($data['data']['password']);
       // unset($data['data']['password']);

        return $data;
    }

	public function showingalldata()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tb_user');
		$builder->join('tb_group','tb_user.fk_group=tb_group.id');
		$builder->select('tb_user.*,tb_group.group');
		$query = $builder->get();
		return $query->getResult();
	}
	


	
	
}