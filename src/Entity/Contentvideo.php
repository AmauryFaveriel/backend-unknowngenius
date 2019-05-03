<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Contentvideo
 *
 * @ORM\Table(name="ContentVideo", indexes={@ORM\Index(name="fk_contentVideo_People1_idx", columns={"idPeople"})})
 * @ORM\Entity
 */
class Contentvideo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcontentVideo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontentvideo;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=100, nullable=false)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=300, nullable=false)
     */
    private $description;

    /**
     * @var \People
     *
     * @ORM\ManyToOne(targetEntity="People")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPeople", referencedColumnName="idPeople")
     * })
     */
    private $idpeople;

    public function getIdcontentvideo(): ?int
    {
        return $this->idcontentvideo;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdpeople(): ?People
    {
        return $this->idpeople;
    }

    public function setIdpeople(?People $idpeople): self
    {
        $this->idpeople = $idpeople;

        return $this;
    }


}
