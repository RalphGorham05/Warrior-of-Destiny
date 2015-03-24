'''
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

