<?php


namespace App\Note\Classes\Controller;


use App\Http\Controllers\DefaultController;
use App\Note\Domain\Factory\NoteFactory;
use App\Note\Domain\Model\Note;

class NoteController extends DefaultController
{
    public function create(array $data)
    {
        $note = new NoteFactory($data);
        $note->save();
    }

    public function list(array $argumentsFromRequest = null) :object
    {
        if ($argumentsFromRequest != null) {
            //implementar lógica de filtros
        }

        return Note::all();
    }

    public function show(array $extraParams) :object
    {
        return Note::where('id', $extraParams[0])->get();
    }
}