<?php
abstract class Character
{
	protected $userName;
	protected $level;
	protected $xp;
	protected $hitPoints;
	protected $maxHitPoints;
	
	protected $attackPoints;
	protected $maxAttackPoints;
	
	protected $inventory;
	protected $attackList;
	protected $aliveStatus;
	protected $attributes;
	//protected $weaponEquiped;
	
	//general character info
	public function getInfo()
	{
		echo "\nCharacter Info:\n\nName: {$this->userName}\nLevel: {$this->level}\nHP: {$this->hitPoints}\n";
	}
	
	//getter functions
	public function getHp()
	{
		return $this->hitPoints;
	}
	
	
	public function getAp()
	{
		return $this->attackPoints;
	}
	
	
	public function getUserName()
	{
		return $this->userName;
	}
	
	public function getLevel()
	{
		return $this->level;
	}
	
	public function getAliveStatus()
	{
		return $this->aliveStatus;
	}
	
	public function getAttackList()
	{
		return $this->attackList;
	}
//character actions
	//inventory related
	public function showInventory()
	{
		foreach($this->inventory as $key => $value)
		{
			if($value != null)
				echo "\n{$key}: {$value}\n";
			else
				echo "\n{$key}: EMPTY\n";
		}
	}
	
	public function getFirstFreeInventorySlot()
	{
		$idx = null;
		foreach($this->inventory as $key => $value)
		{
			if($value == null)
			{
				$idx = $key;
				break;
			}					
		}
		return $idx;  //if idx is null then player inventory is full
	}	
	
	public function addToInventory(Potion $item)
	{
		$slot = $this->getFirstFreeInventorySlot();
		if($slot == null)
		{
			echo "\nNo room in your inventory!\n";
			return false;
		}
		else
		{
			$this->inventory[$slot] = $item;
			echo "\nItem successfully added to inventory.\n";
			return true;
		}	
	}
	
	public function equip($invenSlot)
	{
		$selection = $this->inventory[$invenSlot];
		$type = get_class($selection);
		
		if($selection == null)
			echo "\nThat inventory slot is empty!\n";
		else if(!is_a($selection, "Weapon"))
			echo "\nYou can not equip a {$type} -- only weapons may be equipped.\n";
		else
			echo "\n{$type} now equiped.\n";
	}
	
	/*public function usePotion($callingPlayerHp)
	{
		$hpToAdd = $callingPayerHp * 0.07; //boots HP by 7% of players full HP
		return $hpToAdd;
	}*/
	

	//AP/HP related
	public function isCharacterDead($hpRemaining)
	{
		if($hpRemaining <= 0)
			$this->aliveStatus = false;
	}
	
	public function getApCost($attackArr, $choosenAttack)
	{
		foreach($attackArr as $attackOption)            //this determines which attack the user actually choose 
		{														  //then gets the AP cost
			if($attackOption->getFriendlyName() == $choosenAttack)
			{
				$attackApCost = $attackOption->getStandardApCost();
				return $attackApCost;
			}
		}
		return -1;
	}
	
	public function getAttackDamage($attackArr, $choosenAttack)
	{
		foreach($attackArr as $attackOption)            //this determines which attack the user actually choose 
		{														  //then applies the correct damage to the enemy
			if($attackOption->getFriendlyName() == $choosenAttack)
			{
				$damageFromAttack = $attackOption->getStandardHpDmg();
				return $damageFromAttack;
			}
		}
		return -1;
	}
	
	public function takeHit($dmg)
	{
		$hp = ($this->hitPoints - $dmg);
		
		if($hp < 0)
			$this->hitPoints = 0;
		else
			$this->hitPoints = $hp;	
	}	
	
	public function meetsApRequirement($moveApCost)
	{
		if($moveApCost <= $this->attackPoints)
			return true;
			
		return false;
	}
	
	public function deductAp($apPoints)
	{
		$newAp = ($this->attackPoints - $apPoints);
		if($newAp < 0)
			$this->attackPoints = 0;
		else
			$this->attackPoints = $newAp;
	}
	
	//show players attack list
	public static function showAttackFriendlyName($arr)
	{
		foreach($arr as $attackOption)
		{
			if($attackOption != null)
				echo "{$attackOption->getFriendlyName()}\n";
		}
	}
	
	//modify this function to pass in the users chi attribute 
	//evaluate the attribute to 
	public function giveBackAp($chiAttribute)
	{
		$mutliplier;
		
		if($chiAttribute == 1)
			$mutliplier = 0.01;
		else if($chiAttribute == 2)
			$mutliplier = 0.02;
		else if($chiAttribute == 3)
			$mutliplier = 0.03;
		else if($chiAttribute == 4)
			$mutliplier = 0.04;
		else if($chiAttribute == 5)
			$mutliplier = 0.05;
		else if($chiAttribute == 6)
			$mutliplier = 0.06;
		else if($chiAttribute == 7)
			$mutliplier = 0.07;
		else if($chiAttribute == 8)
			$mutliplier = 0.08;
		else if($chiAttribute == 9)
			$mutliplier = 0.09;
		else if($chiAttribute >= 10)
			$mutliplier = 0.1;
			
		$numOfAp = ceil(($this->maxAttackPoints * $mutliplier));  //round up to the nearest integer
		
		if(($this->attackPoints + $numOfAp) > $this->maxAttackPoints)
			$this->attackPoints = $this->maxAttackPoints;
		else 
			$this->attackPoints = ($this->attackPoints + $numOfAp);
	}
	
	function getCriticalHitMultiplier($strengthAttribute)
	{
		$mutliplier = 0;
		
		if($strengthAttribute == 1)
			$mutliplier = 0.01;
		else if($strengthAttribute == 2)
			$mutliplier = 0.02;
		else if($strengthAttribute == 3)
			$mutliplier = 0.03;
		else if($strengthAttribute == 4)
			$mutliplier = 0.04;
		else if($strengthAttribute == 5)
			$mutliplier = 0.05;
		else if($strengthAttribute == 6)
			$mutliplier = 0.06;
		else if($strengthAttribute == 7)
			$mutliplier = 0.07;
		else if($strengthAttribute == 8)
			$mutliplier = 0.08;
		else if($strengthAttribute == 9)
			$mutliplier = 0.09;
		else if($strengthAttribute >= 10)
			$mutliplier = 0.1;
		
		return $mutliplier;
	}
}
?>