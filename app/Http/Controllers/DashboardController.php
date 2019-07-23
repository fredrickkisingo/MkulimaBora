<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //we need to bring in the user model in order to use it


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id; //getting id of logged in user
        $user = User::find($user_id);
        //the second posts is the function created in the User model
        return view('/dashboard')->with('products', $user->products);
    }
}
