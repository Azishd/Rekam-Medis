<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show(){
        return view('healthhub.home');
    }

    public function profileedit(){
        return view('healthhub.profile');
    }

    public function jadwal(){
        return view('healthhub.pilihjadwal');
    }

    
    public function caridokter(){
        return view('healthhub.caridokter');
    }

    public function bookingdokter(){
        return view('healthhub.bookingdokter');
    }

    public function chatdokter(){
        return view('healthhub.chatdokter');
    }

    public function tambahinfo(){
        return view('healthhub.tambahinfo');
    }

    public function tambahobat(){
        return view('healthhub.tambahobat');
    }

    public function listartikel(){
        return view('HealthArticles.index');
    }

    public function bacaartikel(){
        return view('HealthArticles.show');
    }

    public function register_user(Request $request){
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect('/login');
    }

}