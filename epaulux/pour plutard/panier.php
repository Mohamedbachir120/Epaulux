
Panier : ajout/suppression de produit dans un caddie virtuel
Soyez le premier à donner votre avis sur cette source.

Snippet vu 72 791 fois - Téléchargée 35 fois

CString
Mis à jour le 17/04/2007Commenter
CONTENU DU SNIPPET
Voila ma premiere contribution au site (enfin), bon c'est un code simple et utile, c'est certains ya des millions d'autres facon de le faire, mais c'est ma facon du moment :p.
En fait c'est simple on clique sur un lien avec une ID de produit , il cherche si le produit existe si il existe pas il ajoute un produit et met la quantité 1 par defaut, par contre si le produit existe il incremente la quantité de ce produit de même pour la suppression(mais dans l'autre sens :))
NB:ce code est accompagné d'un contenu html pour illustrer le programme, vous pouvez ajouter autant de liens que vous voulez suivant l'exemple puis pour rendre le script effectif nommé une page panier.php (ce script est valable pour les configuration en register global ON et OFF)
SOURCE / EXEMPLE :
<?php session_start() ?>
<html>
<head>
<title>Gestion d'ajout dans un panier</title>
</head>
<body>
 <?php

//A faire vérification de la validité de l'id du produit ex pour un valeur numérique
$motif="^([0-9]+)$"; //Ce motif définit uniquement des valeurs numériques 

///on vérifie si l'id du produit est valide
if(!eregi($motif,$_GET["prod"]) && isset($_GET["prod"]))
	{
		echo 'L\'id du produit n\'est pas valide m\'sieur!! </br >';
		$flag=0;//drapeau pour dire que l'id est pas valide
	}
	else
	{
		$flag=1; //sinon ben l'id elle est valide m'sieur :)
	}	
///ya t-il un produit de selectionner ?

///Si tout va bien on traite l'ajout
if (isset($_GET["prod"]) && $flag==1 && $_GET['action']=='ajout') 
	{
//le produit est il déja present dans le panier ?
 		$tab_produit=explode(";",$_SESSION['produit']);
		
		if (in_array ($_GET["prod"], $tab_produit)) // ici modif par rapport à l'ancien script en effet cela entrainait des erreurs sur les ID (on vérifié si l'id est présente dans le tableau)
	 			 {
		///oui mais ou est til?
				
//on met la chaine dans un tableau et on compte
				$nb=count($tab_produit);
				$nb--;//ca c'est a cause du ";" en trop la fin de la chaine
					for($n=0;$n<$nb;$n++)
					{
						if($tab_produit[$n]==$_GET["prod"])
							{
						$indice=$n;//cool on l'a repéré
							}
		   			 }
///on va remplacer la valeur de la quantité correspondant au produit en incrementant de 1
		$tab_qtite=explode(";",$_SESSION['qtite']);
		$tab_qtite[$indice]++;
// et hop on retablit le tableau en chaine de caracteres
		$_SESSION['qtite']=implode(";",$tab_qtite);
				}
		else 
			{
///on incremente les variables produits
			$_SESSION['produit'].=$_GET["prod"].";";
 ///valeur par défaut de la quantité lors du premier clique
			$_SESSION['qtite'].="1".";";

			}
	}
	
//Et en exclusivité mondial la suppression de produit 
if (isset($_GET["prod"]) && $flag==1 && $_GET['action']=='suppall') 
	{
///c'est exactement la même chose sauf qu'on supprimer
		$tab_produit=explode(";",$_SESSION['produit']);
		
			if (in_array ($_GET["prod"], $tab_produit))
				
				{
				 	 $nb=count($tab_produit);
					 $nb--;//ca c'est a cause du ";" en trop la fin de la chaine
						for($n=0;$n<$nb;$n++)
							{
							if($tab_produit[$n]==$_GET["prod"])
								{
								$indice=$n;//cool on l'a repéré
								}
		   					 }
					//maintenant il faut tirer sur la cible !!
					//donc on eneleve le produit
					unset($tab_produit[$indice]); //pan !
					$_SESSION['produit']=implode(";",$tab_produit);// on rétablit la chaine
					
					//on fait pareille pour la quantité
					$tab_qtite=explode(";",$_SESSION['qtite']); // on vise !
					unset($tab_qtite[$indice]); // pan !!
					$_SESSION['qtite']=implode(";",$tab_qtite); // on rétablit la chaine
					
					//et on supprime l'id de produit que l'on veut pas
				}
	}		
					 
