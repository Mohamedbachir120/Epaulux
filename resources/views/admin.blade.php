<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPAULUX</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link media="screen and (min-width: 1024px)" href="css/style.css" rel="stylesheet">
    <link media="screen and (max-width: 1023px)" href="css/admin_mob_style.css" rel="stylesheet">
    <link href="css/googlefont.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</head>

<body>


    <div class="profiladmin">

        <nav class="navadmin fixed-top">
            
            <a class="sidebar-logo" href="/"> <img src="css/logoapropos.PNG" alt=""></a>

            <button class="btn sidebar-client-toggle" onclick="togllefunc()"><i class="fa fa-bars"></i></button>

            <ul>

                <li><a href="index.html">Acceuil</a></li>
                <li><a href="produits.html">Produits</a></li>
                <li><a href="profilclient.html">Mon Profil</a></li>

            </ul>

            <form class="searchbox" id="serch-box">
                <input type="text" class="form-control" id="searchinput" maxlength="64" onkeyup="myFunction()" placeholder="Recherche..." />
                <span id="searchclear" class="btn-fermer-recherche"><i class="fa fa-times" aria-hidden="true"></i></span>
                <button type="submit"><i class=" fa fa-search" aria-hidden="true"></i></button>
            </form>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
              @csrf
              <button class="deconnect" type="submit">    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                </button>
          
            </form>
        </nav>




        <div class="profiladmin-contenu">


            <div class="sidenav">
                <button class="dropdown-btn">Traitement des commandes
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-container">
    
                     <a href="{{ route('show_commande') }}">Liste des commandes <i class="fa fa-shopping-cart"></i> </a>
                    <a href="{{ route('stats') }}">Statistique des produits<i class="fa fa-shopping-cart"></i></a>
                     <a href="{{ route('stats_commande') }}">Statistique de commandes<i class="fa fa-line-chart"></i></a>
                  </div> 
                   <button class="dropdown-btn">Mes produits
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-container">
    
                            <a href="{{ route('create_products') }}"> Ajouter un Produit</a>
                            <a href="{{ route('show_products') }}">Afficher mes Produits</a>
                            <a href="{{ route('show_modele') }}">Afficher les modèles</a>
                  </div>
                            <button class="dropdown-btn">Gestion des utilisateurs
                                <i class="fa fa-caret-down"></i>
                              </button>
                              <div class="dropdown-container">
                  
                        <a href="{{ route('show.users') }}">Afficher les utilisateurs<i class="fa fa-user"></i></a>
                    
                            <a href="{{ route('show_admins') }}">Les Administrateurs</i></a>
                            
                            <a href="{{ route('create_super_user') }}">Créer un administrateurs</i></a>
                              </div>
                              <button class="dropdown-btn">Gestions des modéles
                                <i class="fa fa-caret-down"></i>
                              </button>
                              <div class="dropdown-container">
                
                    <a href="{{ route('show_ref') }}">Afficher les références</a>
                    <a href="{{ route('create_modele') }}">Ajouter un modèles</a>
                    <a href="{{ route('create_ref') }}">Ajouter une référence</a>
                              </div>
                    <button class="dropdown-btn">Mon profil
                        <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="dropdown-container">
        
                            <a href="/modify_user_info/{{ Auth::user()->id }}">Informations Personnelles<i class="fa fa-info"></i></a>
                            <a href="/password_change/{{ Auth::user()->id }}">Mot de passe<i class="fa fa-lock"></i></a>
                      </div>
            </div>


            <div class="contenu">
                <div class="grid-container" >
                    @foreach ($products as $item)
                    
                    <div class="grid-item" >  
                        <img src="/images/{{$item->contenu }}" >  
                        <p >  {{ $item->type }} </p>
                     
                        <a href="/detail_products/{{ $item->id }}" class="btn btn-success"> voir plus de details</a> </div>
                    @endforeach
            </div> 
               </div>

        </div>



    </div>

</body>

</html>

<script src="css/jquery.min.js"></script>
<script src="css/popper.min.js"></script>
<script src="css/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script>
    AOS.init();
</script>

</body>

</html>

<script>
    $(".sidebar-admin-toggle").click(function(e) {
        e.preventDefault();
        $(".profiladmin").toggleClass("toggled");
    });
</script>




