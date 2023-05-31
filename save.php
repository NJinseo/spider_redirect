<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

if ($_POST) {
    $spiders = trim($_POST['spiders']);
    $sitemapUrl = trim($_POST['sitemapUrl']);

    $zbp->Config('spider_redirect')->spiders = $spiders;
    $zbp->Config('spider_redirect')->sitemapUrl = $sitemapUrl;
    $zbp->SaveConfig('spider_redirect');

    $zbp->SetHint('good', '设置保存成功！');
    Redirect('main.php');
}

require 'zb_system/admin/admin_footer.php';
?>
