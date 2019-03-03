<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">服务列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius"
                                       href="<?= url('service/add') ?>">
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
                                <th>服务ID</th>
                                <th>服务名称</th>
                                <th>分类</th>
                                <th>质保价格</th>
                                <th>联系人</th>
                                <th>联系方式</th>
                                <th>服务状态</th>
                                <th>排序id</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($list)): foreach ($list as $first): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $first['id'] ?></td>
                                    <td class="am-text-middle"><?= $first['service_name'] ?></td>
                                    <td class="am-text-middle"><?= $first['service_fenlei'] ?></td>
                                    <td class="am-text-middle"><?= $first['service_price'] ?></td>
                                    <td class="am-text-middle"><?= $first['service_person'] ?></td>
                                    <td class="am-text-middle"><?= $first['service_contacts'] ?></td>
                                    <td class="am-text-middle"><?= $first['service_status'] ?></td>
                                     <td class="am-text-middle"><?= $first['pid'] ?></td>
                                    <td class="am-text-middle"><?= date('Y-m-d H:i:s',$first['create_time']) ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('service.label/edit',
                                                ['id' => $first['id']]) ?>">
                                                <i class="am-icon-pencil"></i>详情
                                            </a>
                                            <a href="<?= url('service.label/edit',
                                                ['id' => $first['id']]) ?>">
                                                <i class="am-icon-pencil"></i>编辑
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $first['id'] ?>">
                                                <i class="am-icon-trash"></i>删除
                                            </a>
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
<script>
    $(function () {
        // 删除元素
        var url = "<?= url('goods.label/delete') ?>";
        $('.item-delete').delete('goods_label_id', url);

    });
</script>

