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

    #getter functions
    def getHP(self):
        return self.hitPoints
    
    def getAP(self):
        return self.attackPoints

    def getUserName(self):
        return self.userName
    
    def getLevel(self):
        return self.level
    
    def getAliveStatus(self):
        return self.aliveStatus
    
    def getAttackList(self):
        return self.attackList

    #character actions
    #inventory related
    def showInventory(self):
        if len(self.inventory) == 0:
            print 'EMPTY'
        else:
            for item in self.inventory:
                print item


    def getFirstFreeInventorySlot(self):
        idx = ''
        for item in self.inventory:
            if item == None:
                idx = item
                break
        return idx #if idx is null then player inventory is full


    def addToInventory(potion):
	slot = self.getFirstFreeInventorySlot()
	if slot == None:
            print "\nNo room in your inventory!\n"
	    return false;
	    
	else:
	    self.inventory[slot] = potion
	    print "\nItem successfully added to inventory.\n"
	    return true;

    def equip(inventorySlot):
	selection = self.inventory[inventorySlot]
		$type = get_class($selection);
		
		if(selection == null)
			echo "\nThat inventory slot is empty!\n";
		else if(!is_a(selection, "Weapon"))
			echo "\nYou can not equip a {$type} -- only weapons may be equipped.\n";
		else
			echo "\n{$type} now equiped.\n";

c = Character()
c.getInfo()
l = c.getLevel()
print 'level is ' + str(l)

