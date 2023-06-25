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
        <span class="errorMsg" id="imeError"></span>    
        <br>
        Prezime: <br>
        <input type="text" name="prezime" id="prezime">
        <span class="errorMsg" id="prezimeError"></span>   
        <br>
        Korisnicko ime: <br>
        <input type="text" name="username" id="username">
        <span class="errorMsg" id="usernameError"></span>   
        <br>
        Lozinka: <br>
        <input type="password" name="password1" id="password1">
        <br>
        Ponovljena lozinka: <br>
        <input type="password" name="password2" id="password2">
        <span class="errorMsg" id="passwordError"></span>   
        <br>
        <span class="errorMsg" id="otherError"></span>
        
        <div style="margin-top: 10px;">
        <button type="reset" value="Poništi">Poništi</button>
        <button name="submit" id="submit" type="submit" value="Prihvati">Prihvati</button>
        </div>
    </form>
    <script type="text/javascript">
        document.getElementById("submit").onclick=function(event){
                sendForm=true;
                var password1=document.getElementById("password1").value;
                var password1Field=document.getElementById("password1");
                var password2=document.getElementById("password2").value;
                var password2Field=document.getElementById("password1");
                var passwordError=document.getElementById("passwordError");
                if(password1!=password2 || password1.length==0 || password2.length==0)
                {
                    sendForm=false;
                    password1Field.style.border="1px solid red";
                    password2Field.style.border="1px solid red";
                    passwordError.innerHTML="Lozinke se ne podudaraju!";
                    
                }
                var ime=document.getElementById("ime").value;
                var imeField=document.getElementById("ime");
                var imeError=document.getElementById("imeError");
                if(ime.length==0)
                {
                    sendForm=false;
                    imeField.style.border="1px solid red";
                    imeError.innerHTML="Ime mora biti uneseno!";
                }

                var prezime=document.getElementById("prezime").value;
                var prezimeField=document.getElementById("prezime");
                var prezimeError=document.getElementById("prezimeError");
                if(prezime.length==0)
                {
                    sendForm=false;
                    prezimeField.style.border="1px solid red";
                    prezimeError.innerHTML="Prezime mora biti uneseno!";
                }
                var korisnickoIme=document.getElementById("username").value;
                var korisnickoImeField=document.getElementById("username");
                var korisnickoImeError=document.getElementById("usernameError");
                if(korisnickoIme.length==0)
                {
                    sendForm=false;
                    korisnickoImeField.style.border="1px solid red";
                    korisnickoImeError.innerHTML="Korisnicko ime mora biti uneseno!";
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