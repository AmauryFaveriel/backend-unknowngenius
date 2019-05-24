<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Country
 *
 * @ORM\Table(name="Country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCountry", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcountry;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     * @Groups({"people","price"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=5, nullable=false)
     * @Groups({"people","price"})
     */
    private $code;

    public function getIdcountry(): ?int
    {
        return $this->idcountry;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }


}
