<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="recipedetail.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="title">
       <a href="homepage.php"><img src="images/elgato.png" alt="muffi" class="muffin"></a>
        <h1 class="head">foodiefolio</h1>
    </div>
    <?php
    $data=$_GET['recipeid'];

    $bdc="SELECT * FROM recipe where recipeid=$data";
    $sql="SELECT * FROM instructions where recipeid=$data";
    $abc="SELECT * from ingredients where recipeid=$data";
    $result=mysqli_query($con,$sql);
    $ahu=mysqli_query($con,$abc);
    $haha=mysqli_query($con,$bdc);
    if($haha){
        if($haha->num_rows>0){
            while($t=$haha->fetch_assoc()){
        echo '<div class="heading">
        <h2 class="tname">'.$t['title'].'</h2>
        </div>';
    }
    }
    }
    if($ahu){
        if($ahu->num_rows>0){
            echo '<h3 class="ing">Ingredients required</h3>';
            while($r=$ahu->fetch_assoc()){
                echo "<ul>";
                echo '<div class="ingdetail"><li>'. $r['ingname'].' - '.$r['quantity'].'</li></div>';
                echo "</ul>";
    
            }
        }
    }

    if($result){
        if($result->num_rows>0){
            echo '<h3 class="ing">Cooking Instructions</h3>';
        while($row=$result->fetch_assoc()){
           
            echo '<div class="ingdetail"><p>'.$row['stepnum'].' . '.$row['insttxt'].'</p></div>';

        }

    }
    }
    else{
        echo "No result found";
    }
    ?>
</body>
</html>