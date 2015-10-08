<?php
function getConnection() {
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="root";
	$dbname="ratemybrew";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}


function getUsers() {
		$database ='users'; //Set database table here
		$angular = 'data: '; 
		$form = '<div class="form-group"><form novalidate class="simple-form">';
		$sql = "select * FROM ".$database." WHERE id=1 ORDER BY id";
		$insert = "INSERT INTO ".$database." (";
		$insert_values ="(";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$wines = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$db = null;
		$arrlength = count($wines[0]);
		$x=1;
	foreach ($wines as $wine){
			$updatestatement = "UPDATE ".$database." SET "; 
			//print_r(array_keys($wine));
			foreach(array_keys($wine) as $value){
				//echo($value.'<br/>');
				if ($x != $arrlength){ $updatestatement=$updatestatement.$value.'=:'.$value.', ';} else { $updatestatement=$updatestatement.$value.'=:'.$value; }
				$bindings=$bindings.'$stmt->bindParam("'.$value.'", $_POST["'.$value.'"]);<br/>';
				if ($x != $arrlength){ $angular = $angular.' "&'.$value.'=" + user.'.$value.'+';} else {$angular = $angular.' "&'.$value.'=" + user.'.$value;}
				$form = $form."<label>".$value.': </label>'.'<input class="form-control" type="text" ng-model="userdatas[0].'.$value.'" /><br />';
				$insert = $insert.$value.', ';
				if ($x != $arrlength){ $insert_values = $insert_values.':'.$value.', ';} else { $insert_values = $insert_values.':'.$value; }
				$x++;
			}
				$updatestatement=$updatestatement.' WHERE id = :id';
		}//end of for each
		$form=$form.' <input type="button" ng-click="reset()" value="Reset" />
    <input type="submit" ng-click="update(userdatas[0])" value="Save" /></form></div>';
		
		
		echo($updatestatement.'<br/>'.$bindings.'<br>'.$angular.'<br/><br/>'.$insert.$insert_values.')<br/><br/>'.$form);
		
		
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}


getUsers();



?>
