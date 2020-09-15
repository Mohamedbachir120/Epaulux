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
use DB;

class ProductsController extends Controller
{
    //

public function store_products(Request $request){
    $ele =new Products();
    $ele->type=request('type');
   
    $file =$request->file('contenu');
    $name=$file->getClientOriginalName();
    $file->move('images',$name);
    $ele->contenu=$name;
    
    $ele->couleur=request('couleur');
    $mod=Modele::find(request('model'));
    $ref=Ref::find(request('ref'));
  
        $ele->save();
        $ele->modeles()->attach($mod);
        $ele->refs()->attach($ref);
        return redirect('/home')->with("msg","element Created successfully");
    

}   



public function create_products(){
    if(Auth::user()->type_compte=="admin"){
    return view('create_products',['modeles'=>Modele::all(),'refs'=>Ref::all()]);
    }
    else {
        return redirect('/home');
    }

}

public function store_modele(Request $request){
 
    $ele =new Modele();
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



public function create_modele(){
    if(Auth::user()->type_compte=="admin"){
    return view('create_modele');
    }
    else {
        return redirect('/home');
    }
}
public function destroy_modele($id){
    $ele=Modele::findOrFail($id);
    $ele->delete();
    return redirect('/home')->with("msg","element deleted successfully");
}


public function show_products(){
        $users=DB::table('products')->paginate(5);

    return view('show_products',['users'=>$users]);
}

public function show_modele(){
    $users=Modele::all();

return view('show_modele',['users'=>$users]);
}

public function detail_products($id){
    $m=Products::findOrFail($id);
    return view('products_detail',['id'=>$id,"m"=>$m]);

}

public function detail_modele($id){
    $m=Modele::findOrFail($id);
    return view('modele_detail',['id'=>$id,"m"=>$m]);

}

public function destroy_products($id){
    $ele=Products::findOrFail($id);
    $ele->delete();
    return redirect('/home')->with("msg","element deleted successfully");
}




public function modify_products($id){
    if(Auth::user()->type_compte=="admin"){
        $m=Products::findOrFail($id);
    return view('modify_products',['id'=>$id,'m'=>$m,'modeles'=>Modele::all(),'refs'=>Ref::all()]);
    }
    else {
        return redirect('/home');
    }
}




public function modify_modele($id){
    if(Auth::user()->type_compte=="admin"){
        $m=Modele::findOrFail($id);
    return view('modify_modele',['id'=>$id,'m'=>$m]);
    }
    else {
        return redirect('/home');
    }
}

public function update_modele(Request $request,$id){
    $ele =Modele::findOrFail($id);
    $ele->name=request('name');
    $ele->prix_unitaire=request('prix_unitaire');
    $ele->prix_ugros=request('prix_ugros');
    $ele->prix_gros=request('prix_gros');
    $ele->prix_paquets=request('prix_paquets');
    $ele->prix_fardeau=request('prix_fardeau'); 
    $ele->paire=request('paire');
    $ele->save();
    $redirection="/detail_modele/" . $id;
    return redirect($redirection)->with("msg","element updated successfully");
}





public function update_products(Request $request,$id){
    $ele =Products::findOrFail($id);
    $ele->type=request('type');
   
    $file =$request->file('contenu');
    $name=$file->getClientOriginalName();
    $file->move('images',$name);
    $ele->contenu=$name;
    $ele->couleur=request('couleur');
    
    $mod=Modele::find(request('model'));
    $ref=Ref::find(request('ref'));
  
        $ele->save();


        $ele->modeles()->sync($mod);
         $ele->refs()->sync($ref);
  
        $redirection="/detail_products/" . $id;
        return redirect($redirection)->with("msg","element updated successfully");
    

}   




}
