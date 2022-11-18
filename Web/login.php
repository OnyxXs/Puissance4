<?php
    require ('./assets/includes/database.inc.php');

    if (isset($_POST['email']) AND isset($_POST['password']))
            {
                if (!empty($_POST['email']) AND !empty($_POST['password']))
                {
                    $mail = $_POST['email'];
                    $req = $dbh->prepare('SELECT id, password FROM user WHERE email = :email');
                    $req-> execute(array('email' => $mail));
 
                    $resultat = $req->fetch();
 
                     
                    if (!$resultat OR !password_verify($_POST['password'], $resultat['password']))
                    {
                        echo 'Email ou mot de passe invalide.<br/>';
                    }
                    else
                    {
                        echo 'Vous êtes connecté ! :-)<br/>';
                    }
                    $req->closeCursor();
                }
                else
                {
                    echo 'Renseignez un mail et un Mot De Passe.<br/>';
                }
            }     
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="login.css">
        <title>The Power Of Memory - Login</title>
    </head>
    <body>
        <header>
            <?php
                include 'assets/view/header.inc.php'
            ?>
        </header>
        <section class="connex">
            <h2>CONNEXION</h2>
        </section>
        <section class="login">
            <form method="post">
                <div>
                    <input type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Email" required>
                </div>
                <div>
                    <input type="password" 
                        name="password" 
                        id="pass" 
                        placeholder="Mot de passe"
                        autocomplete="current-password"
                        minlength="8"
                        maxlength="16"
                        required>
                </div>
                <div class="align">
                    <input class='button_dl' type="submit" name="connection" value="connexion" class="inpbutton"> <a href="register.php" class="reglink">Inscription</a>
                </div>
            </form>
        </section>

        <a class="gotopbtn" href="#"><i class="fa-solid fa-angle-up"></i></a>
        
        <footer>
            <?php
                include 'assets/view/footer.inc.php'
            ?>
        </footer>
    </body>
</html>