///suppression d'un seul produit
if (isset($_GET["prod"]) && $flag==1 && $_GET['action']=='suppone') 
	{
	//idem que les autres (la je répète exprêt pour bien décomposer les 3 actions mais autant faire une fonction je vous laisse la faire ... faut pas abuser :)
	$tab_produit=explode(";",$_SESSION['produit']);
		
			if (in_array ($_GET["prod"], $tab_produit))
				
				{
				 	 $nb=count($tab_produit);
					 $nb--;//ca c'est a cause du ";" en trop la fin de la chaine
						for($n=0;$n<$nb;$n++)
							{
							if($tab_produit[$n]==$_GET["prod"])
								{
								$indice=$n;//cool on l'a repéré
								}
		   					 }
					$tab_qtite=explode(";",$_SESSION['qtite']); // on vise !
					//on décrémente la quantité correspondant à l'id du produit 
					//mais attention quand on atteint 0 et ben le pauvre produit faut le supprimer complètement
					if($tab_qtite[$indice]<1)
					 {
					 unset($tab_qtite[$indice]); // pan j'en veux plus m'sieur
					 unset($tab_produit[$indice]); //pan !
					$_SESSION['produit']=implode(";",$tab_produit); // on rétablit la chaine produit
					$_SESSION['qtite']=implode(";",$tab_qtite); // on rétablit la chaine quantité
					 }
					 else // sinon et ben on décrémente tout simplement vala
					 {
					 //Au prochain clique quand on arrive à 1 il faut penser à retirer le produit
					 					 
					$tab_qtite[$indice]--; //j'en veux 1 de moins m'sieur
					if($tab_qtite[$indice]==0) //ca c'est pour ne pas afficher 0 quand ya plus de produits dans la musette !!
					 {
					   unset($tab_qtite[$indice]); // pan j'en veux plus m'sieur
					 unset($tab_produit[$indice]); //pan !
					$_SESSION['produit']=implode(";",$tab_produit); // on rétablit la chaine produit
					$_SESSION['qtite']=implode(";",$tab_qtite); // on rétablit la chaine quantité
					}
					else
					{
					$_SESSION['qtite']=implode(";",$tab_qtite); // on rétablit la chaine
					}
					}
				}	
   }
//aller hop on affiche tout ca:
$tab_produit=explode(";",$_SESSION['produit']);
$tab_qtite=explode(";",$_SESSION['qtite']);
$nb=count($tab_qtite);
$nb--;
echo 'Liste des quantités de produits reperés par leur ID: </br ></br >';
for($n=0;$n<$nb;$n++){
echo 'Nombre de produits avec l\'id <b>'.$tab_produit[$n].'</b> : <b>'.$tab_qtite[$n].'</b> unité(s)</br >';
}

?>
<p><a href="panier.php?prod=1&action=ajout">Ajouter un produit ID1</a> | <a href="panier.php?prod=1&action=suppall">Supprimer tous les produits  ID1</a> | <a href="panier.php?prod=1&action=suppone">Supprimer un produits  ID1</a></p>
<p><a href="panier.php?prod=2&action=ajout">Ajouter un produit ID2</a> | <a href="panier.php?prod=2&action=suppall">Supprimer tous les produits  ID2</a> | <a href="panier.php?prod=2&action=suppone">Supprimer un produits  ID2</a></p>
<p><a href="panier.php?prod=112&action=ajout">Ajouter un produit ID3</a> | <a href="panier.php?prod=112&action=suppall">Supprimer tous les produits  ID3</a> | <a href="panier.php?prod=112&action=suppone">Supprimer un produits  ID3</a></p>
<p><a href="panier.php?prod=21&action=ajout">Ajouter un produit ID4</a> | <a href="panier.php?prod=21&action=suppall">Supprimer tous les produits  ID4</a> | <a href="panier.php?prod=21&action=suppone">Supprimer un produits  ID4</a></p>

