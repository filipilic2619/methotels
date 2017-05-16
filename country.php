<?php

    $capitals = array("Albania" => "Tirana", "Andorra" => "Andorra la Vella", "Austria" => "Vienna", "Belarus" => "Minsk", "Belgium" => "Brussels", "Bosnia and Herzegovina" => "Sarajevo", "Bulgaria" => "Sofia", "Croatia" => "Zagreb", "Cyprus" => "Nicosia", "Czech Republic" => "Prague", "Denmark" => "Copenhagen", "England" => "London", "Estonia" => "Tallin", "Finland" => "Helsinki", "France" => "Paris", "Georgia" => "Tbilisi", "Germany" => "Berlin", "Greece" => "Athens", "Hungary" => "Budapest", "Iceland" => "Reykjavik", "Ireland" => "Dublin", "Italy" => "Rome", "Latvia" => "Riga", "Liechtenstein" => "Vaduz", "Lithuania" => "Vilnius", "Luxembourg" => "Luxembourg", "Macedonia" => "Skopje", "Malta" => "Valletta", "Moldova" => "Chisinau", "Monaco" => "Monaco", "Montenegro" => "Podgorica", "The Netherlands" => "Amsterdam", "N. Ireland" => "Belfast", "Norway" => "Oslo", "Poland" => "Warsaw", "Portugal" => "Lisbon", "Romania" => "Bucharest", "Russian Federation" => "Moscow", "San Marino" => "San Marino", "Scotland" => "Edinburgh", "Serbia" => "Belgrade", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Spain" => "Madrid", "Sweden" => "Stockholm", "Switzerland" => "Bern", "Ukraine" => "Kiev", "Wales" => "Cardiff");
    $country = $_POST['country'];
    $type = $_POST['type'];

    if ($type == "json") {
        header("Content-type: application/json");
        $result = array('country' => $country, 'capital' => $capitals[$country]);
        echo json_encode($result);
    } else if ($type == "xml") {
        header("Content-type: text/xml");
        $result = array($country => 'country', $capitals[$country] => 'capital');
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($result, array($xml, 'addChild'));
        print $xml->asXML();
    }


?>