<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    private $music;
    private $play;
    private $song;
    public function __construct(){
        $this->music = new \App\Models\SongModel();
        $this->play = new \App\Models\PlaylistModel();
        $this->song = new \App\Models\MusicModel();
    }

    public function index()
    {
        //
    }

    public function song()
    {
        $data=[
            'music' => $this->music->findAll(),
            'plays' => $this->play->findAll()
        ];
        return view ('song', $data);
    }
    public function songs()
    {
        $data=[
            'music' => $this->music->findAll(),
            'plays' => $this->play->findAll()
        ];
        return view ('song', $data);
    }

    public function save(){
        $data = ['Playlist' => $this->request->getVar('Playlist')];
        $this->play->save($data);
        return redirect()->to('playmusic');
    }

    public function insert(){
        $data=['File'=>$this->request->getVar('File')
    ];
    $this->music->save($data);
    return redirect()->to('playmusic');
    }

    public function search(){
        $searchQuery = $this->request->getVar('search');

        if ($searchQuery) {
           
          
        $data= ['music' => $this->music->like('File', $searchQuery)->findAll(),
        'plays' => $this->play->findAll()]; 
    }
    return view('song', $data);
}
public function music($ID){
    $data =['music' =>$this->music->findAll(),
    'mus' =>$this->music->where('ID', $ID)->first(),
    'play' =>$this->play->findAll(),
];
return view('song', $data);
return redirect()->to('playmusic');
}
    public function saveMusic(){
        $data = ['Songs' => $this->request->getVar('Songs'),
                'Playlist' => $this->request->getVar('Playlist')   
    ];
    $this->song->save($data);
    return redirect()->to('playmusic');
}
}