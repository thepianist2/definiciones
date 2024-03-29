<?php

/**
 * Funcionalidad filter form base class.
 *
 * @package    definiciones
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFuncionalidadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idmodulo'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Modulo'), 'add_empty' => true)),
      'credencial'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'aplicacion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'idmodulo'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Modulo'), 'column' => 'id')),
      'credencial'  => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'aplicacion'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('funcionalidad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Funcionalidad';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'idmodulo'    => 'ForeignKey',
      'credencial'  => 'Text',
      'descripcion' => 'Text',
      'aplicacion'  => 'Text',
    );
  }
}
