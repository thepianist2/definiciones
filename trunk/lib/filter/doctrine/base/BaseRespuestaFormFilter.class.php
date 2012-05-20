<?php

/**
 * Respuesta filter form base class.
 *
 * @package    definiciones
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRespuestaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idTest'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Test'), 'add_empty' => true)),
      'textoPalabra'      => new sfWidgetFormFilterInput(),
      'textoRespuesta'    => new sfWidgetFormFilterInput(),
      'respuestaCorrecta' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idTest'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Test'), 'column' => 'id')),
      'textoPalabra'      => new sfValidatorPass(array('required' => false)),
      'textoRespuesta'    => new sfValidatorPass(array('required' => false)),
      'respuestaCorrecta' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('respuesta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Respuesta';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'idTest'            => 'ForeignKey',
      'textoPalabra'      => 'Text',
      'textoRespuesta'    => 'Text',
      'respuestaCorrecta' => 'Boolean',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
