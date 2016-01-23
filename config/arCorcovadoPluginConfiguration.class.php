<?php

   class arCorcovadoPluginConfiguration extends sfPluginConfiguration
   {
     public static
       $summary = 'Theme plugin, extension of arDominionPlugin.',
       $version = '0.0.1';

     public function contextLoadFactories(sfEvent $event)
     {
       $context = $event->getSubject();
       $context->response->addStylesheet('/plugins/arCorcovadoPlugin/css/min.css', 'last', array('media' => 'all'));
     }

     public function initialize()
     {
       $this->dispatcher->connect('context.load_factories', array($this, 'contextLoadFactories'));

       $decoratorDirs = sfConfig::get('sf_decorator_dirs');
       $decoratorDirs[] = $this->rootDir.'/templates';
       sfConfig::set('sf_decorator_dirs', $decoratorDirs);

       $moduleDirs = sfConfig::get('sf_module_dirs');
       $moduleDirs[$this->rootDir.'/modules'] = false;
       sfConfig::set('sf_module_dirs', $moduleDirs);
     }
   }
