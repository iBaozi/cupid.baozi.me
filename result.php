<?php
require_once('common.php');
include '_header.php';

?>
<script src="static/ZeroClipboard.min.js"></script>
    <script src="static/clipboard.min.js"></script>

<div>
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: center">
            <b><?php echo $name; ?></b> 的备案资料 （请在 <b><?php echo date('H:i', $overTime); ?></b> 前保存）
        </div>
        <div class="panel-body" style="text-align: center;">
            <div class="alert alert-info col-sm-6 tips" role="alert">
                <ol>
                    <li>请检查资料是否正确，如有不对返回修改</li>
                    <li>把本页面发给备案管理员（复制链接或者分享），同时建议您也下载一份保存</li>
                </ol>

            </div>
            <div class="col-sm-12"  style="margin-bottom: 20px;">
                <!--
                <a id="copyBtn" class="copyBtn" href="javascript:void(0);"><span class="glyphicon glyphicon-link"></span> 复制链接</a>
                -->
                <a href="<?php echo $url; ?>&type=dl" class="col-sm-offset-1">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-save"></span> 下载图片
                    </button>
                </a>
<!--
                <a href="<?php echo $url; ?>&type=dl" class="col-sm-offset-1">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-save"></span> 下载图片(无手机)
                    </button>
                </a>
                -->
            </div>
            <div class="thumbnail" style=" border: none;">
                <img src="<?php echo $url; ?>&type=img">
            </div>
        </div>
    </div>
    <p class="copyright">© 本工具由 <a href="http://www.baozy.com/">包子哥</a> 开发维护</p>
</div>

    <script>
//        var client = new ZeroClipboard( document.getElementById("copyBtn") );
//
//        client.on( "ready", function( readyEvent ) {
//            client.setText(location.href);
//            client.on( "aftercopy", function( event ) {
//                event.target.style.display = "none";
//                alert("已经复制，请发给备案管理员!");
//            } );
//        } );

    $(function(){
        $('.copyBtn').attr('data-clipboard-text', location.href);

        var clipboard = new Clipboard('.copyBtn');

        clipboard.on('success', function(e) {
            alert("已经复制，请发给备案管理员!");
        });
        clipboard.on('error', function(e) {
            alert("复制失败!");
        });
    });


    </script>

<?php include '_footer.php'; ?>