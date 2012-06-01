<?php

/**
 * test actions.
 *
 * @package    definiciones
 * @subpackage test
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
            if ($this->getUser()->isAuthenticated()){
    $this->tests = Doctrine_Core::getTable('Test')
      ->createQuery('a')
      ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())       
      ->execute();
            }else{
                $this->test=null;
            }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->test = Doctrine_Core::getTable('Test')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->test);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TestForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TestForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($test = Doctrine_Core::getTable('Test')->find(array($request->getParameter('id'))), sprintf('Object test does not exist (%s).', $request->getParameter('id')));
    $this->form = new TestForm($test);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($test = Doctrine_Core::getTable('Test')->find(array($request->getParameter('id'))), sprintf('Object test does not exist (%s).', $request->getParameter('id')));
    $this->form = new TestForm($test);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($test = Doctrine_Core::getTable('Test')->find(array($request->getParameter('id'))), sprintf('Object test does not exist (%s).', $request->getParameter('id')));
    $test->delete();

    $this->redirect('test/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $test = $form->save();

      $this->redirect('test/edit?id='.$test->getId());
    }
  }
}
