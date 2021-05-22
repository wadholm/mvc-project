Start game
Present menu to user
IF user resets score
	THEN reset score
ELSEIF user starts game
	THEN start game
Initiate new game of thirteen rounds
Initiate empty scorebox of thirteen rounds
Start round
CASE based on roll
CASE roll 1
	Create new hand
	Add five dices to hand
	Roll dices
	Present hand with graphics
	Save choosen dices
CASE roll 2
	Create new hand
	Reroll five dices minus saved dices
	Add saved dices to hand
	Present hand with graphics
	Save choosen dices
CASE roll 3
	Create new hand
	Reroll five dices minus saved dices
	Add saved dices to hand
	Present hand with graphics
	Save choosen dices to choosen cell in scorebox
CASE roll 4
	Present score from round
	Save score
	Reset roll to 0
	IF scorebox cells are full
		THEN PRESENT result