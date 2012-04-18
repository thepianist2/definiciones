<?php

/**
 * PalabraSubcategoria form base class.
 *
 * @method PalabraSubcategoria getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePalabraSubcategoriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idpalabracategoria' => new sfWidgetFormInputHidden(),
      'texto'              => new sfWidgetFormTextarea(),
      'imagen'             => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idpalabracategoria' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idpalabracategoria')), 'empty_value' => $this->getObject()->get('idpalabracategoria'), 'required' => false)),
      'texto'              => new sfValidatorString(),
      'imagen'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('palabra_subcategoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PalabraSubcategoria';
  }

}
