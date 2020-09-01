<?php

namespace App\Http\Controllers;

use App\Classes\Employee;
use App\JsonMind;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Response;
use Symfony\Component\Console\Input\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The main page of the app
     * @return View
     */
    function index()
    {
        return view('json');
    }

    /**
     * Called when posting from the main page
     * @param Request $request
     * @return View
     */
    function getOrganizedJson(Request $request)
    {
        $json = $request['json'];
        $solution = json_encode(JsonMind::getTheSolution($json));
        return view('json')->with('value', $solution);
    }
}
