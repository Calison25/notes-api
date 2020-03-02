<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class DefaultController extends Controller
{
    abstract function create(array $argumentsFromRequest) :object;

    abstract function update(string $objectIdentifier, array $argumentsFromRequest) :object;

    abstract function list(array $argumentsFromRequest = null) :object;

    abstract function show(string $objectIdentifier) :object;

    abstract function delete(string $objectIdentifier);


    /**
     * @param Request $request
     * @param string $objectIdentifier
     * @return mixed
     * @throws \Exception
     */
    public function callMethodFromRequest(Request $request, string $objectIdentifier = null)
    {
        parse_str($request->getContent(), $argumentsFromRequest);

        switch ($request->getMethod()) {
            case 'POST': {
                return $this->callAction('create', [$argumentsFromRequest]);
            }
            case 'GET': {
                if ($objectIdentifier !== null) {
                    return $this->show($objectIdentifier);
                }

                return $this->list($argumentsFromRequest);
            }
            case 'PUT': {
                return $this->update($objectIdentifier, $argumentsFromRequest);
            }
            case 'DELETE': {
                return $this->delete($objectIdentifier);
            }
            default: {
                throw new \Exception('Método não encontrado', 1582341731);
            }
        }
    }
}
