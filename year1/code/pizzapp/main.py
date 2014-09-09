import kivy, sys, os, json, re, subprocess, webbrowser
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.tabbedpanel import TabbedPanel
from kivy.uix.togglebutton import ToggleButton
from kivy.uix.button import Button
from kivy.uix.textinput import TextInput
from kivy.app import App
from kivy.lang import Builder
class MainWidget(FloatLayout):
	#define some root vars
	productDB = {}

	selectedProduct = []
	#Size defaults to medium
	selectedSize = 'Medium'
	#Crust type defaults to Deep Pan
	selectedCrust = 'Deep Pan'
	#Quantity defaults to 1
	selectedQuantity = 1
	#used to store the entire bill. Could be useful later
	#for adding, removing, and editing products from the list
	allProducts = []
	
	def is_number(self, s):
		try:
			float(s)
			return True
		except ValueError:
			return False
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
		self.receipt.text = "Insert pizza place name here\n"
		total = float(0)
		for i, product in enumerate(self.allProducts):
			productBill = ""
			subTotal = float(0)
			for subProduct in product['selected']:
				subTotal += self.get_price(subProduct.text)
				productBill += "%s $%s\n\t"%(subProduct.text, self.get_price(subProduct.text))
			self.receipt.text += 'Item %s:\n\t%s %s\n\t%s\n\tSubtotal: $%s\n'%(i + 1,product['quantity'], product['size'], productBill, float(subTotal * float(product['quantity'])))
			total += subTotal * float(product['quantity'])
		productBill = ""
		subTotal = float(0)
		for subProduct in self.selectedProduct:
			subTotal += self.get_price(subProduct.text)
			productBill += "%s $%s\n\t"%(subProduct.text, self.get_price(subProduct.text))
		self.receipt.text += 'Current Item:\n\t%s %s %s\n\t%s\n\tSubtotal: $%s\n'%(self.selectedQuantity, self.selectedSize, self.selectedCrust, productBill, float(subTotal * float(self.selectedQuantity)))
		total += subTotal * float(self.selectedQuantity)
		self.receipt.text += 'Total: $%s'%(total)
		
				
	def get_price(self, productName):
		return float(self.productDB[productName])
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
	
	#run each time a crust type is selected
	def select_crust(self, instance):
		self.selectedCrust = instance.text
		self.update_receipt()
	
	#run each time the quantity is submitted
	def select_quantity(self, instance):
		instance.text = u"%s"%(instance.text)
		if not self.is_number(instance.text):
			instance.text = u"1"
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
		for side in self.priceFileRead['drinks']:
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
		
	def clear_receipt(self):
		if len(self.allProducts) > 0:
			self.allProducts.remove(self.allProducts[len(self.allProducts) - 1])
			self.update_receipt()
		
		############################
		##	Start sides tab	  ##
		############################
		
	def sides_init(self,instance):
		lay = GridLayout(cols = 3)
		for side in self.priceFileRead['sides']:
			lay.add_widget(Button(text = side[0], on_press = self.select_side))
		instance.add_widget(lay)
	
	def select_side(self,instance):
		appended = 0
		for product in self.allProducts:
			if product['selected'][0].text == instance.text:
				appended = 1
				product['quantity'] += 1
		if appended == 0:
			self.allProducts.append({"selected": [instance,], "quantity": 1, "size":"Side"})
		self.update_receipt()
		############################
		##    Start drinks tab    ##
		############################
	def drinks_init(self, instance):
		lay = GridLayout(cols = 3)
		for side in self.priceFileRead['drinks']:
			lay.add_widget(Button(text = side[0], on_press = self.select_drink))
		instance.add_widget(lay)
	
	def select_drink(self,instance):
		appended = 0
		for product in self.allProducts:
			if product['selected'][0].text == instance.text:
				appended = 1
				product['quantity'] += 1
		if appended == 0:
			self.allProducts.append({"selected": [instance,], "quantity": 1, "size":"Drink"})
		self.update_receipt()
	def print_receipt(self):
		try:
			subprocess.call('lp',self.receipt.text)
		except:
			print "Unable to find printer. Please ensure cups is installed correctly and your printer is installed and set to default"
	def display_help(self):
		url = "http://github.com/Taiiwo/College"
		webbrowser.open_new_tab(url)
class MainApp(App):
	def build(build):
		return MainWidget()
if __name__ == "__main__":
	MainApp().run()

