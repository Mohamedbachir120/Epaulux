<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipe;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class EquipeController extends Controller
{
public function __construct(){
    $this->middleware('auth');
}    
public function index(){
    
    $equipe=equipe::all();
    /*$equipe=equipe::orderBy('name',"desc")->get();*/

 /*   $equipe=equipe::where('name',"BARCA")->get();*/

 /*$m=equipe::findOrFail($id);*/

/* $equipe=equipe::latest();*/
    
    $name=request('name');
    return view('equipe.index',['details' => $equipe ,'name' => $name ]);

}
public function show($id){
    $m=equipe::findOrFail($id);
    return view('equipe.show',['id'=>$id,"m"=>$m]);

}


public function create(){
   
    return view('equipe.create');
}

public function create_super_user(){
    if(Auth::user()->type_compte=="admin"){
    return view('create_super_user');
    }
    else {
        return redirect('/');
    }
}
public function store_user(){
    $ele =new User();
    $ele->name=request('name');
    $ele->username=request('username');
    $ele->prenom=request('prenom');
    $ele->email=request('email');
    $ele->adresse=request('adresse');
    $ele->phone_number=request('phone_number');
    $ele->password=Hash::make(request('password'));
    $ele->type_compte="admin";
    if(User::where('username',$ele->username)->count()>0 || User::where('email',$ele->email)->count()>0){
        return redirect('create_super_user')->with('error','le champ email et username doit etre unqiue');
    }
    else {
        $ele->save();
        return redirect('/')->with("msg","element Created successfully");
    }

}   
public function store(){
    $ele=new equipe();
    $ele->name=request('name');
    $ele->manager=request('manager');
    $ele->number=request('number');
    $ele->title=request('title');
    $ele->players=request('players');
    if(equipe::where('name',$ele->name)->count()>0)

    {
              return redirect('/')->with('msg','element already exist try later');
    }
    else{


       $ele->save();
      
        return redirect('/detail/'.$ele->id)->with('msg','thanks for adding your favorite team');
  
    
    }
    
    }

    public function destroy($id){
        $ele=equipe::findOrFail($id);
        $ele->delete();
        return redirect('/')->with("msg","element deleted successfully");
    }
    public function show_users(){
        if(Auth::user()->type_compte=="admin"){
            $users=User::where('type_compte','simple')->get();

        return view('show_users',['users'=>$users]);
    }
    else{

        return redirect ('/');
    }  
}
public function show_admins(){
    if(Auth::user()->type_compte=="admin"){
        $users=User::where('type_compte','admin')->get();

    return view('show_users',['users'=>$users]);
}
else{

    return redirect ('/');
}  
}



}