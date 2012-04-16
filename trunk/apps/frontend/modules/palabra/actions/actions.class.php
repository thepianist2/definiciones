<?php

/**
 * palabra actions.
 *
 * @package    definiciones
 * @subpackage palabra
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class palabraActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->palabras = Doctrine_Core::getTable('Palabra')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->palabra = Doctrine_Core::getTable('Palabra')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->palabra);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PalabraForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PalabraForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($palabra = Doctrine_Core::getTable('Palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $this->form = new PalabraForm($palabra);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($palabra = Doctrine_Core::getTable('Palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $this->form = new PalabraForm($palabra);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($palabra = Doctrine_Core::getTable('Palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $palabra->delete();

    $this->redirect('palabra/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $palabra = $form->save();

      $this->redirect('palabra/edit?id='.$palabra->getId());
    }
  }
}
