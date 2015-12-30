<?php
class RandData {

	private $_school = ['Ecole A', 'Ecole B', 'Ecole C'];

    // génère aléatoirement le nombre d'élèves par sport
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
		} else {
			
			$natation = 0;
			$cyclisme = 0;
		}
		
		$sports = [$boxe, $judo, $football, $natation, $cyclisme];
		
		return $sports;
	}

    //efface les données de la table listschool
	public function deleteTable1(){

        try {

            $bdd = new PDO('mysql:host=localhost; dbname=schools', 'root', '');
            $bdd->exec("SET NAMES 'UTF8'");

        } catch (Exception $e) {

            throw ('Erreur : '. $e->getMessage());
        }

        $deleteTable1 = $bdd->exec('delete from listschool');

       if($deleteTable1 > 0){

            return true;

        } else {

            return false;
        }

    }

    //efface les données de la table sports
    public function deleteTable2(){

        try {

            $bdd = new PDO('mysql:host=localhost; dbname=schools', 'root', '');
            $bdd->exec("SET NAMES 'UTF8'");

        } catch (Exception $e) {

            throw ('Erreur : '. $e->getMessage());
        }

        $deleteTable2 = $bdd->exec('delete from sports');
        $bdd->exec('ALTER TABLE sports AUTO_INCREMENT=0'); //remise à zéro de l'ID

        if($deleteTable2 > 0){

            return true;

        } else {

            return false;
        }

    }

    //enregistre les données dans les tables
	public function persist(){

		try {
			
			$bdd = new PDO('mysql:host=localhost; dbname=schools', 'root', '');
			$bdd->exec("SET NAMES 'UTF8'");
			
		} catch (Exception $e) {
			
			throw ('Erreur : '. $e->getMessage());
		}

       if( $this->deleteTable1() && $this->deleteTable2()){

		    $school = $this->_school;

           // Tableau  : nombre d'élèves par école aléatoire (nombre compris entre 20 et 100)
		   $nb = array(rand(20, 100), rand(20, 100), rand(20, 100));

           // Tableau : nombre d'élèves aléatoire pratiquant un sport
		   $nb_sports = array(rand(20, $nb[0]), rand(20, $nb[1]), rand(20, $nb[2]));

		    for ($i=0; $i<3; $i++){
		
		        $data = $bdd->prepare('INSERT INTO listschool (id, school, nb_pupils, nb_sports_pupils) VALUES (:id, :school, :nb_pupils, :nb_sports_pupils)');
		
		        $dataInsert = $data->execute(array(
					'id'=>$i+1,
					'school'=>$school[$i],
					'nb_pupils'=>$nb[$i],
					'nb_sports_pupils'=>$nb_sports[$i]
					));

                $data->closeCursor();
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

                    $dataSport->closeCursor();
				}
			}

            if($dataInsert === true && $dataInsertSport === true){

                return true;

            } else {

                return false;
            }

       } else {

       return false;

       }
    }
}

