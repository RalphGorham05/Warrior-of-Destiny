'''
4/21/15
Monk class
'''

from Character import Character

class Monk(Character):
    def__init__(self, characterLevel, ):
        Character.__init__(self)
        self.aliveStatus = True
        self.attackList = ['attack1', 'attack2', 'attack3']
        self.attributes = {'Strength':'', 'Luck':'', 'IQ':'', 'Stealth':'', 'Speed':'', 'Chi':''}

    def getChi(self):
        chi = self.attributes['Chi']
        return chi
        

        

