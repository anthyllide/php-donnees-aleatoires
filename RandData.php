<?php
class RandData {
	
	public function randSport (){
		$boxe = rand(0,1);
		$judo = rand(0,1);
		$football = rand(0,1);
		
		if($boxe+$judo+$football !== 3){
			$natation = rand(0,1);
				if($boxe+$judo+$football+$natation !== 3){
					$cyclisme = rand(0,1);
				} elseif ($boxe+$judo+$football+$natation == 0){
					$cyclisme = 1;
				} else {
					$cyclisme = 0;
				}
		}else {
			
			$natation = 0;
			$cyclisme = 0;
		}
		
		$sports = [$boxe, $judo, $football, $natation, $cyclisme];
		
		return $sports;
	}
	
	public function randNumberPupils (){
		
		$school = ['Ecole A', 'Ecole B', 'Ecole C'];
		
		$nb = [rand (20,100),rand (20,100),rand (20,100)];
		
		print_r($nb);
		
		$nb_sports = [rand(20,$nb[0]), rand(20,$nb[1]), rand(20,$nb[2])];
		print_r($nb_sports);	
		
		$nb_sports_total = $nb_sports[0]+$nb_sports[1]+$nb_sports[2];
		
		try {
			
			$bdd = new PDO('mysql:host=localhost; dbname=schools', 'root', '');
			$bdd->exec("SET NAMES 'UTF8'");
			
		} catch (Exception $e) {
			
			throw ('Erreur : '. $e -> getMessage());
		}
		
		$eraseTable1 = $bdd->query('delete from listschool');
		$eraseTable2 = $bdd->query('delete from sports');
		
		for ($i=0; $i<3; $i++){
		
		$data = $bdd->prepare('INSERT INTO listschool (id, school, nb_pupils, nb_sports_pupils) VALUES (:id, :school, :nb_pupils, :nb_sports_pupils)');
		
		$dataInsert = $data->execute(array(
					'id'=>$i+1,
					'school'=>$school[$i],
					'nb_pupils'=>$nb[$i],
					'nb_sports_pupils'=>$nb_sports[$i]
					));			
		}
		
			
			for ($i=0; $i<3; $i++){
			
				for($j=1; $j<= $nb_sports[$i]; $j++){
				
					$sportsArray = $this->randSport();
				
					$dataSport = $bdd->prepare('INSERT INTO sports (id_ecole, id_pupil, boxe, judo, football, natation, cyclisme) 
					VALUES (:id_ecole, :id_pupil, :boxe, :judo, :football, :natation, :cyclisme) ');
				
					$dataInsertSport = $dataSport->execute(array(
						'id_ecole'=>$i+1,
						'id_pupil'=>$j,
						'boxe'=>$sportsArray[0],
						'judo'=>$sportsArray[1],
						'football'=>$sportsArray[2],
						'natation'=>$sportsArray[3],
						'cyclisme'=>$sportsArray[4]
					));				
				}
			}
		
		$dataSport->closeCursor();
		return true;
		
	}
		
}
	
	
	
	
