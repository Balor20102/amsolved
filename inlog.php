<?php
require ('DBconnection.php');
if (mysqli_connect_errno()){
    echo "Failed to cennect to MySQL:" .mysqli_error();
}

if ($_POST['in_Naam'] == ""){
	echo "je moet nog een inlognaam invullen!<br>";
	echo "<a href=\"form inlog.html\">Terug naar het formulier</a>";
};

if ($_POST['wWoord'] == ""){
	echo "je moet nog een wachtwoord invullen!<br>";
	echo "<a href=\"form inlog.html\">Terug naar het formulier</a>";
};

if(isset($_POST['in_Naam']) && isset($_POST['wWoord'])){

    $git_naam = "SELECT gebruikersnaam, wachtwoord, admin FROM inloggevens";
    $gg_antwwoord = mysqli_query($con,$git_naam);
    while($r=mysqli_fetch_array($gg_antwwoord)){
        $WW = $r['wachtwoord'];
        $naam = $r['gebruikersnaam'];
        $admin = $r['admin'];

        if($naam === $_POST['in_Naam'] && $WW === $_POST['wWoord']){

            if($admin == 1){
                echo "<a href=\"DBadd.php\">admin pagina</a>" ;
                echo "<a href=\"form inlog.html\">Terug naar het formulier</a>";
            } else
            echo "<a href=\"form inlog.html\">Terug naar het formulier</a>";
        }
        
    }
}


    ?>