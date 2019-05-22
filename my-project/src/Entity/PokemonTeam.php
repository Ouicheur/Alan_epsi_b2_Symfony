<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonTeamRepository")
 */
class PokemonTeam extends MasterClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dresseur", mappedBy="pokemonTeam")
     */
    private $Dresseur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pokemon", mappedBy="pokemonTeam")
     */
    private $Pokemon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SurnomPokemon;

    /**
     * @ORM\Column(type="integer")
     */
    private $PokemonHp;

    public function __construct()
    {
        $this->Dresseur = new ArrayCollection();
        $this->Pokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Dresseur[]
     */
    public function getDresseur(): Collection
    {
        return $this->Dresseur;
    }

    public function addDresseur(Dresseur $dresseur): self
    {
        if (!$this->Dresseur->contains($dresseur)) {
            $this->Dresseur[] = $dresseur;
            $dresseur->setPokemonTeam($this);
        }

        return $this;
    }

    public function removeDresseur(Dresseur $dresseur): self
    {
        if ($this->Dresseur->contains($dresseur)) {
            $this->Dresseur->removeElement($dresseur);
            // set the owning side to null (unless already changed)
            if ($dresseur->getPokemonTeam() === $this) {
                $dresseur->setPokemonTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pokemon[]
     */
    public function getPokemon(): Collection
    {
        return $this->Pokemon;
    }

    public function addPokemon(Pokemon $pokemon): self
    {
        if (!$this->Pokemon->contains($pokemon)) {
            $this->Pokemon[] = $pokemon;
            $pokemon->setPokemonTeam($this);
        }

        return $this;
    }

    public function removePokemon(Pokemon $pokemon): self
    {
        if ($this->Pokemon->contains($pokemon)) {
            $this->Pokemon->removeElement($pokemon);
            // set the owning side to null (unless already changed)
            if ($pokemon->getPokemonTeam() === $this) {
                $pokemon->setPokemonTeam(null);
            }
        }

        return $this;
    }

    public function getSurnomPokemon(): ?string
    {
        return $this->SurnomPokemon;
    }

    public function setSurnomPokemon(string $SurnomPokemon): self
    {
        $this->SurnomPokemon = $SurnomPokemon;

        return $this;
    }

    public function getPokemonHp(): ?int
    {
        return $this->PokemonHp;
    }

    public function setPokemonHp(int $PokemonHp): self
    {
        $this->PokemonHp = $PokemonHp;

        return $this;
    }
}
