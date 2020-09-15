<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPAULUX</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link media="screen and (min-width: 1024px)" href="css/style.css" rel="stylesheet">
    <link media="screen and (max-width: 1023px)" href="css/profil_mob_style.css" rel="stylesheet">
    
  <link href="css/googlefont.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 	
</head>

<body>


    <div class="profilclient">

        <nav class="navclient fixed-top">
            <a class="sidebar-logo" href="/"> <img src="css/logoapropos.PNG" alt=""></a>

            <button class="btn sidebar-client-toggle" onclick="togllefunc()"><i class="fa fa-bars"></i></button>

            <ul>

                <li><a href="/">Acceuil</a></li>
                <li><a href="/">Produits</a></li>
                <li><a href="/modify_user_info/{{ Auth::user()->id }}">Mon Profil</a></li>

            </ul>

            <form class="searchbox" id="serch-box">
                <input type="text" class="form-control" id="searchinput" onkeyup="myFunction()" maxlength="64" placeholder="Recherche..." />
                <span id="searchclear" class="btn-fermer-recherche"><i class="fa fa-times" aria-hidden="true"></i></span>
                <button type="submit"><i class=" fa fa-search" aria-hidden="true"></i></button>
            </form>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="deconnect" type="submit">    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
               </button>
          
            </form>
        </nav>




        <div class="profilclient-contenu" id="page-content-wrapper">

            <div class="sidebar-client">
                <ul>
                    <li><a href="/show_commande_user_side">Mes commandes<i class="fa fa-shopping-cart"></i></a></li>
                    <li> <a href="{{ route('stats_user') }}">Statistique de commandes<i class="fa fa-line-chart"></i></a></li>
                    <li class="menu">
                        <a href="#">Mon profil<i class="fa fa-user"></i></a>
                        <ul class="sousmenu">
                            <li><a href="/modify_user_info/{{ Auth::user()->id }}">Informations Personnelles<i class="fa fa-info"></i></a></li>
                            <li><a href="/password_change/{{ Auth::user()->id }}">Mot de passe<i class="fa fa-lock"></i></a></li>
                        </ul>

                    </li>
            </div>


            <div class="contenu" >
         
              <div class="grid-container" >
                @foreach ($products as $item)
                
                <div class="grid-item" >  
                    <img src="/images/{{$item->contenu }}" >  
                    <p >  {{ $item->type }} </p>
                 
                    <a href="/create_commande/{{ $item->id }}" class="btn btn-success"> Acheter </a>
                  </div>
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
<script src="css/aos.js"></script>
<script>
    AOS.init();
</script>

</body>

</html>
<script src="css/jquery.min.js"></script>
<script src="css/popper.min.js"></script>



