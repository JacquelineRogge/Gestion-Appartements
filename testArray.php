<?php
    $arrNoSort = [];

    $arrNoSort[0] = array('nom' => 'Zed', 'prenom' => 'Test', 'c' => 3, 'd' => 4);
    $arrNoSort[1] = array('nom' => 'Ann', 'prenom' => 'Test', 'c' => 3, 'd' => 4);
    $arrNoSort[2] = array('nom' => 'Qi', 'prenom' => 'Bane', 'c' => 3, 'd' => 4);
    $arrNoSort[3] = array('nom' => 'Ann', 'prenom' => 'Cole', 'c' => 1, 'd' => 4);

    echo "<h1>tableau multidimentionnel non trié:\n</h1>";
    var_dump($arrNoSort);

    $colA = array_column($arrNoSort, 'nom');
    $colB = array_column($arrNoSort, 'prenom');

    echo "<h1>tableau multidimentionnel trié:\n</h1>";
    array_multisort($colA, SORT_DESC, $colB, SORT_ASC, $arrNoSort);

    var_dump($arrNoSort);

    //Code exemple (par Carl Cloutier Gosselin)
?>   

