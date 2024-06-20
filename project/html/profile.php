<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Пивоварова О.Н.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">Инфа обо мне</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">         
        <div class="row"> 

            <div class="col-8"> 
                <h2>Всем хеллоу, меня зовут Пивоварова Олеся Николаевна, родом я из Республики Саха (Якутия), 
                    учусь в ДВФУ на хакера, воооот, что еще рассказать? Люблю "импроком", посмотрела "Гарри Поттера" 
                    только в прошлом году, еще учусь в автошколе, почти все откатала, очень люблю ездить кстати, вооот, 
                    надеюсь сдам все с первого раза!</h2>
            </div>

            <div class="col-4"> 
                <div class="row my_photo"></div>
                <div class="row"><p>энто я</p></div>
            </div>
        </div>
    </div>

    <div class="container"> 
        <div class="row"> 
            <div class="button_js col-12"> 
                <button id="myButton">Кликни</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>

    <div class="container"> 
        <div class="row"> 
            <div class="col-12"> 
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="row">
                <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form form_width" type="text" name="title" placeholder="Заголовок поста">
                    <textarea name="text" class="form_width" cols="30" rows="10" placeholder="Введите текст поста"></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" id="myButton" class="btn_red" name="submit" value="upload">сэйв зе пост</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/button.js"></script>
</body>
</html>

<?php

require_once('db.php');

$link = mysqli_connect('db', 'root', '123', 'first');

if (isset($_POST['submit'])) {
    
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die("Пожалуйста заполните все поля!");
    
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}

?>