<?php

/**
 * Customers actions.
 *
 * @package    test
 * @subpackage Customers
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CustomersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
//    $this->getResponse()->setContentType('application/json');/
//    $data_array=array('test'=>1);
/*Doctrine_Core::getTable('Customers')
      ->createQuery('a')
      ->execute();*/
//    $data_json=json_encode($data_array);
//     return $this->renderText($data_json); 
    $this->customerss = Doctrine_Core::getTable('Customers')
      ->createQuery('a')
      ->execute();
//    $this->setTemplate('index','Customers');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->customers = Doctrine_Core::getTable('Customers')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->customers);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CustomersForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CustomersForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($customers = Doctrine_Core::getTable('Customers')->find(array($request->getParameter('id'))), sprintf('Object customers does not exist (%s).', $request->getParameter('id')));
    $this->form = new CustomersForm($customers);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($customers = Doctrine_Core::getTable('Customers')->find(array($request->getParameter('id'))), sprintf('Object customers does not exist (%s).', $request->getParameter('id')));
    $this->form = new CustomersForm($customers);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($customers = Doctrine_Core::getTable('Customers')->find(array($request->getParameter('id'))), sprintf('Object customers does not exist (%s).', $request->getParameter('id')));
    $customers->delete();

    $this->redirect('Customers/index');
  }

  public function executeLogin(sfWebRequest $request)
  {
    $this->form = new sfForm();
    $this->form->setWidgets(array(
     'username' => new sfWidgetFormInput(),
     'password' => new sfWidgetFormInputPassword()
    ));
    $this->form->getWidgetSchema()->setNameFormat('login[%s]');
    $this->setTemplate('login');

    $params = array();
    $content = $request->getContent();
    if (!empty($content))
    {
        $params = json_decode($content, 'true');
    }
    
    if(count($params)>0)
	{
	    $username=$params['username'];
	    $password=$params['password'];
	}
    else{
	    $username=$request->getParameter('login')['username'];
	    $Password=$request->getParameter('login')['password'];
	}


    $q = Doctrine_Core::getTable('Users')->createQuery('u')->where('u.username = ?', $request->getParameter('login')['username']);
    $user = $q->fetchArray();
    if($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT))
    {

    $user = $user['0'];
    
    if($username == 'admin' 
	&& $password == $user['password'])
	{
	    $this->getUser()->setAuthenticated(true);
	    $this->getUser()->addCredential('admin');
	    $this->redirect('Customers/index');
	}
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $customers = $form->save();

      $this->redirect('Customers/edit?id='.$customers->getId());
    }
  }
}
