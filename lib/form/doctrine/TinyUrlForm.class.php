<?php

/**
 * TinyUrl form.
 *
 * @package    form
 * @subpackage TinyUrl
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class TinyUrlForm extends BaseTinyUrlForm
{
  public function configure()
  {
    unset($this['hash']);
  }

  public function setValue($field, $value){
    if(!in_array($field, array_keys($this->values))){
      throw new sfException(sprintf('Unkown field" "%s" in "%s" object.', $field, get_class($this)));
    }
    $this->values[$field] = $value;
  }
}
