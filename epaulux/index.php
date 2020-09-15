

 <?php

include("inc/header.php");
include("inc/navbar.php");
include("inc/slider.php");
include("inc/features.php");
include("inc/apropos.php");
include("inc/notreentreprise.php");
include("inc/notreequipe.php");
include("inc/footer.php");
include("inc/footerlinks.php");


?>


















<style>
    /*///////////////////////////////////////////////////// Media Queries /////////////////////////////////////////////////////*/
    
    @media screen and (max-width: 959px) and (min-width: 768px) {
        #main .block {
            padding: 40px;
            width: 620px;
        }
    }
    
    @media screen and (max-width: 767px) {
        #main .block {
            padding: 30px;
            width: 420px;
        }
        #main h2 {
            font-size: 30px;
        }
        #main .block {
            padding: 30px;
        }
        #main .part-1,
        #main .part-2,
        #main .part-3 {
            padding-top: 100px;
            padding-bottom: 100px;
        }
    }
    
    @media screen and (max-width: 479px) {
        #main .block {
            padding: 30px 15px;
            width: 290px;
        }
    }
</style>



<!-- 
<div class="box17">

    <ul class="icon">
        <li><a href="#"><i class="fa fa-search"></i></a></li>
        <li><a href="#"><i class="fa fa-link"></i></a></li>
    </ul>


    <div class="box-content">
        <h3 class="title">Williamson</h3>
        <span class="post">Web Developer</span>
    </div>


</div>

 -->
<style>
    /*//////////////////////////////////////////////////////////// box ////////////////////////////////////////////////////////////*/
    
    .box17 {
        position: relative;
        width: 400px;
        height: 400px;
        background: red;
        margin-left: 50px;
        background-image: url("img/card-img.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }
    
    .box17 .post {
        display: block;
        font-size: 14px;
        color: #fff
    }
    
    @media only screen and (max-width:990px) {
        .box17 {
            margin-bottom: 30px
        }
    }
    /*////////////////////////////////////////////////// box- box:after  //////////////////////////////////////////////////*/
    
    .box17:after {
        content: "";
        width: 100%;
        height: 100%;
        background: rgba(2, 162, 221, .9);
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: all .5s ease 0s
    }
    
    .box17:hover:after {
        opacity: 1
    }
    /*/////////////////////////////////////////////////////// box-icon ///////////////////////////////////////////////////////*/
    
    .box17 .icon {
        width: 100%;
        height: 100%;
        list-style: none;
        padding: 0;
    }
    
    .box17 .icon li a {
        width: 45px;
        height: 45px;
        line-height: 45px;
        margin: 0 auto;
        top: 50%;
        border: 1px solid #fff;
        opacity: 0;
        position: absolute;
        transition: all .6s ease 0s
    }
    
    .box17:hover .icon li a {
        top: 30%;
        opacity: 1
    }
    
    .box17 .icon li a:hover {
        background: #fff;
        color: #02a2dd;
    }
    
    .box17 .icon li:first-child a {
        left: -90%;
        right: 0
    }
    
    .box17:hover .icon li:first-child a {
        left: -55px
    }
    
    .box17 .icon li:last-child a {
        right: -90%;
        left: 0
    }
    
    .box17:hover .icon li:last-child a {
        right: -55px
    }
    
    .box17:hover .box-content {
        bottom: 0
    }
    /*/////////////////////////////////////////////////// box-box-content ///////////////////////////////////////////////////*/
    
    .box17 .box-content {
        width: 100%;
        padding: 20px 10px;
        background: rgba(0, 0, 0, .1);
        margin-top: 400px;
        position: absolute;
        transition: all .6s ease 0s;
    }
</style>



<script>
    $(document).ready(function() {


        $("#searchclear").click(function() {

            $("#searchinput").val('');

        });


        /*  $("#email").click(function() {

             $("#emaillabel").css("color", "grey");
             $("#emaillabel").css("margin-top", "-22px");
             $("#emaillabel").css("margin-left", "7px");
             $("#emaillabel").css("font-size", "12px");

         }); */




        $("#seepassword").click(function() {

            $("#password").attr("type", "text");
            $("this").hide(); //"this" here refers to " #seepassword "
            $("#hidepassword").show();



        });


        $("#hidepassword").click(function() {

            $("#password").attr("type", "password");
            $("#hidepassword").hide(); //"this" here refers to " #hidepassword "
            $("#seepasswordnav").show();



        });

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


    });
</script>