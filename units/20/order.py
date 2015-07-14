import os
def index(req):
	page = open(os.path.join(os.path.dirname(os.path.abspath(__file__)), 'order.html')).read()
	return page
