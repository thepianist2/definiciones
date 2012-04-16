<?php

/**
 * RegistroDefinicion form base class.
 *
 * @method RegistroDefinicion getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRegistroDefinicionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'iddefinicion'   => new sfWidgetFormInputHidden(),
      'textoanterior'  => new sfWidgetFormTextarea(),
      'textoposterior' => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'iddefinicion'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('iddefinicion')), 'empty_value' => $this->getObject()->get('iddefinicion'), 'required' => false)),
      'textoanterior'  => new sfValidatorString(),
      'textoposterior' => new sfValidatorString(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('registro_definicion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RegistroDefinicion';
  }

}
