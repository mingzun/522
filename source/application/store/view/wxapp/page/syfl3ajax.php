<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">所有商品</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>商品ID</th>
                                <th>商品图片</th>
                                <th>商品名称</th>
                                <th>商品分类</th>
                                <th>实际销量</th>
                                <th>商品排序</th>
                                <th>商品状态</th>
                                <th>添加时间</th>
                                <th>选择商品</th>
                            </tr>
                            </thead>
                                    <input id="flid" type="hidden" name="id" value="<?= $id ?>">
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr id="tr<?= $item['goods_id'] ?>">
                                    <td class="am-text-middle"><?= $item['goods_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['image'][0]['file_path'] ?>"
                                           title="点击查看大图" target="_blank">
                                            <img src="<?= $item['image'][0]['file_path'] ?>"
                                                 width="50" height="50" alt="商品图片">
                                        </a>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['goods_name'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['category']['name'] ?></td>
                                    <td class="am-text-middle"><?= $item['sales_actual'] ?></td>
                                    <td class="am-text-middle"><?= $item['goods_sort'] ?></td>
                                    <td class="am-text-middle">
                                            <span class="<?= $item['goods_status']['value'] === 10 ? 'x-color-green'
                                                : 'x-color-red' ?>">
                                            <?= $item['goods_status']['text'] ?>
                                            </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <input name="check" type="checkbox" value="<?= $item['goods_id'] ?>" id="regbtn<?= $item['goods_id'] ?>"/>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">已添加商品</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>商品ID</th>
                                <th>商品图片</th>
                                <th>商品名称</th>
                                <th>商品分类</th>
                                <th>实际销量</th>
                                <th>商品排序</th>
                                <th>商品状态</th>
                                <th>添加时间</th>
                                <th>更改商品</th>
                            </tr>
                            </thead>
                                    <input id="flidd" type="hidden" name="id" value="<?= $id ?>">
                            <tbody id="lalalalal">
                            <?php if (!$list1->isEmpty()): foreach ($list1 as $item): ?>
                                <tr id="trr<?= $item['goods_id'] ?>">

                                    <td  class="am-text-middle"><?= $item['goods_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['image'][0]['file_path'] ?>"
                                           title="点击查看大图" target="_blank">
                                            <img src="<?= $item['image'][0]['file_path'] ?>"
                                                 width="50" height="50" alt="商品图片">
                                        </a>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['goods_name'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['category']['name'] ?></td>
                                    <td class="am-text-middle"><?= $item['sales_actual'] ?></td>
                                    <td class="am-text-middle"><?= $item['goods_sort'] ?></td>
                                    <td class="am-text-middle">
                                            <span class="<?= $item['goods_status']['value'] === 10 ? 'x-color-green'
                                                : 'x-color-red' ?>">
                                            <?= $item['goods_status']['text'] ?>
                                            </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del" id="dscbtn<?= $item['goods_id'] ?>">
                                                <i class="am-icon-trash">移除</i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!$list->isEmpty()): foreach ($list as $item): ?>
    <script type="text/javascript">
                $('#regbtn<?= $item['goods_id'] ?>').click(function(){
                    var goodsid = $('#regbtn<?= $item['goods_id'] ?>').val();
                    var id = $('#flid').val();
                    $.ajax({
                        type:"get",
                        url:"<?= url('wxapp.page/syfl2ajax') ?>",
                        data:"id="+id+'&'+"goodsid="+goodsid,
                        dataType:'json',
                        success:function(res){
                            console.log(res)
                            $("#tr"+res.data).remove();
                            $('#lalalalal').load("<?= url('wxapp.page/syfl3ajax',
                                                ['id' => $item['goods_id']]) ?>");
                             
                        }
                        
                    });
                });
</script>
 <?php endforeach; else: ?>
<?php endif; ?>
