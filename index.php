<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace-membre', 'root', '');

if(isset($_POST['forminscription']))
{
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND!empty($_POST['mdp']) AND!empty($_POST['mdp2']))
    {
        $pseudolength = strlen($peudo);
        if($pseudolength <= 255)
        {
            If($mail == $mail2)
            {
                if($mdp == $mdp2)
                {
                    $insertmbr =  $bdd->prepare("INSERT INTO membre(pseudo, mail, motdepasse) VALUES(?,?,?)");
                    $insertmbr ->execute(array($pseudo,$mail,$mdp));
                    $erreur = "Votre compte a ete cree";
                }
                else
                {
                    $erreur = "Vos deux mot de passe ne correspondent pas";
                }
            }
            else
            {
                $erreur="Vos deux adresses mail ne correspondent pas";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas depasse 255 carateres";
        }
    }
    else
    {
        $erreur = "Tout les champs doivent etre complete";
    }
}

?>




<html>
    <head>
        <title>formulaire</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div align="center">
            <h2>Inscription</h2><br/><br/><br/>
            <form method="POST" action="">
                <table>
                    <tr>    
                        <td align=right>
                            <label for="pseudo">Pseudo:</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;}?>"/>
                        </td>
                    </tr>

                    <tr>    
                        <td align=right>
                            <label for="mail">mail:</label>
                        </td>
                        <td>
                            <input type="mail" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>"/>
                        </td>
                    </tr>

                    <tr>    
                        <td align=right>
                            <label for="mail2">Confirmation du mail:</label>
                        </td>
                        <td>
                            <input type="mail" placeholder="Confirmation du mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) {echo $mail2;}?>"/>
                        </td>
                    </tr>

                    <tr>    
                        <td align=right>
                            <label for="mdp">Votre mot de passe</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
                        </td>
                    </tr>

                    <tr>    
                        <td align=right>
                            <label for="mdp2">Confimation de votre mot de passe</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Confimation de votre mot de passe" id="mdp2" name="mdp2"/>
                        </td>
                    </tr>

                    <tr align="center">
                        <td></td>
                        <td>
                            <br/>
                            <input type="submit" name="forminscription" value="je m'inscris" />
                        </td>
                    </tr>
                </table>       
            </form>
            <?php
                if(isset($erreur)){
                    echo '<font color="red">'. $erreur.'</font>';
                }
            ?>
        </div>
    </body>
</html>