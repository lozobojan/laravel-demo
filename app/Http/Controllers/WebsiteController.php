<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public $name = "Janko Markovic";
    public $users = [
        "Marko Markovic",
        "Filip Filipovic",
        "Janko Jankovic"
    ];
    public $list = false;

    public function dashboard(Request $request){

        if($request->has("displayList") && $request->displayList == true)
            $this->list = true;

        return view("test", [
            "name" => $this->name,
            "users" => $this->users,
            "list" => $this->list
        ]);
    }
}
