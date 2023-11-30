<?php
class SiteHelper
{
    public static function menu()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_menu');
        $query   = $builder->where(['parent'=>0,'id !='=>1])
                    ->get()->getResult();
        return $query;
    }

    public static function childmenu($parent)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_menu');
        $query   = $builder->Where(['parent'=>$parent])
                           ->orderBy('ordering asc')
                           ->get()->getResult();
        return $query;
    }

    public static function cekChild($parent)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_menu');
        $query   = $builder->Where(['parent'=>$parent])
                           ->countAllResults();
        return $query;
    }

    public static function instansi()
    {
        
        $db      = \Config\Database::connect();
        $builder = $db->table('instansi');
        $query   = $builder->Where(['id'=>1])
                           ->get()->getRow();
        return $query;
    }
}