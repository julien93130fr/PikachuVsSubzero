<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat de titans</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    // Définition du premier combattant
    $combattant1 = 
    [
        'nom'           => 'Pikachu',// Le nom du combattant est "Pikachu"
        'vie'           =>  rand(0, 100),// La vie du combattant est définie aléatoirement entre 0 et 100
        'attaque'       => rand(0, 10),// La force d'attaque du combattant est définie aléatoirement entre 0 et 10
        'img'           => './pika.gif',// Le chemin vers l'image représentant le combattant est "./pikachu.jpg"
        'agilité'       => rand(0, 10)// L'agilité du combattant est définie aléatoirement entre 0 et 10
    ];

    // Définition du deuxième combattant
    $combattant2 = 
    [
        'nom'           => 'Subzero',// Le nom du combattant est "  Subzero"
        'vie'           =>  rand(40, 80),// La vie du combattant est définie aléatoirement entre 40 et 80
        'attaque'       => rand(3, 7),// La force d'attaque du combattant est définie aléatoirement entre 3 et 7
        'img'           => './sub.gif',// Le chemin vers l'image représentant le combattant est "./sub.jpg"
        'agilité'       => rand(0, 10)// L'agilité du combattant est définie aléatoirement entre 0 et 10
    ];
    ?> 

    <div id="price">
        <div class="plan pikachu">
            <div class="plan-inner">
                <div class="entry-title">
                    <!-- Affiche le nom du combattant 1 -->
                    <h3><?php echo $combattant1['nom']; ?></h3>
                </div>
                <div class="entry-content">
                    <ul>
                        <!-- Affiche la vie du combattant 1 -->
                        <li><strong>Vie :</strong><?php echo $combattant1['vie']; ?></li>
                        <!-- Affiche l'attaque du combattant 1 -->
                        <li><strong>Attaque :</strong><?php echo $combattant1['attaque']; ?></li>
                        <!-- Affiche l'agilité du combattant 1 -->
                        <li><strong>Agilité :</strong><?php echo $combattant1['agilité']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="plan">
            <img src="./kapow-gfd19b68cd_1280.png" alt="vs" style="width: 200px">
        </div>
        <div class="plan subzero">
            <div class="plan-inner">
                <div class="entry-title">
                    <!-- Affiche le nom du combattant 2 -->
                    <h3><?php echo $combattant2['nom'];?></h3>
                </div>
                <div class="entry-content">
                    <ul>
                        <!-- Affiche la vie du combattant 2 -->
                        <li><strong>Vie :</strong><?php echo $combattant2['vie']; ?></li>
                        <!-- Affiche l'attaque du combattant 2 -->
                        <li><strong>Attaque :</strong><?php echo $combattant2['attaque']; ?></li>
                        <!-- Affiche l'agilité du combattant 2 -->
                        <li><strong>Agilité :</strong><?php echo $combattant2['agilité']; ?></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <?php
    function combat($combattant1, $combattant2)
    {
        echo '<div style="text-align: center;">
                <style>
                    @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
                 </style>';
        // Vérification de l'agilité des combattants pour déterminer qui attaque en premier
        if ($combattant1['agilité'] > $combattant2['agilité']) {
            $changement = 0; // Le combattant 1 attaquera en premier
            echo $combattant1['nom'] . ' Il est plus agile , donc il attaquera en premier !';   
        }
        if ($combattant1['agilité'] < $combattant2['agilité']) {
            $changement = 1;//Le combattant 2 attaquera en premier
            echo $combattant2['nom'] . ' Il est plus agile , donc il attaquera en premier !';   
        }
        if ($combattant1['agilité'] == $combattant2['agilité']) {
            $changement = 0;// Match nul en agilité, le combattant 1 attaquera en premier par défaut
            echo " C'est un match nul en agilité ! commencer " . $combattant1['nom'];   
        }
        echo '<h3>début de combat!</h3>';// Affichage du message de début de combat

        // Boucle de combat jusqu'à ce que l'un des combattants n'ait plus de vie
        while($combattant1['vie'] > 0 && $combattant2['vie'] > 0)
        {
            if ($changement == 0) {
                 // Le combattant 1 attaque le combattant 2
                $combattant2['vie'] = $combattant2['vie'] - $combattant1['attaque'];

                if($combattant2['vie'] <= 0)
                {
                    echo "C'est incroyable!<strong>" . $combattant1['nom'] . " Est le gagnant!</strong> <br/>";
                    echo '<img src="' . $combattant1['img'] . '" style="width: 800px">';
                    break;
                }
                echo $combattant1['nom'] . ' fait ' . $combattant1['attaque'] . ' de dégats, maintenant '
                    . $combattant2['nom'] . ' a ' . $combattant1['vie'] . ' de vie! <br/> ';
                $changement = 1;// Changer de combattant pour la prochaine attaque
            }elseif ($changement == 1) {
                // Le combattant 2 attaque le combattant 1
                $combattant1['vie'] = $combattant1['vie'] - $combattant2['attaque'];
                if($combattant1['vie'] <= 0)
                {
                    echo " C'est incroyable! <strong>" . $combattant2['nom'] . ' Est le gagnant!<strong> <br/>';
                    echo '<img src="' . $combattant2['img'] . '" style="width: 600px">';
                    break;
                }
                echo $combattant2['nom'] . ' fait ' . $combattant2['attaque'] . ' de dégats, maintenant '
                    . $combattant1['nom'] . ' a ' . $combattant1['vie'] . ' de vie! <br/> ';
                $changement = 0;
            }
        }
        echo '</div>';
    }
    ?>

    <div class="div">
        <?php
        combat($combattant1, $combattant2)
        ?>
    </div>
    <footer class="footer">
    <p>Refait par Julien à la passerelle juillet 2023 &trade;</p>
    <div class="pirate-icon">
        <img src="./pirate.png" alt="Icône de bateau pirate">
    </div>
</footer>

</body>
</html>