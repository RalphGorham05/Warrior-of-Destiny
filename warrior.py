import kivy
kivy.require('1.8.0') # replace with your current kivy version !

#imports for Screens
from kivy.app import App
from kivy.lang import Builder
from kivy.uix.screenmanager import ScreenManager, Screen


from kivy.graphics import Color, Rectangle
from kivy.uix.floatlayout import FloatLayout

from kivy.properties import ObjectProperty, StringProperty


class CustomLayout(FloatLayout):

    def __init__(self, **kwargs):
        # make sure we aren't overriding any important functionality
        super(CustomLayout, self).__init__(**kwargs)


class ScreenManagement(ScreenManager):
    pass

class HomeScreen(Screen):
    pass

class HelpScreen(Screen):
    pass

class RegisterScreen(Screen):

    def validate_password(default,self, pw, pw_confirm):
        if len(pw.text) > 0:
            if (pw.text == pw_confirm.text):
                self.font_size = 50
                self.background_color = (0,128,0,1)
                return True
                               
                
            else:
                self.text = 'Password do not match'
                self.disabled = True
                self.background_color = (255,0,0,1)
                

    def reset(default, button):
        button.disabled = False
        button.background_color = (1,0,1,1)
        button.text = 'Register'

    def register(default):
        sm.current = 'home'
        
    

class ContinueScreen(Screen):
    pass

class StoryScreen(Screen):
    pass
    

sm = ScreenManager()
sm.add_widget(StoryScreen(name='story'))
sm.add_widget(HomeScreen(name='home'))


def screenChange(sm,new):
    sm.current = new
  



presentation = Builder.load_file("warrior.kv")

class WarriorApp(App):
    def build(self):
        return presentation

WarriorApp().run()

