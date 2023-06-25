<?php
        if(isset($_POST['submit']))
        {
            include 'connect.php';
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $korisnicko_ime=$_POST['username'];
            $lozinka=$_POST['password1'];
            $lozinka_hashed=password_hash($lozinka,CRYPT_BLOWFISH);
            $razina=0;
            $query="INSERT INTO korisnik(ime,prezime,korisnicko_ime,lozinka,razina) VALUES (?,?,?,?,?)";
            $stmt=mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt,$query))
            {
                mysqli_stmt_bind_param($stmt,'ssssi',$ime,$prezime,$korisnicko_ime,$lozinka_hashed,$razina);
                mysqli_stmt_execute($stmt);
            }
            
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
    <form class="form-login-reg"action="" method="POST">
        Ime: <br>
        <input type="text" name="ime" id="ime">    
        <br>
        Prezime: <br>
        <input type="text" name="prezime" id="prezime">
        <br>
        Korisnicko ime: <br>
        <input type="text" name="username" id="username">
        <br>
        Lozinka: <br>
        <input type="password" name="password1" id="password1">
        <br>
        Ponovljena lozinka: <br>
        <input type="password" name="password2" id="password2">
        <br>
        <span class="errorMsg" id="otherError"></span>
        <span class="errorMsg" id="passwordError"></span>
        <div style="margin-top: 10px;">
        <button type="reset" value="Poništi">Poništi</button>
        <button name="submit" id="submit" type="submit" value="Prihvati">Prihvati</button>
        </div>
    </form>
    <script type="text/javascript">
        document.getElementById("submit").onclick=function(event){
                sendForm=true;
                var password1=document.getElementById("password1").value;
                var password2=document.getElementById("password2").value;
                var passwordError=document.getElementById("passwordError");
                if(password1!=password2 || password1.length==0 || password2.length==0)
                {
                    sendForm=false;
                    passwordError.innerHTML="Lozinke se ne podudaraju!";
                    
                }
                var ime=document.getElementById("ime").value;
                var prezime=document.getElementById("prezime").value;
                var korisnicko_ime=document.getElementById("username").value;
                var otherError=document.getElementById("otherError");
                if(ime.length==0 || prezime.length==0 || korisnicko_ime.length==0)
                {
                    sendForm=false;
                    otherError.innerHTML="Ime ili prezime ili korisnicko ime ne smiju biti prazni!";
                }
                if(sendForm!=true)
                {
                    event.preventDefault();
                }

            }
        
    </script>
    
        

    <?php
     include '../html&css/footer.html';
    ?>
</body>

</html>