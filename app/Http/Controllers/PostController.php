<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = [
            'Title A',
            'Title B',
            'Title C',
        ];
        return view('index')
            ->with(['posts' => $post]);
    }
}
