<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'idPerfil'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'), 'add_empty' => false)),
      'login'      => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'nombre'     => new sfWidgetFormInputText(),
      'apellidos'  => new sfWidgetFormInputText(),
      'facebook'   => new sfWidgetFormInputText(),
      'twitter'    => new sfWidgetFormInputText(),
      'activo'     => new sfWidgetFormInputCheckbox(),
      'validado'   => new sfWidgetFormInputCheckbox(),
      'borrado'    => new sfWidgetFormInputCheckbox(),
      'lang'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idPerfil'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'))),
      'login'      => new sfValidatorString(array('max_length' => 150)),
      'password'   => new sfValidatorString(array('max_length' => 40)),
      'email'      => new sfValidatorString(array('max_length' => 150)),
      'nombre'     => new sfValidatorString(array('max_length' => 100)),
      'apellidos'  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'facebook'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'twitter'    => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'activo'     => new sfValidatorBoolean(array('required' => false)),
      'validado'   => new sfValidatorBoolean(array('required' => false)),
      'borrado'    => new sfValidatorBoolean(array('required' => false)),
      'lang'       => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Usuario', 'column' => array('login'))),
        new sfValidatorDoctrineUnique(array('model' => 'Usuario', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
