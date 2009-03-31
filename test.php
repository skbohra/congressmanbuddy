<?php

include 'tablereader.php';
include 'XML_HTMLSax.php';
$handler =& new TableReader;
$parser =& new XML_HTMLSax;

// set the parser to callback on the TableReader
$parser->set_object($handler);
$parser->set_element_handler('tagOpen','tagClose');
$parser->set_data_handler('tagData');

// extract the HTML table to a string
$content = file_get_contents('table.html');

// parse the table content
$parser->parse($content);

// get the extracted data
$items = $table->getItems();

$items[0]['title']; // prints 'Title of Item 1'
$items[1]['author']; // prints 'Richard'

// loop it out
foreach($items as $item) {
  echo $item['title'];
  echo $item['description'];
}
?>
