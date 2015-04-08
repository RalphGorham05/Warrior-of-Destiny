'''
3/24/15
Character class
'''

class Character:
    def __init__(self):
        self.userName = ''
        self.level = 0
        self.xp = 0
        self.hitPoints = 0
        self.maxHitPoints = 0
        
        self.attackPoints = 0
        self.maxAttackPoints = 0
        
        self.inventory = []
        self.attackList = []
        self.aliveStatus = None
        self.attributes = []
        self.weaponEquipped = ''

    #general character info
    def getInfo(self):
        print "Character Info:\nName:" + self.userName + "\nLevel: " + str(self.level)+ "\nHP: " + str(self.hitPoints)


    #character actions
    #inventory related
    def showInventory(self):
        if not self.inventory:
            print 'EMPTY'
        else:
            for item in self.inventory:
                print item
    

    def addToInventory(self, item):
        full = 4
        if len(self.inventory) == full:
            print "No room in your inventory!"
            return False
	    
        else:
            self.inventory.append(item)
            print item + " successfully added to inventory."
            return True
       
    '''
    def equip(self, inventorySlot):
	selection = self.inventory[inventorySlot]
		$type = get_class($selection);
		
		if(selection == null)
			echo "\nThat inventory slot is empty!\n";
		else if(!is_a(selection, "Weapon"))
			echo "\nYou can not equip a {$type} -- only weapons may be equipped.\n";
		else
			echo "\n{$type} now equiped.\n";

    '''

    def usePotion(self, playerHp):
        hpToAdd = playerHp * 0.07 #boots HP by 7% of players full HP
        return hpToAdd

    #AP/HP related
    def isCharacterDead(self, health):
        if health <= 0:
            self.aliveStatus = False

    '''      
    def getApCost(attackArr, choosenAttack):
        foreach($attackArr as $attackOption)            #this determines which attack the user actually choose 
		{					#then gets the AP cost
			if($attackOption->getFriendlyName() == $choosenAttack)
			{
				$attackApCost = $attackOption->getStandardApCost();
				return $attackApCost;
			}
		}
		return -1;

    def getAttackDamage($attackArr, $choosenAttack):
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
    '''
	
    def takeHit(dmg):
	hp = self.hitPoints - dmg
	if hp < 0:
            self.hitPoints = 0
	else:
	    self.hitPoints = hp

    def meetsApRequirement(moveApCost):
	if moveApCost <= self.attackPoints:
            return True
        else:
	    return false

    def deductAp(apPoints):
	newAp = self.attackPoints - apPoints
	if newAp < 0:
            self.attackPoints = 0
	else:
	    self.attackPoints = newAp
    '''
    #show players attack list
    def showAttackFriendlyName(arr):
	foreach($arr as $attackOption)
		{
			if($attackOption != null)
				echo "{$attackOption->getFriendlyName()}\n"
	
    '''

    #modify this function to pass in the users chi attribute 
    #evaluate the attribute to 
    def giveBackAp(chiAttribute):
        multiplier = 0
        
        if chiAttribute == 1:
	    multiplier = 0.01
	elif chiAttribute == 2:
	    mutliplier = 0.02
	elif chiAttribute == 3:
	    mutliplier = 0.03
	elif chiAttribute == 4:
	    mutliplier = 0.04
	elif chiAttribute == 5:
	    mutliplier = 0.05
	elif chiAttribute == 6:
	    mutliplier = 0.06
	elif chiAttribute == 7:
	    mutliplier = 0.07
	elif chiAttribute == 8:
	    mutliplier = 0.08
	elif chiAttribute == 9:
	    mutliplier = 0.09
	elif chiAttribute >= 10:
	    mutliplier = 0.1
			
	#numOfAp = ceil(($this->maxAttackPoints * $mutliplier));  //round up to the nearest integer
		
	if(self.attackPoints + numOfAp) > self.maxAttackPoints:
            self.attackPoints = self.maxAttackPoints
	else:
	    self.attackPoints = (self.attackPoints + numOfAp)



    def getCriticalHitMultiplier(strengthAttribute):
	multiplier = 0
		
	if strengthAttribute == 1:
            multiplier = 0.01
	elif strengthAttribute == 2:
	    multiplier = 0.02
	elif strengthAttribute == 3:
	    multiplier = 0.03
	elif strengthAttribute == 4:
	    multiplier = 0.04
	elif strengthAttribute == 5:
	    multiplier = 0.05
	elif strengthAttribute == 6:
	    multiplier = 0.06
	elif strengthAttribute == 7:
	    multiplier = 0.07
	elif strengthAttribute == 8:
	    multiplier = 0.08
	elif strengthAttribute == 9:
	    multiplier = 0.09
	elif strengthAttribute >= 10:
	    multiplier = 0.1
		
	return multiplier
	

c = Character()
c.hitPoints = 100
hit = c.hitPoints
print hit
c.getInfo()
c.inventory = ['sword', 'gun','potion','knife']
c.addToInventory('pot')
print c.inventory



