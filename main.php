
<?php
class Player {
    public $name;
    public $blood = 100;
    public $manna = 40;

    function __construct(){
      //echo "Object Player success created \n";
    }
    
    function set_name($name) {
      $this->name = $name;
    }

    function get_name() {
      return $this->name;
    }
    function set_blood($blood) {
      $this->blood = $blood;
    }

    function get_blood() {
      return $this->blood;
    }
    function set_manna($manna) {
      $this->manna = $manna;
    }

    function get_manna() {
      return $this->manna;
    }
  }

  //bikin array 
  	$player_array = array();

$input = "";
  while($input != "exit") {
  	$arrPlayerlength = count($player_array);
    echo "";
    echo "# ===================================== # \n";
    echo "#         Welcome to Battle Arena       # \n";
    echo "# ===================================== # \n";
    echo "# Description                           # \n";
    echo "# 1. type \"new\" to create a character   # \n";
    echo "# 2. type \"start\" to begin the fight    # \n";
    echo "# 3. type \"exit\" to quit the game       # \n";
    echo "# ------------------------------------- # \n";
    echo "# Current Player:                       # \n";
  
    if($arrPlayerlength == 0) {
        echo "No player available \n";
      } else {
      	foreach ($player_array as $key => $v1) {
              echo $key;
              echo "\n";
          }
      }

    echo "# * Max player 2 or 3                   # \n";
    echo "# ------------------------------------- # \n";
    $input = readline("input: ");

    switch ($input) {
    case "new":
    	if ($arrPlayerlength < 3){
          $new_player = new Player; //this will display "Object Player success created"
          $name = readline("Please input player name : ");
          $new_player->set_name($name);
            //array_push($player_array, $new_player); //will new player to array player
            $player_array[$name]= $new_player;
        }else{  
          #jika lebih dari 3 pemain
          echo "Can't add more player, Max. player reached!\n";
          echo "Press any key to continue...\n";
          readline();
        }
        break;
    case "start":
        #clear console
    	//ncurses_clear();
	      echo "";
	      echo "# ===================================== # \n";
	      echo "#         Welcome to Battle Arena       # \n";
	      echo "# ===================================== # \n";
	      echo "Battle Start: \n";
	      $attacker = readline("Who will attack? ");

	      while(array_key_exists($attacker,$player_array) == false) {
	      	//$player_array[$attacker];
	      	echo "Player not found!";
	      	$attacker = readline("Who will attack? ");
	      } 

	      
	      $victim = readline("Who will get attacked? ");
	      while(array_key_exists($attacker,$player_array) == false) {
	      	//$player_array[$attacker];
	      	echo "Player not found!";
	      	$victim = readline("Who will get attacked? ");
	      } 
	      
	      #yg diserang bloodnya kurang 20
	      $player_array[$victim]->set_blood(($player_array[$victim]->get_blood() - 20));

	      echo "Description:";
	      echo "# ", $player_array[$attacker]->get_name(), " | manna: ", $player_array[$attacker]->get_manna(), " | blood: ", $player_array[$attacker]->get_blood(), " # \n";
	      echo "# ", $player_array[$victim]->get_name(), " | manna: ", $player_array[$victim]->get_manna(), " | blood: ", $player_array[$victim]->get_blood(), " #";
	      //echo "#{attacker.name} : = #{attacker.manna}, blood = #{attacker.blood}"

	      if ($player_array[$victim]->get_blood() <= 0 || $player_array[$attacker]->get_blood () == 0){
	        echo "Game Over \n";
	      }
	      
        break;
    default:
        echo "function not allowed \n";
    }
}






?>
