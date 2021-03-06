<?php
session_start();
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
define("Controller", BASE_PATH.'/controller/');
// 数据访问层
define("Model", BASE_PATH.'/model/');
// 实例 Entity 路径
define("Entity", BASE_PATH.'/model/Entity');
// 配置文件
define("Config", BASE_PATH.'/config/');

// composer autoload自动载入类
require BASE_PATH.'/vendor/autoload.php';

// 加载路由配置文件
$locater = new \Symfony\Component\Config\FileLocator(array(ROUTER));
$loader = new \Symfony\Component\Routing\Loader\YamlFileLoader($locater);
$collection = $loader->load('routing.yml');

// 分析请求路由，发送到controller
$context = new \Symfony\Component\Routing\RequestContext('/');
$matcher = new \Symfony\Component\Routing\Matcher\UrlMatcher($collection, $context);
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$reqURI = $request->getRequestUri();
// 去除get参数
if (strpos($reqURI, '?')) {
    $reqURI = substr($reqURI, 0, strpos($reqURI, '?'));
}

// 加载控制器装载类
require LIBRARY . 'Loader.php';

// 没有相应的页面则抛出异常
try {
    $routeInfo = $matcher->match($reqURI);
    $controller = $routeInfo['controller'];
    $action = $routeInfo['action'];

    if (!in_array($action, array('loginAction', 'getValidCodeAction')) && !$_SESSION['userName']) {
        throw new \Exception("未登录，不能访问该地址!");
    }

    $conHandle = new $controller();
    $conHandle->$action($request);
} catch (\Exception $e) {
      $message = $e->getMessage();
      $excpController = new ExceptionController();
      $excpController->showError($message);
}

?>

