<?php

/**
 * SubCategoria filter form base class.
 *
 * @package    definiciones
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSubCategoriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idCategoria' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'texto'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'imagen'      => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idCategoria' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'id')),
      'texto'       => new sfValidatorPass(array('required' => false)),
      'imagen'      => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sub_categoria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubCategoria';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'idCategoria' => 'ForeignKey',
      'texto'       => 'Text',
      'imagen'      => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}