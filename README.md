# Exos 

## Dictionnaire

Dictonnaire.txt est un dictionnaire de la langue française, chargez le dans votre code :

```php
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
```

Le résultat est alors un tableau contenant tous les mots.

### Exercices

* Combien de mots contient ce dictionnaire ?
* => 336532
* Combien de mots font exactement 15 caractères ?
* => 20259
* Combien de mots contiennent la lettre « w » ?
* => 537
* Combien de mots finissent par la lettre « q » ?
* => 0

## Liste de films

films.json contient le top100 des films visionnés au États-Unis sur la plateforme iTunes, chargez le dans votre code.

```php
$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films
```

### Exercices

* Afficher le top10 des films sous cette forme :

```
1 Mission: Impossible - Rogue Nation
2 …
…
10 …
```

* Quel est le classement du film « Gravity » ?
* => 58
* Quel est le réalisateur du film « The LEGO Movie » ?
* => Phil Lord & Christopher Miller
* Combien de films sont sortis avant 2000 ?
* => 12
* Quel est le film le plus récent ? Le plus vieux ?
* => 2016, 1947
* Quelle est la catégorie de films la plus représentée ?
* => Action & Adventure
* Quel est le réalisateur le plus présent dans le top100 ?
* => George Lucas
* Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?
* => 152,9$ USD
* Quel est le mois ayant vu le plus de sorties au cinéma ?
* => Juillet et Mai 
* Quels sont les 10 meilleurs films à voir en ayant un budget limité ?
* => The LEGO Movie
* => American Hustle
* => Divergent
* => Gravity
* => Paranormal Activity: The Ghost Dimension (Unrated Version)
* => Kung Fu Panda 2
* => Love & Mercy
* => The Polar Express
* => Ex Machina
* => The Wolf of Wall Street
