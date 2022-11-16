<?php
    require ('./assets/includes/database.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="contact.css">
        <title>The Power Of Memory - Contact</title>
    </head>
    <body class="body">
        <header>
            <?php
            include 'assets/view/header.inc.php'
            ?>
        </header>
        <section class="divhead">
                <h1>NOUS CONTACTER</h1>
        </section>
        <section class="section_1">
            <div class="icons_individuel">
                <i class="fa-solid fa-mobile-screen-button fa-2x"></i>
                <p>06 05 04 03 02</p>
            </div>
            <div class="icons_individuel">
                <i class="fa-regular fa-envelope fa-2x"></i>
                <p>support@powerofmemory.com</p>
            </div>
            <div class="icons_individuel">
                <i class="fa-solid fa-location-dot fa-2x"></i>
                <p>Paris</p>
            </div>
        </section>

        <section class="section_2">
            <div class="contact">
                <form name="post_contact" method="POST">
                  <div class="demarcation">
                    <div>
                        <input type="text" name="username" placeholder="Nom" autocomplete="off" required>
                    </div>
                    <div class="email_ecart">
                        <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                    </div>
                    </div>
                    <div>
                        <input type="text" name="sujet" placeholder="Sujet" required>
                    </div>
                    <div>
                        <textarea rows="2" name="message" placeholder="Message" required></textarea>
                    </div>
                    <div>
                        <button type="submit" name="valider">Envoyer</button>
                        <?php if(!empty($message)) { echo $message; } ?>
                    </div>
                </form>
                <?php
                    if(!empty($_POST["valider"])) {
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $sujet = $_POST["sujet"];
                        $message = $_POST["message"];
                        $toEmail = "support@powerofmemory.com";

                        $mailHeaders = "Demande de contact bien reçu !" . 
                        "\r\n Vous : " . $email . 
                        "\r\n Sujet : " . $sujet . 
                        "\r\n Message : " . $message . "\r\n";

                        if(mail($toEmail, $username, $mailHeaders)) {
                            $message = "Votre formulaire a bien été envoillez";
                        }
                    }
                ?>
            </div>
        </section>

        <a class="gotopbtn" href="#"><i class="fa-solid fa-angle-up"></i></a>

        <footer>
            <?php
            include 'assets/view/footer.inc.php'
            ?>
        </footer>
    </body>
</html>