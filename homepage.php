<?php
session_start();
include("connection.php");
if(!isset($_SESSION["username"])){
    echo "milena";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodiefolio
    </title>
    <link rel="stylesheet" href="foodi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<h1></h1>
<body>
    <div class="options">
        <a href="recipe.html">Recipes</a>
        <a href="shoppinglist.html">Shopping list <img src="images/cart.png" alt="cart" id="cart"></a>
        <a href="mealplan.html">Meal Plans</a>
    </div>
   <div class="searchclass">
        <form method="post" >
        <input type="text" name="search" placeholder="Search Recipes" class="searchbutt">
        <button type="submit" name="searchdata" class="butt">
            <img src="images/searchbutton.png" alt="searchicon" class="seicon">
        </button>
    </form>
    <div class="container">
        <table class="table">
        <?php
        if (isset($_POST['searchdata'])){
            $searchdata=$_POST['searchdata'];
            $sql="select * from recipe where title like '%$searchdata%'";
            $result=mysqli_query($con,$sql);
            if($result)
           {
            if(mysqli_num_rows($result)>0){
              echo '<thead>
                <tr>
                <th>recipeid</th>
                <th>title</th>
                </tr> 
                </thead>';
                while($row=mysqli_fetch_assoc($result)){
                    echo '<tbody>
                        <tr>
                        <td><a href="recipedetail.php?recipeid='.$row['recipeid'].'">'.$row['recipeid'].'</a></td>
                        <td>'.$row['title'].'</td>
                        </tr>
                        </tbody>';
                }
            }
            }
            else{
                echo '<h2>Data not found</h2>';
            }
        }   
        ?>
        </table>
    </div>
    </div>

    <div class="wrapper">
        <input id="toggler" type="checkbox">
        <label for="toggler">
          <img src="images/uicon.png" alt="uicon" id="icon">
        </label>
        <div class="dropdown">
            <?php echo $_SESSION['username']; ?>
          <a style="text-decoration: none;" href="logout.php">Log out</a>
        </div>
        
    </div>
    <div>
        <img src="images/elgato.png" alt="muffi" class="muffin">
    </div>
    <div class="title">
        foodiefolio
    </div>
    <section class="recipe">
        <div class="a">
            <div class="a1">
                <img src="images/margepizza.jpg" alt="pizza" id="piz">
            </div>
            <div class="a2">
                <p>Pizza Margheritta </p>
                <a href="recipedetail.php">Recipe details</a><br>
                <button type="submit" name="Login" class="buttonstyle">save this recipe
                </button>
            </div>
        </div>
    </section>
    <section class="recipe">
        <div class="a">
            <div class="a1">
                <img src="images/mudcake.jpg" alt="cake" id="piz">
            </div>
            <div class="a2">
                <p>Chocolate Mud cake</p>
                <a href="recipedetail.php">Recipe details</a><br>
                <button type="submit" name="Login" class="buttonstyle">save this recipe
                </button>
            </div>
        </div>
    </section>
    <section class="recipe">
        <div class="a">
            <div class="a1">
                <img src="images/rice.jpg" alt="rice" id="piz" class="riceimg">
            </div>
            <div class="a2">
                <p>Bhaat</p>
                <a href="recipedetail.php">Recipe details</a><br>
                <button type="submit" name="Login" class="buttonstyle">save this recipe
                </button>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 foodiefolio</p>
    </footer>
</body>
</html>
