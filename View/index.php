<?php
include '../Controller/config.php';
if (!$_SESSION['loggedIn']) {
    redirect("login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/Css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>BANANA IQ </title>
</head>

<body>

    <nav class="navbar">
        <h1 class="logo">BANANA IQ </h1>
        <div class="links">
            <?php if ($_SESSION['loggedIn']) { ?>
                <a href="#">Hi, <?= $_SESSION['user_username']; ?></a>
            <?php } ?>
            <a href="./score.php"><i class="bi bi-trophy-fill"></i></a>
            <a href="../Controller/logout.php"><i class="bi bi-power custom-icon"></i></a>
        </div>
    </nav>
    <div class="container">
        <div class="content">
            <h1 class="mainTitle">Let's PLAY!!</h1>
            <img id="image" src="../Assets/Images/main_img.png" alt="">
            <?php if ($_SESSION['loggedIn']) { ?>
                <a href="#"><button class="startBtn">Begin Playing</button></a>
            <?php } ?>
            <a href="#"><button class="howtoplayBtn" id="howtoplayBtn">How To Play</button></a>
        </div>
    </div>

    <div class="levelOut">
        <div class="level">
            <div class="close">X</div>
            <p>Choose Difficulty</p>
            <button id='easy'>EASY</button>
            <button id='medium'>MEDIUM</button>
            <button id='hard'>HARD</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.startBtn').click(function() {
                $('.levelOut').css('display', 'flex')
                console.log('levels')
            })
            $('.close').click(function() {
                $('.levelOut').css('display', 'none')
            })
            $('#easy').click(function() {
                localStorage.setItem('livesLeft', '6');
                localStorage.setItem('timeLeft', '90');
                window.location.href = "./ingame.php";
            })
            $('#medium').click(function() {
                localStorage.setItem('livesLeft', '4');
                localStorage.setItem('timeLeft', '60');
                window.location.href = "./ingame.php";
            })
            $('#hard').click(function() {
                localStorage.setItem('livesLeft', '3');
                localStorage.setItem('timeLeft', '30');
                window.location.href = "./ingame.php";
            })
            $('#howtoplayBtn').click(function () {
    window.open('../Assets/Docs/how_to_play.txt', '_blank');
});
        })
    </script>

    <!--Setting Background Music-->
    <audio autoplay loop id="backgroundMusic">
        <source src="../Assets/Audio/menu_music.mp3.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
<audio autoplay loop id="menuMusic">
    <source src="../Assets/Audio/menu_music.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!--created mute button-->
<button id="toggleMusic" class="musicBtn"><i class="bi bi-volume-mute"></i></button>

<script>
    $(document).ready(function () {
        $('#toggleMusic').click(function () {
            var audio = document.getElementById("menuMusic");
            if (audio.paused) {
                audio.play();
                $(this).html("<i class='bi bi-volume-mute'></i>");
            } else {
                audio.pause();
                $(this).html("<i class='bi bi-music-note'></i>");
            }
        });
    });
</script>

<!--setting volume to 10%-->
    <script>
        var audio = document.getElementById("menuMusic");
        audio.volume = 0.1; 
    </script>


</body>

</html>