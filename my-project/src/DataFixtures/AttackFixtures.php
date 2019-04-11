<?php

namespace App\DataFixtures;

use App\Entity\Attack;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AttackFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{
		foreach ($this->getAttacks() as [$name, $power, $type]) {
		$attack = new Attack;
		$attack
			->setName($name)
			->setPower($power)
			->setType($type);

			$manager->persist($attack);
			$reference = $this->addReference($name, $attack);
		}
		$manager->flush();
	}

	/** @return array */
	public function getAttacks()
	{
		return[
			['Flammèche', 50, Type::Type_fire],
			['BrancheDansTaGueule', 100, Type::Type_plant],
			['Crachats', 75, Type::Type_water],
			['BrulureDeTapis', 20, Type::Type_fire],
			['Tsunami', 120, Type::Type_water],
			['LancerDeFeuilles', 50, Type::Type_plant],
			['Charge', 20, Type::Type_normal]
		];
	}
}

?>