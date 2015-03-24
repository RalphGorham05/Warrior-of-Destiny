<?php
include_once('Character.php');
include_once('PlayableCharacter.php');
include_once('Attack.php');
class Monk extends Character
{
	use PlayableCharacter;
	public function __construct($userName, $characterLevel, $hp, $ap, $curXp, $attackList, $attributes)
	{
		$this->userName = $userName;
		$this->level = $characterLevel;
		$this->hitPoints = $hp;
		$this->maxHitPoints = $hp;
		$this->attackPoints = $ap;
		$this->maxAttackPoints = $ap;
		$this->xp = $curXp;
		$this->aliveStatus = true;
		$this->inventory = array
		(
			"slot1" => null,
    		"slot2" => null,
    		"slot3" => null,
    		"slot4" => null,
		);
		
		$this->attackList = array
		(
			"attack1" => $attackList['attack_id_1'], //new FlyingDragonFists(),
			"attack2" => $attackList['attack_id_2'], //new BaldHeadedEagleStrike(),
			"attack3" => $attackList['attack_id_3'],  //new ShaolinSecretMoveOfDoom(),
		);
		
		$this->attributes = array
		(
			"strength" => $attributes['strength'],
			"luck"     => $attributes['luck'],
			"IQ"       => $attributes['iq'],
			"stealth"  => $attributes['stealth'],
			"speed"    => $attributes['speed'],
			"chi"      => $attributes['chi'],
		);
	}
	
	public function getChi()
	{
		return $this->attributes['chi'];
	}
	
	public function getStrength()
	{
		return $this->attributes['strength'];
	}
	
	public function getLuck()
	{
		return $this->attributes['luck'];
	}
	
	public function getAttackList()
	{
		return $this->attackList;
	}
}

?>