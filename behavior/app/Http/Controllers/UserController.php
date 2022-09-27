<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
//        $users = DB::table('users')->select('id', 'name', 'status')
//            ->where('status', '=', '1')
//            ->orderBy('name', 'ASC')
////            ->oldest('name') //ASC
////            ->latest('name') //DESC
////            ->inRandomOrder()
//            ->limit(10)
//            ->offset(10)
//            ->get();
//
//        foreach ($users as $user){
//            echo "#{$user->id} Nome: {$user->name}";
//            echo "Status: {$user->status}";
//            echo "<br>";
//        }

//        $users = DB::table('users')
//            ->selectRaw('id, name, CASE WHEN status = 1 THEN "ATIVO" ELSE "INATIVO" END status_description')
//            ->whereRaw('(SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2')
//            ->whereRaw('status = 1')
//            ->orderByRaw('updated_at - created_at ASC' , '')
//            ->get();

        $users = DB::select(DB::raw('select id, name, CASE WHEN status = 1 THEN "ATIVO" ELSE "INATIVO" END status_description
                                from `users` where (SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2
                                and status = :userStatus order by updated_at - created_at ASC'), array('userStatus' => '1'));

        foreach ($users as $user){
            echo "#{$user->id} Nome: {$user->name}";
            echo "Status: {$user->status_description}";
            echo "<br>";
        }
    }
}
