<?php
session_start();

$names = array('Izzy', 'B', 'C');
$movies = array('TT', 'YY', 'UU');
$user=$_POST['username'];
$_SESSION['names'] = $names;
$_SESSION['movies'] = $movies;

// print_r($_SESSION['names']);
// print_r($_SESSION['movies']);
?>
<html>
    <head>
        <title>PHP Test</title>
    </head>
<body>
<br>
    <?php
    //Autenthication
    print_r($_SESSION['names']);
    if(isset($_POST['username'])){
        if($_POST['username'] == ' '){
            $_SESSION['auth'] = true;
            array_push($names, $user);
        }else{
            $_SESSION['auth'] = false;
        }
    }
    ?>
    
<br>
<br>
<form action="?action='authenticate'" method="post">
    <label>Username: </label><br>
    <input type="text" name="username"><br><br>
    <input type="submit" value="submit">
</form>

</body>
</html>