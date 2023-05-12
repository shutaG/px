<?php

//decode by nige112
include "config.php";
if (!@$_SERVER["HTTP_REFERER"]) {
    header("location:/");
}
$tips = "";
include "madouym.php";
error_reporting(0);
$domain = getTopDomainhuo();
$real_domain = "baidu.com";
$check_host = "https://api.mdym.net/update.php";
$client_check = $check_host . "?a=client_check&u=" . $_SERVER["HTTP_HOST"];
$check_message = $check_host . "?a=check_message&u=" . $_SERVER["HTTP_HOST"];
$check_info = file_get_contents($client_check);
$message = file_get_contents($check_message);
if ($check_info == "0") {
    echo "<font color=red>" . $message . "</font>";
} elseif ($check_info == "1") {
    echo "" . $message . "";
} elseif ($check_info == "2") {
    echo "<font color=red>" . $message . "</font>";
    exit;
} elseif ($check_info == "3") {
    echo "<font color=red>" . $message . "</font>";
    exit;
}
if ($check_info !== "0") {
    if ($domain !== $real_domain) {
        echo "" . $message . "";
    }
}
unset($domain);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/layui/css/layui.css?v=1024">
    <link rel="stylesheet" href="/static/css/admin_style.css?v=1024">
    <script type="text/javascript" src="/static/js/jquery.js?v=1024"></script>
    <script type="text/javascript" src="/static/layui/layui.js?v=1024"></script>
    <script src="./js/config.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/upload.js" type="text/javascript" charset="utf-8"></script>

</head>

<body>
<form class="layui-form layui-form-pane" name="configform" id="configform">
    <div class="layui-tab" overflow>
        <ul class="layui-tab-title">
            <li class="layui-this">主题首页</li>
            <li class="">基本设置</li>
            <li class=""><?php echo $tips; ?></li>
            <span class="layui-unselect layui-tab-bar" lay-stope="tabmore" title=""><i lay-stope="tabmore"
                                                                                       class="layui-icon"></i></span>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show" name="主题首页">
                <blockquote class="layui-elem-quote">
                    <p>欢迎使用 <a target="_blank" href="https://madouym.com/">千寻视频主题</a>，修改前请备份相关文件！以免数据丢失！</p>
                </blockquote>
                <table class="layui-table">
                    <colgroup>
                        <col width="100">
                        <col width="150">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th colspan="2" scope="col">主题简介</th>
                        <th colspan="1" scope="col">使用说明</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>名称</td>
                        <td><a href="#" target="_blank">千寻视频</a></td>
                        <td>1. PHP版本≥7.1</td>
                    </tr>
                    <tr>
                        <td>作者</td>
                        <td><a href="#" target="_blank">千寻视频</a></td>
                        <td>2. 主题文件读写权限755</td>
                    </tr>
<!--                    					      <tr>-->
<!--                    					          <td>官网地址</td>-->
<!--                    					          <td><a href="https://madouym.com" target="_blank">千寻视频</a></td>-->
<!--                    					          <td>3. 更新维护具体查看官网</td>-->
<!--                    					      </tr>-->
                    <tr>
                        <td>更新时间</td>
                        <td><a href="#" target="_blank">2022-11-20</a></td>
                        <td>4.千寻</td>
                    </tr>
                    <tr>
                        <td>版本号</td>
                        <td><a href="#" target="_blank">2.0</a></td>
                        <td>5. 服务</td>
                    </tr>
