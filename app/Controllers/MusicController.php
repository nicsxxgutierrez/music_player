<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicModel;
class MainController extends BaseController
{
    public function music()
    {
        $music = new MusicModel();
        $data['music'] = $music->findAll();
        return view ('music', $data);
    }
    public function index()
    {
        $data =[
            'Title' => $this->request->getPost('Title'),
            'Artist' => $this->request->getPost('Artist'),
            'File_path' => $this->request->getPost('File_path')
        ];
        $music = new MusicModel();
        $music->set($data)->where($data)->update();
        return redirect()->to('/music');
    }
}