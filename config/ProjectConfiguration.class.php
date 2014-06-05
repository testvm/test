<?php

require_once '/var/www/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->dispatcher->connect('request.filter_parameters',array($this, 'filterRequestParameters'));
  }
 
  public function filterRequestParameters(sfEvent $event, $parameters)
  {
    $request = $event->getSubject();
 
    if (preg_match('#Mobile/.+Safari#i', $request->getHttpHeader('User-Agent')))
    {
      $request->setRequestFormat('iphone');
    }
 
    return $parameters;
  }
}
