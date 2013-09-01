<?php
#error_reporting(E_ALL);
#ini_set('display_errors',1);
try {

	/**
	 * Read the configuration
	 */
	$config = new Phalcon\Config\Adapter\Ini(__DIR__ . '/../app/config/config.ini');

	$loader = new \Phalcon\Loader();

	/**
	 * We're a registering a set of directories taken from the configuration file
	 */
	$loader->registerDirs(
		array(
			__DIR__ . $config->application->controllersDir,
			__DIR__ . $config->application->modelsDir,
		)
	)->register();

	/**
	 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
	 */
	$di = new \Phalcon\DI\FactoryDefault();
	
	$di->set('view', function() use ($config) {

		$view = new \Phalcon\Mvc\View();

		$view->setViewsDir(__DIR__ . $config->application->viewsDir);

		$view->registerEngines(array(
		    '.volt' => 'volt',
			
		));

		return $view;
	});

	/**
	 * Setting up volt
	 */

    
	$di->set('volt', function($view, $di) {

		$volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

	        $volt->setOptions(array(
                        "compiledPath" => '../cache/'
                ));


		return $volt;
	}, true);


	$application = new \Phalcon\Mvc\Application();
	$application->setDI($di);
	echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}
echo memory_peak_usage(true);
