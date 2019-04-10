<?php 

namespace App\Entity;

class Type 
{
	const Type_water = 0;
	const Type_fire = 1;
	const Type_plant = 2;
	const Type_norm = 3;

	public function WeekAgainst($AttackType,$DefenseType)
	{
			if($DefenseType === self::Type_fire){
				return (self::Type_water === $AttackType) ? true : false;
			}
			elseif ($DefenseType === self::Type_water){
				return (self::Type_plant === $AttackType) ? true : false;
			}
			elseif ($DefenseType === self::Type_plant){
				return (self::Type_fire === $AttackType) ? true : false;
			}
	}

	public function StrongAgainst($AttackType,$DefenseType)
	{
			switch ($DefenseType) {
				case self::Type_fire:
						return self::Type_plant === $AttackType ? true : false;
						break;
				case self::Type_water:
						return self::Type_fire === $AttackType ? true : false;
						break;
				case self::Type_plant:
						return self::Type_water === $AttackType ? true : false;
						break;
				default:
						return false;
						break;
			}
	}

}