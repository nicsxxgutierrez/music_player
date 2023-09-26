<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicModel;
use App\Models\PlaylistModel;
 
class MusicController extends BaseController
{
    public function index()
    {
        $main = new MusicModel();
        $data['songs'] = $main->findAll();
        $data['song']= [];
        return view('music',$data);
    }
    public function searchsong()
    {
        $searchQuery = $this->request->getVar('search');

        if ($searchQuery) {
            $main = new MusicModel();
            $data['song'] = $main->like('Music_Name', $searchQuery)->findAll();
        }
        return view('music', $data);
    }
    public function addsong()
    {
        if($this->request->getMethod() == 'post'){
            $rules = [
                    'myfile' => [
                        'rules' => 'uploaded[myfile]',
                        'label' => 'My File'
                    ]
                ];
            if($this->validate($rules)){
                $file = $this->request->getFile('myfile');
                $filename = pathinfo($file->getName(), PATHINFO_FILENAME);
                $main = new MusicModel();
                $data['songs'] = $main->findAll();
                $data['song'] = [];
                $datatoadd = [
                    'Music_Name' => $filename,
                    'On_Playlist' => "0",
                ];
                $main->save($datatoadd);
                if($file->isValid() && !$file->hasMoved()){
                    $file->move('./music');
                }
                return redirect()->to('/main');
                exit();
            }
        }
    }
    public function createplaylist()
    {
        if($this->request->getMethod() == 'post'){
            $play = new PlaylistModel();
            $data = [
                'Playlist_Name' => $this->request->getVar('Playlist_Name'),
                'On_Playlist' => "0"
            ];
            $play->save($data);
            return redirect()->to('/main');
        }
    }
    public function deleteplaylist($ID)
    {
        $play = new PlaylistModel();
        $record = $play->find($ID);
        if($record != null){
            $play->delete($ID);
            return redirect()->to('/main');
        }
        else
        {
            return "Record not found";
        }
    }
    public function addmusictoplaylist($ID)
    {
        $play = new PlaylistModel();
        $main = new MusicModel();
        $playlistData = [
            'plays' => $play->findAll(),
            'play' => [],
        ];
        $musicData = [
            'songs' => $main->findAll(),
            'song' => [],
        ];
        $data = array_merge($playlistData, $musicData);
        return view('songs', $data);
    }
    public function removemusicfromplaylist($ID)
    {
        $songs = new MusicModel();
        $record = $songs->find($ID);
        if($record != null){
            $songs->delete($ID);
            return redirect()->to('/main');
        }
        else
        {
            return "Record not found";
        }
    }
}
