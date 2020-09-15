<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Support\Facades\Auth;
use App\Products;
use App\User;
use App\Ref;
use App\Modele;
use App\Mail\NotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use PDF;
class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commande_details($id)
    {
            $table['prix_unitaire']=0;
            $table['prix_ugros']=0;
            $table['prix_gros']=0;
            $table['prix_paquets']=0;
            $table['prix_fardeau']=0;
            $totale=0;
        $object=Commande::findOrFail($id);
        foreach($object->modeles as $key){
            if($key->prix_unitaire!=0){

                $table['prix_unitaire'] += $object->quantite*$key->prix_unitaire;
           
        }
        if($key->prix_ugros!=0){

            $table['prix_ugros'] += $object->quantite*$key->prix_ugros;
       
    }     if($key->prix_gros!=0){

        $table['prix_gros'] += $object->quantite*$key->prix_gros;
   
}     if($key->prix_paquets!=0){

    $table['prix_paquets'] += $object->quantite*$key->prix_paquets;

}     if($key->prix_fardeau!=0){

    $table['prix_fardeau'] += $object->quantite*$key->prix_fardeau;

}}
foreach($object->refs  as $key){
    if($key->prix_unitaire!=0){

        $table['prix_unitaire'] += $object->quantite*$key->prix_unitaire;
   
}
if($key->prix_ugros!=0){

    $table['prix_ugros'] += $object->quantite*$key->prix_ugros;;

}     if($key->prix_gros!=0){

    $table['prix_gros'] += $object->quantite*$key->prix_gros;

}     if($key->prix_paquets!=0){

    $table['prix_paquets'] += $object->quantite*$key->prix_paquets;

}     if($key->prix_fardeau!=0){

    $table['prix_fardeau']+= $object->quantite*$key->prix_fardeau;

}



    }
    foreach($table as $key => $value){
$totale+=$value;
}
    return view('commande_detail',['object'=>$object,'table'=>$table,'totale'=>$totale]);

}
public function createPDF($id) {
    
    
    
    $table['prix_unitaire']=0;
    $table['prix_ugros']=0;
    $table['prix_gros']=0;
    $table['prix_paquets']=0;
    $table['prix_fardeau']=0;
    $totale=0;
$object=Commande::findOrFail($id);
foreach($object->modeles as $key){
    if($key->prix_unitaire!=0){

        $table['prix_unitaire'] += $object->quantite*$key->prix_unitaire;
   
}
if($key->prix_ugros!=0){

    $table['prix_ugros'] += $object->quantite*$key->prix_ugros;

}     if($key->prix_gros!=0){

$table['prix_gros'] += $object->quantite*$key->prix_gros;

}     if($key->prix_paquets!=0){

$table['prix_paquets'] += $object->quantite*$key->prix_paquets;

}     if($key->prix_fardeau!=0){

$table['prix_fardeau'] += $object->quantite*$key->prix_fardeau;

}}
foreach($object->refs  as $key){
if($key->prix_unitaire!=0){

$table['prix_unitaire'] += $object->quantite*$key->prix_unitaire;

}
if($key->prix_ugros!=0){

$table['prix_ugros'] += $object->quantite*$key->prix_ugros;;

}     if($key->prix_gros!=0){

$table['prix_gros'] += $object->quantite*$key->prix_gros;

}     if($key->prix_paquets!=0){

$table['prix_paquets'] += $object->quantite*$key->prix_paquets;

}     if($key->prix_fardeau!=0){

$table['prix_fardeau']+= $object->quantite*$key->prix_fardeau;

}



}
foreach($table as $key => $value){
$totale+=$value;
}
    
    
    $data = $table;

    
    view()->share('commande_details',['object'=>$object,'table'=>$table,'totale'=>$totale]);
    $pdf = PDF::loadView('commande_detail',['object'=>$object,'table'=>$table,'totale'=>$totale]);

    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_commande($id)
    {
        if(Auth::user()->type_compte=="simple"){
            return view('create_commande',['products'=>Products::findOrFail($id)]);
        }
    }

public function modify_commande($id){
    if(Auth::user()->type_compte=="admin"){
        $m=Commande::findOrFail($id);
    return view('modify_commande',['id'=>$id,'m'=>$m]);
    }
    else {
        return redirect('/home');
    }
}
public function store_commande(Request $request,$id){
 
    $ele = new Commande();
    $ele->rapport=request('rapport');
    $ele->quantite=request('quantite');
    $ele->user_id=Auth::user()->id;
    $ele->products_id=$id;

    $mod=Modele::find(request('model'));
    $ref=Ref::find(request('ref'));
  
    $ele->save();
    $ele->modeles()->attach($mod);
    $ele->refs()->attach($ref);
    return redirect('/commande_detail/'.$ele->id)->with("msg","Votre commande est pris en charge");
  
}


public function update_commande(Request $request,$id){
    $ele =Commande::findOrFail($id);
    $user=$ele->user;
    if($ele->etat !=request('etat') ){
        Mail::to($user)->send(new NotificationMail());
    }
    $ele->etat=request('etat');
    $ele->save();
    return redirect('/show_commande')->with("msg","Taritement de commande effectué");
}

public function show_commande(){
        
       
        $users=Commande::orderBy('created_at',"desc")->get();
    return view('show_commande',['users'=>$users]);
}

public function show_commande_user_side(){
    $id=Auth::user();
       
   
    $users=$id->commandes;

    return view('show_commande_user_side',['users'=>$users]);
}

 public function destroy_commande($id){
        $ele=Commande::findOrFail($id);
        $ele->delete();
        return redirect('/show_commande_user_side')->with("msg","element deleted successfully");
    }

public function modify_user_info($id){
  
        $m=User::findOrFail($id);
    return view('modify_user_info',['id'=>$id,'m'=>$m]);
  

}

public function password_change($id){
    $m=User::findOrFail($id);
    return view('password_change',['id'=>$id,'m'=>$m]);
}

public function password_update($id){
    
        if(Auth::user()->type_compte=="simple"){
    if(Hash::check(request('old_password'),Auth::user()->password)){
    $ele =User::findOrFail($id);
    $ele->password=Hash::make(request('new_password'));

    $ele->save();
   return redirect('/home')->with('msg','password changed successfully');
   }
   else {
    $redirection='/password_change/'.$id;
    return redirect($redirection)->with('msg','veuillez saisir votre ancien mot de passe correctement');
   }}

   else if(Auth::user()->type_compte=="admin"){
    $ele =User::findOrFail($id);
    $ele->password=Hash::make(request('new_password'));

    $ele->save();
    return redirect('/home')->with('msg','password changed successfully');

   }
}

public function update_user(Request $request,$id){
    $ele =User::findOrFail($id);

    $ele->name=request('name');
    $ele->prenom=request('prenom');
    $ele->email=request('email');
    $ele->adresse=request('adresse');
    $ele->phone_number=request('phone_number');
    $ele->save();
    $redirection='/modify_user_info/'.$id;

    return redirect( $redirection)->with("msg","element updated successfully");
}

public function destroy_user($id){
    if(Auth::user()->type_compte=="admin"){
        $ele=User::findOrFail($id);
        $ele->commandes()->delete();
        $ele->delete();
        return redirect('/home')->with("msg","element deleted successfully");
    }}

public function stats(){
    $table=array();  


$table['Epaulettes']=Products::where('type','Epaulettes')->count();
$table['Bordures']=Products::where('type','Bordures')->count();
$table['Galons en rayonne']=Products::where('type','Galons en rayonne')->count();
$table['ZIGZAG']=Products::where('type','ZIGZAG')->count();
$table['Cordon 100% RAyonne']=Products::where('type','Cordon 100% RAyonne')->count();
$table['Macrame']=Products::where('type','Macrame')->count();
$table['Bande de Survetement']=Products::where('type','Bande de Survetement')->count();
$table['Fermeture éclairs']=Products::where('type','Fermeture éclairs')->count();
$table['Déchets']=Products::where('type','Déchets')->count();
$table['Cigare Veste']=Products::where('type','Cigare Veste')->count();
$table['Lacets']=Products::where('type','Lacets')->count();
$table['Sangles']=Products::where('type','Sangles')->count();
$table['Fil à Crochet']=Products::where('type','Fil à Crochet')->count();
$table['Boutons']=Products::where('type','Boutons')->count();


return view('stats',['table'=>$table]);

   }

public function stats_commande(){
    
$table2=array();

    # code...
$nb=0;
$all=Products::all();


foreach ($all as $key ) {
    # code...
       if($key->type=="Epaulettes"){
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}
$table2['Epaulettes']=$nb;
$nb=0;


foreach($all as $key){
    if($key->type=="Bordures")
   
{
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}


$table2['Bordures']=$nb;
$nb=0;
foreach($all as $key){
   if($key->type=="Galons en rayonne"){
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}


$table2['Galons en rayonne']=$nb;
$nb=0;

foreach ($all as $key ) {
     if($key->type=="ZIGZAG"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}}

$table2['ZIGZAG']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Cordon 100% RAyonne"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}}

$table2['Cordon 100% RAyonne']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Macrame"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}}

$table2['Macrame']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Bande de Survetement"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}
$table2['Bande de Survetement']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Fermeture éclairs"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}
$table2['Fermeture éclairs']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Déchets"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}}

$table2['Déchets']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Cigare Veste"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}
$table2['Cigare Veste']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Lacets"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}
$table2['Lacets']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Sangles"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}
}
$table2['Sangles']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Fil à Crochet"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}}

$table2['Fil à Crochet']=$nb;
$nb=0;
foreach ($all as $key ) {
    # code...
     if($key->type=="Boutons"){
  
    $nb=$nb+$key->loadCount('commandes')->commandes_count;
}}

$table2['Boutons']=$nb;


return view('stats_commande',['table2'=>$table2]);

   }


function stat_user(){
    $table2=array();

    $table2['Epaulettes']=0;
    $table2['Bordures']=0;
    $table2['Galons en rayonne']=0;
    $table2['ZIGZAG']=0;
    $table2['Cordon 100% RAyonne']=0;
    $table2['Macrame']=0;
    $table2['Bande de Survetement']=0;
    $table2['Fermeture éclairs']=0;
    $table2['Déchets']=0;
    $table2['Cigare Veste']=0;
    $table2['Lacets']=0;
    $table2['Sangles']=0;
    $table2['Fil à Crochet']=0;
    $table2['Boutons']=0;
    
 $all=Commande::all();
 foreach($all as $key){

    if($key->user == Auth::user())
{
    $table2[$key->products->type]=$table2[$key->products->type]+1;
}
 }

return view('stats_commande',['table2'=>$table2]);

   }






   }
