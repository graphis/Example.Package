<?php
// add the package to the autoloader
$loader->add('Example\Package\\', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src');

// add a route to the page and action
$di->get('router_map')->add('example_package_greet', '/', [
    'values' => [
        'controller' => 'greet',
        'action' => 'index',
    ],
]);

$di->get('router_map')->add('example_package_contactform', '/contact', [
    'values' => [
        'controller' => 'greet',
        'action' => 'contactForm',
    ],
]);

// map the 'greet' controller value to a page controller class
$di->params['Aura\Framework\Web\Controller\Factory']['map']['greet'] = 'Example\Package\Web\Greet\Page';

// the generic factory service
$di->set('generic_factory', function () use ($di) {
    return $di->newInstance('Example\Package\GenericFactory');
});

$di->setter['Example\Package\Web\PageController']['setFactory'] = $di->lazyGet('generic_factory');

// database
$di->set('connection_factory', function () use ($di) {
    return $di->newInstance('Aura\Sql\ConnectionFactory');
});

$di->set('connection_locator', function () use ($di) {
    return $di->newInstance('Aura\Sql\ConnectionLocator');
});

// default params for the AbstractModel class
$di->params['Example\Package\Model\AbstractModel'] = [
    'connection_locator' => $di->lazyGet('connection_locator')
];

$di->params['Aura\Sql\ConnectionLocator'] = [
    'connection_factory' => $di->lazyGet('connection_factory'),
    'default' => [
        'adapter' => 'mysql',
        'dsn' => 'host=localhost;dbname=db-name',
        'username' => 'db-user',
        'password' => 'db-password',
        'options' => []
    ],
    'masters' => [],
    'slaves' => []
];

// map to the generic factory
$di->params['Example\Package\GenericFactory']['map']['form.contact'] =
    $di->newFactory('Example\Package\Input\ContactForm');

$di->params['Example\Package\GenericFactory']['map']['model.contact'] =
    $di->newFactory('Example\Package\Model\Contact');

// contact form options
$di->set('contact_options', function () use ($di) {
    return $di->newInstance('Example\Package\Options');
});

$di->params['Example\Package\Input\ContactForm']['options'] = $di->lazyGet('contact_options');

// Show the code
$signal = $di->get('signal_manager');

$signal->handler(
    'Aura\Framework\Web\Controller\AbstractPage',
    'post_render',
    function ($arg) {
        if (! $arg instanceof Aura\Framework\Web\Asset\Page) {
            $code = new \Example\Package\Extension\Code();
            $code->setController($arg);
            $code->getCode();
        }
    }
);
