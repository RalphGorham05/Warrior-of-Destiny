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

    '''not needed
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
    '''

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
	

c = Character()
c.hitPoints = 100
hit = c.hitPoints
print hit
c.getInfo()
c.inventory = ['sword', 'gun','potion','knife']
c.addToInventory('pot')
print c.inventory



