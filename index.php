<?php
require_once __DIR__ . '/vendor/autoload.php';


define('GOOGLE_API_KEY', '262211090820-3vs47hd8rh4f7pr2ld3skotb36f6armu.apps.googleusercontent.com');
define('GOOGLE_API_SECRET', '7qAS2a97K3wnZ5sdBqhXnJfi');

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Sorien\Provider\PimpleDumpProvider());

$app->register(new Gigablah\Silex\OAuth\OAuthServiceProvider(), array(
    'oauth.services' => [
        'Google' => [
            'key' => GOOGLE_API_KEY,
            'secret' => GOOGLE_API_SECRET,
            'scope' => [
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile'
            ],
            'user_endpoint' => 'https://www.googleapis.com/oauth2/v1/userinfo'
        ],
    ]
));

// Provides URL generation
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
// Provides CSRF token generation
$app->register(new Silex\Provider\FormServiceProvider());
// Provides session storage
$app->register(new Silex\Provider\SessionServiceProvider(), array(
    'session.storage.save_path' => __DIR__ . '/../cache'
));

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'default' => array(
            'pattern' => '^/',
            'anonymous' => true,
            'oauth' => array(
                //'login_path' => '/auth/{service}',
                //'callback_path' => '/auth/{service}/callback',
                //'check_path' => '/auth/{service}/check',
                'failure_path' => '/login',
                'with_csrf' => true
            ),
            'logout' => array(
                'logout_path' => '/logout',
                'with_csrf' => true
            ),
            // OAuthInMemoryUserProvider returns a StubUser and is intended only for testing.
            // Replace this with your own UserProvider and User class.
            'users' => new Gigablah\Silex\OAuth\Security\User\Provider\OAuthInMemoryUserProvider()
        )
    ),
    'security.access_rules' => array(
        array('^/auth', 'ROLE_USER')
    )
));


// Provides Twig template engine
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/app/view'
));




$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig', [
        'login_paths' => $app['oauth.login_paths'],
        'logout_path' => $app['url_generator']->generate('logout', [
            '_csrf_token' => $app['oauth.csrf_token']('logout')
        ]),
    ]);
});

$app->get('/list/create', 'cgsmith\controller\ShoppingListController::createAction');

$app->match('/logout', function () {
})->bind('logout');

$app->run();