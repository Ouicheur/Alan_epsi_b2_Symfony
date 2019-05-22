<?php
namespace App\DataFixtures;
use App\Entity\PokemonTeam;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\DresseurFixtures;
use App\Entity\Pokemon;
class PokemonTeamFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getTeams() as [$dresseur,$pokemon,$SurnomPokemon,$team]) {
            $PokemonTeam = new PokemonTeam;
            $PokemonTeam 
            ->addTrainer($this->getReference($dresseur))
            ->addPokemon($this->getReference($pokemon))
            ->setPokemonNickname($SurnomPokemon)
            ->setPokemonHP($this->getReference($pokemon)->getHitpoint())
            ;
            $manager ->persist($PokemonTeam);
            $reference = $this->addReference($team,$PokemonTeam);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            DresseurFixtures::class
        ];
    }
    public function getTeams()
    {
        return [
            ['Administrateur','BouleDePu','root','ADMINTEAM'],
            ['Sacha','Vergiture','OndineLove','Random'],
        ];
    }
}
?>