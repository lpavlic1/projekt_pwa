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
        session_start();
        include 'connect.php';
        

        echo 
        '
        <form class="form-login-reg" action="" method="post">
        <label for="korisnicko_ime">Korisnicko ime:</label>
        <br>
        <input type="text" name="korisnicko_ime" id="korisnicko_ime">
        <br>
        <label for="password">Lozinka:</label>
        <br>
        <input  type="password" name="lozinka" id="lozinka">
        <br>
        <input style="margin-top:10px;" name="submit "type="submit" value="login">
        </form>
        ';
        if(isset($_POST['korisnicko_ime']) && $_POST['lozinka'])
        {
            $uspjesnaPrijava=false;
            $usernameLogin=$_POST['korisnicko_ime'];
            $passwordLogin=$_POST['lozinka'];
            $query_login="SELECT korisnicko_ime,lozinka,razina FROM korisnik WHERE korisnicko_ime=?";
            $stmt=mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt,$query_login))
            {
                mysqli_stmt_bind_param($stmt,'s',$passwordLogin);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
            mysqli_stmt_bind_result($stmt,$username,$password,$razina);
            mysqli_stmt_fetch($stmt);
            if(mysqli_stmt_num_rows($stmt)>0 && password_verify($passwordLogin,$password))
            {
                $uspjesnaPrijava=true;
                if($razina==1)
                {
                    $admin=true;
                }
                else
                {
                    $admin=false;
                }
                $_SESSION['username']=$username;
                $_SESSION['razina']=$razina;
            }
            else
            {
                $uspjesnaPrijava=false;
                $_SESSION['username']="";
                $_SESSION['razina']="";
            }
            ?>

            <?php
            if($uspjesnaPrijava==true && $admin==true || (isset($_SESSION['username'])) && $_SESSION['razina'] == 1) 
            {
                echo "Korisnik postoji u bazi!";
                $query = "SELECT * FROM vijest";
                $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)) {

                        echo '<form style="margin-bottom:100px"enctype="multipart/form-data" action="" method="POST">
                        <div class="form-item">
                        <label for="title">Naslov vjesti:</label>
                        <div class="form-field">
                        <input type="text" name="title" class="form-field-textual"
                        value="'.$row['naslov'].'">
                        </div>
                        </div>
                        <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (do 50
                        znakova):</label>
                        <div class="form-field">
                        <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
                        </div>
                        </div>
                        <div class="form-item">
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                        <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
                        </div>
                        </div>
                        <div class="form-item">
                        <label for="pphoto">Slika:</label>
                        <div class="form-field">
                        
                        <input type="file" class="input-text" id="pphoto"
                        value="'.$row['slika'].'" name="pphoto"/> <br><img src="../img/'.
                        $row['slika'] . '" width=100px>
                        // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
                        </div>
                        </div>
                        <div class="form-item">
                        <label for="category">Kategorija vijesti:</label>
                        <div class="form-field">
                        <select name="category" id="" class="form-field-textual"
                        value="'.$row['kategorija'].'">
                        <option value="U.S">U.S</option>
                        <option value="World">World</option>
                        </select>
                        </div>
                        </div>
                        <div class="form-item">
                        <label>Spremiti u arhivu:
                        <div class="form-field">';
                        if($row['arhiva'] == 0) {
                        echo '<input type="checkbox" name="archive" id="archive"/>
                        Arhiviraj?';
                        } else {
                        echo '<input type="checkbox" name="archive" id="archive"
                        checked/> Arhiviraj?';
                        }
                        echo '</div>
                        </label>
                        </div>
                        </div>
                        <div class="form-item">
                        <input type="hidden" name="id" class="form-field-textual"
                        value="'.$row['id'].'">
                        <input type="hidden" name="curphoto" class="form-field-textual"
                        value="'.$row['slika'].'">
                        <button type="reset" value="Poništi">Poništi</button>
                        <button type="submit" name="update" value="Prihvati">
                        Izmjeni</button>
                        <button type="submit" name="delete" value="Izbriši">
                        Izbriši</button>
                        </div>
                        </form>';
                        }
                       
                        
                
               
            }
            else if($uspjesnaPrijava==true && $admin==false)
            {
                echo $_SESSION['username']. " prijavljeni ste ali nemate pravo pristupa ovoj stranici!";
            }
            else if($uspjesnaPrijava==false)
            {
                echo "Korisnik ne postoji u bazi!<br>";
                echo "<a href='registracija.php'>Registracija</a>";
                
            }
            
            
        }
        ?>
        <?php
         if(isset($_POST['delete'])){
            $id=$_POST['id'];
            $query = "DELETE FROM vijesti WHERE id=$id ";
            $result = mysqli_query($dbc, $query);
           }
        if(isset($_POST['update'])){
            if($_FILES['pphoto']['name']=="")
            {
                $picture=$_POST['curphoto'];
            }
            else
            {
                $picture = $_FILES['pphoto']['name'];
            }
            $title=$_POST['title'];
            $about=$_POST['about'];
            $content=$_POST['content'];
            $category=$_POST['category'];
            if(isset($_POST['archive'])){
             $archive=1;
            }else{
             $archive=0;
            }
            $target_dir = '../img/'.$picture;
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
            $id=$_POST['id'];
            $query = "UPDATE vijest SET naslov='$title', sazetak='$about', tekst='$content',
            slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
            $result = mysqli_query($dbc, $query);
        }
        ?>
                 




      


        
       
            
    </section>
    
    <?php
     include '../html&css/footer.html';
    ?>
</body>

</html>