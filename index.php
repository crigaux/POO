<?php
    require_once(__DIR__ .'/Hero.php');
    require_once(__DIR__ .'/Orc.php');

    $hero = new Hero(2000, 0, 'Excalibur', 250, 'Armure de plate', 200);
    $orc = new Orc(500, 0);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/fav.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <div class="infos">
        <?php
            echo '<span class="heroMaxLife">'.$hero->getHealth().'</span>';
            echo '<span class="heroArmor">'.$hero->getShieldValue().'</span>';
            echo '<span class="orcDamage">'.$orc->getDamages().'</span>';
            echo '<span class="orcMaxLife">'.$orc->getHealth().'</span>';
            echo '<span class="heroDamage">'.$hero->getWeaponDamage().'</span>';
        ?>
    </div>

    <h2>
        Niveau 3 - 10000000000000000
    </h2>

    <div class="container">
        <div class="knight">
            <img src="" alt="Asset de chevalier à l'armure d'or">
        </div>
        <div class="evilKnight">
            <img src="" alt="Asset de chevalier orc">
        </div>
    </div>

    <div class="life">
        <div class="lifeContainer">
            <div class="heroLife"></div>
        </div>
        <div class="lifeContainer">
            <div class="orcLife"></div>
        </div>
    </div>

    <form action="" method="POST">
        <button class="button" type="submit">RELANCER</button>
    </form>
    
    <div class="resultContainer">
        <?php
            while($hero->getHealth() > 0 && $orc->getHealth() > 0) {
                if($hero->getRage() >= 100) {
                    $hero->setRage(0);
                    $orc->setHealth($orc->getHealth() - $hero->getWeaponDamage());
                    if($orc->getHealth() > 0) {
                        echo '<span class="orcHealth">'.$orc->getHealth().'</span>';
                        echo '<span class="heroAttack">'.$hero->getWeaponDamage().'</span>';
                    } else if($orc->getHealth() <= 0){
                        echo '<span class="orcDeath"></span>';
                    }
                }
                if($hero->getHealth() > 0 && $orc->getHealth() > 0) {
                    echo $hero->attacked($orc->getDamages());
                }
            }
            ?>
    </div>
    
    <script src="./assets/js/script.js"></script>
</body>
</html>