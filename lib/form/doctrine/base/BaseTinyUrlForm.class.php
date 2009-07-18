<?php

/**
 * TinyUrl form base class.
 *
 * @package    form
 * @subpackage tiny_url
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseTinyUrlForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'hash' => new sfWidgetFormInput(),
      'url'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorDoctrineChoice(array('model' => 'TinyUrl', 'column' => 'id', 'required' => false)),
      'hash' => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'url'  => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('tiny_url[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TinyUrl';
  }

}
