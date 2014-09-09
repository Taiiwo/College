var suits = ['&spades;','&hearts;','&diams;','&clubs;'];
var faces = ['J','Q','K','A'];
var cards = [];
function newPack(){// make a list of all the cards
	for (var suit = 0; suit < suits.length; suit++){
		for (var i = 1; i <= 10; i++){
			cards.push(i + suits[suit]);
		}
		for (var face = 0; face < faces.length; face++){
			cards.push(faces[face] + suits[suit]);
		}
	}
	return cards;
}
function updateCards(cards){// rewrites the cards to the main page in their current order
	for (var card = 0; card < cards.length; card++){
		$('#cards').append('<p onclick="split(' + cards[card][:-1] + ')">' + cards[card] + '</p>');
	}
}
function onPageLoad(){
	cards = newPack();// make a new deck
	updateCards(cards);// write deck to page
}
