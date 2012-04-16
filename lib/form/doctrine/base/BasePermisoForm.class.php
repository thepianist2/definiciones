<?php

/**
 * Permiso form base class.
 *
 * @method Permiso getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePermisoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idperfil'        => new sfWidgetFormInputHidden(),
      'idfuncionalidad' => new sfWidgetFormInputHidden(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idperfil'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idperfil')), 'empty_value' => $this->getObject()->get('idperfil'), 'required' => false)),
      'idfuncionalidad' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idfuncionalidad')), 'empty_value' => $this->getObject()->get('idfuncionalidad'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Permiso';
  }

}
