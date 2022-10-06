<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
//    public function store(Course $request)
    {
        $rules = array(
            'name' => 'required',
            'tutor' => 'required|min:3|max:8',
            'email'  => 'required|email'
        );

        $messages = array(
            'name.required' => 'Por favor insira o nome do curso',
            'email.required' => 'Por favor insira o e-mail do curso',
            'email.email' => 'Por favor informe um endereço de e-mail válido',
        );

        $validate = Validator::make($request->all(), $rules, $messages);
        var_dump($validate->fails());

        if ($validate->fails()){
            return redirect()->route('course.create')->withInput()->withErrors($validate);
        }

        var_dump($request->all());

        //$request->validate($rules, $messages);
    }

    /**
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
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
