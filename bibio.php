<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fonction pour charger le fichier XML
function loadFile($path) {
    if (!file_exists($path)) {
        die('Le fichier XML n\'existe pas.');
    }

    $dom = new DOMDocument();
    if (!$dom->load($path)) {
        throw new Exception('Impossible de charger le fichier XML : ' . $path);
    }
    return $dom;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['num'])) {
    $xmlFile = 'bibliotheque.xml';
    $dom = loadFile($xmlFile);


    $xpath = new DOMXPath($dom);

    // Rechercher le livre par son attribut num
    $num = htmlspecialchars($_GET['num']);
    $bookNode = $xpath->query("/bibliotheque/livres/livre[@num='$num']")->item(0);

    if ($bookNode) {
        $bookNode->parentNode->removeChild($bookNode);
        $dom->formatOutput = true;
        $dom->save($xmlFile);
        echo "<script>alert('Livre avec le numéro $num supprimé avec succès.'); window.location.href='bibliotheque.xml';</script>";
        header('Location: bibliotheque.xml');
    } else {
        echo "<script>alert('Livre avec le numéro $num non trouvé.'); window.location.href='bibliotheque.xml';</script>";
        header('Location: bibliotheque.xml');
    }
}

// ✅ GESTION DE L'AJOUT (Méthode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xmlFile = 'bibliotheque.xml';

    if (!file_exists($xmlFile)) {
        die('Le fichier XML n\'existe pas.');
    }

    $dom = loadFile($xmlFile);
    $livres = $dom->getElementsByTagName('livres')->item(0);

    $livre = $dom->createElement('livre');
    $livre->setAttribute('num', htmlspecialchars($_POST['num']));

    // Ajouter les sous-éléments
    $titre = $dom->createElement('titre', htmlspecialchars($_POST['titre']));
    $livre->appendChild($titre);

    $auteur = $dom->createElement('auteur');
    $nomAuteur = $dom->createElement('nom', htmlspecialchars($_POST['auteur_nom']));
    $emailAuteur = $dom->createElement('email', htmlspecialchars($_POST['auteur_email']));
    $auteur->appendChild($nomAuteur);
    $auteur->appendChild($emailAuteur);
    $livre->appendChild($auteur);

    $categorie = $dom->createElement('categorie', htmlspecialchars($_POST['categorie']));
    $livre->appendChild($categorie);

    $datePublication = $dom->createElement('datePublication', htmlspecialchars($_POST['datePublication']));
    $livre->appendChild($datePublication);

    $resume = $dom->createElement('resume', htmlspecialchars($_POST['resume']));
    $livre->appendChild($resume);

    $editeur = $dom->createElement('editeur');
    $nomEditeur = $dom->createElement('nom', htmlspecialchars($_POST['editeur_nom']));
    $adresse = $dom->createElement('adresse');
    $rue = $dom->createElement('rue', htmlspecialchars($_POST['rue']));
    $ville = $dom->createElement('ville', htmlspecialchars($_POST['ville']));
    $pays = $dom->createElement('pays', htmlspecialchars($_POST['pays']));
    $adresse->appendChild($rue);
    $adresse->appendChild($ville);
    $adresse->appendChild($pays);
    $editeur->appendChild($nomEditeur);
    $editeur->appendChild($adresse);
    $livre->appendChild($editeur);

    $livres->appendChild($livre);

    $dom->formatOutput = true;
    $dom->save($xmlFile);

    header('Location: bibliotheque.xml');
    exit();
}

?>
