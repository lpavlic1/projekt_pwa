
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
        <h3 class="news_scope">
            <?php $kategorija=$_GET['category'];
            echo $kategorija;
            ?>
        </h3>
        <div class="container">
            <div class="row">
                <?php
                
                include 'connect.php';
                $query="SELECT * FROM vijest WHERE kategorija='$kategorija' && arhiva=0";
                $result=mysqli_query($dbc,$query);
                while($row=mysqli_fetch_array($result))
                {
                   echo "<div class='col-lg-4 col-md-6'>";
                   echo " <article class='article'>";
                   echo "<img class='article-img-main' src=../img/".$row['slika'].">";
                   echo "<h4><a href='' >" .$row['naslov'] ."</a></h4>";
                   echo "</article>";
                   echo "</div>";
                       
                }
                ?>
        
            </div>
        
       
       
    </section>
    
    <?php
     include '../html&css/footer.html';
    ?>
</body>

</html>