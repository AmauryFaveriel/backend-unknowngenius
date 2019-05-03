<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * People
 *
 * @ORM\Table(name="People", indexes={@ORM\Index(name="fk_People_Family1_idx", columns={"idFamily"}), @ORM\Index(name="fk_People_Country1_idx", columns={"idCountry"}), @ORM\Index(name="fk_People_Affiliation1_idx", columns={"idAffiliation"})})
 * @ORM\Entity
 * @ApiResource(
 *     normalizationContext={"groups"={"people"}}
 * )
 */
class People
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPeople", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("people")
     */
    private $idpeople;

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
     * @ORM\Column(name="firstname", type="string", length=45, nullable=false)
     * @Groups({"people","price"})
     */
    private $firstname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=false)
     * @Groups({"people","price"})
     */
    private $birthday;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deathdate", type="date", nullable=true)
     * @Groups({"people","price"})
     */
    private $deathdate;

    /**
     * @var string
     *
     * @ORM\Column(name="birthcity", type="string", length=45, nullable=false)
     * @@Groups({"people","price"})
     */
    private $birthcity;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="string", length=1000, nullable=false)
     * @Groups({"people","price"})
     */
    private $biography;

    /**
     * @var string
     *
     * @ORM\Column(name="work", type="string", length=1000, nullable=false)
     * @@Groups({"people","price"})
     */
    private $work;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     * @@Groups({"people","price"})
     */
    private $gender;

    /**
     * @var \Affiliation
     *
     * @ORM\ManyToOne(targetEntity="Affiliation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAffiliation", referencedColumnName="idAffiliation")
     * })
     * @Groups({"people","price"})
     */
    private $idaffiliation;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCountry", referencedColumnName="idCountry")
     * })
     * @Groups({"people","price"})
     */
    private $idcountry;

    /**
     * @var \Family
     *
     * @ORM\ManyToOne(targetEntity="Family")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFamily", referencedColumnName="idFamily")
     * })
     * @Groups({"people","price"})
     */
    private $idfamily;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Price", mappedBy="idpeople")
     * @Groups({"people"})
     */
    private $idprice;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idprice = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdpeople(): ?int
    {
        return $this->idpeople;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getDeathdate(): ?\DateTimeInterface
    {
        return $this->deathdate;
    }

    public function setDeathdate(?\DateTimeInterface $deathdate): self
    {
        $this->deathdate = $deathdate;

        return $this;
    }

    public function getBirthcity(): ?string
    {
        return $this->birthcity;
    }

    public function setBirthcity(string $birthcity): self
    {
        $this->birthcity = $birthcity;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getWork(): ?string
    {
        return $this->work;
    }

    public function setWork(string $work): self
    {
        $this->work = $work;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getIdaffiliation(): ?Affiliation
    {
        return $this->idaffiliation;
    }

    public function setIdaffiliation(?Affiliation $idaffiliation): self
    {
        $this->idaffiliation = $idaffiliation;

        return $this;
    }

    public function getIdcountry(): ?Country
    {
        return $this->idcountry;
    }

    public function setIdcountry(?Country $idcountry): self
    {
        $this->idcountry = $idcountry;

        return $this;
    }

    public function getIdfamily(): ?Family
    {
        return $this->idfamily;
    }

    public function setIdfamily(?Family $idfamily): self
    {
        $this->idfamily = $idfamily;

        return $this;
    }

    /**
     * @return Collection|Price[]
     */
    public function getIdprice(): Collection
    {
        return $this->idprice;
    }

    public function addIdprice(Price $idprice): self
    {
        if (!$this->idprice->contains($idprice)) {
            $this->idprice[] = $idprice;
            $idprice->addIdperson($this);
        }

        return $this;
    }

    public function removeIdprice(Price $idprice): self
    {
        if ($this->idprice->contains($idprice)) {
            $this->idprice->removeElement($idprice);
            $idprice->removeIdperson($this);
        }

        return $this;
    }

}
