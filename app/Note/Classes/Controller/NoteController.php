<?php


namespace App\Note\Classes\Controller;


use App\Http\Controllers\DefaultController;
use App\Note\Classes\Domain\Factory\NoteFactory;
use App\Note\Domain\Model\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends DefaultController
{
    public function create(array $argumentsFromRequest) :object
    {
        $noteFactory = new NoteFactory();
        $note = $noteFactory->create($argumentsFromRequest);
        $note->save();
        return $note;
    }

    public function update(string $objectIdentifier, array $argumentsFromRequest) :object
    {
        Note::find($objectIdentifier)->update($argumentsFromRequest);

        return Note::where('id', $objectIdentifier)->get();
    }

    public function list(array $argumentsFromRequest = null) :object
    {
        if ($argumentsFromRequest != null) {
            //implementar lógica de filtros
        }

        return Note::where('user_id', Auth::id())->get();
    }

    public function show(string $objectIdentifier) :object
    {
        return Note::where('id', $objectIdentifier)->get();
    }

    public function delete(string $objectIdentifier)
    {
        Note::find($objectIdentifier)->delete();
    }
}