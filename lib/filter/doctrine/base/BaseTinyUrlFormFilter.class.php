<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * TinyUrl filter form base class.
 *
 * @package    filters
 * @subpackage TinyUrl *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseTinyUrlFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'hash' => new sfWidgetFormFilterInput(),
      'url'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'hash' => new sfValidatorPass(array('required' => false)),
      'url'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tiny_url_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TinyUrl';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'hash' => 'Text',
      'url'  => 'Text',
    );
  }
}