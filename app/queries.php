<?php
/**
 * Created by PhpStorm.
 * User: rototo
 * Date: 14/02/2018
 * Time: 19:56
 */

// create_product.php <name>
require_once "../bootstrap.php";

echo "<pre>";
// init du repo
$repository = $entityManager->getRepository('Tvtruc\Entities\Serie');



echo "-----------------------\r\n";
echo "findOneBy result + DUMP \r\n";
echo "-----------------------\r\n";
// recherche exacte
$foundSerie = $repository->findOneBy(array('serieName' => 'plipplop'));

// alternativement via "__class magic"
// $foundSerie = $repository->findOneBySerieName('plipplop');

// pour en recup plusieurs
// $foundSeries = $repository->findBy(array('serieName' => 'plipplop');
// $foundSeries = $repository->findBySerieName('plipplop');

\Doctrine\Common\Util\Debug::dump($foundSerie);


echo "-----------------------\r\n";
echo "DQL result + DUMP \r\n";
echo "-----------------------\r\n";
// je cherche ceux avec "88" dedans
$dqlSeriesNameSearchPattern = "88"; //remplacer 88 par la variable post
$query = $repository->createQueryBuilder('s')
	->where('s.serieName LIKE :name') // les contraintes
	->setParameter('name', '%'. $dqlSeriesNameSearchPattern .'%') // remplacer :name par l'expression '%88%'
	->setMaxResults(2)
    ->getQuery();
$dqlSeries = $query->getResult();

\Doctrine\Common\Util\Debug::dump($dqlSeries, 4);


echo "-----------------------\r\n";
echo "findAll result DUMP \r\n";
echo "-----------------------\r\n";
// retourne les tous
//$series = $repository->findAll();
$series = $repository->findBy(array(), array('id'=>'DESC'),2); //limite d'affichage
// alternativement
// $seriesList = $repository->findAll('Tvtruc\Entities\Series');


// affiche la version "lisible"
 \Doctrine\Common\Util\Debug::dump($series,4);

 // traitement en direct
//foreach ($series as $serie) {
//	echo sprintf("-%s\n", $serie->getName());
//	foreach ($serie->episodes as $episode) {
//		echo sprintf("- - - %s\n", $episode->getName());
//	}
//}

echo "-----------------------\r\n";
echo "findAll result EXPORT + print_r \r\n";
echo "-----------------------\r\n";
 // retourne la version "lisible"
$exportedSeries = \Doctrine\Common\Util\Debug::export($series,4);
print_r($exportedSeries);

echo "-----------------------\r\n";
echo "findAll result EXPORT + JSON_ENCODE \r\n";
echo "-----------------------\r\n";
echo json_encode($exportedSeries, JSON_PRETTY_PRINT);





echo "<pre>";
