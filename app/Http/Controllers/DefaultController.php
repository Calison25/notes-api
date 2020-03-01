<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class DefaultController extends Controller
{
    abstract function create(array $data);

    abstract function list(array $argumentsFromRequest = null) :object ;

    abstract function show(array $extraParams) :object;


    /**
     * @param Request $request
     * @param $extraParams
     * @return mixed
     * @throws \Exception
     */
    public function callMethodFromRequest(Request $request, $extraParams = null)
    {
        parse_str($request->getContent(), $argumentsFromRequest);
        switch ($request->getMethod()) {
            case 'POST': {
                return $this->callAction('create', [$argumentsFromRequest]);
            }
            case 'GET': {
                if ($extraParams !== null) {
                    $extraParams = is_array($extraParams) ? $extraParams : [$extraParams];
                    return $this->callAction('show', [$extraParams]);
                }

                return $this->callAction('list', [$argumentsFromRequest]);
            }
            default: {
                throw new \Exception('Método não encontrado', 1582341731);
            }
        }
    }
}
