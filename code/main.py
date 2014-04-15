
import kivy, sys, os
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.label import Label
from kivy.uix.popup import Popup
from kivy.app import App
from kivy.lang import Builder
class MainWidget(FloatLayout):
	def getFile(self):
		if len(sys.argv) >= 1:
			try:
				f = open(sys.argv[1] ,'r')
				return f.read()
			except:
				return ""
			
	def loadKivy(self, kvBox, buildBox):
		kvLang = kvBox.text
		try:
			buildBox.clear_widgets()
			buildBox.add_widget(Builder.load_string(kvLang))
		except:
			buildBox.add_widget(Label(text="Error"))
	def loadFromFile(self):
		self.popup = LoadFromFile()
		print dir(self)
		print "Made popup"
		self.add_widget(self.popup)
	def loadPath(self, path):
		print "debug"
#		try:
		f = open(str(path).encode('ascii','ignore') ,'r')
#		except:
#			return False
		self.kvBox.text = f.read()
		print dir(self)
		self.remove_widget(self.popup)
class LoadFromFile(Popup):
	def loadFromFile(self,file):
		path = os.path.join(file.path, file.selection[0])
		MainWidget.loadPath(MainWidget(),path)
class MainApp(App):
	def build(build):
		return MainWidget()
if __name__ == "__main__":
	MainApp().run()
