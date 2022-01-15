<?php

namespace common\library;

/**
 * @author Wen	Zi <yii2china@gmail.com>
 */
use yii\helpers\Html;
use backend\models\Model;
use backend\models\Linkagemenu;
use Yii;
use yii\web\NotFoundHttpException;

class FieldAddForm {

    protected $HTML;
    var $modelid;
    var $fields;
    var $id;
    var $formValidator;

    function __construct() {
        $this->HTML = new Html();

        //$this->siteid = get_siteid();
    }

    function images($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        $csrfParam = Yii::$app->request->csrfParam;
        $csrfToken = Yii::$app->request->csrfToken;
        $uploadUrl = Yii::$app->urlManager->createUrl('/content/upload');
        $douhao = '"';
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $html = '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group"><div class="attaclist"><div id="' . $field . '"><ul id="' . $field . '_ul"></ul></div><span class="input-group-btn"><button type="button" class="btn btn-white" onclick="openiframe(\'js/images/images_upload.html\',\'' . $field . '_ul\',\'多图上传\',810,400,20)">上传文件</button></span></div></div></td></tr>';
        return $html;
    }

    function image($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        $csrfParam = Yii::$app->request->csrfParam;
        $csrfToken = Yii::$app->request->csrfToken;
        $uploadUrl = Yii::$app->urlManager->createUrl('/content/upload');
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $html = '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group"><div class="input-group">
				   <input type="text" value="' . $value . '" class="form-control" id="' . $field . '" name="' . $arr . '[' . $field . ']" size="100">
					<span class="input-group-btn">
					<button type="button" class="btn btn-white" onclick="openiframe(\'res/js/images/image_upload.html\',\'' . $field . '\',\'上传附件\',810,400,1)">上传文件</button>
					</span>
				</div></div></td></tr>';
        return $html;
    }