</body>
</html>








































































Fonction caddie : ajouter/modifier/supprimer des éléments
Soyez le premier à donner votre avis sur cette source.

Snippet vu 62 950 fois - Téléchargée 27 fois

cs_rob85
Mis à jour le 12/03/2008Commenter
CONTENU DU SNIPPET
Un caddie est un espèce de 'panier' dans lequel ont peut soit ajouter un produit, modificer la quantité de ce produit ou bien supprmier ce produit. Je sais qu'un script de ce genre éxiste déja mais j'ai essayé de l'utiliser et il ne fonctionnait pas. Alors j'ai codé un caddie moi-même qui fonctionne parfaitement. Le principe est toujours le même, on stockes les produits ainsi que leurs quantités respectives dans un tableau (array) et qui à son tour est stocké dans une variable de session.

Le tout est composé de 3 fichier qui servent à ajouter un produits(caddie_add.php), modifier une quantité(caddie_update.php) et supprimer un produit(caddie_del.php).
SOURCE / EXEMPLE :
<?php
// caddie_add.php... sert à ajouter un produit...
session_start();
if(isset($_GET['prod']) && isset($_GET['qtte']))
{
	// si on a spécifié un produit anisi qu'une quantité :
	// on vérifie si un panier existe déja...
	
	if(session_is_registered('panier') && is_array($panier))
	{
		
		// si le panier existe déja...
		$nbprod = count($panier);
		// on compte le nombre d'éléments dans le panier...
		for($i=0;$i<$nbprod;$i++)
		{
			// on fait une boucle qui va passer en revue chaque produit du panier
			// pour voir si le produit que l'on veut rajouter existe déja
			if($panier[$i]['prod'] == $_GET['prod'])
			{
				// le produit existe...
				$prodin = "true";
				// inscrit dans une variable que le produit existe...
				$prodline = $i;
				// et on précise aussi quel est son emplacment dans le caddie
			}
		}
		if(isset($prodin) && $prodin == "true")
		{
			// si le produit existe déja...
			// ...la quantité précédente est effacée...
			array_splice($panier,$prodline,1);
			// ...pour laisser place à celle qui le client vient de rajouter...
			array_push($panier,array("prod" => $_GET['prod'],"qtte" => $_GET['qtte']));
		}
		else
		{
			// sinon on rajoute le produit dans le panier tt simplement...
			array_push($panier,array("prod" => $_GET['prod'],"qtte" => $_GET['qtte']));
		}	
		header("Location: prof_commandes.php");
		// on peut faire une redirection vers une page qui va faire la liste de tous les produits...
	}
	else
	{
		// si le panier n'existe pas...
		session_register('panier');
		// on le créer...
		$panier = array ();
		// on rajoute le produit et la quantité...
		array_push($panier,array("prod" => $_GET['prod'],"qtte" => $_GET['qtte']));
		// le panier à été crée...
		header("Location: caddie_list.php");
		// on peut faire une redirection vers une page qui va faire la liste de tous les produits...
	}
}
else
{
	// les variable prod et qtte n'existent pas...
	header("Location: caddie_list.php");
}
?>
####################
<?php
// panier_update.php... ...sert à modifier la quantité d'un produit...
session_start();

