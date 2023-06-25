<!DOCTYPE html>
<html lang="en">
<?php 
    include '../html&css/head.html';
?>

<body class="wrapper">
    <?php
    
    include '../html&css/header.html';

    ?>
    <form class="form-unos" enctype="multipart/form-data" action="skripta.php" method="POST">
        <div class="form-item">
            <label for="title">Naslov vijesti</label>
            <div class="form-field">
            <input type="text" name="title" id="title" class="form-field-textual">
            <span class="errorMsg" id="titleError" ></span>
            <br>
        </div>
        </div>
        <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
            <div class="form-field">
                <textarea name="about" id="about" cols="30" rows="10" class="formfield-textual"></textarea>
                <span class="errorMsg" id="aboutError"></span>
                <br>
            </div>
        </div>
        <div class="form-item">
            <label for="content">Sadržaj vijesti</label>
            <div class="form-field">
                <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
                <span class="errorMsg" id="contentError"></span>
                <br>
            </div>
        </div>
        <div class="form-item">
            <label for="pphoto">Slika: </label>
            <div class="form-field">
                <input type="file" id="pphoto" accept="image/jpg,image/gif" class="input-text" name="pphoto"/>
                <span class="errorMsg" id="photoError"></span>
                <br>
            </div>
        </div>
        <div class="form-item">
            <label for="category">Kategorija vijesti</label>
            <div class="form-field">
                <select name="category" id="category" class="form-field-textual">
                    <option style="display:none"></option>
                    <option value="U.S">U.S</option>
                    <option value="World">World</option>
                </select>
                <span class="errorMsg" id="categoryError"></span>
                <br>
            </div>
        </div>
        <div class="form-item">
            <label>Spremiti u arhivu:
            <div class="form-field">
                <input type="checkbox" name="archive">
            </div>
            </label>
        </div>
        <div class="form-item">
            <button type="reset" value="Poništi">Poništi</button>
            <button name="submit" id="submit" type="submit" value="Prihvati">Prihvati</button>
        </div>
        </form>
        <script type="text/javascript">
            document.getElementById("submit").onclick=function(event)
            {
                var sendForm=true;
                var titleField=document.getElementById("title");
                var title=document.getElementById("title").value;
                var titleError=document.getElementById("titleError");
                if(title.length<5 || title.length>30)
                {
                    sendForm=false;
                    titleField.style.border="1px solid red";
                    titleError.innerHTML="Naslov mora imati 5 do 30 znakova!";
                }
                var aboutField=document.getElementById("about");
                var about=document.getElementById("about").value;
                var aboutError=document.getElementById("aboutError");
                if(about.length<10 || about.length>100)
                {
                    sendForm=false;
                    aboutField.style.border="1px solid red";
                    aboutError.innerHTML="Kratak sadrzaj mora imati 10 do 100 znakova!";
                }
                var contentField=document.getElementById("content");
                var content=document.getElementById("content").value;
                var contentError=document.getElementById("contentError");
                if(content.length==0)
                {
                    sendForm=false;
                    contentField.style.border="1px solid red";
                    contentError.innerHTML="Tekst mora imati sadrzaj!";
                }
                var fileField=document.getElementById("pphoto");
                var file=document.getElementById("pphoto").value;
                var fileError=document.getElementById("photoError");
                if(file.length==0)
                {
                    sendForm=false;
                    fileField.style.border="1px solid red";
                    fileError.innerHTML="Slika mora biti odabrana!";
                }
                var categoryField=document.getElementById("category");
                var category=document.getElementById("category").value;
                var categoryError=document.getElementById("categoryError");
                if(category.length==0)
                {
                    sendForm=false;
                    categoryField.style.border="1px solid red";
                    categoryError.innerHTML="Kategorija mora biti odabrana!";
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