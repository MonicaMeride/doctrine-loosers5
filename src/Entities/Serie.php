<?php
namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Tvtruc\Entities\Episode;
use Tvtruc\Entities\Banner;
use Tvtruc\Entities\Translation;
/**
 * @ORM\Entity @ORM\Table(name="tvseries")
 **/
class Serie {
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", name="SeriesName")
     * @var string
     */
    protected $serieName;
    /**
     * Une serie a plusieurs episodes
     * La propriété est definie en public, parce que pour l'utiliser c'est peut-etre aussi simple si j'en ai besoin depuis un autre namespace
     * Si je ne l'utilise que via *Serie*, donc pas directement je pourrais tout mettre en protected.
     * @ORM\OneToMany(targetEntity="Episode", mappedBy="serie", cascade={"all"}, fetch="LAZY")
     */
    public $episodes;
    /**
     * Une serie a plusieurs episodes
     * La propriété est definie en public, parce que pour l'utiliser c'est peut-etre aussi simple si j'en ai besoin depuis un autre namespace
     * @ORM\OneToMany(targetEntity="Banner", mappedBy="serie", cascade={"all"}, fetch="LAZY")
     */
    public $banner;
    public function __construct() {
        $this->episodes = new ArrayCollection();
    }
    // getters et setters
    public function setName($name) {
        $this->serieName = $name;
    }
    public function getName() {
        return($this->serieName);
    }
    public function setEpisode($episodes) {
        $this->episodes = $episodes;
    }
    public function getEpisodes() {
        return($this->episodes);
    }
    public function addEpisode($episode) {
        $this->episodes->add($episode);
    }
    public function setBanner($banner){
        $this->banner = $banner;
    }
    public function getBanner(){
        global $entityManager;
        $repository = $entityManager->getRepository('tvtruc\Entities\Banner');
        $banner = $repository->findOneBy(array(
            'keytype' => 'series',
            'subkey' => 'graphical',
            'keyvalue' => $this->id
        ));
        return (is_null($banner)? '':$banner->getFileName());
    }
    public function setTranslation($translation){
        $this->banner = $translation;
    }
    public function getTranslation(){
        global $entityManager;
        $repository = $entityManager->getRepository('tvtruc\Entities\Translation');
        $translation = $repository->findOneBy(array(
            'languageid' => '17',
            'seriesid' => $this->id
        ));
        return (is_null($translation) ? 'Ya pas de trad mec' : $translation->getTranslation() );
    }
}