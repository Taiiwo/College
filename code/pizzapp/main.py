import kivy, sys, os, json, re
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.tabbedpanel import TabbedPanel
from kivy.uix.togglebutton import ToggleButton
from kivy.uix.textinput import TextInput
from kivy.app import App
from kivy.lang import Builder
class MainWidget(FloatLayout):
	#define some root vars
	productDB = {}
	selectedProduct = []
	#Size defaults to medium
	selectedSize = 'Medium'
	#Quantity defaults to 1
	selectedQuantity = 1
	#used to store the entire bill. Could be useful later
	#for adding, removing, and editing products from the list
	allProducts = []
	
	#run each time the 'add <itemtype>' button is pressed
	def add_item(self, instance):
		#add our item to the list of items
		self.allProducts.append( {"selected":self.selectedProduct, "quantity":self.selectedQuantity, "size":self.selectedSize} )
		for button in self.buttonArr:
			button.state = 'normal'
		self.selectedProduct = []
		self.selectedQuantity = 1
		self.pizzaQuantity.text = "1"
		self.update_receipt()
		
		
	
	#Monster function that will keep the receipt up to date
	def update_receipt(self):
		self.receipt.text = ""
		for i, product in enumerate(self.allProducts):
			productBill = ""
			for subProduct in product['selected']:
				productBill += "%s $%s\n\t"%(subProduct.text, self.get_price(subProduct.text))
			self.receipt.text += 'Item %s:\n\t%s %s\n\t%s\n'%(i + 1,product['quantity'], product['size'], productBill)
		productBill = ""
		for subProduct in self.selectedProduct:
			productBill += "%s $%s\n\t"%(subProduct.text, self.get_price(subProduct.text))
		self.receipt.text += 'Current Item:\n\t%s %s\n\t%s\n'%(self.selectedQuantity, self.selectedSize, productBill)
		
		
				
	def get_price(self, productName):
		return self.productDB[productName]
	#run each time a pizza topping is selected
	def select_topping(self, instance):
		if instance.state == 'down':
			self.selectedProduct.append(instance)
			
		else:
			for topping in self.selectedProduct:
				if topping.text == instance.text:
					self.selectedProduct.remove(topping)
		self.update_receipt()
	
	#run each time a size is selected
	def select_size(self, instance):
		self.selectedSize = instance.text
		self.update_receipt()
	
	#run each time the quantity is submitted
	def select_quantity(self, instance):
		self.selectedQuantity = instance.text
		self.update_receipt()
	
	#run at start up to initialize the pizza tab
	def pizza_init(self):
		#get price data from file
		priceFile = open ('./prices.json','r')
		self.priceFileRead = json.loads(priceFile.read())
		pizzaTypes = self.priceFileRead["pizzas"]
		for price in self.priceFileRead['pizzaSizes']:
			self.productDB[price[0]] = price[1]
		for side in self.priceFileRead['sides']:
			self.productDB[side[0]] = side[1]
		#create buttons
		lay = GridLayout(cols = 3)
		self.buttonArr = []
		for pizza in pizzaTypes:
			self.productDB[pizza[0]] = pizza[1]
			blay = GridLayout(cols = 2)
			button = ToggleButton(on_press = self.select_topping, text=pizza[0])
			self.buttonArr.append(button)
			blay.add_widget(button)
			lay.add_widget(blay)
		self.pizzaTab.add_widget(lay)
		return 'Pizza'
		
		
		########################
		##	Start sides tab	  ##
		########################
		
	def sides_init(self,instance):
		lay = GridLayout(cols = 3)
		for side in self.priceFileRead['sides']:
			lay.add_widget(ToggleButton(text = side[0], on_press = self.select_side))
		instance.add_widget(lay)
	
	def select_side(self, instance):
		pass
class MainApp(App):
	def build(build):
		return MainWidget()
if __name__ == "__main__":
	MainApp().run()

