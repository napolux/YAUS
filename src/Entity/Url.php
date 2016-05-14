<?php
namespace YAUS\Entity;

use YAUS\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="urls")
 */
class Url
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", length=2048)
     */
    protected $url;

    /**
     * @ORM\Column(type="text", length=2048 , nullable=true)
     */
    protected $shortUrl;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $visits = 0;

    /**
     * Get array copy of object
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Get id
     * @ORM\return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get url
     * @ORM\return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get short url
     * @ORM\return string
     */
    public function getShortUrl()
    {
        return $this->shortUrl;
    }

    /**
     * Get visits
     * @ORM\return integer
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * Set id
     * @param string $id
     * @return Url
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set url
     * @param string $url
     * @return Url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Set short url
     * @param string $shortUrl
     * @return Url
     */
    public function setShortUrl($shortUrl)
    {
        $this->shortUrl = $shortUrl;
        return $this;
    }

    /**
     * Set visits
     * @param integer $visits
     * @return Url
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;
        return $this;
    }
}