<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Category
 *
 * @ORM\Table(name="Category", uniqueConstraints={@ORM\UniqueConstraint(name="category_UNIQUE", columns={"category"})})
 * @ORM\Entity
 * @ApiResource
 *
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCategory", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=45, nullable=false)
     * @Groups({"people","price"})
     */
    private $category;

    public function getIdcategory(): ?int
    {
        return $this->idcategory;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }


}
