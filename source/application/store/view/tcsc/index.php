<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">出售中的商品</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                            </div>
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>发布用户</th>
                                <th>图片</th>
                                <th>分类</th>
                                <th>金额</th>
                                <th>标题</th>
                                <th>内容</th>
                                <th>手机</th>
                                <th>备注</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['uid']['nickName'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['thum'] ?>"
                                           title="点击查看大图" target="_blank">
                                            <img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/web/uploads/'; ?><?= $item['thum']?>"
                                                 width="50" height="50" alt="商品图片">
                                        </a>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['category']['name']?></p>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['money'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['Remarks'] ?></td>
                                    <td class="am-text-middle"><?= $item['content'] ?></td>
                                    <td class="am-text-middle"><?= $item['phone'] ?></td>
                                    <td class="am-text-middle"><?= $item['beizhu'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
<!--                                             <a href="<?= url('lbzx/lalalaedit',
                                                ['id' => $item['id']]) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a> -->
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['id'] ?>">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="9" class="am-text-center">暂无记录</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {

        // 删除元素
        var url = "<?= url('tcsc/delete') ?>";
        $('.item-delete').delete('id', url);

    });
</script>

