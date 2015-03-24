<?php

abstract class Attack
{
	abstract protected function getStandardApCost();
	abstract protected function getStandardHpDmg();
	abstract protected function getFriendlyName();
}

class FlyingDragonFists extends Attack
{
	public function getStandardApCost()
	{
		return 20;
	}
	
	public function getStandardHpDmg()
	{
		return 10;
	}
	
	public function getFriendlyName()
	{
		return "Flying Dragon Fists";
	}
}

//monk base attacks
class ShaolinSecretMoveOfDoom extends Attack
{
	public function getStandardApCost()
	{
		return 35;
	}
	
	public function getStandardHpDmg()
	{
		return 20;
	}
	
	public function getFriendlyName()
	{
		return "Shaolin Secret Move of Doom";
	}
}

class BaldHeadedEagleStrike extends Attack
{
	public function getStandardApCost()
	{
		return 25;
	}
	
	public function getStandardHpDmg()
	{
		return 12;
	}
	
	public function getFriendlyName()
	{
		return "Bald Headed Eagle Strike";
	}
}


//ninja base attacks

?>