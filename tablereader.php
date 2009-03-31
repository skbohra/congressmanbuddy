<?

class TableReader {
  var $items = array( );
  var $item = array( );
	
  function TableReader( ) { }

  /**
  * returns extracted rows/items as an array
  */
  function getItems( ) {
    return $this->items;
  }
	
  /**
  * gets the value of a class attribute
  */
  function getClass($attrs) {
    foreach($attrs as $name=>$value) {
      if ($name == 'class') {
        return $value;
      } else {
        return null;
      }
    }
  }

  /**
  * open tag element handler
  */
  function tagOpen(&$parser,$name,$attrs) {
    switch($name) {
      case 'tr':
        $this->item['id'] = $attrs['id'];
        break;
      case 'td':
        if ($class = $this->getClass($attrs)) {
          $this->currentKey = $class;
        }
        break;
    }
  }

  /**
  * tag data element handler (reads contents of the tag)
  */
  function tagData(&$parser,$data) {
    if (isset($this->currentKey)) {
      $this->item[$this->currentKey] = $data;
      unset($this->currentKey);
    }
  }
	
  /**
  * close tag element handler
  */
  function tagClose(&$parser,$name,$attrs) {
    if ($name == 'tr') {
      $this->items[] = $this->item;
      $this->item = array();
    }
  }

}
?>
