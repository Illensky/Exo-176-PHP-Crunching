<?php
$dico = file_get_contents('dictionnaire.txt');
$mots = explode("\n", $dico);

echo count($mots)."<br>";

$len15 = 0;
$containW = 0;
$endByQ = 0;

foreach ($mots as $mot) {
    if (strlen($mot) === 15) {
        $len15++;
    }

    if (strpos($mot, "w" ) !== false) {
        $containW++;
    }

    if (strpos($mot, "q") === strlen($mot)) {
        $endByQ++;
    }
}
echo $len15."<br>";
echo $containW."<br>";
echo $endByQ."<br>";

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"];

$before2000 = 0;
$allReleaseYear = [];
$allCategory = [];
$allRealisator = [];
$movieCounter = 0;
$topPrice = 0;
$allMonth = [];
$allPrice = [];

echo "<h2>Classement film</h2>";
foreach ($top as $key => $movie) {
    $releaseYear = (int)substr($movie['im:releaseDate']['attributes']['label'], strlen($movie['im:releaseDate']['attributes']['label']) -4);
    $allReleaseYear[] = $releaseYear;
    $allCategory[] = $movie['category']['attributes']['term'];
    $allRealisator[] = $movie['im:artist']['label'];
    $splittedDate = explode(' ', $movie['im:releaseDate']['attributes']['label']);
    $month = $splittedDate[0];
    $allMonth[] = $month;
    $allPrice[$movie['im:name']['label']] = (float)$movie['im:price']['attributes']['amount'];

    if ($movieCounter < 10) {
        $movieCounter++;
        $topPrice += (float)$movie['im:price']['attributes']['amount'];
    }

    if ($releaseYear < 2000) {
        $before2000++;
    }

    ?>
<div>
    <p style="font-size: 3rem"><?= (int)$key +1 ?></p>
    <p><?= $movie['im:name']['label'] ?></p>
    <p>Images :</p>
    <img src="<?= $movie['im:image'][0]['label'] ?>" height="<?= $movie['im:image'][0]['attributes']['height'] ?>px" alt="">
    <img src="<?= $movie['im:image'][1]['label'] ?>" height="<?= $movie['im:image'][1]['attributes']['height'] ?>px" alt="">
    <img src="<?= $movie['im:image'][2]['label'] ?>" height="<?= $movie['im:image'][2]['attributes']['height'] ?>px" alt="">
    <p>Résumé : <?= $movie['summary']['label'] ?></p>
    <p>Prix : <?= $movie['im:price']['label'] ?>  <?= $movie['im:price']['attributes']['currency'] ?></p>
    <p>Type : <?= $movie['im:contentType']['attributes']['term'] ?>, <?= $movie['im:contentType']['attributes']['label'] ?></p>
    <p>Droits : <?= $movie['rights']['label'] ?></p>
    <p>Titre : <?= $movie['title']['label'] ?></p>
    <a href="<?= $movie['link'][0]['attributes']['href'] ?>">Voir sur Itunes</a>
    <p>Réalisateur : <?= $movie['im:artist']['label'] ?></p>
    <p>Catégorie : <?= $movie['category']['attributes']['term'] ?></p>
    <p>Date de sortie : <?= $movie['im:releaseDate']['attributes']['label'] ?></p>
</div>
<?php
}
echo $before2000."<br>";
echo max($allReleaseYear)."<br>";
echo min($allReleaseYear)."<br>";
var_dump(array_count_values($allCategory));
echo "<br>";
echo max(array_count_values($allRealisator))."<br>";
var_dump(array_count_values($allRealisator));
echo "<br>";
echo $topPrice."<br>";
var_dump(array_count_values($allMonth))."<br>";
var_dump($allPrice);
echo "<br><br>";
asort($allPrice);
var_dump($allPrice);