
<?php
require_once('common.php');
include('_header.php');
?>
<form class="j-form" method="post" action="draw.php" enctype="multipart/form-data">
    <div class="main">
        <div class="col-sm-6 tips">
            <div class="alert alert-info" role="alert">
                <ol>
                    <li>请认真填写，保证资料真实，否则后果自负</li>
                    <li>关于籍贯，省内请填写到县级(如厦门集美，漳州龙海)，省外到市级(如江西南昌)</li>
                    <li>有孩子的，请在家庭成员注明 孩子性别和年龄</li>
                </ol>
            </div>
        </div>
        <div class="left col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">个人资料</div>
                <div class="panel-body">
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="nick" class="col-sm-2 control-label">昵称</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nick" name="nick" placeholder="群昵称，必填">
                            </div>

                            <label for="birth" class="col-sm-2 control-label">性别</label>
                            <div class="radio col-sm-4">
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios1" value="男">男
                                </label>
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios2" value="女">女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birth" class="col-sm-2 control-label">出生年份</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="birth" id="birth" placeholder="如1989，必填">
                            </div>
                            <label for="birthplace" class="col-sm-2 control-label">籍贯</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="birthplace" id="birthplace" placeholder="必填">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body_height" class="col-sm-2 control-label">身高</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="body_height" id="body_height" placeholder="必填(cm)，如 172">
                            </div>
                            <label for="body_weight" class="col-sm-2 control-label">体重</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="body_weight" id="body_weight" placeholder="(kg)，如 70">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">手机号</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="不公开，必填">
                            </div>
                            <label for="income" class="col-sm-2 control-label">年收入</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="income" id="income" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="qq" class="col-sm-2 control-label">qq号</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="qq" id="qq" placeholder="必填">
                            </div>
                            <label for="qq" class="col-sm-2 control-label">微信</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="weixin" id="weixin" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">婚姻状况</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="marriage" data-must="1">
                                    <option>未婚</option>
                                    <option>离异（无小孩）</option>
                                    <option>离异（带小孩）</option>
                                    <option>离异（小孩归对方）</option>
                                    <option>丧偶</option>
                                    <option>丧偶（有孩）</option>
                                </select>
                            </div>

                            <label for="education" class="col-sm-2 control-label">学历</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="education" id="education" placeholder="必填">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="house" class="col-sm-2 control-label">房/车</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="house" id="house" placeholder="必填">
                            </div>

                            <label for="job" class="col-sm-2 control-label">职业</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="job" id="job" placeholder="必填">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-2 control-label">家庭成员</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="member" id="member" placeholder="必填">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="col-sm-2 control-label">照片</label>
                            <div class="col-sm-6">
                                <input type="file" class="j-photo" name="photo" id="photo"  accept="image/gif, image/jpeg, image/png, image/bmp" >
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <div class="right col-md-6">

            <div class="panel panel-primary">
                <div class="panel-heading">心目中的Ta(为了高效请尽量填写完整)</div>
                <div class="panel-body">

                    <div class="form-horizontal" role="form">

                        <div class="form-group">
                            <label for="ta_birthplace" class="col-sm-2 control-label">籍贯要求</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ta_birthplace" id="ta_birthplace" placeholder="建议填写清楚">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ta_birth" class="col-sm-2 control-label">年龄要求</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ta_birth" id="ta_birth" placeholder="必填">
                            </div>

                            <label for="ta_body_height" class="col-sm-2 control-label">身高要求</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ta_body_height" id="ta_body_height" placeholder="必填(厘米)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ta_marriage" class="col-sm-2 control-label">婚姻状况</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ta_marriage" id="ta_marriage" placeholder="必填">
                            </div>

                            <label for="ta_education" class="col-sm-2 control-label">学历要求</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ta_education" id="ta_education" placeholder="必填">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ta_house" class="col-sm-2 control-label">房车要求</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ta_house" id="ta_house" placeholder="">
                            </div>
                            <label for="ta_income" class="col-sm-2 control-label">薪资要求</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ta_income" id="ta_income" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">更多的描述自己/心目中的她Ta</div>
                <div class="panel-body">

                    <div class="form-horizontal" role="form">

                        <div class="form-group">
                            <label for="hobby" class="col-sm-2 control-label">兴趣爱好</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hobby" id="hobby" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ta_desc" class="col-sm-2 control-label">自己或Ta</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="2" name="ta_desc" id="ta_desc"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>

    <div class="commit">

        <div class="form-horizontal col-sm-6 commit_form" role="form">

            <div class="form-group">
                <div class="checkbox col-sm-4">
                    <label class="" for="info_open">
                        <input type="checkbox" value="1" name="info_open" id="info_open" checkbox>
                        本资料是否公开
                    </label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" value="1" name="photo_open" id="photo_open" checkbox>
                        照片是否公开
                    </label>
                </div>
                <button type="commit" class="btn btn-primary col-sm-2">
                    <span class="glyphicon glyphicon-picture"></span> 生成
                </button>
            </div>
        </div>

        <div style="margin-top:40px;">
            <p class="copyright">© 本工具由 <a href="http://www.baozy.com/">包子哥</a> 开发维护</p>
        </div>

    </div>

</form>
<script>
    var _check = <?php echo DEBUG ? "false" : "true"; ?>;
    $('.j-form').submit(function(){
        var blank = [];

        if ($('input[name="sex"]:checked').length == 0) {
            blank.push('性别')
        }

        $('input,select').each(function(i, dom){
            var $dom = $(dom);
            var placeholder = $dom.attr('placeholder') || '';
            if ((placeholder.indexOf('必填') != -1 || $dom.data('must') == 1) && $dom.val() == '') {
                var $label = $dom.parent().prev();
                if ($label.hasClass('control-label')) {
                    blank.push($label.text());
                }
            }

        });
        if ($('.j-photo').val() == '') {
            blank.push('照片');
        }
        // blank=[];
        if (_check && blank.length > 0 ) {
            alert(blank.join('，') + '必须填写完整');
            return false;
        }
    });
</script>
<?php include '_footer.php'; ?>
