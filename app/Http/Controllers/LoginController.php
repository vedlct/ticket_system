<?php

namespace App\Http\Controllers;

use App\Loginm;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function check(Request $request){



//        $this->validate($request, [
//            'Email' => 'required|email|max:255',
//            'Password' => 'required|max:255',
//        ]);

        $email=$request->Email;
        $password=$request->Password;
//
        $validate=(new Loginm)->validate_user($email,$password);

        //dd($validate);
        echo $email;
//        echo $password;


        if ($validate->count()!="") {
            // do something

            return redirect('/home');

        }
        else{
            Session::flash('message', 'Login Failed!');
//            Session::flash('alert-class', 'alert-danger');
            return redirect('');
        }

    }

    public function autoComplete(Request $request) {

        $query = $request->get('term','');

        $products=(new Loginm)->autoseach($query);
//        $products=Loginm::where('name','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach ($products as $product) {
            $data[]=array('value'=>$product->name,'id'=>$product->id);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }

}
