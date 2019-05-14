<?php
	namespace App\DataFixtures;
	use Doctrine\Bundle\FixturesBundle\Fixture;
	use Doctrine\Common\Persistence\ObjectManager;
	use App\Entity\Soin;
	class SoinFixtures extends Fixture
	{
	    public function load(ObjectManager $manager)
	    {
	    	foreach ($this->getSoin() as [$name, $Effect])
	    	{
	    		$soin = new Soin;
	    		$soin
	    			->setName($name)
	    			->setEffect($Effect)
	    		;
	    		$manager->persist($soin);
	    	}
	    	$manager->flush();
	    }
	    public function getSoin()
	    {
	    	return [
	    		['Potion', 50],
	    		['Super potion', 75],
	    		['Hyper potion', 150]
	    	];
	    }
	}
?>