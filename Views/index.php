<?php

include($_SERVER["DOCUMENT_ROOT"] . "/public/_blocks/doctypeup.php");

// include($_SERVER["DOCUMENT_ROOT"] . "/host.php");


?>
<h1>A propos</h1>
<p> 
<?php
    // $selectTextAccueil = $db->prepare('SELECT text_content FROM textes  WHERE id_text = 14');
    // $selectTextAccueil->execute();
    // $textAccueil = $selectTextAccueil->fetch(PDO::FETCH_ASSOC);
    // echo $textAccueil['text_content'];
echo $texte->text_content;
    ?>
    
<!-- 
- Educatrice Spécialisée depuis 2012 en addictologie <br>
    - Coordinatrice de parcours en 2020 avec un public maladie chronique et addiction <br>
    - Intérêt pour l’humain <br>
    - Intérêt pour ce qui induit le changement, le mieux être. <br>
    Ma mission est de transmettre la posture professionnelle la plus adaptée pour
    permettre l’accès au changement des personnes que vous accompagnait, et
    l’apprentissage à toutes les personnes engagées dans la relation d’aide. <br>
    Je souhaite vous faire bénéficier de formations de qualité et adaptées aux besoins
    spécifiques des intervenants du secteur médico psycho social. <br>
    Passionnée de l’humain et de l’accès au changement, je me déplace dans toute la
    France Métropole et Outre mer pour accompagner les professionnels dans leur
    développement professionnel. <br>
    ///////////////////////////////////////////////////// 
    <br> -->
    <?php
    // $selectTextAccueil = $db->prepare('SELECT text_content FROM textes  WHERE id_text = 14');
    // $selectTextAccueil->execute();
    // $textAccueil = $selectTextAccueil->fetch(PDO::FETCH_ASSOC);
    // echo $textAccueil['text_content'];

    ?>
</p>
<?php

include($_SERVER["DOCUMENT_ROOT"] . "/public/_blocks/doctypedown.php");

?>