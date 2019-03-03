<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">商品标签</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius"
                                       href="<?= url('goods.label/add') ?>">
                                        <span class="am-icon-plus"></span> 新增
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                            <tr>
                                <th>标签ID</th>
                                <th>标签名称</th>
                                <th>标签排序</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($list)): foreach ($list as $first): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $first['goods_label_id'] ?></td>
                                    <td class="am-text-middle"><?= $first['good_label'] ?></td>
                                    <td class="am-text-middle"><?= $first['good_id'] ?></td>
                                    <td class="am-text-middle"><?= date('Y-m-d H:i:s',$first['create_time']) ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('goods.label/edit',
                                                ['goods_label_id' => $first['goods_label_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $first['goods_label_id'] ?>">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php if (isset($first['child'])): foreach ($first['child'] as $two): ?>
                                    <tr>
                                        <td class="am-text-middle"><?= $two['goods_label_id'] ?></td>
                                        <td class="am-text-middle">　-- <?= $two['good_label'] ?></td>
                                        <td class="am-text-middle"><?= $two['sort'] ?></td>
                                        <td class="am-text-middle"><?= $two['create_time'] ?></td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                                <a href="<?= url('goods.label/edit',
                                                    ['category_id' => $two['goods_label_id']]) ?>">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                                   data-id="<?= $two['goods_label_id'] ?>">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr>


                                  


                                <?php endforeach; endif; ?>
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
<script>
    $(function () {
        // 删除元素
        var url = "<?= url('goods.label/delete') ?>";
        $('.item-delete').delete('goods_label_id', url);

    });
</script>

