<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Cticket\Controller\Main' => 'Cticket\Controller\MainController',
        	'Cticket\Controller\Ticket' => 'Cticket\Conttoller\TicketController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'cticket' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/cticket',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Cticket\Controller',
                        'controller'    => 'Main',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'ticket-admin' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'     => '/ticket-admin[/][:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                        ),
                    ),
                	'ticket' => array(
                    	'type' => 'Segment',
                		'options' => array (
                			'route' => '/ticket[/][:action][/:id]',
                			'constraints' => array(
                				'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                				'id' => '[0-9]+',
                			)
                		)   	
                    )
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
               
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Cticket' => __DIR__ . '/../view',
        ),
    ),
);
