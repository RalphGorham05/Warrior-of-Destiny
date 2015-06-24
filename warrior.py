import kivy
kivy.require('1.8.0') # replace with your current kivy version !

#imports for Screens
from kivy.app import App
from kivy.lang import Builder
from kivy.uix.screenmanager import ScreenManager, Screen, FadeTransition


class HomeScreen(Screen):
    pass

class HelpScreen(Screen):
    pass

class RegisterScreen(Screen):
    pass

class ScreenManagement(ScreenManager):
    pass

presentation = Builder.load_file("warrior.kv")

class WarriorApp(App):
    def build(self):
        return presentation

WarriorApp().run()

