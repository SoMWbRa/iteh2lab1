<?php
#xml generat0r

// function defination to convert array to xml
function array_to_xml($data, &$xml_data)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                $key = 'item' . $key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key", htmlspecialchars("$value"));
        }
    }
}

// creating object of SimpleXMLElement
$xml_data = new SimpleXMLElement('<?xml version="1.0"?><nurse></nurse>');
array_to_xml($data, $xml_data);
echo $xml_data->asXML();
?>
