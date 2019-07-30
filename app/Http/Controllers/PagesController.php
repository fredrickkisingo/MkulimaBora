<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;

class PagesController extends Controller
{
  
    /**
     * These methods are used to display views/pages that are created in the views>pages folder
     */
    public function index()
    {
        $title = "Welcome to MkulimaBora!";
      // return view ('pages.index', compact('title')); //gonna go to the view folder check for pages>index.blade.php and display
        return view('pages.index')->with('title', $title); //best esp if you are working with arrays
    }
    public function about()
    {
        $title = "About Us";
        return view('pages.about')->with('title', $title);
    }
   
}
