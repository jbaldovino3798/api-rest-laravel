<?php
namespace App\Http\Controllers;

use App\Models\User ;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function index2()
    {
        $user = DB::table('users')->get();
        //$user = DB::select('select * from users');
        return $user;
    }

}
