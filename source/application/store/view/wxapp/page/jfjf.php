<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">积分设置</div>
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
                                <th>规则名称</th>
                                <th>规则说明</th>
                                <th>VIP积分</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($list)): foreach ($list as $first): ?>
                                <tr>
                                    <td class="am-text-middle"><?=  $first['name'] ?></td>
                                    <td class="am-text-middle"><?=  $first['sm'] ?></td>
                                    <td id="lalala<?=  $first['id'] ?>" class="am-text-middle"><?=  $first['socre'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a id="bj<?=  $first['id'] ?>" >
                                                    <i class="am-icon-pencil">编辑</i> 
                                            </a>
                                        </div>
                                    </td>
                                </div>
                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
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
 <?php if (!empty($list)): foreach ($list as $first): ?>
<script language="javascript"> 
    $('#bj<?=  $first['id'] ?>').click(function(event) {
        var id = <?=  $first['id'] ?>;
         jifen = prompt('请输入获得积分')
         var url = "<?= url('') ?>";
        $.ajax({
                type:'get',
                url:url,
                data:'id='+id+'&jifen='+jifen+'',
                success: function(res) {
                    console.log(res)
                    if (res.success == 'ok') {
                        console.log($('lalala<?=  $first['id'] ?>'))
                        $('#lalala<?=  $first['id'] ?>').html(jifen)
                    }
                } 
            });
    });
</script>
<?php endforeach; else: ?>
<?php endif; ?>
