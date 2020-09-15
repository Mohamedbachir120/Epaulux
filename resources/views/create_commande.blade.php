<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>




<h1> <a href="/"> home</a>   </h1>

<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>

        <div style="display: block; margin-left:30%;">

          <h3> Voici queleques informations concernant le produits :</h3>  
          <img src="/images/{{ $products->contenu }}" width="300px" height="200px">
          <li> ID :{{ $products->id }}</li>
          <li> Type: {{ $products->type }}  
          </li>
         <li> Modéle : 
          @foreach($products->modeles as $category)
          <li style="border: 2px black solid; max-width: 400px; "> <ul>
              <li> Nom: {{ $category->name }} </li>
            @if( $category->paire !="")  <li>Nombre de paire :{{ $category->paire}} </li> @endif
            @if( $category->prix_unitaire !="")  <li> Prix unitaire : {{ $category->prix_unitaire }} DA</li> @endif
              @if( $category->prix_gros !="") <li> Prix Gros : {{ $category->prix_gros }} DA</li> @endif
               @if( $category->prix_ugros !="")    <li> Prix Unitaire Gros : {{ $category->prix_ugros }} DA</li> @endif
              
              @if( $category->prix_paquets !="")    <li> Prix paquets : {{ $category->prix_paquets }} DA</li> @endif
                  
                @if( $category->prix_fardeau !="") <li> Prix Fardeau : {{ $category->prix_fardeau }} DA</li> @endif
                  </ul>
              </li>
          @endforeach
          </li>
         <li> Références : 
          @foreach($products->refs as $category)
          <li style="border: 2px black solid; max-width: 400px; "> <ul>
              <li> Nom: {{ $category->name }} </li>
            @if( $category->paire !="")  <li>Nombre de paire :{{ $category->paire}} </li> @endif
            @if( $category->prix_unitaire !="")  <li> Prix unitaire : {{ $category->prix_unitaire }} DA</li> @endif
              @if( $category->prix_gros !="") <li> Prix Gros : {{ $category->prix_gros }} DA</li> @endif
               @if( $category->prix_ugros !="")    <li> Prix Unitaire Gros : {{ $category->prix_ugros }} DA</li> @endif
              
              @if( $category->prix_paquets !="")    <li> Prix paquets : {{ $category->prix_paquets }} DA</li> @endif
                  
                @if( $category->prix_fardeau !="") <li> Prix Fardeau : {{ $category->prix_fardeau }} DA</li> @endif
                  </ul>
              </li>
          @endforeach
          </li>
         <li> Couleur : {{ $products->couleur }}</li>
         </div>
         <div style="margin-left:30%;">
<h1 > Effectuer  une Commande </h1>
<form method="post" id="myform" action="/store_commande/{{ $products->id }}" enctype="multipart/form-data">
    @csrf 
    <div>
    <label for="model"> Modéle</label>
    <select  name="model"  placeholder="Modéle" id="modele"   class="selectpicker" multiple required>
        @foreach ($products->refs as $modele)
        <option value="{{ $modele->id }}"> {{ $modele->name }}</option>
        @endforeach
    </select>
  </div>

   <br>
   <div>
    <label for="ref"> Référence</label>
    <select  name="ref"  placeholder="Référence"  class="selectpicker" multiple  required>
        @foreach ($products->modeles as $modele)
        <option value="{{ $modele->id }}"> {{ $modele->name }}</option>
        @endforeach
    </select>
  </div>
    <br>    
    <label for="quantite"> Quantité</label>
   <input type="number" name="quantite" min="1" required>
   <br>
   <label for="rapport"> Rapport</label>
   <textarea name="rapport" id="" cols="10" rows="6" placeholder="facultatif"></textarea>
<div style="display: flex; flex-direction:row; ">
<input type="submit" value="valider" class="btn btn-success">
<a href="/home"  class="btn btn-danger" style="max-height: 40px;margin-left:10px; margin-top:20px;"> Annuler</a>

</div>
</form>
</div>
</div>

<style>
  .selectpicker{
    margin: 100px;
  }
</style>
         <script>
     $('select').selectpicker();
    </script>    
    
    