if(isset($_GET['prod']) && isset($_GET['qtte']))
{
	// on vérifie qu'un produit et une 'nouvelle' quantité ont été spécifés...
	// si oui,
	if($_GET['qtte'] != 0)
	{
	// si la 'nouvelle' quantité est différente de zéro....
		$nbprod = count($panier);
		for($i=0;$i<$nbprod;$i++)
		{
		// on fait une boucle qui passe en revue chaque élément du panier...
			if ($panier[$i]['prod'] == $_GET['prod'])
			{
				// lorsque l'on tombe sur le produit à modifier,
				// on donne la valeur de la 'nouvelle' quantité à la quantité du produit dan sle panier...
				$panier[$i] = array("prod" => $_GET['prod'],"qtte" => $_GET['qtte']);
			}
		}
	}
	else
	{
		// si la 'nouvelle' quantité est égale à 0, ca revient au même que de supprimer...
		$nbprod = count($panier);
		for($i=0;$i<$nbprod;$i++)
		{
			// on fait une boucle qui passe en rebue tout le panier...
			if($panier[$i]['prod'] == $_GET['prod'])
			{
				// dès qu'on tombe sur la valeur à 'modifier'(ici en l'occurence il s'agit de supprmier ..)
				array_splice($panier,$i,1);
			}
		}
	}
	header("Location: caddie_list.php");
	// on redirige le client vers une page avec la liste de produits...
}
?>
############################
<?php
// caddie_del.php... ...sert à supprimer un élément du caddie...
session_start();

if(isset($_GET['prod']))
{
	// si un produit ets spécifié.;;
	$nbprod = count($panier);
	for($i=0;$i<$nbprod;$i++)
	{
		// on fait une boucle qui parcours le panier...
		if($panier[$i]['prod'] == $_GET['prod'])
		{
			// une fois arrivé au produit voulu, on le supprime...
			array_splice($panier,$i,1);
		}
	}
	header("Location: caddie_list.php");
	// on redirige le client vers une page qui liste les produits & les quantités...
}
?>
############################
// caddie_list.php ...sert à lister les produits du caddie
	if(session_is_registered('panier'))
	{
		if(is_array($panier))
		{
			$nbart = count($panier);
			if($nbart == 0)
			{
				echo "Votre panier est vide.<br>\n";
			}
			else
			{
				echo "Il y a des articles dans votre panier.<br><br>\n";
				echo "<table width=\"90%\" cellpadding=\"3\" align=\"center\" border=\"0\" cellspacing=\"0\"><tr bgcolor=\"#AE888C\"><td height=\"23\" align=\"center\" class=normalprof height=\"37\"><strong><font color=\"#FFFFFF\">Marques</font></strong></td><td align=\"center\" class=normalprof><strong><font color=\"#FFFFFF\">Nom du produit</font></strong></td><td align=\"center\" class=normalprof><strong><font color=\"#FFFFFF\">Quantité</font></strong></td><td align=\"center\" class=normalprof><strong><font color=\"#FFFFFF\">Modification</font></strong></td></tr>";
				for($i=0;$i<$nbart;$i++)
				{
					if(is_array($panier[$i]))
					{
						mysql_select_db($database_mysql_connect,$mysql_connect) or die(mysql_error());
						$getprodinfo = mysql_query("SELECT idproduit, marque, nom, prix, promoexiste, promotype, promored, promodatedebut, promodatefin FROM produits_tbl WHERE idproduit = '".$panier[$i]['prod']."'", $mysql_connect) or die(mysql_error());
						while($row_getprodinfo = mysql_fetch_array($getprodinfo,MYSQL_ASSOC))
						{
							$getmarque = mysql_query("SELECT marque FROM idmarques_tbl WHERE idmarque = '".$row_getprodinfo['marque']."'");
							$row_getmarque = mysql_fetch_assoc($getmarque);
							echo "<tr bgcolor=\"#FFFFFF\"><td align=\"center\" style=\"BORDER-BOTTOM: #AE888C 1px solid ; BORDER-LEFT: #AE888C 1px solid\" height=\"23\" class=normalprof>\n";
							echo "<form name=\"panier_update_form".$i."\" method=\"get\" action=\"prof_panier_update.php\">\n";
							echo $row_getmarque['marque']."</td><td align=\"center\" style=\"BORDER-BOTTOM: #AE888C 1px solid\" class=normalprof>".$row_getprodinfo['nom']."</td><td align=\"center\" style=\"BORDER-BOTTOM: #AE888C 1px solid\" class=normalprof> <input type=\"hidden\" name=\"prod\" value=\"".$panier[$i]['prod']."\">\n<input type=\"text\" size=\"2\" name=\"qtte\" value=\"".$panier[$i]['qtte']."\">  </td><td style=\"BORDER-BOTTOM: #AE888C 1px solid ; BORDER-RIGHT: #AE888C 1px solid\" class=normalprof align=\"center\" valign=\"bottom\"><a href=\"prof_panier_del.php?prod=".$panier[$i]['prod']."\">Retirer</a> || <a href=\"javascript:document.panier_update_form".$i.".submit()\">Modifier</a></form>\n</td></tr>";
							echo "</td></tr>";
						}					
					}
				}
				mysql_free_result($getprodinfo);
				echo "</table>";
			}
			echo "<div align=\"center\"><a href=\"prof_commandes_confirm.php\"><strong>Valider le panier</strong></a></div>";
			echo "<br><a href=\"prof_panier_clear.php\">Supprimer tous les produits du panier</a>";
		}
		else
		{
			echo "Votre panier est vide.<br>\n";
		}
	}
	else
	{
		echo "Votre panier est vide.<br>\n";
	}
	if(session_is_registered('continueachat'))
	{
		printf("<a href=\"%s\"Voir le dernier produit ajouté au caddie </a>",$continueachat);
	}
	else
	{
		echo "<br><a href=\"prof_marques.php\">? Nos marques</a><br><a href=\"prof_produits.php\">? Nos produits</a>";
	}

