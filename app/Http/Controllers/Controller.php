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


        //Check if there is a file attached to parse it,
        // if not then will get it from json field!
        if ($request->hasFile('file')) {
            //
            $file =  $request->file;
            $file = file_get_contents($file->getRealPath());

            $solution = json_encode(JsonMind::getTheSolution($file));

        }else{
            $json = $request['json'];
            $solution = json_encode(JsonMind::getTheSolution($json));

        }
        return view('json')->with('value', $solution);
    }
}
