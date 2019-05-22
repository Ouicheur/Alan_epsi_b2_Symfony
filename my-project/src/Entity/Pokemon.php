<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 */
class Pokemon extends MasterClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $PV;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\attack")
     */
    private $attack;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PokemonTeam", inversedBy="Pokemon")
     */
    private $pokemonTeam;

    public function __construct()
    {
        parent::__construct();
        $this->attack = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPV(): ?int
    {
        return $this->PV;
    }

    public function setPV(int $PV): self
    {
        $this->PV = $PV;

        return $this;
    }

    /**
     * @return Collection|attack[]
     */
    public function getAttack(): Collection
    {
        return $this->attack;
    }

    public function addAttack(attack $attack): self
    {
        if (!$this->attack->contains($attack)) {
            $this->attack[] = $attack;
        }

        return $this;
    }

    public function removeAttack(attack $attack): self
    {
        if ($this->attack->contains($attack)) {
            $this->attack->removeElement($attack);
        }

        return $this;
    }

    public function getPokemonTeam(): ?PokemonTeam
    {
        return $this->pokemonTeam;
    }

    public function setPokemonTeam(?PokemonTeam $pokemonTeam): self
    {
        $this->pokemonTeam = $pokemonTeam;

        return $this;
    }
}
