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

//        $users = DB::select(DB::raw('select id, name, CASE WHEN status = 1 THEN "ATIVO" ELSE "INATIVO" END status_description
//                                from `users` where (SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2
//                                and status = :userStatus order by updated_at - created_at ASC'), array('userStatus' => '1'));
//
//        foreach ($users as $user){
//            echo "#{$user->id} Nome: {$user->name}";
//            echo "Status: {$user->status_description}";
//            echo "<br>";
//        }

//        DB::table('users')->where('id', '<', '500')->orderBy('id')->chunk(50, function ($users){
//            foreach ($users as $user){
//                echo "#{$user->id} Nome: {$user->name}";
//                echo "Status: {$user->status}";
//                echo "<br>";
//            }
//
//            echo 'Encerrou um ciclo <br>';
//            sleep(1);
//        });

//        $users = DB::table('users')
////            ->whereIn('status', array(0, 1))
////            ->whereNotIn('status', array(0, 1))
////            ->whereNull('')
//            ->whereNotNull('name')
////            ->whereColumn('created_at', '=', 'updated_at')
////            ->whereDate('updated_at', '>', '2022-09-27')
//            ->whereDay('updated_at', '=', '1')
//            ->whereMonth('updated_at', '=', '1')
//            ->whereYear('updated_at', '=', '2019')
//            ->whereTime('updated_at', '>', '17:30:00')
//            ->get();
//
//        foreach ($users as $user){
//            echo "#{$user->id} Nome: {$user->name}";
//            echo "Status: {$user->status}";
//            echo "<br>";
//        }

        $users = DB::table('users')
            ->select('users.id', 'users.name', 'users.status', 'addresses.address')
//            ->leftJoin('addresses', 'users.id', '=', 'addresses.user')
            ->join('addresses', function ($join){
                $join->on('users.id', '=', 'addresses.user')
                     ->where('addresses.status', '=', '1');
            })
            ->orderBy('users.id', 'ASC')
            ->get();

        echo "Todos os registros: {$users->count()}";
        echo "<br>";

        foreach ($users as $user){
            echo "#{$user->id} Nome: {$user->name}";
            echo "Status: {$user->status}";
            echo "Endereço: {$user->address}";
            echo "<br>";
        }

    }
}
