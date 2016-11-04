<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/11/4
 * Time: 10:16
 */

/**
 * 验证码类
 * Class ValidateCode
 */
class UtilController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 显示验证码图片，并保存在session中
     */
    public function getValidCodeAction()
    {
        $validate = new ValidateCodeLibrary();
        $validate->doimg();
        $code = $validate->getCode();
        $_SESSION['validCode'] = $code;
    }
}