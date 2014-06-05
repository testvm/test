

<?php

class authActions extends sfActions
{
  public function executeLogin(sfWebRequest $request)
  {
    $this->form = new LoginForm();
 
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid())
      {
        // authenticate user and redirect them
        $this->getUser()->setAuthenticated(true);
        $this->getUser()->addCredential('user');
        $this->redirect('/index');
      }
    }
  }
  
  public function executeLogout()
  {
    $this->getUser()->clearCredentials();
    $this->getUser()->setAuthenticated(false);
    $this->redirect('@homepage');
  }
}

