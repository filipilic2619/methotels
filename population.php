<?php
$population = array("Russian Federation"=>"142098141", "Germany"=>"82562004", "France"=>"64982894", "United Kingdom"=>"63843856", "Italy"=>"61142221", "Spain"=>"47199069", "Ukraine"=>"44646131", "Poland"=>"38221584", "Romania"=>"21579201", "Netherlands"=>"16844195", "Belgium"=>"11183411", "Greece"=>"11125833", "Czech Republic"=>"10777060", "Portugal"=>"10610014", "Hungary"=>"9911396", "Sweden"=>"9693883", "Serbia"=>"9424030", "Belarus"=>"9259666", "Austria"=>"8557761", "Switzerland"=>"8238610", "Bulgaria"=>"7112641", "Denmark"=>"5661723", "Finland"=>"5460592", "Slovakia"=>"5457889", "Norway"=>"5142842", "Ireland"=>"4726856", "Croatia"=>"4255374", "Bosnia and Herzegovina"=>"3819684", "Republic of Moldova"=>"3436828", "Albania"=>"3196981", "Lithuania"=>"2998969", "Macedonia"=>"2109251", "Slovenia"=>"2079085", "Latvia"=>"2031361", "Estonia"=>"1280227", "Montenegro"=>"621556", "Luxembourg"=>"543261", "Malta"=>"431239", "Iceland"=>"336728", "Ireland"=>"87052", "Andorra"=>"80950", "Faeroe Islands"=>"49496", "Monaco"=>"38320", "Liechtenstein"=>"37461", "San Marino"=>"31802", "Gibraltar"=>"29354", "Vatican"=>"800");
$density = array("Russian Federation"=>"8.32", "Germany"=>"231.25", "France"=>"117.83", "United Kingdom"=>"262.84", "Italy"=>"202.92", "Spain"=>"93.28", "Ukraine"=>"73.95", "Poland"=>"118.24", "Romania"=>"90.52", "Netherlands"=>"405.61", "Belgium"=>"366.33", "Greece"=>"84.31", "Czech Republic"=>"136.65", "Portugal"=>"115.35", "Hungary"=>"106.54", "Sweden"=>"21.54", "Serbia"=>"106.65", "Belarus"=>"44.6", "Austria"=>"102.05", "Switzerland"=>"199.56", "Bulgaria"=>"64.13", "Denmark"=>"131.38", "Finland"=>"16.15", "Slovakia"=>"111.31", "Norway"=>"13.35", "Ireland"=>"67.26", "Croatia"=>"75.27", "Bosnia and Herzegovina"=>"74.61", "Republic of Moldova"=>"101.53", "Albania"=>"111.21", "Lithuania"=>"45.93", "Macedonia"=>"82.03", "Slovenia"=>"102.64", "Latvia"=>"31.45", "Estonia"=>"28.39", "Montenegro"=>"45", "Luxembourg"=>"210.08", "Malta"=>"1364.68", "Iceland"=>"3.27", "Ireland"=>"152.19", "Andorra"=>"172.97", "Faeroe Islands"=>"35.38", "Monaco"=>"25718.12", "Liechtenstein"=>"234.13", "San Marino"=>"521.34", "Gibraltar"=>"4892.33", "Vatican"=>"N.A");
$country = $_GET['country'];
$type = $_GET['type'];

if ($type == "json") {
    header("Content-type: application/json");
    $result = array('country' => $country, 'population' => $population[$country], 'density' => $density[$country]);
    echo json_encode($result);
} else if ($type == "xml") {
    header("Content-type: text/xml");
    $result = array($country => 'country', $population[$country] => 'popultaion', $density[$country] => 'density');
    $xml = new SimpleXMLElement('<root/>');
    array_walk_recursive($result, array($xml, 'addChild'));
    print $xml->asXML();
}
?>