<?php

/**
 * Definicion form base class.
 *
 * @method Definicion getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDefinicionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpalabra'  => new sfWidgetFormInputHidden(),
      'texto'      => new sfWidgetFormTextarea(),
      'imagen'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idpalabra'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpalabra')), 'empty_value' => $this->getObject()->get('idpalabra'), 'required' => false)),
      'texto'      => new sfValidatorString(),
      'imagen'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('definicion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Definicion';
  }

}