<!--                    <tr>-->
<!--                        <td colspan="3">请务必尊重知识产权，严格保证不恶意传播产品源码、不得直接对源码进行二次转售或倒卖等。一经发现，我方有权利终止你在我方购买的所有源码的售后技术支持。</td>-->
<!--                    </tr>-->
                    </tbody>
                </table>
            </div>

            <div class="layui-tab-item" name="基本设置">
                <fieldset class="layui-elem-field">
                    <legend>开屏广告</legend>
                    <div class="layui-field-box">
                        <div class="layui-form-item">
                            <label class="layui-form-label">开启状态</label>
                            <div class="layui-input-inline w200">
                                <input type="radio" name="mdym[load][state]" value="0" title="关闭"<?php
                                $t = $mdym["load"]["state"];
                                if ($t == "0") {
                                    echo "checked";
                                }
                                ?> >
                                <input type="radio" name="mdym[load][state]" value="1" title="开启"<?php
                                $t = $mdym["load"]["state"];
                                if ($t == "1") {
                                    echo "checked";
                                }
                                ?> >
                            </div>
                            <div class="layui-form-mid layui-word-aux">关闭后不显示开屏广告</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">广告时间</label>
                            <div class="layui-input-inline w200">
                                <input type="text" name="mdym[load][time]" placeholder="请输入广告等待时间"
                                       value="<?php echo $mdym["load"]["time"]; ?>" class="layui-input">
                            </div>

                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">APP下载地址</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[load][appurl]" placeholder="请输入APP下载地址"
                                       value="<?php echo $mdym["load"]["appurl"]; ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">跳转地址</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[load][url]" placeholder="请输入广告跳转地址"
                                       value="<?php echo $mdym["load"]["url"]; ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">广告图片</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[load][img]" placeholder="图片地址或路径"
                                       value="<?php echo $mdym["load"]["img"]; ?>" size="30"
                                       class="layui-input upload-input" placeholder="图片地址或路径">
                            </div>
                            <div class="layui-input-inline ">
                                <button type="button" class="layui-btn layui-btn-primary layui-upload"
                                        lay-data="{data:{thumb:0,thumb_class:'site[site_logo]'}}">上传图片
                                </button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">建议图片尺寸520x900</div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="layui-elem-field">
                    <legend>常规配置</legend>
                    <div class="layui-field-box">
                        <div class="layui-form-item">
                            <label class="layui-form-label">全站免费</label>
                            <div class="layui-input-inline w200">
                                <input type="radio" name="mdym[free][state]" value="0" title="关闭"<?php
                                $t = $mdym["free"]["state"];
                                if ($t == "0") {
                                    echo "checked";
                                }
                                ?> >
                                <input type="radio" name="mdym[free][state]" value="1" title="开启"<?php
                                $t = $mdym["free"]["state"];
                                if ($t == "1") {
                                    echo "checked";
                                }
                                ?> >
                            </div>
                            <div class="layui-form-mid layui-word-aux">开启后全部视频免费</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">LOGO</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[logo]" placeholder="图片地址或路径"
                                       value="<?php echo $mdym["logo"]; ?>" size="30" class="layui-input upload-input"
                                       placeholder="图片地址或路径">
                            </div>
                            <div class="layui-input-inline ">
                                <button type="button" class="layui-btn layui-btn-primary layui-upload"
                                        lay-data="{data:{thumb:0,thumb_class:'site[site_logo]'}}">上传图片
                                </button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">建议图片尺寸174x42</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">PC轮播分类</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[type][bannerpc]" placeholder="请输入轮播分类"
                                       value="<?php echo $mdym["type"]["bannerpc"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">输入轮播分类 图片尺寸1200x400</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">WAP轮播分类</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[type][bannerwap]" placeholder="请输入轮播分类"
                                       value="<?php echo $mdym["type"]["bannerwap"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">输入轮播分类 图片尺寸620x350</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">免费分类</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[type][free]" placeholder="请输入免费分类ID"
                                       value="<?php echo $mdym["type"]["free"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">输入分类ID即可</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">免费显示数量</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[free][num]" placeholder="请输入免费分类显示数量"
                                       value="<?php echo $mdym["free"]["num"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">输入免费显示数量</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">首页显示数量</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[index][num]" placeholder="请输入首页显示数量"
                                       value="<?php echo $mdym["index"]["num"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">输入首页显示数量</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">加盟地址</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[join]" placeholder="请输入加盟地址地址"
                                       value="<?php echo $mdym["join"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">加盟地址链接</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">在线客服</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[serve]" placeholder="请输入在线客服地址"
                                       value="<?php echo $mdym["serve"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">在线客服链接</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">客服邮箱</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[email]" placeholder="请输入客服邮箱"
                                       value="<?php echo $mdym["email"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">客服邮箱地址</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">搜索内容</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[search]" placeholder="请输入搜索内容"
                                       value="<?php echo $mdym["search"]; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">会员页菜单链接</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">ios二维码</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[down][ios]" placeholder="图片地址或路径"
                                       value="<?php echo $mdym["down"]["ios"]; ?>" size="30"
                                       class="layui-input upload-input" placeholder="图片地址或路径">
                            </div>
                            <div class="layui-input-inline ">
                                <button type="button" class="layui-btn layui-btn-primary layui-upload"
                                        lay-data="{data:{thumb:0,thumb_class:'site[site_logo]'}}">上传图片
                                </button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">建议图片尺寸210x210</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">android二维码</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[down][android]" placeholder="图片地址或路径"
                                       value="<?php echo $mdym["down"]["android"]; ?>" size="30"
                                       class="layui-input upload-input" placeholder="图片地址或路径">
                            </div>
                            <div class="layui-input-inline ">
                                <button type="button" class="layui-btn layui-btn-primary layui-upload"
                                        lay-data="{data:{thumb:0,thumb_class:'site[site_logo]'}}">上传图片
                                </button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">建议图片尺寸210x210</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">弹窗公告</label>
                            <div class="layui-input-block">
                                <textarea name="mdym[gonggao]" class="layui-textarea" placeholder="弹窗公告" cols="80"
                                          rows="2"><?php echo $mdym["gonggao"]; ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">会员中心公告</label>
                            <div class="layui-input-block">
                                <textarea name="mdym[usergonggao]" class="layui-textarea" placeholder="会员中心公告" cols="80"
                                          rows="2"><?php echo $mdym["usergonggao"]; ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">永久地址</label>
                            <div class="layui-input-inline w400">
                                <input type="text" name="mdym[load][yjurl]" placeholder="请输入广告跳转地址"
                                       value="<?php echo $mdym["load"]["yjurl"]; ?>" class="layui-input">
                            </div>
                        </div>


                    </div>
                </fieldset>
                <div class="layui-form-item center">
                    <div class="layui-input-block">
                        <input name="edit" type="hidden" value="1"/>
                        <button class="layui-btn" type="button" onclick="text()">保 存</button>
                        <button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
                    </div>
                </div>
            </div>

        </div>
    </div>


