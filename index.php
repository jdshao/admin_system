<?php
// 框架入口文件
define("BASE_PATH", __DIR__);
// 模板路径
define("VIEWS", BASE_PATH.'/views/');
// 路径配置
define("ROUTER", BASE_PATH.'/router/');
// 第三方路径
define("Common", BASE_PATH.'/common/');
// 通用类配置
define("LIBRARY", BASE_PATH.'/library/');
// 控制器空间
define("Controller", BASE_PATH.'/controller');

// composer autoload自动载入类
require BASE_PATH.'/vendor/autoload.php';

// 加载配置文件
$locater = new \Symfony\Component\Config\FileLocator(array(ROUTER));
$loader = new \Symfony\Component\Routing\Loader\YamlFileLoader($locater);
$collection = $loader->load('routing.yml');

// 分析请求路由，发送到controller
$context = new \Symfony\Component\Routing\RequestContext('/');
$matcher = new \Symfony\Component\Routing\Matcher\UrlMatcher($collection, $context);
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$reqURI = $request->getRequestUri();
// 相对于测试环境的处理，真实环境会定位到工程根目录
$reqURI = str_replace('php_infinite_classing/', '', $reqURI);

// 加载控制器装载类
require LIBRARY . 'Loader.php';

$dirArr = explode('/', $reqURI);
$directory = $dirArr[1];
if (in_array($directory, array('common', 'images'))) {
    return ;
}

try {
    $routeInfo = $matcher->match($reqURI);
    $controller = $routeInfo['controller'];
    $action = $routeInfo['action'];
    $conHandle = new $controller();
    $conHandle->$action($request);
} catch (\RuntimeException $e) {
      $message = $e->getMessage();
      $excpController = new ExceptionController();
      $excpController->showError($message);
}

?>