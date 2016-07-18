Character =
{
  userName: null;
	xp = null;
	hitPoints = null;
	maxHitPoints = null;
  level: null;

  attackPoints = null;
	maxAttackPoints = null;

	inventory = null;
	attackList = null;
	aliveStatus = null;
	attributes = null;
	//weaponEquiped;

  //general character info
	function getInfo()
	{
		console.log("\nCharacter Info:\n\nName: {this.userName}\nLevel: {this.level}\nHP: {this.hitPoints}\n");
	}

	//getter functions
	function getHp()
	{
		return this.hitPoints;
	}

}