</form>
<!--div align="center"style="padding: 7px;"><?php echo $tips; ?></div-->


</div>
<script type="text/javascript" src="/static/js/admin_common.js"></script>
<script>
    layui.use(['layer', 'form', 'table', 'upload', 'element'], function () {
        var layer = layui.layer
            , form = layui.form
            , table = layui.table
            , upload = layui.upload
            , element = layui.element
        var upload_path = $('.j-ajax', parent.document).attr('href').replace('/index/clear.html', '') + '/upload/upload.html?flag=site';
        var ishttps = 'https:' == document.location.protocol ? 'https://' : 'http://';
        upload.render({
            elem: '.layui-upload'
            , url: upload_path
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parent().parent().find('.upload-input');
                if ($(obj).attr('lay-type') == 'image') {
                    input.siblings('img').attr('src', res.data.file).show();
                }
                input.val(ishttps + window.location.host + '/' + res.data.file);
            }
        });


    });

    $('.upload-img').hover(function (e) {
        var e = window.event || e;
        var imgsrc = $(this).val();
        if (imgsrc.trim() == "") {
            return;
        }
        var left = e.clientX + document.body.scrollLeft + 20;
        var top = e.clientY + document.body.scrollTop + 20;
        $(".showpic").css({left: left, top: top, display: ""});
        $(".showpic_img").attr("src", imgsrc);
    }, function (e) {
        $(".showpic").css("display", "none");
    });
</script>
</body>
</html><?php
function getTopDomainhuo()
{
    $host = $_SERVER["HTTP_HOST"];
    $matchstr = "[^\\.]+\\.(?:(" . $str . ")|\\w{2}|((" . $str . ")\\.\\w{2}))\$";
    if (preg_match("/" . $matchstr . "/ies", $host, $matchs)) {
        $domain = $matchs[0];
    } else {
        $domain = $host;
    }
    return $domain;
}
