<?php

namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Tvtruc\Entities\Serie;
/**
 * @ORM\Entity @ORM\Table(name="tvepisodes")
 **/
class Episode {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string")
	 * @ORM\GeneratedValue(strategy="UUID")
	 */

    protected $id;
	/**
	 * @ORM\Column(type="string",name="EpisodeName")
	 * @var string
	 */
    protected $episodeName;

	/**
	 * Les episodes sont liés a une serie
	 * Le serie est en private parce que je veux n'y acceder qu'au travers des getters/setters
	 * @ORM\ManyToOne(targetEntity="Serie", inversedBy="episodes", cascade={"all"}, fetch="LAZY")
	 * @ORM\JoinColumn(nullable=false, name="seriesid", referencedColumnName="id")
	 */
	private $serie;

    // getters et setters
	// ensembles de fonctions/methodes publiques permettant de modifier/acceder aux propriétés private

	/**
	 * @param $name
	 */
	public function setName($name)
	{
		$this->episodeName = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return($this->episodeName);
	}

	/**
	 * @param $serie
	 */
	public function setSerie($serie) {
		if ($serie){
			$this->serie = $serie;
		}
	}

	/**
	 * @return mixed
	 */
	public function getSerie() {
		return($this->serie);
	}

	/**
	 * Episode constructor.
	 * Est appelle en faisant $machin = new Tvtruc/Entities/Episode($serie)
	 * @param $serie
	 */
	public function __construct($serie) {
		if ($serie){
			$this->serie = $serie;
		}
	}

}
