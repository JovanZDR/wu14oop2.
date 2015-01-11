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
     
    $('.changeChallenge').html("");
    $(".acceptChallenge").html('');
     
    $('.currentChallenge').append("<h3>This is your challenge:</h3> <br>");
            
    $(".currentChallenge").append("<p>" +data["description"]+"</p>");
    $(".currentChallenge").append("<p>Shoot:" +data["skills"]["shoot"]+"</p>");
    $(".currentChallenge").append("<p>Layup:" +data["skills"]["layup"]+"</p>");
    $(".currentChallenge").append("<p>Rebound:" +data["skills"]["rebound"]+"</p>");
    $(".currentChallenge").append("<p>Defence:" +data["skills"]["defence"]+"</p>");
    
   
    $(".carryOutChallenge").html('');
    $(".carryOutChallenge").append('<button class="likeTheChallenge">But If you like it,PRESS HERE</button>');
    $(".likeTheChallenge").click(function() {
      $(".acceptChallenge").html('');
      $(".carryOutChallenge").html('');

      $(".carryOutChallengeWithCompanion").html('');
      $(".carryOutChallengeWithCompanion").append('<input type="radio" value="PLayWFriend" id="1P" name="PLy"><label>Play with a friend</label><br>');
      $(".carryOutChallengeWithCompanion").append('<input type="radio" value="PLayWithoutFriend" id="2p"name="PLy"><label>Be a brave player and  play alone</label><br>');
      $(".carryOutChallengeWithCompanion").append('<button class="startPlaying">Submit and START PLAYING</button>');
      $(".startPlaying").click(function(){
        var companionChoice = $(".carryOutChallengeWithCompanion input[type= 'radio']:checked").val();
        var companionIndex;
        if (companionChoice == "PLayWFriend" ) {
          companionIndex = 1;
        }
          $.ajax({
          url: "start_challenge.php",
          dataType: "json",
          data: {
              companionIndex: companionIndex
          },
          success:function(data){
            console.log("start Challenge success",data);
            
            $(".currentChallenge").append("<p>The winner is:" +data["result"][0]+"</p>");
            
            
          },
          error: function(data) {
            console.log("start Challenge error: ", data.responseText);
        }
      });

      });
    });
     
            
  











    $(".acceptChallenge").html('');
    $(".acceptChallenge").append('<button class="newestChallenge">If you do not like it, get a new Challenge</button>');
    $(".newestChallenge").click(function() {
    
      $.ajax({
        url: "pick_challenge.php",
        dataType: "json",
        data: {
        
        },
        success:function(data){
          console.log("success",data);
          $(".acceptChallenge").html('');
          $('.currentChallenge').html('');

        
          $('.changeChallenge').append("<h3>This is your challenge:</h3> <br>");
          $(".changeChallenge").append("<p>" +data["description"]+"</p>");
          $(".changeChallenge").append("<p>description:" +data["skills"]["shoot"]+"</p>");
          $(".changeChallenge").append("<p>description:" +data["skills"]["layup"]+"</p>");
          $(".changeChallenge").append("<p>description:" +data["skills"]["rebound"]+"</p>");
          $(".changeChallenge").append("<p>description:" +data["skills"]["defence"]+"</p>");

          $(".carryOutChallenge").html('');
          $(".carryOutChallenge").append('<button class="likeTheChallenge">But If you like it,PRESS HERE</button>');


      changeChallenge(data);
     
            
       
          },
          error: function(data) {
            console.log("startNewGame error: ", data.responseText);
          }

      });
    });


  }


  
  

  selectCharacter();
  


});