<script>
    $(".sidebar-client-toggle").click(function(e) {
        e.preventDefault();
        $(".profilclient").toggleClass("toggled");
    });


    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
  function togllefunc()
{
  $(".sidebar-client").toggle(500);
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
</script>

<style>
     @media screen and (min-width: 1024px){
  .grid-container{
  display: grid; 
   grid-template-columns: auto auto auto ;
   
   padding: 10px;
}
.grid-item{
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 10px;

  font-size: 20px;
  font-weight: bold; 
  text-align: center;
}
.grid-item img{
  width: 300px;
  border-radius: 6px;
  height: 200px;
}

    .profilclient {
        width: 100%;
        height: 92vh;
        margin-top: -1%;
        background-image: url("img/profilclient.jpg");
        background-position-y: 75%;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .navclient {
        background: #021e4e;
        width: 100%;
        height: 10vh;
        padding: 0.6% 2% 0.6% 5%;
        z-index: 1030;
        display: flex;
        flex-direction: row;
    }

    .navclient a{
      max-width: 200px;
    }


 .navclient a img {
        width: 50%;
        height: 8vh;
        box-shadow: 0px 0px 7px 2px skyblue;
        margin-left: -9%;
        border-radius: 10px 10px 0px;
    }
    
    .navclient .sidebar-client-toggle {
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
    
    .navclient .sidebar-client-toggle:hover,
    .navclient .sidebar-client-toggle:focus {
        background: white;
        color: #021e4e;
    }
    
    .navclient ul {
        display: flex;
        list-style: none;
        width: 40%;
        height: 7vh;
        padding-top: 0.5%;
    }
    
    .navclient ul li {
        padding: 2%;
        font-size: 15px;
        margin-right: 5%;
        width: 28%;
        text-align: center;
        border-radius: 10px;
    }
    
    .navclient ul li:first-child {
        margin-right: 2%;
    }
    
    .navclient ul li:hover {
        box-shadow: inset 0px 0px 20px 2px skyblue;
        transition: all 0.5s ease-in-out;
    }
    
    .navclient ul li a {
        text-decoration: none;
        color: white;
        white-space: nowrap;
        font-size: 17px;
    }
    
    .navclient .searchbox {
        width: 2.0%;
        height: 5.3vh;
        margin-top: 0.85%;
    }
    
    .navclient .searchbox input {
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
    
    .navclient .searchbox button {
        position: absolute;
        width: 2.4%;
        font-size: 15px;
        white-space: nowrap;
        height: 5vh;
        margin-top: 1px;
        margin-left: 2px;
        border: none;
        outline: none;
        border-radius: 50px;
        color: #fff;
        background: #ea0000;
    }
    
    .navclient .searchbox .btn-fermer-recherche {
        position: absolute;
        color: #ea0000;
        font-size: 20px;
        margin-left: 24.5%;
        margin-top: 0.2%;
        opacity: 0;
        cursor: pointer;
    }
    
    .navclient .searchbox:hover input,
    .navclient .searchbox input:focus {
        width: 26.5%;
        box-shadow: 0px 0px 0px 4px #1976d254;
        background: #fff;
    }
    
    .navclient .searchbox:hover button,
    .navclient .searchbox:focus-within button {
        background: #1976D2;
        color: #fff;
    }
    
    .navclient .searchbox:hover .btn-fermer-recherche {
        opacity: 1;
        transition: all 2s;
    }
    
    .navclient .deconnect {
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
    
   .navclient .deconnect:hover {
     
        transition: all 0.5s ease-in-out;
    }
    
    .profilclient-contenu {
        margin-top: 4.8%;
        display: flex;
    }
    
    .profilclient-contenu .sidebar-client {
        width: 20%;
        min-height: 92vh;
        background: #021e4e66;
        transition: margin .25s ease-out;
        padding-top: 1%;
    }
    
    .sidebar-client ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        margin-left: -13%;
    }
    
    .sidebar-client ul li {
        padding: 5% 0% 4% 5%;
        height: 8vh;
    }
    
    .sidebar-client ul li:hover {
        background: #28c9ea;
    }
    
    .sidebar-client ul li a {
        color: white;
        font-size: 17px;
        text-decoration: none;
    }
    
    .sidebar-client ul li:first-child a i {
        margin-left: 36%;
        margin-top: 0.3%;
    }
    
    .sidebar-client ul li:nth-child(2) a i {
        margin-left: 7%;
    }
    
    .sidebar-client ul li:nth-child(3) a i {
        margin-left: 56%;
    }
    
    .sidebar-client ul li:nth-child(3) ul li:first-child a i {
        margin-left: 7%;
    }
    
    .sidebar-client ul li:nth-child(3) ul li:nth-child(2) a i {
        margin-left: 45%;
    }
    
    .sidebar-client ul li ul.sousmenu {
        display: none;
        background: none;
        margin-top: 4%;
        margin-left: -16%;
        padding-left: 13%;
    }
    
    .sidebar-client ul li ul.sousmenu li {
        margin-left: -3%;
        padding-left: 10%;
    }
    
    .sidebar-client ul li.menu:hover ul.sousmenu {
        display: block;
        transition: all 2s ease-in-out;
    }
    
    .profilclient.toggled .profilclient-contenu .sidebar-client {
        margin-left: 0;
    }
    
    .profilclient-contenu .contenu {
        width: 80%;
        padding: 2%;
    }
    #logout-form{
      margin-left:30%; 
    }
}
</style>
                         
    
