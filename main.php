<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('spider_redirect')) {$zbp->ShowError(48);die();}

if (count($_POST) > 0) {
CheckIsRefererValid();
}

$blogtitle='提醒搜索引擎抓取';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
			 <ul>
			  <li><a href="?type=shezhi"><span class="css_fanmulu">设置</span></a></li>
			</ul>
  </div>
  <div id="divMain2">

<style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .form-container {
        flex: 1;
        margin-right: 20px;
    }

    .form-container h3 {
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .form-container label {
        font-weight: bold;
    }

    .form-container textarea,
    .form-container input[type="text"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    .search-engine-list {
        flex: 1;
        background-color: #f9f9f9;
        padding: 20px;
    }

    .search-engine-list h4 {
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .search-engine-list ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .search-engine-list li {
        color: #666;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .shuoming {
        margin-top: 20px;
        background-color: #f9f9f9;
        padding: 20px;
        color: #333;
    }

    .shuoming h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .shuoming p {
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <div class="form-container">
        <h3>配置提醒搜索引擎蜘蛛抓取插件</h3>
        <form action="save.php" method="post">
            <p>
                <label for="spiders">搜索引擎蜘蛛名称：</label><br>
                <textarea id="spiders" name="spiders" rows="5" cols="50" placeholder="请输入搜索引擎蜘蛛名称"><?php echo htmlspecialchars($zbp->Config('spider_redirect')->spiders); ?></textarea>
            </p>
            <p>
                <label for="sitemapUrl">Sitemap URL：</label><br>
                <input type="text" id="sitemapUrl" name="sitemapUrl" placeholder="请输入sitemap URL" value="<?php echo htmlspecialchars($zbp->Config('spider_redirect')->sitemapUrl); ?>">
            </p>
            <p>
                <input type="submit" value="保存" class="button">
            </p>
        </form>
    </div>
    <div class="search-engine-list">
        <h4>常见的搜索引擎蜘蛛：</h4>
        <ul>
            <li>百度----Baiduspider</li>
            <li>神马----YisouSpider</li>
            <li>谷歌----Googlebot</li>
            <li>搜搜----Sosospider</li>
            <li>有道----YoudaoBot</li>
            <li>必应----bingbot</li>
            <li>搜狗----Sogou web spider</li>
            <li>雅虎----Yahoo! Slurp</li>
            <li>Alexa----Alexa</li>
            <li>360----360Spider</li>
            <li>头条----Bytespider</li>
        </ul>
    </div>
</div>
<div class="shuoming">
    <h3>功能说明</h3>
    <p>插件功能：提醒搜索引擎蜘蛛抓取你网站的新内容。</p>
    <p>第一项：“搜索引擎蜘蛛名称” 一行一个进行填写-需要抓取的蜘蛛名称即可。</p>
    <p>Sitemap URL：填写网站地图URL，例如：https://zb.xxxx.com/sitemap.xml</p>
    <p>sitemap URL网站数据较多的有分页，请填写最新更新的sitemap.xml</p>
</div>



  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>