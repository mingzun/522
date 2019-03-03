<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">编辑分类</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                            <tr>
                            	<th>标题</th>
                                <th>展示图片</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form action="<?= url('wxapp.page/syfl1') ?>" method="post" accept-charset="utf-8" id="subform" enctype = "multipart/form-data">
                            	
                            <?php if (!empty($list)): foreach ($list as $first): ?>
                            	<input type="hidden" name="id" value="<?= $first['id'] ?>">
                                <tr>
                                    <td class="am-text-middle">
                                    	<input type="text" name="title" value="<?= $first['title'] ?>">
                                    </td>
                                    <td class="am-text-middle">
                                    	<div class="am-form-group">
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-form-file">
                                        <div class="am-form-file">
                                            <button type="button"
                                                    class="upload-file am-btn am-btn-secondary am-radius" onclick="$('#i-file1').click();">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button>
                                            <input id='location1' class="input-text wid300" disabled style="width: 40.2%">
           <input type="file" id='i-file1'  accept="image/gif, image/jpeg , image/png " onchange="$('#location1').val($('#i-file1').val());" style="display: none" name="images" multiple="multiple">
                                    </div>
                                </div>
                            </div>
                                    </td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href='javascript:;' onclick="document.getElementById('subform').submit();">
                                                <i class="am-icon-pencil"></i>确定
                                            </a>
                                    
                                    </div>
                                </div>
                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                            </form>
                                <tr>
                                    <td colspan="5" class="am-text-center">暂无记录</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>




