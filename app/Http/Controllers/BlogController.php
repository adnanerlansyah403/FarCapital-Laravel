<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.blog.index');
    }

    public function create()
    {
        return view('frontend.blog.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('frontend.blog.detail', ['id' => $id]);
    }
}
