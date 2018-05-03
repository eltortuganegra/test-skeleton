<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoComponentRepository")
 */
class VideoComponent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ad")
     * @JoinColumn(name="ad_id", referencedColumnName="id")
     */
    private $ad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $position_x_coordinate;

    /**
     * @ORM\Column(type="integer")
     */
    private $position_y_coordinate;

    /**
     * @ORM\Column(type="integer")
     */
    private $position_z_coordinate;

    /**
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkToExternalImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $format;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    public function getAd(): Ad
    {
        return $this->ad;
    }

    public function setAd(Ad $ad)
    {
        $this->ad = $ad;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPositionXCoordinate(): int
    {
        return $this->position_x_coordinate;
    }

    public function setPositionXCoordinate(int $position_x_coordinate)
    {
        $this->position_x_coordinate = $position_x_coordinate;
    }

    public function getPositionYCoordinate(): int
    {
        return $this->position_y_coordinate;
    }

    public function setPositionYCoordinate(int $position_y_coordinate)
    {
        $this->position_y_coordinate = $position_y_coordinate;
    }

    public function getPositionZCoordinate(): int
    {
        return $this->position_z_coordinate;
    }

    public function setPositionZCoordinate(int $position_z_coordinate)
    {
        $this->position_z_coordinate = $position_z_coordinate;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getLinkToExternalImage()
    {
        return $this->linkToExternalImage;
    }

    public function setLinkToExternalImage($linkToExternalImage)
    {
        $this->linkToExternalImage = $linkToExternalImage;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    }
}
