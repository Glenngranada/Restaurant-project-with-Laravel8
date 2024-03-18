<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $menu = Menu::where('categorie_id', '!=', 3)->get();
        return view('index')->with([
            'menus' => $menu,
            'royaltymenus' =>  Menu::where('ROYALTY', 1)->get(),
            'propmenus' =>  Menu::where('POPULAR', 1)->get(),
            'reviews' => Comment::all(),
        ]);
        // return view('index')->with([
        //     'menus' => Menu::all(),
        //     'propmenus' =>  Menu::where('POPULAR', 1)->get(),
        //     'reviews' => Comment::all(),
        // ]);
    }
}
