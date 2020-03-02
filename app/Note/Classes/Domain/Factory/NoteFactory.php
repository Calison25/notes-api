<?php

namespace App\Note\Classes\Domain\Factory;

use App\Note\Domain\Model\Note;
use Illuminate\Support\Facades\Auth;

class NoteFactory
{
    public function create(array $data)
    {
        $note = new Note();

        $note->title = $data['title'];
        $note->content = $data['content'];
        $note->color = intval($data['color']);
        $note->user_id = Auth::id();

        return $note;
    }
}
