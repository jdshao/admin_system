<?php
/* Smarty version 3.1.29, created on 2016-06-23 10:32:59
  from "E:\www\php_infinite_classing\views\admin\main.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576b9ebb762772_36767865',
  'file_dependency' => 
  array (
    '161d518e143d618837ab2a4501315256058689c6' => 
    array (
      0 => 'E:\\www\\php_infinite_classing\\views\\admin\\main.html',
      1 => 1466670777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../_header.html' => 1,
  ),
),false)) {
function content_576b9ebb762772_36767865 ($_smarty_tpl) {
?>
<html>
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>后台权限管理系统</title>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            // 数据
            var treeData = [{
                text:"操作菜单",
                children: [
                    {
                        text:"班级信息管理",
                        attributes: {
                            url:"gradeInfoManage.jsp"
                        }
                    },
                    {
                        text:"学生信息管理",
                        attributes: {
                            url:"studentInfoManage.jsp"
                        }
                    }]
            },{
                text:"操作菜单",
                        children: [
                    {
                        text:"班级信息管理",
                        attributes: {
                            url:"gradeInfoManage.jsp"
                        }
                    },
                    {
                        text:"学生信息管理",
                        attributes: {
                            url:"studentInfoManage.jsp"
                        }
                    }]
            }]

            $("#tree").tree({
                data:treeData,
                lines:true,
                onClick: function(node){
                    if (node.attributes) {
                        openTab(node.text, node.attributes.url);
                    }
                }
            });
        });
    <?php echo '</script'; ?>
>
</head>
<body class="easyui-layout">
    <div region="north" style="height: 80px;">
        <div style="width: 100%;height: 70%;"><img src="<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
/images/header.jpg" style="width: 100%;height: 100%;"></div>
        <div align="right" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
/images/userbg.png);width: 100%;height: 30%;">
            <font color="#FF7F00" size="2" style="padding-right: 15%;margin-top: 3px;">欢迎您， ${currentUser.userName}</font>
        </div>
    </div>
    <div region="center">
        <div class="easyui-tabs" fit="true" border="false" id="tabs">
            <div title="首页">
                <div align="center" style="padding-top: 100px;"><font color="red" size="10">欢迎使用</font></div>
            </div>
        </div>
    </div>
    <div region="west" style="width: 150px;" title="导航菜单" split="true">
        <ul id="tree"></ul>
    </div>
    <div region="south" align="center" style="height: 25px;">用户权限管理系统</div>
</body>
</html><?php }
}
