import kivy
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.label import Label
from kivy.app import App
from kivy.lang import Builder
class MainWidget(FloatLayout):
	def loadKivy(self, kvBox, buildBox):
		kvLang = kvBox.text
		try:
			buildBox.clear_widgets()
			buildBox.add_widget(Builder.load_string(kvLang))
		except:
			buildBox.add_widget(Label(text="Error"))
class MainApp(App):
	def build(build):
		return MainWidget()
if __name__ == "__main__":
	MainApp().run()
