<?php

/**
 * Users actions.
 *
 * @package    test
 * @subpackage Users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->userss = Doctrine_Core::getTable('Users')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->users);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UsersForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UsersForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('id'))), sprintf('Object users does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsersForm($users);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('id'))), sprintf('Object users does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsersForm($users);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($users = Doctrine_Core::getTable('Users')->find(array($request->getParameter('id'))), sprintf('Object users does not exist (%s).', $request->getParameter('id')));
    $users->delete();

    $this->redirect('Users/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $users = $form->save();

      $this->redirect('Users/edit?id='.$users->getId());
    }
  }
}
