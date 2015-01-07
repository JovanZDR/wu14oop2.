$(function() {

  function selectCharacter() {
    
    $(".storyEvent").html('');
    $(".storyOptions").html('');

    
    $(".storyEvent").append("<h2>Create your character:</h2>");

    
    $(".storyOptions").append('<h3>Choose your characters name:</h3>');
    $(".storyOptions").append('<input type="text" id="characterName" placeholder="character name">');

   
    var availableCharacters = ["Michaeljordan","Lebronjames","Kobebryant"];

    $(".storyOptions").append('<h3>Choose your characters class:</h3>');
   
       for (var i = 0; i < availableCharacters.length; i++) {
      $(".storyOptions").append('<input type="radio" value="'+availableCharacters[i]+'" name="characterClass"><label>'+availableCharacters[i]+'</label><br>');
    }
   
    $(".storyOptions").append('<button class="startNewGame">Start new game!</button>');

 
    $(".startNewGame").click(function() {
      var characterName = $("#characterName").val();
      var characterClass = $(".storyOptions input[type='radio']:checked").val();
     
      
      
        $.ajax({
          url: "start_new_game.php",
          dataType: "json",
          data: {
              characterName : characterName,
              characterClass : characterClass
          },
          success:function(data){
            console.log("success: ", data);

          },
          error: function(data) {
            console.log("startNewGame error: ", data.responseText);
          }
        });
      
    });
  }


  selectCharacter();

});