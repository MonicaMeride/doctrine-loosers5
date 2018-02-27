<?php
/**
 * Created by PhpStorm.
 * User: rototo
 * Date: 14/02/2018
 * Time: 19:56
 */

// create_product.php <name>
require_once "../bootstrap.php";



$serie = new Tvtruc\Entities\Serie();
$serie->setName("yo". rand() ."tamerelapute");

$randomGenerateCount = rand(1,10);
while ($randomGenerateCount > 0){
	$episode = new Tvtruc\Entities\Episode($serie);
	//$episode->setSerie($serie);
	$episode->setName("lo". rand() ."cacaboudin");
	$serie->episodes->add($episode);
	$randomGenerateCount--;
}


$entityManager->persist($serie);
$entityManager->flush();


