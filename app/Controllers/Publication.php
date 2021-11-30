<?php
namespace App\Controllers;
use App\Models\PublicationtModel;

class Publication extends BaseController
{
    public function index()
    {
        $model = new PostModel();
        $data['posts'] = $model->show();
        echo view('header');
        echo view('publication/all',$data);
        echo view('footer');
    }
    public function add()
{
    $model = new PublicationModel();

    if ($this->request->getMethod() === 'post' && $this->validate(['content' => 'required']))
    {
        $model->save(['content' => $this->request->getPost('content'), 'user' => 1]);
    }
    return redirect()->to(base_url() . '/publication');
}
    public function edit($id)
    {
        $model = new PublicationModel();

        if ($this->request->getMethod() === 'post' && $this->validate(['content' => 'required']))
        {
            $model->save(['id' => $this->request->getPost('id'), 'content' => $this->request->getPost('content')]);
            return redirect()->to(base_url() . '/publication');
        }
        else {
            $data['post'] = $model->get($id);;
            echo view('header');
            echo view('publication/edit', $data);
            echo view('footer');
        }
    }
    public function delete($id)
    {
        $model = new PublicationModel();
        $model->delete($id);
        return redirect()->to(base_url() . '/publication');
    }
}
