<?php

/* Principal Flow:
 * 1. System of Recomendations by favorite category
 * 1.1 First Filter by Emotions
 * 1.2 Second Filter by califications 
 * 2. System of Recomendations by Similitude of the videos  
 * 3. Select the 6 best Recommendations
 */

//Function for Query to DB
function query($query) {
    $mysqli = new mysqli("localhost", "root", "", "enfasisiv");
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result;
}

//Function for filter by Emoctions
function filterByEmotions($idUser) {
    $query = "SELECT categoria,suma FROM (SELECT idUser,emocion,categoria,COUNT(categoria) AS suma FROM `emociones` GROUP BY categoria HAVING idUser='$idUser' AND emocion>3) AS tabla2 ORDER BY suma DESC";
    $result = query($query);
    if ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row[0];
    } else {
        return "None";
    }
}

//Function for Filter By Califications
function filterByCalifications($idUser) {
    $query = "SELECT categoria,suma FROM (SELECT idUser,calificacion,categoria,COUNT(categoria) AS suma FROM calificaciones GROUP BY categoria HAVING idUser='$idUser' AND calificacion>3) AS tabla2 ORDER BY suma DESC";
    $result = query($query);
    if ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row[0];
    } else {
        return "None";
    }
}

//Main Function of System of Recommendations
function filterBySimilitude($idVideo, $sql) {
    $nowvideo = query("SELECT idVideo,name,palabras_clave,categoria FROM videos WHERE idVideo='$idVideo'")->fetch_array(MYSQLI_NUM);
    $result = query($sql);
    if ($result->num_rows > 0) {
        $vidRecByName = array();
        $vidRecByKeyConcept = array();
        while ($videox = $result->fetch_array(MYSQLI_NUM)) {
            if ($videox[0] != $nowvideo[0]) {
                //By names
                $nameNowVideo = explode(' ', strtolower($nowvideo[1]));
                $nameVideoX = explode(' ', strtolower($videox[1]));
                $diferenceByName = array_diff($nameNowVideo, $nameVideoX);
                $vidRecByName[$videox[0]]= count($nameNowVideo) - count($diferenceByName);
                //By keyconcepts
                $keyConceptsNowVideo = explode(',', strtolower($nowvideo[2]));
                $keyConceptsVideoX = explode(',', strtolower($videox[2]));
                $diferenceByKeyConcept = array_diff($keyConceptsNowVideo, $keyConceptsVideoX);
                $vidRecByKeyConcept[$videox[0]] = count($keyConceptsNowVideo) - count($diferenceByKeyConcept);
            }
        }
        arsort($vidRecByName);
        arsort($vidRecByKeyConcept);
        return(array_slice(array_unique(array_merge(array_slice(array_keys($vidRecByName), 0, 6), array_slice(array_keys($vidRecByKeyConcept), 0, 6))),0,6));
    }
}

//Function that must be call in other php
function mainRecomendation($iduser, $idvideo) {
    $answer1 = filterByEmotions($iduser);
    $answer2 = filterByCalifications($iduser);
    if ($answer1 == "None" & $answer2 == "None") {
        $sql = "SELECT idVideo,name,palabras_clave FROM videos";
    } elseif ($answer1 == "None") {
        $sql = "SELECT idVideo,name,palabras_clave FROM videos WHERE categoria='$answer2'";
    } elseif ($answer2 == "None") {
        $sql = "SELECT idVideo,name,palabras_clave FROM videos WHERE categoria='$answer1'";
    } else {
        $sql = "SELECT idVideo,name,palabras_clave FROM videos WHERE (categoria='$answer1' or categoria='$answer2')";
    }
    return filterBySimilitude($idvideo, $sql);
}

?>
