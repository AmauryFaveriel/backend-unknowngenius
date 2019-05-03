<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Year
 *
 * @ORM\Table(name="Year", uniqueConstraints={@ORM\UniqueConstraint(name="year_UNIQUE", columns={"year"})})
 * @ORM\Entity
 */
class Year
{
    /**
     * @var int
     *
     * @ORM\Column(name="idYear", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idyear;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     * @Groups({"people","price"})
     */
    private $year;

    public function getIdyear(): ?int
    {
        return $this->idyear;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }


}
