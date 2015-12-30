<?php
require_once('class/RandData.php');
require_once('class/GetData.php');
require_once('controller/randDataController.php');
require_once('controller/getDataController.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8"/>
    <title>Générer des données aléatoires</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<div id="wrapper">

    <h1>Statistiques aléatoires</h1>

    <form id="myform" action ="" method="post">

    <p>
    <input type="submit" name="goData" value="Générer les données"/>
    </p>

    </form>

    <div class="msg_error">
       <?php if(isset ($msg_error)){
           echo $msg_error;
       }?>
    </div>

    <?php if(isset ($tableSchool) && isset ($tableSport) && !isset($msg_error)) { ?>

    <table>
        <caption>Comparatif des écoles</caption>
    <thead>
    <tr>
        <th>Nom de l'école</th>
        <th>Nombre d'élèves</th>
        <th>Nombre d'élèves pratiquant au moins un sport</th>
        <th>Nombre de sports pratiqués</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tableSchool as $table) {?>

        <tr><?php

        foreach ($table as $key => $data) {
            ?>
            <td><?php echo $data; ?> </td><?php
        } ?>

        </tr><?php
    } ?>
    </tbody>
    </table>

    <ul>
        <?php foreach($tableSport as $key => $array){?>

        <li><?php echo $key;

            // tri dans l'ordre croissant
            array_multisort($tableSport[$key], SORT_NUMERIC);

            foreach ($tableSport[$key] as $id => $value){?>
            <ul>
                <?php

            ?><li><?php echo $id.' : '.$value.' élèves'; ?></li>
                </ul>
            <?php } ?>

        </li>
        <?php }?>
    </ul>

    <?php
}
?>
    <div class="clear"></div>

</div>
</body>

</html>