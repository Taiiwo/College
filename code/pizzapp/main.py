import kivy, sys, os
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.tabbedpanel import TabbedPanel
from kivy.uix.button import Button
from kivy.uix.textinput import TextInput
from kivy.app import App
from kivy.lang import Builder
class MainWidget(FloatLayout):
	pizzaTypes = [	('Hawaiian'	,	3.40),
			('Tuna'		,	3.40),
			('Illuminati'	,	3.40),
			('BBQ'		,	3.60),
			('Kangaroo'	,	3.60),
			('Bacon'	,	3.60),
			('Pepperoni'	,	3.80),
			('Whale'	,	7.90),
			('Garlic'	,	3.40),
			('Cheese'	,	3.40),
			('Ostrich'	,	5.60),
			('Chocolate'	,	4.60),
			('Meat Feast'	,	5.60),
			('Aligator'	,	5.60),
			('Vegan'	,	3.40)]
	def addItem(self,name,price):
		self.receipt.text += "%s: $%s"%(name, price)
class MainApp(App):
	def build(build):
		return MainWidget()
if __name__ == "__main__":
	MainApp().run()
