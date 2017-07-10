<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Loginm extends Model
{


   public function validate_user($email,$password){

       $users = DB::table('users')
           ->where('email',$email)
           ->where('password',$password)
           ->get();

       return $users;

   }
    public function autoseach($query){

       $a= DB::table('users')
            ->where('name','LIKE','%'.$query.'%')->get();

       return $a;





    }
}
