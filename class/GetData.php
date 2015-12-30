<?php 
class GetData{

	public function getDataSports(){

		try {

			$bdd = new PDO('mysql:host=localhost; dbname=schools', 'root', '');
			$bdd->exec("SET NAMES 'UTF8'");

		} catch (Exception $e) {

			throw ('Erreur : ' . $e->getMessage());
		}

		for ($i = 1; $i < 4; $i++) {
			$data = $bdd->prepare('SELECT
				SUM(s.judo) AS nbJudo,
				SUM(s.natation) AS nbNatation,
				SUM(s.cyclisme) AS nbCyclisme,
				SUM(s.football) AS nbFootball,
				SUM(s.boxe) AS nbBoxe,
				l.school AS school
	  			FROM listschool l
	  			INNER JOIN sports s
	  			ON s.id_ecole = l.id
	  			WHERE s.id_ecole = ?
				');

			$data->execute(array($i));

			$result = $data ->fetch();

			$tableSport[$result['school']]['judo'] = $result['nbJudo'];
			$tableSport[$result['school']]['natation'] = $result['nbNatation'];
			$tableSport[$result['school']]['cyclisme'] = $result['nbCyclisme'];
			$tableSport[$result['school']]['football'] = $result['nbFootball'];
			$tableSport[$result['school']]['boxe'] = $result['nbBoxe'];
		}

		return $tableSport;

	}

	public function countNumberSports (){

		$tableSport = $this->getDataSports();


		foreach ($tableSport as $key => $array){

			$i = 0;

			foreach ($array as $value) {

				if ($value === 0) {

					$i++;
				}

				$numberSports [$key] = 5-$i;

			}

		}

		return $numberSports;
	}

	public function getDataListSchool(){

		$NumberSports = $this->countNumberSports();

		try {

			$bdd = new PDO('mysql:host=localhost; dbname=schools', 'root', '');
			$bdd->exec("SET NAMES 'UTF8'");

		} catch (Exception $e) {

			throw ('Erreur : ' . $e->getMessage());
		}

		$data = $bdd->query('SELECT school, nb_pupils, nb_sports_pupils FROM listschool');

		$i = 1;

		while ($result = $data->fetch()) {

			$tableSchool[$i]['nameSchool'] = $result['school'];
			$tableSchool[$i]['nb_pupils'] = $result['nb_pupils'];
			$tableSchool[$i]['nb_sports_pupils'] = $result['nb_sports_pupils'];
			$tableSchool[$i]['number_Sports'] = $NumberSports[$result['school']];
			$i++;
		}

		return $tableSchool;

	}

}