<html>
	<head>
		<link rel="stylesheet" type="text/css" href="site.css"/>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#calculate').click(function(){
				var card1 = $('#card1').val();
				var card2 = $('#card2').val();
				$('.error').html('');//clearing all error messages

				if((validateCard('card1',card1)==false) || (validateCard('card2',card2) == false)) {
					return false;//validation failed
				}

				var faceValue = getCardValue(card1) + getCardValue(card2);
				$('#blackJackScore').html('BlackJack Score : '+faceValue);
				$('.blackJackScoreBlock').show();

			});

			function validateCard(inputId, card) {
				//PATTERN : 
				//1 : if card input length is 2 : first char should be 2-9 and second S,C,D,H
				//2 : if card input length is 3 : first two chars should be 10 and second S,C,D,H
				var pattern = /^([2-9AKQJ][SCDH])|(10[SCDH])$/i;

				if(pattern.test(card) == false) {
					var errorId = '#'+inputId+'_error';
					$(errorId).html('Invalid Card Input');
					return false;
				}
				return true; 
			}

			function getCardValue(card) {
				card = card.toUpperCase();
				var cardFace = card.replace(/[SCDH]$/i, '');//remove last char S, C, D, H
				var faceValue = 0;
				if(cardFace.length == 1) {
					switch(cardFace) {
						case "K" :
						case "Q" :
						case "J" : 
									faceValue = 10;
									break;
						case "A" :
									faceValue = 11;
									break;
						default  :  
									faceValue = parseInt(cardFace);
					}
					return faceValue;
				}
				return 10;//card length 2 must be 10
			}
		});
		</script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>
					BlackJack Face value
				</h1>
			</div>
			
			<div id="content">
				<h2>
					Enter two cards
				</h2>
				
				<div class="inputGroup"> 
					<span>Card 1:</span>
					<input type="text" name="card1" id="card1" class="cardInput"><br>
					<div class="error" id="card1_error"></div>
				</div>

				<div class="inputGroup"> 
					<span>Card 2:</span>
					<input type="text" name="card2" id="card2" class="cardInput"><br>
					<div class="error" id="card2_error"></div>
				</div>

				<div class="inputGroup" style="clear:both;">
					<input id="calculate" type="button" value="Calculate" class="calcBtn" /> 
				</div>

				<div class="blackJackScoreBlock" style="display:none;">
					<div class="blackJackScore" id="blackJackScore"></div>

				</div>
			</div>
			
		</div>
	</body>
</html>