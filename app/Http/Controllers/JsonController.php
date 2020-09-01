<?php

namespace App\Http\Controllers;

use App\JsonMind;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

class JsonController extends Controller
{
    /**
     * I DID NOT USE IT
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }

    /**
     * The calling of the api is here!!
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check if there is a file attached to parse it,
        // if not then will get it from json field!
        if ($request->hasFile('file')) {
            //
            $file =  $request->file;
            $file = file_get_contents($file->getRealPath());

            return JsonMind::getTheSolution($file);

        }else{
            $json = $request['json'];
            return JsonMind::getTheSolution($json);

        }

    }

    /**
     * I DID NOT USE IT
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * I DID NOT USE IT
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * I DID NOT USE IT
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
