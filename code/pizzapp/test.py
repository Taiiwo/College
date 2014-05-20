pizzaTypes = [  ('Hawaiian'     ,       3.40),
		('Tuna'	 	,       3.40),
		('Illuminati'   ,       3.40),
		('BBQ'	  	,       3.60),
		('Kangaroo'     ,       3.60),
		('Bacon'	,       3.60),
		('Pepperoni'    ,       3.80),
		('Whale'	,       7.90),
		('Garlic'       ,       3.40),
		('Cheese'       ,       3.40),
		('Ostrich'      ,       5.60),
		('Chocolate'    ,       4.60),
		('Meat Feast'   ,       5.60),
		('Aligator'     ,       5.60),
		('Vegan'	,       3.40)]
for i in pizzaTypes:
	print """
Button:
	text: \"%s\"
	on_press: addItem(%s,%s)
"""%(i[0],i[0],i[1])