    function editor($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if (!$height)
            $height = 400;
        if (empty($value)) {
            if (!empty($defaultvalue)) {
                $value = $defaultvalue;
            } else {
                $value = '';
            }
        }
        if ($minlength || $pattern)
            $allow_empty = '';
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $str = '<script type="text/javascript">$(document).ready(function(){var ue2 =  UE.getEditor("' . $field . '",{
        initialFrameHeight :' . $height . ',
       });})</script>';
        $str .= '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group">';
        $str .= '<script id="' . $field . '" name="' . $arr . '[' . $field . ']" type="text/plain">' . $value . '</script>';
        $str .= '</div></td></tr>';
        return $str;
    }

    function datetime($field, $value, $fieldinfo) {
        extract($fieldinfo);
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        date_default_timezone_set('PRC');
        $str = '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group"><input  type="text"  name="' . $arr . '[' . $field . ']' . '"  id="' . $field . '"  value="' . date('Y-m-d H:i:s', time()) . '"  class="date"></div></td></tr>
				<script  type="text/javascript">
					Calendar.setup({
					weekNumbers: true,
					inputField : "' . $field . '",
					trigger    : "' . $field . '",
					dateFormat: "%Y-%m-%d %H:%M:%S",
					showTime: true,
					minuteStep: 1,
					onSelect   : function() {this.hide();}
					});
				</script>';
        return $str;
    }

    function linkage($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        //$model_array = Model::findOne($linkageid)->toArray();
        $model_array = Model::findOne($linkageid);
        if (!empty($model_array)) {
            $model_array = $model_array->toArray();
            $tablePrefix = Yii::$app->components['db']['tablePrefix']; //表前缀
            $conte_array = Yii::$app->db->createCommand('SELECT id,title FROM ' . $tablePrefix . $model_array['table_name'])->queryAll();
            if (isset($issystem) && $issystem == 1) {
                $arr = 'info';
            } else {
                $arr = 'sub';
            }

            $html = '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group">';
            if (!empty($setting['boxtype'])) {
                switch ($setting['boxtype']) {
                    case 'select':
                        $html .= '<div id="' . $field . '"><select id="' . $field . '_select" style="padding: 6px 12px;"><option value="">请选择</option>';
                        foreach ($conte_array as $key => $val) {
                            $html .= '<option value="' . $val['id'] . '"';
                            if ($value == $val['id']) {
                                $html .= ' selected="selected"';
                            }
                            $html .= '>' . $val['title'] . '</option>';
                        }
                        $html .= ' </select></div>';
                        break;
                    case 'multiple':
                        $val_arr = explode(',', $value);

                        $html .= '<select multiple="" class="width-80 chosen-select" id="' . $field . '" data-placeholder="Choose a Country..." name="' . $arr . '[' . $field . '][]' . '">
					<option value="">&nbsp;</option>
					';
                        foreach ($conte_array as $key => $val) {
                            $html .= '<option value="' . $val['id'] . '"';
                            if (in_array($val['id'], $val_arr)) {

                                $html .= 'selected';
                            }
                            $html .= '>' . $val['title'] . '</option>';
                        }
                        $html .= '</select>';
                        break;
                }
            }
            $html .= '</div></td></tr>';


            if ($field == 'countryid') {
                $html .= "<script type='text/javascript'> 
                    $('#countryid_select').change(function(){
                            $('#universityid_select').empty();
                            $('#collegeid_select').empty();
                            $('#universityid_select').empty();
                            $('#universityid_select').append('<option value=>请选择</option>');
                            $('." . $field . "_span').remove();
                            var span_text = $(this).val();
                            $('#$field').append('<input type=\"hidden\" class=\"" . $field . "_span\" name=\"" . $arr . "[" . $field . "]\" value = \"'+span_text+'\"/>');
                              $.ajax({
                                type: 'POST',
                                url: 'index.php?r=content/getstate',
                                datatype : 'json',
                                data: '&type=countryid&countryid='+span_text+'&math='+Math.floor(Math.random()*1000+1),
                                success: function(data){
                                    data = JSON.parse(data);
                                    var html1 = '<option value=>请选择</option>';
                                    $.each(data, function(i,item) {
                                        html1 +='<option value='+item.id+'>'+item.title+'</option>';
                                    });
                                    $('#district_select').html(html1);
                                }
                            })
                    })</script>";
            } elseif ($field == 'district') {
                $html .= "<script type='text/javascript'> 
                    $('#district_select').change(function(){
                             $('#collegeid_select').empty();
                            $('." . $field . "_span').remove();
                            var span_text1 = $('#countryid_select').val();
							var span_text = $(this).val();
                            $('#$field').append('<input type=\"hidden\" class=\"" . $field . "_span\" name=\"" . $arr . "[" . $field . "]\" value = \"'+span_text+'\"/>');
                              $.ajax({
                                type: 'POST',
                                url: 'index.php?r=content/getstate',
                                datatype : 'json',
                                data: '&type=district&countryid='+span_text1+'&districtid='+span_text+'&math='+Math.floor(Math.random()*1000+1),
                                success: function(data){
                                    data = JSON.parse(data);
                                    var html1 = '<option value=>请选择</option>';
                                    $.each(data, function(i,item) {
                                        html1 +='<option value='+item.id+'>'+item.title+'</option>';
                                    });
                                    $('#districtid_select').html(html1);
                                }
                            })
                    })</script>";
            } elseif ($field == 'districtid') {
                $html .= "<script type='text/javascript'> 
                    $('#districtid_select').change(function(){
                             $('#collegeid_select').empty();
                            $('." . $field . "_span').remove();
                            var span_text = $(this).val();
                            $('#$field').append('<input type=\"hidden\" class=\"" . $field . "_span\" name=\"" . $arr . "[" . $field . "]\" value = \"'+span_text+'\"/>');
                              $.ajax({
                                type: 'POST',
                                url: 'index.php?r=content/getstate',
                                datatype : 'json',
                                data: '&type=districtid&countryid='+span_text+'&math='+Math.floor(Math.random()*1000+1),
                                success: function(data){
                                    data = JSON.parse(data);
                                    var html1 = '<option value=>请选择</option>';
                                    $.each(data, function(i,item) {
                                        html1 +='<option value='+item.id+'>'+item.title+'</option>';
                                    });
                                    $('#universityid_select').html(html1);
                                }
                            })
                    })</script>";
            } elseif ($field == 'universityid') {
                $html .= "<script type='text/javascript'> 
                    $('#universityid_select').change(function(){
                            $('." . $field . "_span').remove();
                            var span_text = $(this).val();
                            $('#$field').append('<input type=\"hidden\" class=\"" . $field . "_span\" name=\"" . $arr . "[" . $field . "]\" value = \"'+span_text+'\"/>');
                              $.ajax({
                                type: 'POST',
                                url: 'index.php?r=content/getstate',
                                datatype : 'json',
                                data: '&type=universityid&countryid='+span_text+'&math='+Math.floor(Math.random()*1000+1),
                                success: function(data){
                                    data = JSON.parse(data);
                                    var html1 = '<option value=>请选择</option>';
                                    var html2 = '';
                                    $.each(data, function(i,item) {
                                        html1 +='<option value='+item.id+'>'+item.title+'</option>';
                                    });
                                    $('#collegeid_select').html(html1);
                                }
                            })
                    })</script>";
            } elseif ($field == 'majorcateid') {
                $html .= "<script type='text/javascript'> 
                    $('#majorcateid_select').change(function(){
                            $('." . $field . "_span').remove();
                            var span_text = $(this).val();
                            $('#branchid_select').empty();
                            $('#branchid_select').append('<option value=>请选择</option>');
                            $('#$field').append('<input type=\"hidden\" class=\"" . $field . "_span\" name=\"" . $arr . "[" . $field . "]\" value = \"'+span_text+'\"/>');
                              $.ajax({
                                type: 'POST',
                                url: 'index.php?r=content/getstate',
                                datatype : 'json',
                                data: '&type=majorcateid&countryid='+span_text+'&math='+Math.floor(Math.random()*1000+1),
                                success: function(data){
                                    data = JSON.parse(data);
                                    var html1 = '<option value=>请选择</option>';
                                    var html2 = '';
                                    $.each(data, function(i,item) {
                                        html1 +='<option value='+item.id+'>'+item.title+'</option>';
                                    });
                                    $('#majorid_select').html(html1);
                                }
                            })
                    })</script>";
            } elseif ($field == 'majorid') {
                $html .= "<script type='text/javascript'> 
                    $('#majorid_select').change(function(){
                            $('." . $field . "_span').remove();
                            var span_text = $(this).val();
                            $('#$field').append('<input type=\"hidden\" class=\"" . $field . "_span\" name=\"" . $arr . "[" . $field . "]\" value = \"'+span_text+'\"/>');
                              $.ajax({
                                type: 'POST',
                                url: 'index.php?r=content/getstate',
                                datatype : 'json',
                                data: '&type=majorid&countryid='+span_text+'&math='+Math.floor(Math.random()*1000+1),
                                success: function(data){
                                    data = JSON.parse(data);
                                    var html1 = '<option value=>请选择</option>';
                                    var html2 = '';
                                    $.each(data, function(i,item) {
                                        html1 +='<option value='+item.id+'>'+item.title+'</option>';
                                    });
                                    $('#branchid_select').html(html1);
                                }
                            })
                    })</script>";
            } else {
                $html .= "<script type='text/javascript'>
                    $('#" . $field . "_select').change(function(){ 
                            $('." . $field . "_span').remove();
                            var span_text = $(this).val();
                            $('#$field').append('<input type=\"hidden\" class=\"" . $field . "_span\" name=\"" . $arr . "[" . $field . "]\" value = \"'+span_text+'\"/>');
                    })
                </script>";
            }
            return $html;
        }
    }

    function text($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if (empty($value)) {
            if (!empty($defaultvalue)) {
                $value = $defaultvalue;
            } else {
                $value = '';
            }
        }
        $type = $ispassword ? 'password' : 'text';
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        return '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group"><input type="text" name="' . $arr . '[' . $field . ']" id="' . $field . '" value="' . $value . '" class="form-control"></div></td></tr>';
    }

    function getLinkageMenuFatherName($linkageid) {
        if (($model = Linkagemenu::findOne($linkageid)) !== null) {
            return $model->name;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function getLinkageMenuChild($linkageid) {
        if (($model = Linkagemenu::find()->where(['pid' => $linkageid])->orderBy('linkageid')->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function linkagemenu($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        $LinkageMenuName = $this->getLinkageMenuFatherName($linkageid);
        $linkageMenuOneList = $this->getLinkageMenuChild($linkageid);
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }

        $linkageMenuHtml = '';
        foreach ($linkageMenuOneList as $key => $value) {
            $linkageMenuid = $value['linkageid'];
            $linkageMenuName = $value['name'];
            $pid = $value['pid'];
            $linkageMenuHtml .= "<a onclick=get_child('{$linkageMenuid}','{$linkageMenuName}','{$pid}','{$field}') href=javascript:void(0)>{$linkageMenuName}</a>&nbsp;&nbsp;";
        }
        return '<tr><td  style="width: 120px;"><span>' . $name . '</span></td><td  class="hidden-phone"><div  class="col-sm-8 input-group"><div name="' . $field . '" value="" id="' . $field . '" class="ib">' . $LinkageMenuName . '</div>
        <input type="text" style="width:85;height:20;display:none" id="' . $field . '_hidden" name="' . $arr . '[' . $field . ']"  value="0" size="5" class="input-text"> 
        <span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#' . $field . 'target">
            在列表中选择</span></div></td></tr>
<div class="modal fade" id="' . $field . 'target" tabindex="-1" role="dialog" 
   aria-labelledby="' . $field . 'Label" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="' . $field . 'Label">
               ' . $LinkageMenuName . '
            </h4>
         </div>
         <div class="modal-body">
             <div class="linkage-menu">
	<h6>
		<a class="rt" onclick=get_child("' . $linkageid . '","","0","' . $field . '") href="javascript:;">&lt;&lt;返回主菜单</a>
		<span id= "path_' . $field . '">' . $LinkageMenuName . '</span> 
	</h6>
	<div id="ul_' . $field . '" class="ib-a menu">
        ' . $linkageMenuHtml . '
	</div>
</div>       
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
         </div>
      </div>
</div>
</div>';
    }

    function textarea($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if (empty($value)) {
            if (!empty($defaultvalue)) {
                $value = $defaultvalue;
            } else {
                $value = '';
            }
        }
        $allow_empty = 'empty:true,';
        if ($minlength || $pattern)
            $allow_empty = '';
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $str = '<tr><td  style="width: 120px;"><span>' . $name . '</span></td><td  class="hidden-phone"><div  class="col-sm-8 input-group"><textarea  name="' . $arr . '[' . $field . ']" id="' . $field . '" class="form-control"  cols="60"  rows="3">' . $value . '</textarea></div></td></tr>';
        return $str;
    }

    function box($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        if (empty($value)) {
            if (!empty($defaultvalue)) {
                $value = $defaultvalue;
            } else {
                $value = '';
            }
        }

        $options = explode("\n", $setting['options']);

        foreach ($options as $_k) {
            $v = explode("|", $_k);
            $k = trim($v[1]);
            $option[$k] = $v[0];
        }
        $values = explode(',', $value);
        $value = array();
        foreach ($values as $_k) {
            if ($_k != '')
                $value[] = $_k;
        }
        $value = implode(',', $value);

        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $string = '<tr><td style="width: 120px;"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group">';
        switch ($setting['boxtype']) {
            case 'radio':
                $string .= Html::radioList($arr . '[' . $field . ']', $value, $option, [ 'id' => $field]);
                break;
            case 'checkbox':
                $string .= Html::checkboxList($arr . '[' . $field . '][]', $value, $option, [ 'id' => $field]);
                break;
            case 'select':
                $string .= Html::dropDownList($arr . '[' . $field . ']', $value, $option, [ 'id' => $field]);
                break;
            case 'multiple':
                $string .= '<select multiple="" class="width-80 chosen-select" id="' . $field . '" data-placeholder="Choose a Country..." name="' . $arr . '[' . $field . '][]' . '">
                                                                <option value="">&nbsp;</option>
                                                                ';
                foreach ($option as $key => $val) {
                    $string .= '<option value="' . $key . '">' . $val . '</option>';
                }
                $string .= '</select>';
                break;
        }
        $string .= '</div></td></tr>';
        return $string;
    }

    function number($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if (empty($value)) {
            if (!empty($defaultvalue)) {
                $value = $defaultvalue;
            } else {
                $value = '';
            }
        }
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        return "<tr><td class='field-td-cls'><span>" . $name . "</span></td><td class='hidden-phone'><div class='col-sm-8 input-group'><input type='text' class='form-control' min = '" . $minnumber . "' max = '" . $maxnumber . "' name='" . $arr . "[" . $field . "]' id='" . $field . "' value='" . $value . "' style='height:34px;border:1px solid #e2e2e4;'></div></td></tr>";
    }

    function islink($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if ($value) {
            $url = $this->data['url'];
            $checked = 'checked';
            $_GET['islink'] = 1;
        } else {
            $disabled = 'disabled';
            $url = $checked = '';
            $_GET['islink'] = 0;
        }
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $size = isset($fieldinfo['size']) ? $fieldinfo['size'] : 25;
        $html = '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group">';
        $html .= '<div class="col-sm-6 input-group" style="padding:0px;"><input type="text" name="linkurl" id="linkurl" value="' . $url . '" size="' . $size . '" maxlength="255" ' . $disabled . ' class="form-control input-text"></div>
                                <select name="' . $arr . '[' . $field . ']" id="' . $field . '" onclick="ruselinkurl();" style="padding: 6px;"><option value="0">无转向链接</option><option value="1">使用转向链接</option></select>';
        $html .= "<script type='text/javascript'>
        function ruselinkurl() {
        if($('#" . $field . "').val()=='1') {
                $('#linkurl').attr('disabled',false);
                return false;
        } else {
                $('#linkurl').attr('disabled','true');
        }
        }
        </script>";
        $html = '</div></td></tr>';
        return $html;
    }

    function title($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if (empty($value)) {
            if (!empty($defaultvalue)) {
                $value = $defaultvalue;
            } else {
                $value = '';
            }
        }
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $html = '<tr><td colspan="2"><div class="col-sm-8 input-group"><span class="input-group-addon">标题</span><input type="text" name="' . $arr . '[' . $field . ']" id="' . $field . '" maxlength="80" value="' . $value . '" class="form-control" /><span class="input-group-btn"><span class="btn btn-white" onclick="check_title();">重复检测</span></span></div>';
        $html .= '<script  type="text/javascript">
            function check_title() {
            var title = $("#title").val();
            var catid = id = 0;
            if($("#catid").val()){catid = $("#catid").val();}
            if($("#id").val()){catid = $("#id").val();}
            var modelid = $("#modelid").val();
            if(title=="") {
                alert("请填写标题");
                $("#title").focus();
            } else {
                $.post("index.php?r=content/checktitle", { title: title,catid: catid,modelid: modelid,id:id},
                    function(data){
                        if(data=="ok") {
                            alert("没有重复标题");
                        } else if(data=="no") {
                            alert("有完全相同的标题存在");
                        } 
                    });
                }
            }
    </script></td></tr>';
        return $html;
    }

    function copyfrom($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $html = '<tr><td class="field-td-cls"><span>' . $name . '</span></td><td class="hidden-phone"><div class="col-sm-8 input-group"><div style="padding:0px;" class="col-sm-6 input-group"><input type="text" name="' . $arr . '[' . $field . ']" id="' . $field . '" value="" class="form-control input-text"></div>
                        <select onchange="change_value(\'' . $field . '\',this.value)" name="' . $field . '_data" style="padding: 7px;">
                        <option value="0">≡请选择≡</option>
                        <option value="1">百利天下留学</option>
                        <option value="2">美加百利留学</option>
                        <option value="3">前程百利考试</option>
                        </select></div></td></tr>';
        return $html;
    }

    /**
     * 相关内容
     */
    function relation($field, $value, $fieldinfo) {
        extract($fieldinfo);
        $setting = unserialize($setting);
        extract($setting);
        if (isset($issystem) && $issystem == 1) {
            $arr = 'info';
        } else {
            $arr = 'sub';
        }
        $html = '';
        $html .= "<tr><td class='field-td-cls'><span>" . $name . "</span></td><td class='hidden-phone'><div class='col-sm-8 input-group'><div class='input-group'>
                    <input type='hidden' name='" . $arr . "[" . $field . "]' id='" . $field . "' value='" . $value . "' >
                    <input type='text' name='search' id='relation_search' class='form-control' style='width: 200px;'>
                    <span class='input-group-btn pull-left'>
                    <button class='btn btn-white' type='button' onclick='relation_add(\"index.php?r=content/relation&cid=\");'>搜索</button>
                    </span>
                </div>
                <div class='tasks-widget'>
                    <ul class='task-list' id='relation_result'>";
        if (isset($value)) {
            $rela_arr = explode('~bbb~', $value);
            foreach ($rela_arr as $val) {
                if (isset($val) && !empty($val)) {
                    $rela_data = explode('~aaa~', $val);
                    $html .= '<li><strong>标题：</strong><span>' . $rela_data[0] . '</span><strong style="padding-left:30px;">链接：</strong><span>' . $rela_data[1] . '</span>
					<a class="pull-right cur" href="javascript:void(0);" onclick="removeRelation(this);" style="color:red;">移 除</a>
					</li>';
                }
            }
        }
        $html .= "</ul>
                </div>
                </div></td></tr>";
        return $html;
    }

    //万能字段
    function omnipotent($field, $value, $fieldinfo) {
        print_R($fieldinfo);
        die;
        extract($fieldinfo);

        $setting = unserialize($setting);
        extract($setting);
        $formtext = str_replace('{FIELD_VALUE}', $value, $formtext);
        $formtext = str_replace('{MODELID}', $modelid, $formtext);
        preg_match_all('/{FUNC\((.*)\)}/', $formtext, $_match);
        echo $modelid;
        foreach ($_match[1] as $key => $match_func) {
            $string = '';
            $params = explode('~~', $match_func);
            $user_func = $params[0];
            $string = $user_func($params[1]);
            $formtext = str_replace($_match[0][$key], $string, $formtext);
        }
        $id = $this->id ? $this->id : 0;
        $formtext = str_replace('{ID}', $id, $formtext);
        $errortips = $this->fields[$field]['errortips'];
        if ($errortips)
            $this->formValidator .= '$("#' . $field . '").formValidator({onshow:"",onfocus:"' . $errortips . '"}).inputValidator({min:' . $minlength . ',max:' . $maxlength . ',onerror:"' . $errortips . '"});';

        if ($errortips)
            $this->formValidator .= '$("#' . $field . '").formValidator({onshow:"' . $errortips . '",onfocus:"' . $errortips . '"}).inputValidator({min:1,onerror:"' . $errortips . '"});';
        return $formtext;
    }

}
