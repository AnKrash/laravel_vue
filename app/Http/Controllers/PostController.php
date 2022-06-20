<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
//    public function index()
//    {
//        return view('home');
//    }
public function __invoke()
{
    $persons=[
        [
            'id'=>1,
            'name'=> 'Ivan',
        ],
        [
            'id'=>2,
            'name'=> 'Sveta',
        ],
    ];
  return $persons;
}
}
