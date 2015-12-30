<?php

if (isset($_POST['goData'])) {

    $getData = new GetData();

    $tableSchool = $getData->getDataListSchool();

    $tableSport = $getData->getDataSports();

}
