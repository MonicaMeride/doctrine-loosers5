<?php
namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Tvtruc\Entities\Serie;
/**
 * @ORM\Entity @ORM\Table(name="banners")
 **/
class Banner {
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $subkey;
    /**
     * @ORM\Column(type="string", name="keyvalue")
     * @var string
     */
    protected $keyvalue;
    /**
     * @ORM\Column(type="string", name="keytype")
     * @var string
     */
    protected $keytype;
    /**
     * @ORM\Column(type="string", name="filename")
     * @var string
     */
    protected $fileName;
    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Banner", inversedBy="serie", cascade={"all"}, fetch="LAZY")
     * @ORM\JoinColumn(name="keyvalue", referencedColumnName="id")
     */
    public $serie;
    // getters et setters
    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }
    public function getFileName() {
        return ($this->fileName);
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
     * Banner constructor.
     * Est appelle en faisant $machin = new Tvtruc/Entities/Banner($serie)
     * @param $serie
     */
    public function __construct($serie) {
        if ($serie){
            $this->serie = $serie;
        }
    }
}