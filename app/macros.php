<?php

Form::macro('date', function($name, $value = NULL, $attrs = array())
{
  $item = '<input type="date" name="'. $name .'" ';
 
  $value = Form::getValueAttribute($name, $value);

  if ($value) {
    $item .= 'value="'. $value .'" ';
  }
 
  if (is_array($attrs)) {
    foreach ($attrs as $a => $v)
      $item .= $a .'="'. $v .'" ';
  }
  $item .= ">";
 
  return $item;
});

?>