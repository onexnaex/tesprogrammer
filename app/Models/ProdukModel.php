<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdukModel extends Model {
    
	protected $table = 'produk';
	protected $primaryKey = 'id_produk';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nama_produk','harga','kategori_id','status_id'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [
		'nama_produk' => ['label' => 'produk', 'rules' => 'required|min_length[0]|max_length[150]'],
        'harga' => ['label' => 'harga', 'rules' => 'required|min_length[0]|integer'],
        'kategori_id' => ['label' => 'kategori', 'rules' => 'required|min_length[0]'],
        'status_id' => ['label' => 'status', 'rules' => 'required|min_length[0]'],
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
    public function showingalldata()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('produk');
		$builder->join('status','produk.id_status=status.id_status');
        $builder->join('kategori','produk.id_kategori=kategori.id_kategori');
		$builder->select('produk.*,status.nama_status,kategori.nama_kategori');
		$query = $builder->get();
		return $query->getResult();
	}

    public function showingdetaildata($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('produk');
		$builder->join('status','produk.id_status=status.id_status');
        $builder->join('kategori','produk.id_kategori=kategori.id_kategori');
		$builder->select('produk.*,status.nama_status,kategori.nama_kategori');
        $builder->where('id_produk',$id);
		$query = $builder->first();
		return $query;
	}
	
}