CONCLUSION :













































































































































PHP - Panier/Caddi virtuel en SESSION
Soyez le premier à donner votre avis sur cette source.

Vue 7 048 fois - Téléchargée 2 345 fois

jordane45
Mis à jour le 18/12/2018Télécharger le projet Commenter
DESCRIPTION
Bonjour,

Suite à une demande sur le forum,
voici une class php permettant de gérer un panier (ou caddi) en variables de session.
- Le fichier index.php ne sert que d'exemple d'utilisation.
- La gestion du panier se fait via la class cart (fichier cart.class.php)

la class "cart" contient les fonctions permettant de :
- Initialiser un panier
- Ajouter des produits au panier
- Retirer des produits du panier
- Modifier la quantité d'un produit dans le panier
- Avoir le nombre de produit total dans le panier
- Avoir le montant total du panier


cart.class.php

 <?php
/**
*  FICHIER : cart.class.php
*
*/
class cart{
  
  /**
  * Constructeur de la class
  */
  function __construct(){
    // Démarrage des sessions si pas déjà démarrées
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $this->initCart();
  }
  
  /**
  *Initialisation du panier
  */
  public function initCart(){
    $_SESSION['panier'] = array(); 
  }
  
  /**
  * Retourne le contenu du panier
  */
  public function getList(){
    return !empty($_SESSION['panier']) ? $_SESSION['panier'] : NULL;
  }
  
  /**
  * Ajout d'un produit au panier
  */
  public function addProduct($id_produit,$libelle_produit,$qte=1,$prix_unitaire_produit=0){
    if($qte > 0 ){
      $_SESSION['panier'][$id_produit] = array('id_produit'=>$id_produit
                                                ,'produit'=>$libelle_produit
                                                ,'qte'=>$qte
                                                ,'prix_unitaire'=>$prix_unitaire_produit
                                                ); 
      $this->updateTotalPriceProduct($id_produit);
    }else{
      return "ERREUR : Vous ne pouvez pas ajouter un produit sans quantité..."; 
    }
  }
  
