<?php
class LogParser {
    public static function getIdsByMessage($xml, $message) {
    	$doc = new DOMDocument(); 
		$doc->preserveWhiteSpace = false; 
		$doc->formatOutput = true; 
		$doc->loadXML($xml);
		$xpath =  new DOMXpath($doc);
		$elements = $xpath->query("//entry[@id]");

		$data = [];
		
		foreach($elements as $element){
			foreach($element->childNodes as $child){
				if($child->nodeValue == $message){
					foreach($element->attributes as $attr){
						// var_dump($attr->value);
						if($attr->name == 'id'){
							array_push($data,$attr->value);
						}
					}
					// var_dump($element->attributes);
					// array_push($data,$element->attributes);
				}
				// var_dump($child);
			}
		}
        return $data;
    }
}

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<log>
    <entry id="1">
        <message>Application started</message>
    </entry>
    <entry id="2">
        <message>Application ended</message>
    </entry>
</log>
XML;
print_r(LogParser::getIdsByMessage($xml, 'Application ended'));