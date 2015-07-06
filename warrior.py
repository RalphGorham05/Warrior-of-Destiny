import kivy
kivy.require('1.8.0') # replace with your current kivy version !

#imports for Screens
from kivy.app import App
from kivy.lang import Builder
from kivy.uix.screenmanager import ScreenManager, Screen


from kivy.graphics import Color, Rectangle
from kivy.uix.floatlayout import FloatLayout


class CustomLayout(FloatLayout):

    def __init__(self, **kwargs):
        # make sure we aren't overriding any important functionality
        super(CustomLayout, self).__init__(**kwargs)


class HomeScreen(Screen):
    pass

class HelpScreen(Screen):
    pass

class RegisterScreen(Screen):
    pass

class ContinueScreen(Screen):
    pass

class ScreenManagement(ScreenManager):
    pass

presentation = Builder.load_file("warrior.kv")

class WarriorApp(App):
    def build(self):
        return presentation

WarriorApp().run()

