<?php
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Router\Http\Segment;
use CCPaymentManager\Controller\CCPaymentManagerController;
//use Multipledb\Controller\ModuleconfigController;
//use Multipledb\Model\Multipledb;
use CCPaymentManager\Model\CCPaymentManagerTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Interop\Container\ContainerInterface;
return array(
    'controllers' => array(
        'invokables' => array(
            'ccpaymentmanager'    => 'CCPaymentManager\Controller\CCPaymentManagerController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'ccpaymentmanager' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/ccpaymentmanager[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ccpaymentmanager',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'ccpaymentmanager' => __DIR__ . '/../view/',
        ),
        'template_map' => array(
            'ccpaymentmanager/layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'service_manager' => [
            'factories' => array(
                CCPaymentManagerTable::class =>  function (ContainerInterface $container, $requestedName) {
                    $dbAdapter = $container->get(\Zend\Db\Adapter\Adapter::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new CCPaymentManager());
                    $tableGateway = new TableGateway('billing', $dbAdapter, null, $resultSetPrototype);
                    $table = new CCPaymentManagerTable($tableGateway);
                    return $table;
                }

            ),
        ]
    ),
);
