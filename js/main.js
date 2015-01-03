$(function() {

	function startNewGame(){
		$(".storyEvent").html("<h2>Let's play basketball in Sweden!</h2>");
		$(".storyOptions").html('<button class="newGame">Go select your favourite basketball player</button>');

	}
	$(".newGame").click(function(){
		$.ajax({
			url:"get_story_info.php",
			dataType:json,
			data: {
				game_id : 0
			},
			success:selectCharacter,
		})
	});

	function selectCharacter(storyData){
		$(".storyEvent").html("");
		$(".storyOptions").html("");

		$(".storyEvent").append("<h2>Who are you?</h2>")

		$(".storyOptions").append("<h3>Write your name:</h3>")
		$(".storyOptions").append('<input type ="text" id = "startNewGame" placeholder = "players name">')

		var availableCharacters = storyData.available_characters;
		$(".storyOptions").append("<h3>Choose your player class</h3>");
		for (var i = 0; i < availableCharacters.length; i++) {
			$(".storyOptions").append('input type="radio" value="'+availableCharacters[i]+'" name= "playerClass"><label>'+availableCharacters[i]+'</label><br>')
			$(".storyOptions").append('<button class="startNewGame">Start new game!</button>');

			$(".startNewGame").click(function(){
				var characterName = $("#startNewGame").val();
				var characterClass = $('.storyOptions input [type="radio"]:checked').val();

				if(!characterClass || !characterName){

				}else {
					$.ajax({
						url:"start_new_story.php",
						dataType: "json",
						data: {
							game_id : 0,
							createPlayer: {
							"name" : characterName,
							"class" : characterClass
							}
						},
						success:playNextEvent

					});
				}

			});

		}


	}
	
});