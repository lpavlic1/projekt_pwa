<!DOCTYPE html>
<html lang="en">
<?php 
    include '../html&css/head.html';
?>

<body class="wrapper">
    <?php
    
    include '../html&css/header.html';

    ?>
    <section>
        <?php
            include 'connect.php';
            $id=$_GET['id'];
            $query="SELECT * FROM vijest WHERE id='$id' && arhiva=0";
            $result=mysqli_query($dbc,$query);
            while($row=mysqli_fetch_array($result))
            {
               echo "<h3 class='news_scope'>".$row['kategorija']."</h3>";
               echo "<h2>".$row['naslov']."</h2>";
               echo "<p class='date'>" .$row['datum']."</p>";
               echo "<article class='news_full_page'>";
               echo "<img class='article-img' src=../img/".$row['slika'].">";
               echo "<div class='US_WORLD'>".$row['kategorija']."</div>";
               echo "<p>".$row['tekst']."</p>";
               echo "</article>";
               
                   
            }
           
        ?>
       
            
    </section>
    
    <?php
     include '../html&css/footer.html';
    ?>
</body>

</html>