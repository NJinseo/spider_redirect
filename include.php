<?php
# 注册插件
RegisterPlugin("spider_redirect", "ActivePlugin_spider_redirect");

function ActivePlugin_spider_redirect()
{
    Add_Filter_Plugin('Filter_Plugin_ViewAuto_Begin', 'spider_redirect_handle');
}

function spider_redirect_handle()
{
    global $zbp;

    $searchEngineSpidersString = $zbp->Config('spider_redirect')->spiders;
    $searchEngineSpiders = array_map('trim', preg_split('/\R/', $searchEngineSpidersString));

    $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $isSpider = false;

    foreach ($searchEngineSpiders as $spider) {
        if (stripos($userAgent, $spider) !== false) {
            $isSpider = true;
            break;
        }
    }

    if ($isSpider) {
        $sitemapUrl = $zbp->Config('spider_redirect')->sitemapUrl;
        Redirect301($sitemapUrl);
    }
}
?>
