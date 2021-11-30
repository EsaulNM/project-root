<?php namespace App\Models;

use  CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['name', 'login', 'password']; //estos son los campos que se modificaron dentro de la aplicacipon

    public function login($data)
    {
        return $this->asArray()->where($data)->first();
    }
}
