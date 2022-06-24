<?php

namespace App\Http\Controllers;

use App\Http\Resources\Person\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
return view('index');
//        $people=Person::all();
//        return PersonResource::collection($people);
    }
}
