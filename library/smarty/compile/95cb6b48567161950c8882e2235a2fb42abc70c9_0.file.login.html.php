<?php
/* Smarty version 3.1.29, created on 2016-06-23 10:47:45
  from "E:\www\php_infinite_classing\views\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ba2312198f0_21468850',
  'file_dependency' => 
  array (
    '95cb6b48567161950c8882e2235a2fb42abc70c9' => 
    array (
      0 => 'E:\\www\\php_infinite_classing\\views\\login.html',
      1 => 1466671630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ba2312198f0_21468850 ($_smarty_tpl) {
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>后台权限管理系统</title>
    <?php echo '<script'; ?>
 type="text/javascript">
        function resetVal() {
            document.getElementById("userName").value="";
            document.getElementById("userPasswd").value="";
        }
    <?php echo '</script'; ?>
>
</head>
<body>
<div align="center" style="padding-bottom: 200px;padding-top: 150px;background-image: url('<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
/images/abg.gif');background-size:cover;">
    <form action="login" method="post">
        <table width="351" height="196" background="<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
/images/login.jpg">
            <tr height="35">
                <td colspan="4"></td>
            </tr>
            <tr height="10">
                <td width="30%"></td>
                <td width="25%">用户名:</td>
                <td><input type="text" value="" name="userName" id="userName" /></td>
                <td width="30%"></td>
            </tr>
            <tr height="10">
                <td width="30%"></td>
                <td width="25%">密码:</td>
                <td><input type="password" value="" name="userPasswd" id="userPasswd" /></td>
                <td width="30%"></td>
            </tr>
            <tr height="10">
                <td width="30%"></td>
                <td width="25%"><input type="button" value="重置" onclick="resetVal()" /></td>
                <td><input type="submit" value="登录"/></td>
                <td width="30%"></td>
            </tr>
            <tr height="30">
                <td width="10%"></td>
                <td colspan="5" valign="top">
                    <font color="red">${error}</font>
                </td>
            </tr>
    </table>
    </form>
</div>
</body>
</html><?php }
}
