<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table(name="Price", indexes={@ORM\Index(name="fk_Price_Category1_idx", columns={"idCategory"}), @ORM\Index(name="fk_Price_Year_idx", columns={"idYear"})})
 * @ORM\Entity
 * @ApiResource(
 *     normalizationContext={"groups"={"price"}}
 * )
 */
class Price
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPrice", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"price"})
     */
    private $idprice;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategory", referencedColumnName="idCategory")
     * })
     * @Groups({"people","price"})
     */
    private $idcategory;

    /**
     * @var \Year
     *
     * @ORM\ManyToOne(targetEntity="Year")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idYear", referencedColumnName="idYear")
     * })
     * @Groups({"people","price"})
     */
    private $idyear;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="People", inversedBy="idprice")
     * @ORM\JoinTable(name="price_has_people",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idPrice", referencedColumnName="idPrice")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idPeople", referencedColumnName="idPeople")
     *   }
     * )
     * @Groups({"price"})
     */
    private $idpeople;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpeople = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdprice(): ?int
    {
        return $this->idprice;
    }

    public function getIdcategory(): ?Category
    {
        return $this->idcategory;
    }

    public function setIdcategory(?Category $idcategory): self
    {
        $this->idcategory = $idcategory;

        return $this;
    }

    public function getIdyear(): ?Year
    {
        return $this->idyear;
    }

    public function setIdyear(?Year $idyear): self
    {
        $this->idyear = $idyear;

        return $this;
    }

    /**
     * @return Collection|People[]
     */
    public function getIdpeople(): Collection
    {
        return $this->idpeople;
    }

    public function addIdperson(People $idperson): self
    {
        if (!$this->idpeople->contains($idperson)) {
            $this->idpeople[] = $idperson;
        }

        return $this;
    }

    public function removeIdperson(People $idperson): self
    {
        if ($this->idpeople->contains($idperson)) {
            $this->idpeople->removeElement($idperson);
        }

        return $this;
    }

}
