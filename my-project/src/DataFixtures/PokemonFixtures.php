<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{
		foreach ($this->getPokemon() as [$name, $PV, $type, $name_attack]) {
		$pokemon = new Pokemon;
		$pokemon
			->setName($name)
			->setPV($PV)
			->setType($type)
			->addAttack($this->getReference($name_attack));

			$manager->persist($pokemon);
		}
		$manager->flush();
	}

	/** @return array */
	public function getPokemon()
	{
		return[
			['BouleDePu', 10, Type::Type_water, 'Charge'],
			['Vergiture', 100, Type::Type_plant, 'Charge'],
			['Diahrer', 20, Type::Type_fire, 'Charge']
		];
	}
}