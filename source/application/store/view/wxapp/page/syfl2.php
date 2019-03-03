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
                                <th>更改时间</th>
                                <th>选择商品</th>
                            </tr>
                            </thead>
                                    <input id="flid" type="hidden" name="id" value="<?= $id ?>">
                            <tbody id="osdfkosd">
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
                                    <td class="am-text-middle"><?= $item['update_time'] ?></td>
                                    <td class="am-text-middle">
                                        <input name="check" type="checkbox" value="<?= $item['goods_id'] ?>" class="regbtn<?= $item['goods_id'] ?>"/>
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
                                <th>更改时间</th>
                                <th>更改商品</th>
                            </tr>
                            </thead>
                            <tbody id="lalalalal">
                            <?php if (!$list1->isEmpty()): foreach ($list1 as $item): ?>
                                <tr id="trr<?= $item['goods_id'] ?>">
                                    <input id="flidd<?= $item['goods_id'] ?>" type="hidden" value="<?= $item['goods_id'] ?>">
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
                                    <td class="am-text-middle"><?= $item['update_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <input name="check" type="checkbox" value="<?= $item['goods_id'] ?>" class="regbtn<?= $item['goods_id'] ?>"/>
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
    <script type="text/javascript" id="sc<?= $item['goods_id'] ?>">
        $(function(){
                $(".am-table").on("click",'.regbtn<?= $item['goods_id'] ?>',function(){
                    var goodsid = $('.regbtn<?= $item['goods_id'] ?>').val();
                    var id = $('#flid').val();
                    console.log(goodsid)
                    $.ajax({
                        type:"get",
                        url:"<?= url('wxapp.page/syfl2ajax') ?>",
                        data:"id="+id+'&'+"goodsid="+goodsid,
                        dataType:'json',
                        success:function(res){
                           if (res.success == 'ok') {
                    $("#tr"+goodsid).remove();
                             if(res.res.goods_status.value == 10)
                                {var color='x-color-green'}
                            else{var color='x-color-red'}
var TableStr='';
TableStr += '<tr id="trr'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+res.res.goods_id+'</td>';
TableStr +='<input id="flidd'+res.res.goods_id+'" type="hidden" value="'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+'<a href ="'+res.res.image['0']['file_path']+'">'+'<img src="'+res.res.image['0']['file_path']+'" width="50" height="50" alt="商品图片">'+'</a>'+'</td>';
TableStr += '<td class="am-text-middle"><p class="item-title">'+res.res.goods_name+'</p></td>';
TableStr += '<td class="am-text-middle">'+res.res.category['name']+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.sales_actual+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.goods_sort+'</td>';
TableStr += '<td class="am-text-middle">'+'<span class="'+color+'">'+res.res.goods_status.text+'</span>'+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.create_time+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.update_time+'</td>';
TableStr +='<td class="am-text-middle"><input name="check" type="checkbox" value="'+res.res.goods_id+'" class="regbtn'+res.res.goods_id+'"/></td>';
TableStr += '</tr>';
                $('#lalalalal').prepend(TableStr)
                           }
            if (res.success == 'NO') {
                    $("#trr"+goodsid).remove();
                    if(res.res.goods_status.value == 10)
                                {var color='x-color-green'}
                            else{var color='x-color-red'}
var TableStr='';
TableStr += '<tr id="trr'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+res.res.goods_id+'</td>';
TableStr +='<input id="flidd'+res.res.goods_id+'" type="hidden" value="'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+'<a href ="'+res.res.image['0']['file_path']+'">'+'<img src="'+res.res.image['0']['file_path']+'" width="50" height="50" alt="商品图片">'+'</a>'+'</td>';
TableStr += '<td class="am-text-middle"><p class="item-title">'+res.res.goods_name+'</p></td>';
TableStr += '<td class="am-text-middle">'+res.res.category['name']+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.sales_actual+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.goods_sort+'</td>';
TableStr += '<td class="am-text-middle">'+'<span class="'+color+'">'+res.res.goods_status.text+'</span>'+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.create_time+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.update_time+'</td>';
TableStr +='<td class="am-text-middle"><input name="check" type="checkbox" value="'+res.res.goods_id+'" class="regbtn'+res.res.goods_id+'"/></td>';
TableStr += '</tr>';
                $('#osdfkosd').prepend(TableStr)

            }
                        }
                        
                    });
                });
                });
</script>
 <?php endforeach; else: ?>
<?php endif; ?>


<?php if (!$list->isEmpty()): foreach ($list1 as $item): ?>
    <script type="text/javascript" id="sc<?= $item['goods_id'] ?>">
        $(function(){
                $(".am-table").on("click",'.regbtn<?= $item['goods_id'] ?>',function(){
                    var goodsid = $('.regbtn<?= $item['goods_id'] ?>').val();
                    var id = $('#flid').val();
                    console.log(goodsid)
                    $.ajax({
                        type:"get",
                        url:"<?= url('wxapp.page/syfl2ajax') ?>",
                        data:"id="+id+'&'+"goodsid="+goodsid,
                        dataType:'json',
                        success:function(res){
                           if (res.success == 'ok') {
                    $("#tr"+goodsid).remove();
                             if(res.res.goods_status.value == 10)
                                {var color='x-color-green'}
                            else{var color='x-color-red'}
var TableStr='';
TableStr += '<tr id="trr'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+res.res.goods_id+'</td>';
TableStr +='<input id="flidd'+res.res.goods_id+'" type="hidden" value="'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+'<a href ="'+res.res.image['0']['file_path']+'">'+'<img src="'+res.res.image['0']['file_path']+'" width="50" height="50" alt="商品图片">'+'</a>'+'</td>';
TableStr += '<td class="am-text-middle"><p class="item-title">'+res.res.goods_name+'</p></td>';
TableStr += '<td class="am-text-middle">'+res.res.category['name']+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.sales_actual+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.goods_sort+'</td>';
TableStr += '<td class="am-text-middle">'+'<span class="'+color+'">'+res.res.goods_status.text+'</span>'+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.create_time+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.update_time+'</td>';
TableStr +='<td class="am-text-middle"><input name="check" type="checkbox" value="'+res.res.goods_id+'" class="regbtn'+res.res.goods_id+'"/></td>';
TableStr += '</tr>';
                $('#lalalalal').prepend(TableStr)
                           }
            if (res.success == 'NO') {
                    $("#trr"+goodsid).remove();
                    if(res.res.goods_status.value == 10)
                                {var color='x-color-green'}
                            else{var color='x-color-red'}
var TableStr='';
TableStr += '<tr id="trr'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+res.res.goods_id+'</td>';
TableStr +='<input id="flidd'+res.res.goods_id+'" type="hidden" value="'+res.res.goods_id+'">';
TableStr += '<td class="am-text-middle">'+'<a href ="'+res.res.image['0']['file_path']+'">'+'<img src="'+res.res.image['0']['file_path']+'" width="50" height="50" alt="商品图片">'+'</a>'+'</td>';
TableStr += '<td class="am-text-middle"><p class="item-title">'+res.res.goods_name+'</p></td>';
TableStr += '<td class="am-text-middle">'+res.res.category['name']+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.sales_actual+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.goods_sort+'</td>';
TableStr += '<td class="am-text-middle">'+'<span class="'+color+'">'+res.res.goods_status.text+'</span>'+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.create_time+'</td>';
TableStr += '<td class="am-text-middle">'+res.res.update_time+'</td>';
TableStr +='<td class="am-text-middle"><input name="check" type="checkbox" value="'+res.res.goods_id+'" class="regbtn'+res.res.goods_id+'"/></td>';
TableStr += '</tr>';
                $('#osdfkosd').prepend(TableStr)

            }
                        }
                        
                    });
                });
                });
</script>
 <?php endforeach; else: ?>
<?php endif; ?>