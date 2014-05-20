import kivy, sys, os
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.tabbedpanel import TabbedPanel
from kivy.uix.button import Button
from kivy.uix.textinput import TextInput
from kivy.app import App
from kivy.lang import Builder
class MainWidget(FloatLayout):
	def pizzaInit(self):
		pizzaTypes = ('Hawaiian','Tuna','Illuminati',
				'BBQ','Kangaroo','Bacon','Pepperoni',
				'Whale','Garlic','Cheese','Ostrich',
				'Chocolate','Meat Feast','Aligator',
				'Vegan')
		lay = GridLayout(cols = 3)
		for pizza in pizzaTypes:
			blay = GridLayout(cols = 2)
			blay.add_widget(Button(text=pizza, size_hint = (0.8,1)))
			blay.add_widget(
					TextInput(
							size_hint = (0.2,1),
							text = "0",
							input_filter = 'int',
							multiline = False
					))
			lay.add_widget(blay)
		self.pizzaTab.add_widget(lay)
		return 'Pizza'
class MainApp(App):
	def build(build):
		return MainWidget()
if __name__ == "__main__":
	MainApp().run()
