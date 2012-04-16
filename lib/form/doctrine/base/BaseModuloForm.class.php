<?php

/**
 * Modulo form base class.
 *
 * @method Modulo getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseModuloForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInputText(),
      'descripcion'     => new sfWidgetFormTextarea(),
      'activo'          => new sfWidgetFormInputText(),
      'tienepublicidad' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 100)),
      'descripcion'     => new sfValidatorString(),
      'activo'          => new sfValidatorInteger(array('required' => false)),
      'tienepublicidad' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('modulo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Modulo';
  }

}
