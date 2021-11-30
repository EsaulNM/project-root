<?php namespace App\Models;

use CodeIgniter\Model;

class PublicationtModel extends Model

{
    protected $table = 'publication'; //corresponde a la tabla en la base de datos
    protected $allowedFields = ['content', 'user']; //los campos que podemos modificar
    
    public function get($id = false)
    {
        if ($id === false)
        {
            return $this->findALL(); //corresponde a SELECT * FROM publication
        }
        return $this->asArray()
        ->where(['id' => $id]) //SELECT *FROM publication WHERE id = [el valor como parametro]
        ->first();
    }
    public function show()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('post');
        $builder->select('post.*, user.name' );
        $builder->join('user', 'user.id = id_user');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }
}