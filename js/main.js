$(function() {

  function selectCharacter() {
    
    $(".storyEvent").html('');
    $(".storyOptions").html('');
     $(".acceptChallenge").html('');

    
    $(".storyEvent").append("<h2>Create your basketball player:</h2>");

    
    $(".storyOptions").append('<h3>Write your  name:</h3>');
    $(".storyOptions").append('<input type="text" id="characterName" placeholder="character name">');

   
    var availableCharacters = ["Michaeljordan","Lebronjames","Kobebryant"];

    $(".storyOptions").append('<h3>Choose your player:</h3>');
   
       for (var i = 0; i < availableCharacters.length; i++) {
      $(".storyOptions").append('<input type="radio" value="'+availableCharacters[i]+'" name="characterClass"><label>'+availableCharacters[i]+'</label><br>');
    }
   
    $(".storyOptions").append('<button class="startNewGame">Start new game!</button>');

 
    $(".startNewGame").click(function() {
      var characterName = $("#characterName").val();
      var characterClass = $(".storyOptions input[type='radio']:checked").val();
     
      if (!characterName || !characterClass) {

      } else {
      
        $.ajax({
          url: "start_new_game.php",
          dataType: "json",
          data: {
              characterName : characterName,
              characterClass : characterClass
          },
          success:function(data){
            console.log("success: ", data);
            printEverythingOut(data);
    

          },
          error: function(data) {
            console.log("startNewGame error: ", data.responseText);
            printEverythingOut();

          }
        });
      }
    });
  }
  function printEverythingOut(data){
    $(".storyEvent").html('');
    $(".storyOptions").html('');

    $(".facts").show();
    $('.facts').append("<h3>These are facts about you:</h3> <br>");
    for(var key in data) {
          if(data.hasOwnProperty(key)) {
            $(".facts").append(key + " : " +data[key] +"<br>");
          }
     
    }
   $(".acceptChallenge").html('');
  $(".acceptChallenge").append('<button class="newChallenge">Get a Challenge</button>');
    $(".newChallenge").click(function() {
      $.ajax({
        url: "pick_challenge.php",
        dataType: "json",
        data: {
        
        },
        success:function(data){
          console.log("success",data);
        changeChallenge(data);
        },
        error: function(data) {
          console.log("startNewGame error: ", data.responseText);
        }
      });
    });

  }
  
 
  function changeChallenge(data){
    $(".acceptChallenge").html('');
     
      $('.currentChallenge').append("<h3>This is your challenge:</h3> <br>");
      for(var key in data) {

          if(data.hasOwnProperty(key)) {
            $(".currentChallenge").append(key + " : " +data[key]+"<br>");
          }
     
      }
  
  $(".acceptChallenge").html('');
  $(".acceptChallenge").append('<button class="newestChallenge">If you do not like it, get a new Challenge</button>');
  $(".newestChallenge").click(function() {
    $('.currentChallenge').append("<h3>This is your challenge:</h3> <br>");
      $.ajax({
        url: "pick_challenge.php",
        dataType: "json",
        data: {
        
        },
        success:function(data){
          console.log("success",data);
          $(".acceptChallenge").html('');
            $('.currentChallenge').html('');
     
         
            for(var key in data) {

            if(data.hasOwnProperty(key)) {
            $(".currentChallenge").append(key + " : " +data[key]+"<br>");
            }
     
            }
        changeChallenge();
           $('.currentChallenge').append("<h3>This is your challenge:</h3> <br>");
        },
        error: function(data) {
          console.log("startNewGame error: ", data.responseText);
        }
      });
    });

}
function printNewChallenge(data){
    
}
  
  

  selectCharacter();
  printEverythingOut(data);


});