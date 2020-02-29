<?php


namespace App\Note\Classes\Controller;


use App\Http\Controllers\Controller;
use App\Http\Controllers\DefaultController;
use App\Note\Domain\Model\Note;

class NoteController extends DefaultController
{

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $note = new Note($data['title'], $data['content'], intval($data['color']));
        $note->save();
    }
}