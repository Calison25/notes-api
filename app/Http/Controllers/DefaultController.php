<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function callMethodFromRequest(Request $request)
    {
        switch ($request->getMethod()) {
            case 'POST': {
                parse_str($request->getContent(), $arguments);
                return $this->create($arguments);
            }
            default: {
                throw new \Exception('Método não encontrado', 1582341731);
            }
        }
    }


    /**
     * @param array $data
     */
    abstract function create(array $data);
}
