<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Modele;
use App\Ref;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class RefController extends Controller
{
   

public function create_ref(){
    if(Auth::user()->type_compte=="admin"){
    return view('create_ref');
    }
    else {
        return redirect('/');
    }
}
public function destroy_ref($id){
    $ele=Ref::findOrFail($id);
    $ele->delete();
    return redirect('/home')->with("msg","element deleted successfully");
}


public function show_ref(){
        $users=Ref::all();

    return view('show_ref',['users'=>$users]);
}
public function detail_ref($id){
    $m=Ref::findOrFail($id);
    return view('ref_detail',['id'=>$id,"m"=>$m]);

}

public function modify_ref($id){
    if(Auth::user()->type_compte=="admin"){
        $m=Ref::findOrFail($id);
    return view('modify_ref',['id'=>$id,'m'=>$m]);
    }
    else {
        return redirect('/home');
    }
}


public function store_ref(Request $request){
 
    $ele = new Ref();
    $ele->name=request('name');
    $ele->prix_unitaire=request('prix_unitaire');
    $ele->prix_ugros=request('prix_ugros');
    $ele->prix_gros=request('prix_gros');
    $ele->prix_paquets=request('prix_paquets');
    $ele->prix_fardeau=request('prix_fardeau'); 
    $ele->paire=request('paire');
    $ele->save();
    return redirect('/home')->with("msg","element Created successfully");
  
}

public function update_ref(Request $request,$id){
    $ele =Ref::findOrFail($id);
    $ele->name=request('name');
    $ele->prix_unitaire=request('prix_unitaire');
    $ele->prix_ugros=request('prix_ugros');
    $ele->prix_gros=request('prix_gros');
    $ele->prix_paquets=request('prix_paquets');
    $ele->prix_fardeau=request('prix_fardeau'); 
    $ele->paire=request('paire');
    $ele->save();
    $redirection="/detail_ref/" . $id;
    return redirect($redirection)->with("msg","element updated successfully");
}


}