<style>
      @media screen and (min-width: 1024px){
 
     .grid-container{
  display: grid; 
   grid-template-columns: auto auto auto ;
   
   padding: 10px;
}
.grid-item{
    color:white;
  background-color: rgb(24, 59, 59);
  border: 1px dotted black;
  padding: 10px;
    border-radius: 7px;
  font-size: 30px;
  text-align: center;
}
.grid-item img{
  width: 300px;
  border-radius: 6px;
  height: 200px;
}
    body{
   background-color: #262626;
    }
    .sidenav {  
        margin-top:20px; 
  height: 100%;
  min-height: 700px;
  width: 300px;
  position: relative;
  z-index: 1;
  border-radius:7px; 

  left: 0;
  background-color: #07070766;
  overflow-x: hidden;
  padding-top: 20px;

 }
a i{
    margin-left: 10px;
}
/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 17px;
  color: white;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

    .profiladmin {
        width: 100%;
        height: 92vh;
        margin-top: -1%;
        /*  background-image: url("img/profilclient.jpg");
        background-position-y: 75%;
        background-repeat: no-repeat;
        background-size: cover; */
    }
    
    .navadmin {
       
    background-color: rgb(37, 37, 37);
   width: 100%;
        height: 10vh;
        padding: 0.6% 2% 0.6% 5%;
        z-index: 1030;
        display: flex;
        flex-direction: row;
    }
    .navadmin a{
      max-width: 200px;
    }
    .navadmin a img {
        margin-top:1%; 
        width:50%;
        height: 6vh;
        box-shadow: 0px 0px 7px 2px skyblue;
        margin-left: -9%;
        border-radius: 10px 10px 0px;
    }
    
    
    .navadmin .sidebar-client-toggle {
        width: 4.5%;
        height: 6.5vh;
        margin-top: 0.3%;
        padding: 0% 0% 3% 0%;
        margin-left: 0%;
        border: none;
        outline: none;
        font-size: 200%;
        color: rgb(255, 255, 255);
    }
    
    .navadmin .sidebar-client-toggle:hover,
    .navadmin .sidebar-client-toggle:focus {
        background: white;
        color: #021e4e;
    }
    
    .navadmin ul {
        margin: top;
        display: flex;
        list-style: none;
        width: 40%;
        height: 7vh;
        padding-top: 0.5%;
    }
    
    .navadmin ul li {
        padding: 2%;
        font-size: 15px;
        margin-right: 5%;
        width: 28%;
        white-space: nowrap;
        text-align: center;
        border-radius: 10px;
    }
    
    .navadmin ul li:first-child {
        margin-right: 2%;
    }
    
    .navadmin ul li:hover {
        transform: scale(1.2);
        box-shadow: inset 0px 0px 20px 2px skyblue;
        transition: all 0.5s ease-in-out;
    }
    
    .navadmin ul li a {
        text-decoration: none;
        color: white;
        font-size: 20px;
    }
    
    .navadmin .searchbox {
        width: 2.8%;
        height: 5.3vh;
        margin-top: 0.85%;
    }
    
    .navadmin .searchbox input {
        width: 2.3%;
        height: 5.3vh;
        position: absolute;
        border: none;
        outline: none;
        padding: 8px 10px 10px 40px;
        color: #183a6e;
        font-size: 16px;
        border-radius: 50px;
        background: none;
        transition: all 0.4s;
    }
    
    .navadmin .searchbox button {
        position: absolute;
        width: 2.4%;
        height: 5vh;
        margin-top: 1px;
        margin-left: 2px;
        border: none;
        outline: none;
        border-radius: 50px;
        color: #fff;
        background: #ea0000;
    }
    
    .navadmin .searchbox .btn-fermer-recherche {
        position: absolute;
        color: #ea0000;
        font-size: 20px;
        margin-left: 24.5%;
        margin-top: 0.2%;
        opacity: 0;
        cursor: pointer;
    }
    
    .navadmin .searchbox:hover input,
    .navadmin .searchbox input:focus {
        width: 26.5%;
        box-shadow: 0px 0px 0px 4px #1976d254;
        background: #fff;
    }
    
    .navadmin .searchbox:hover button,
    .navadmin .searchbox:focus-within button {
        background: #1976D2;
        color: #fff;
    }
    
    .navadmin .searchbox:hover .btn-fermer-recherche {
        opacity: 1;
        transition: all 2s;
    }
    
    .navadmin .deconnect {
        border: none;
        outline: none;
        font-size: 15px;
        white-space: nowrap;
        margin-top:1%; 
        width: 100%;
        height: 70%;
        border-radius: 10px;
        color: white;
        background: #dd0c0c;
        margin-left: 20%;
    }
    
    .navadmin .deconnect:hover {
        transform: scale(1.2);
        transition: all 0.5s ease-in-out;
    }
    
    .profiladmin-contenu {
        margin-top: 4.8%;
        display: flex;
    }
    
   
    
    .profiladmin-contenu .contenu {
        width: 80%;
        padding: 2%;
        background:none;

    }
    #logout-form{
      margin-left:27%; 
    }}
    

</style>

                   

                        
          
                          
             
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input =$("#searchinput").val();
    
  $('p').each(function () {
    var p=this.innerText;
    txtValue=p.toUpperCase();
    input=input.toUpperCase();
    if(input==""){
      tr= $(this).parent().get(0);
      tr.style.display="";

    }
    if((txtValue.indexOf(input) == -1) )
{   
  
tr= $(this).parent().get(0);
 tr.style.display="none";
   
   }
   
});
 
  }

function togllefunc()
{ 
  $(".sidenav").toggle(600);

  var v=$(".grid-container").css("grid-template-columns");

    if(v.substring(0,6)<300 && v.substring(0,6)>150){
        $(".grid-container").css("grid-template-columns","auto auto auto");
  $(".grid-container").css("width","120%");}
  else if(v.substring(0,6)<150){
    $(".grid-container").css("grid-template-columns","auto");
  $(".grid-container").css("width","100%");}
 
  
 

    
    else if(v=="322.191px 322.191px 322.191px 322.191px"){
  $(".grid-container").css("grid-template-columns","auto auto auto");
  $(".grid-container").css("margin-left","0%");}
  else{
  $(".grid-container").css("grid-template-columns","auto auto auto auto");
  $(".grid-container").css("margin-left","5%");
  }
}
  var v= "{{ session('msg') }}";
if(v.length > 1 ){
  alert(v);
}
</script>