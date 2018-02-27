<?php
namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Tvtruc\Entities\Serie;
/**
 * @ORM\Entity @ORM\Table(name="translation_seriesname")
 **/
class Translation {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", name="languageid")
     * @var string
     */
    public $languageid;
    /**
     * @ORM\Column(type="string", name="seriesid")
     * @var string
     */
    protected $seriesid;
    /**
     * @ORM\Column(type="string", name="translation")
     * @var string
     */
    protected $translation;
    /**
     * @param $name
     */
    public function setTranslation($name)
    {
        $this->translation = $name;
    }
    /**
     * @return string
     */
    public function getTranslation()
    {
        return($this->translation);
    }
    // getters et setters
    // ensembles de fonctions/methodes publiques permettant de modifier/acceder aux propriétés private
}