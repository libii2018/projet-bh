<!DOCTYPE html>
<?php
        $serveur = "localhost";
        $login = "root";
        $pass = "";

       
        $connexion = new PDO('mysql:host=$serveur;bdname=client_bh',$login, $pass);
        
              if(!empty($_POST['pseudo']) AND !empty($_POST['mot_de_pass']) AND !empty($_POST['mot_de_pass2']) )
            {
                echo "ok";
            }
            else
            {
                echo "non"
            }
    ?>
<html>
<head>
    <meta charset="utf-8" />
    <title>TUTO PHP</title>
</head>
    <body>
     
        <div align="center">
            <h2>Inscription</h2>
            <br/><br/>
            <form  action="" method="post">
                <table>
                    <tr>
                        <td align="right">
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mot_de_pass">Mot de passe :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Mot de passe" id="mot_de_pass" name="mot_de_pass" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mot_de_pass2">confirmation votre mot de passe :</label>
                        </td>
                        <td> 
                            <input type="text" placeholder="Mot de passe" id="mot_de_pass2" name="mot_de_pass2" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br/>
                            <input type="submit" value="Je m'inscrit" name="forminscription"/>
                        </td>
                    </tr>
                </table>
                
            </form>
    </body>
</html>