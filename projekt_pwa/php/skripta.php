<?php
    
    include 'connect.php';

    if(isset($_POST['submit']) && 
        !empty($_POST['title']) &&
        !empty($_POST['about']) &&
        !empty($_POST['content']) &&
        !empty($_FILES["pphoto"]["name"]) &&
        !empty($_POST['category']
        ))
    {

        $title=$_POST['title'];
        $about=$_POST['about'];
        $content=$_POST['content'];
        $picture=$_FILES['pphoto']['name'];
        $category=$_POST['category'];
        $date=date('d.m.Y');
        if(isset($_POST['archive']))
        {
            $archive=1;
        }
        else
        {
            $archive=0;
        }
           $target_dir = '../img/'.$picture;
           move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
           $query = "INSERT INTO Vijest (datum, naslov, sazetak, tekst, slika, kategorija,
           arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture',
           '$category', '$archive')";
           $result = mysqli_query($dbc, $query) or die('Error querying databese.');
           mysqli_close($dbc);
    }
        
?>

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
        <h3 class="news_scope"><?php echo $category; ?></h3>
        <h2><?php echo $title; ?></h2>
        <article class="news_full_page">
            <?php echo "<img src='../img/$picture' width=100%></img>"; ?>
            <div class="US_WORLD">
                <?php echo $category; ?>
            </div>
            <p>
                <?php 
                echo $about;
                ?>
                
            </p>
            <p>
                <?php
                echo $content;
                ?>
            </p>

        </article>
            
    </section>
    
    <?php
     include '../html&css/footer.html';
    ?>
</body>

</html>
             