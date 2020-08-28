<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function merhaba() {
        //$users = DB::table('users')->get(); //Veritabanından kullanıcıları çeker
        //$users = User::all(); //model kullanarak veri çekme
        //dd($users);
        //var_dump($users)

        // $products = Product::with(['user'])->get();
        $products = DB::table('users')
            ->join('products','products.created_by','=','users.id')
            ->select('users.name','products.name', 'users.id')
            ->get();

        return view('merhaba', compact('products')); //->with(['users' => $users]);
    }

    public function createView()
    {
        return view('users.create');
    }

    public function create()
    {
        return 'Kayıt başarıyla tamamlandı!';
    }
}
