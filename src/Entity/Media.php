<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseMedia;

/**
 * @ORM\Table(name="media__media")
 * @ORM\Entity
 */
class Media extends BaseMedia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
