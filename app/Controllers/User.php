<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
    public function login()
    {
        $model = new UserModel();
        if ($this->request->getMethod() === 'post' && $this->validate(['login' => 'required', 'password' => 'required']))
        {
            $user =$model->login(['login' => $this->request->getPost('login'),
            'password' => md5($this->request->getPost('password'))
        ]);
        if (isset($user))
        {
            session()->set(['user' => $user['id'], 'name' => $user['name']]);
            return redirect()->to(base_url() . '/Post');
        }
        session()->setFlashdata('login_error', 'Los datos ingresados no son correctos.');
        }
        return redirect()->to(base_url());
    }
}