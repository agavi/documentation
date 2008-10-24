<?php

  /**
   * A very primitive validator that sanitizes given HTML by running
   * htmlentities() over it. 
   */
class BloggieHtmlSanitizationValidator extends AgaviValidator
{
  public function validate()
  {
    $input =& $this->getData($this->getArgument());
    $input = htmlentities($input);
    
    $this->export($input);

    return true;
  }
}