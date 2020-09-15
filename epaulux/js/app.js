   $(document).ready(function() {
       /*//////////////////////////////// initialisation du plugin animation ////////////////////////////////*/

       AOS.init();

       /*////////////////////////////////////////////// Navbar //////////////////////////////////////////////*/

       window.onscroll = function() {
           myFunction()
       };

       var nav = document.getElementById("nav");
       var sticky = nav.offsetTop;

       function myFunction() {
           if (window.pageYOffset >= sticky) {
               nav.classList.add("sticky")
           } else {
               nav.classList.remove("sticky");
           }
       }


       /*//////////////////////////////////////////// button to top ////////////////////////////////////////////*/

       //Check to see if the window is top if not then display button
       $(window).scroll(function() {
           if ($(this).scrollTop() > 100) {
               $('.scrollToTop').fadeIn();
           } else {
               $('.scrollToTop').fadeOut();
           }
       });

       //Click event to scroll to top
       $('.scrollToTop').click(function() {
           $('html, body').animate({
               scrollTop: 0
           }, 800);
           return false;
       });

       /*////////////////////////////// Validation du formulaire d'inscription //////////////////////////////*/

       const subscribeform = document.getElementById('subscribeform');
       const nom = document.getElementById('nom');
       const prenom = document.getElementById('prenom');
       const tel = document.getElementById('tel');
       const adresse = document.getElementById('adresse');
       const subscribeemail = document.getElementById('subscribeemail');
       const subscribepassword = document.getElementById('subscribepassword');
       const subscribepasswordcheck = document.getElementById('subscribepasswordcheck');

       subscribeform.addEventListener('submit', e => {
           e.preventDefault();

           checksubscribeInputs();
       });

       function checksubscribeInputs() {


           // trim to remove the whitespaces
           const nomvalue = nom.value.trim();
           const prenomvalue = prenom.value.trim();
           const telvalue = tel.value.trim();
           const adressevalue = adresse.value.trim();
           const subscribeemailvalue = subscribeemail.value.trim();
           const subscribepasswordvalue = subscribepassword.value.trim();
           const subscribepasswordcheckvalue = subscribepasswordcheck.value.trim();

           function setErrorFor(input, message) {
               const formControl = input.parentElement;
               const small = formControl.querySelector('small');
               formControl.className = 'f-control error';
               small.innerText = message;
           }

           function setSuccessFor(input) {
               const formControl = input.parentElement;
               formControl.className = 'f-control success';

           }

           if (nomvalue === '') {
               setErrorFor(nom, 'Vous devez écrir votre nom');
           } else {
               setSuccessFor(nom);

           }

           if (prenomvalue === '') {
               setErrorFor(prenom, 'Vous devez écrir votre prenom');
           } else {
               setSuccessFor(prenom);
           }

           if (telvalue === '') {
               setErrorFor(tel, 'Vous devez écrir votre tel');
           } else {
               setSuccessFor(tel);
           }


           if (adressevalue === '') {
               setErrorFor(adresse, 'Vous devez écrir votre adresse');
           } else {
               setSuccessFor(adresse);
           }


           if (subscribeemailvalue === '') {
               setErrorFor(subscribeemail, 'Erreur');
           } else
               setSuccessFor(subscribeemail);


           if (subscribepasswordvalue === '') {
               setErrorFor(subscribepassword, 'Password cannot be blank');
           } else {
               setSuccessFor(subscribepassword);
           }

           if (subscribepasswordcheckvalue === '') {
               setErrorFor(subscribepasswordcheck, 'Password2 cannot be blank');
           } else if (subscribepasswordvalue !== subscribepasswordcheckvalue) {
               setErrorFor(subscribepasswordcheck, 'Passwords does not match');
           } else {
               setSuccessFor(subscribepasswordcheck);
           }
       }

       /*//////////////////////////// see / hide password -- formulaire d'inscription ////////////////////////////*/


       $(".seesubscribepassword").click(function() {
           $("#subscribepassword").attr("type", "text");
           $(".seesubscribepassword").hide();
           $(".hidesubscribepassword").show();
       });


       $(".hidesubscribepassword").click(function() {
           $("#subscribepassword").attr("type", "password");
           $(".hidesubscribepassword").hide();
           $(".seesubscribepassword").show();
       });


       $(".seesubscribepasswordcheck").click(function() {
           $("#subscribepasswordcheck").attr("type", "text");
           $(".seesubscribepasswordcheck").hide();
           $(".hidesubscribepasswordcheck").show();
       });


       $(".hidesubscribepasswordcheck").click(function() {
           $("#subscribepasswordcheck").attr("type", "password");
           $(".hidesubscribepasswordcheck").hide();
           $(".seesubscribepasswordcheck").show();
       });

       /*////////////////////////////// Validation du formulaire de connexion //////////////////////////////*/

       const loginform = document.getElementById('loginform');
       const loginemail = document.getElementById('loginemail');
       const loginpassword = document.getElementById('loginpassword');

       loginform.addEventListener('submit', e => {
           e.preventDefault();

           checkloginInputs();
       });

       function checkloginInputs() {
           const loginemailValue = loginemail.value.trim();
           const loginpasswordValue = loginpassword.value.trim();
           const small = loginform.querySelector('small');

           if (!isEmail(loginemailValue)) {
               loginemail.style.boxShadow = " 0 0 0 0.1rem #e74c3c";
               loginemail.style.border = "none";
               small.style.visibility = "visible ";
               $(".loginemailcheck").css("visibility", "hidden");
               $(".loginemailexclamation").css("visibility", "visible");


           } else {
               loginemail.style.boxShadow = " 0 0 0 0.1rem #2ecc71";
               loginemail.style.border = "none";
               small.style.visibility = "hidden";
               $(".loginemailcheck").css("visibility", "visible");
               $(".loginemailexclamation").css("visibility", "hidden");

           }

           function isEmail(email) {
               return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);

           }

           if (loginpasswordValue === '') {

               loginpassword.style.boxShadow = " 0 0 0 0.1rem #e74c3c";
               loginpassword.style.border = "none";
               $(".loginpasswordcheck").css("visibility", "hidden");
               $(".loginpasswordexclamation").css("visibility", "visible");

           } else {
               loginpassword.style.boxShadow = " 0 0 0 0.1rem #2ecc71";
               loginpassword.style.border = "none";
               $(".loginpasswordcheck").css("visibility", "visible");
               $(".loginpasswordexclamation").css("visibility", "hidden");

           }



       };

       /*///////////////////////////////////// see and hide login password /////////////////////////////////////*/
       $(".seeloginpassword").click(function() {

           $("#loginpassword").attr("type", "text");
           $(".seeloginpassword").hide();
           $(".hideloginpassword").show();

       });


       $(".hideloginpassword").click(function() {

           $("#loginpassword").attr("type", "password");
           $(".hideloginpassword").hide();
           $(".seeloginpassword").show();

       });

       /*/////////////////////// keep the label up and the input's design while typing ///////////////////////*/


       $("#loginemail").keyup(function() {

           /*///////////////////////////////////// login email label /////////////////////////////////////*/

           $("#loginemail").css("border", "none");
           $("#loginemail").css("border-radius", "10px");
           $("#loginemail").css("box-shadow", "0 0 0 0.2rem rgba(0, 123, 255, 0.25)");
           /*///////////////////////////////////// login email input /////////////////////////////////////*/


           $(".loginemaillabel").css("margin-top", "-7%");
           $(".loginemaillabel").css("margin-left", "2%");
           $(".loginemaillabel").css("font-size", "12px");
           $(".loginemaillabel").css("color", "grey");
           $(".loginemaillabel").css("transition", "all 0.5s ease-in-out");

       });
       $("#loginpassword").keyup(function() {
           /*//////////////////////////////////// login password label ////////////////////////////////////*/

           $("#loginpassword").css("border", "none");
           $("#loginpassword").css("border-radius", "10px");
           $("#loginpassword").css("box-shadow", "0 0 0 0.2rem rgba(0, 123, 255, 0.25)");

           /*///////////////////////////////////// login password input /////////////////////////////////////*/

           $(".loginpasswordlabel").css("margin-top", "-7%");
           $(".loginpasswordlabel").css("margin-left", "2%");
           $(".loginpasswordlabel").css("font-size", "12px");
           $(".loginpasswordlabel").css("color", "grey");
           $(".loginpasswordlabel").css("transition", "all 0.5s ease-in-out");

       });


       /*///////////////// validation de formulaire de recuperation de mot de passe oublié /////////////////*/

       const mdpoublieform = document.getElementById('mdpoublieform');
       const mdpoublieemail = document.getElementById('mdpoublieemail');

       mdpoublieform.addEventListener('submit', e => {
           e.preventDefault();

           checkmdpoublieemail();
       });

       function checkmdpoublieemail() {
           const mdpoublieemailValue = mdpoublieemail.value.trim();



           if (mdpoublieemailValue === '') {

               mdpoublieemail.style.boxShadow = " 0 0 0 0.1rem #e74c3c";
               mdpoublieemail.style.border = " none";
               $(".mdpoublieexclamation").css("visibility", "visible");
               $(".mdpoubliecheck").css("visibility", "hidden");


           } else {
               mdpoublieemail.style.boxShadow = " 0 0 0 0.1rem #2ecc71";
               mdpoublieemail.style.border = " none";

               $(".mdpoublieexclamation").css("visibility", "hidden");
               $(".mdpoubliecheck").css("visibility", "visible");

           }

       };

       /*//////////////////////////////////////////////// End ////////////////////////////////////////////////*/


   });