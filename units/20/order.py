import os
def index(req):
    # serve order.html instead
    page = open(
        os.path.join(os.path.dirname(os.path.abspath(__file__)), 'order.html')
    ).read()
    return page
def order(req, name, email, details):
    r = "Thanks for ordering, %s" % (name)
    return r
