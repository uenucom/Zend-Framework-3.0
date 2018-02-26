<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function echoAction()
    {
//         $view->setTerminal(true);
////        return new ViewModel();
//        return new ViewModel(array(
//            'message' => 'Hello world',
//        )); 
        $view = new ViewModel(array(
            'message' => 'Hello world',
        ));

        // Disable layouts; `MvcEvent` will use this View Model instead
        $view->setTerminal(true); //禁用布局，但必须有对应模板
        echo date("Y-m-d H:i:s");
        $view->setTemplate('application/index/echo');
        return $view;
    }
}
