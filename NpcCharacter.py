'''
NPC Character class
4/10/15
'''

from Character import Character

class NpcCharacter(Character):
    def __init__(self):
        Character.__init__(self)
        self.aliveStatus = True
        self.attributes = {'Strength':'', 'Luck':'', 'IQ':'', 'Stealth':'', 'Speed':'', 'Chi':''}


n = NpcCharacter()
print n.attributes['Strength']