  private function updateTotalPriceProduct($id_produit){
    if(isset($_SESSION['panier'][$id_produit])){
      $_SESSION['panier'][$id_produit]['prix_Total'] = $_SESSION['panier'][$id_produit]['qte'] * $_SESSION['panier'][$id_produit]['prix_unitaire'];
    }
  }
  
  /**
  * Modifie la quantité d'une produit dans le panier
  */
  public function updateQteProduct($id_produit,$qte=0){
    if(isset($_SESSION['panier'][$id_produit])){
      $_SESSION['panier'][$id_produit]['qte'] = $qte;
      $this->updateTotalPriceProduct($id_produit);
    }else{
      return "ERREUR : produit non présent dans le panier"; 
    }
  }
  
  /**
  * Supprime une produit du panier
  */
  public function removeProduct($id_produit){
    if(isset($_SESSION['panier'][$id_produit])){
      unset($_SESSION['panier'][$id_produit]);
    }
  }
  
  /**
  * Retourne le nombre de produits dans le panier
  */
  public function getNbProductsInCart(){
    $panier = !empty( $_SESSION['panier'] ) ? $_SESSION['panier'] : NULL;
    $nb = 0;
    $panier = !empty( $_SESSION['panier'] ) ? $_SESSION['panier'] : NULL;
    if(!empty($panier)){
      foreach($panier as $P){ 
        $nb += $P['qte'];
      }
    }
    return $nb;
  }
  
  public function getTotalPriceCart(){
    $total = 0;
    $panier = !empty( $_SESSION['panier'] ) ? $_SESSION['panier'] : NULL;
    if(!empty($panier)){
      foreach($panier as $P){ 
        $total += $P['prix_Total'];
      }
    }
    return $total;
  }
  
}
 
 



index.php (exemples d'utilisation )

<?php
//Affichage des erreurs PHP ( A mettre au début de tes scripts PHP )
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

// Démarrage des sessions si pas déjà démarrées
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//on inclus la class qui permet de gérer le panier
// require_once "chemin/vers/le/fichier/cart.class.php";
require_once "cart.class.php";

//on initialise l'objet panier :
$oPanier = new cart();


//maintenant on peut ajouter des produits au panier
echo "<br><hr><br> On ajoute deux produits au panier";
$oPanier->addProduct(1,'produit 1',1,10);
$oPanier->addProduct(654,'produit xx',1,99.5);


//on affiche le nombre de produits dans le pannier
$nbProducts = $oPanier->getNbProductsInCart();
echo "<br>Nombre de produits : ". $nbProducts;

//on affiche le contenu du panier 
$contenu_panier = $oPanier->getList();
echo "<pre> Contenu du panier :<br>";
print_r($contenu_panier );
echo "</pre>";

//on affiche le montant total du panier
$total = $oPanier->getTotalPriceCart();
echo "<br>Total panier : ". $total ;


// on modifie la quantité du premier produit
echo "<br><hr><br> On modifie la quantité du premier produit : nouvelle quantité = 35 ";
$oPanier->updateQteProduct(1,35);

//on re-affiche le nombre de produits dans le pannier
$nbProducts = $oPanier->getNbProductsInCart();
echo "<br>Nombre de produits : ". $nbProducts;

//on re-affiche le contenu du panier 
$contenu_panier = $oPanier->getList();
echo "<pre> Contenu du panier :<br>";
print_r($contenu_panier );
echo "</pre>";

//on re-affiche le montant total du panier
$total = $oPanier->getTotalPriceCart();
echo "<br>Total panier : ". $total ;


// On retire le produit dont l'id est : 654
echo "<br><hr><br>On retire le produit dont l'id est : 654" ;
$oPanier->removeProduct(654);
//on re-affiche le contenu du panier 
$contenu_panier = $oPanier->getList();
echo "<pre> Contenu du panier :<br>";
print_r($contenu_panier );
echo "</pre>";
Télécharger le projet
CODES SOURCES












































































































































