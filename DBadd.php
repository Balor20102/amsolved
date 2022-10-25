<?php 
require ('DBconnection.php');
if (mysqli_connect_errno()){
    echo "Failed to cennect to MySQL:" .mysqli_error();
}


?>


<!DOCTYPE html>
<html>
<head>

</head>

<body>
<p>toevoegen</p>
    <form action="" method="post">
        <label>voornaam</label>
        <input type="text"  name="Vnaam" value = "jantje">
        <input type="submit" value = "submit">

    
    </form>
    <br>
    <br>
    <br>
    <p>verwijderen</p>
    <form action="" method="post">
        <label>delete</label>
        <input type="text"  name="del" value = "1">
        <input type="submit" value = "submit">

    
    </form>

    <br>
    <br>
    <br>
    <p>bewerken</p>
    <form action="" method="post">
        <label>bewerken</label>
        <input type="text"  name="bewerkid" value = "id">
        <input type="text"  name="bewerknaam" value = "value">
        <input type="submit" value = "submit">

    
    </form>
</body>
</html>

<?php

//toevoegen aan de database
 if(isset($_POST['Vnaam'])){

    $name = $_POST['Vnaam'];

    //check ervoor dat er geen gevaarlijke icons instaan
    $name=mysqli_real_escape_string($con, $_POST['Vnaam']);

    $i_name = "INSERT INTO bedrijf (bedrijfsnaam) 
        VALUES('$name')";
    mysqli_query($con, $i_name); 
   
 }


// verwijderen uit de database

if(isset($_POST['del'])){
    
    $dele = $_POST['del'];

    $sql = "DELETE FROM bedrijf WHERE idbedrijf= '$dele'";

    $con->query($sql);
   
}

//iets bewerken

if(isset($_POST['bewerkid'])){
    if(isset($_POST['bewerknaam'])){
    
        $bewerk = $_POST['bewerknaam'];
        $bewerkid = $_POST['bewerkid'];


                $sql = "UPDATE bedrijf 
                SET idbedrijf = '$bewerkid', bedrijfsnaam = '$bewerk'
                WHERE idbedrijf = '$bewerkid'";

                $con->query($sql);
   
    }
}

function haaltzien($con){
    $git_naam = "SELECT idbedrijf, bedrijfsnaam FROM bedrijf";
    $gg_antwwoord = mysqli_query($con,$git_naam);
    while($r=mysqli_fetch_array($gg_antwwoord)){
        $id = $r['idbedrijf'];
        $naam = $r['bedrijfsnaam'];

        echo $id ." ".  $naam. "<br>";
    }
}
haaltzien($con);




?>

