<?php

/**
 * SubCategoria form base class.
 *
 * @method SubCategoria getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubCategoriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idCategoria' => new sfWidgetFormInputHidden(),
      'texto'       => new sfWidgetFormInputText(),
      'imagen'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idCategoria' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idCategoria')), 'empty_value' => $this->getObject()->get('idCategoria'), 'required' => false)),
      'texto'       => new sfValidatorPass(),
      'imagen'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sub_categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubCategoria';
  }

}
