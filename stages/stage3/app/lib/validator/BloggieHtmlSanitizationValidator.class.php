<?php

  /**
   * A very primitive validator that sanitizes given HTML by running
   * htmlentities() over it. 

   * DO NOT USE THIS VALIDATOR IN YOUR APPLICATIONS. IT EXISTS FOR
   * DEMONSTRATIONAL PURPOSE ONLY. IT IS WRONG AND HARMFUL TO STORE
   * HTML ENTITIES IN THE DATABASE.
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