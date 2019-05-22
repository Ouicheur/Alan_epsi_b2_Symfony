<?php
	namespace App\DataFixtures;
	use Doctrine\Bundle\FixturesBundle\Fixture;
	use Doctrine\Common\Persistence\ObjectManager;
	use App\Entity\Dresseur;
class DresseurFixtures extends Fixture
{
	    public function load(ObjectManager $manager)
	    {
	    	foreach ($this->getDresseur() as [$email, $roles, $name, $password])
	    	{
	    		$dresseur = new Dresseur;
	    		$dresseur
	    			->setEmail($email)
	    			->setRoles($roles)
	    			->setName($name)
	    			->setPassword($password)
	    		;
	    		$manager->persist($dresseur);
	    	}
	    	$manager->flush();
	    }
	    public function getPokemon()
	    {
	    	return [
	    		['administrateur@oui.net', 'ROLE_ADMIN', 'Administrateur', 'root'],
	    		['ahbahoui@oui.net', 'ROLE_USER', 'Sacha', 'OndineLove']
	    	];
	    }
}
?>
