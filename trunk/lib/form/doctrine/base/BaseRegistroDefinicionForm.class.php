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
      'idDefinicion'   => new sfWidgetFormInputHidden(),
      'textoAnterior'  => new sfWidgetFormInputText(),
      'textoPosterior' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idDefinicion'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idDefinicion')), 'empty_value' => $this->getObject()->get('idDefinicion'), 'required' => false)),
      'textoAnterior'  => new sfValidatorPass(),
      'textoPosterior' => new sfValidatorPass(),
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
