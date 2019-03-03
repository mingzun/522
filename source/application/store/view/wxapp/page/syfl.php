<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">每日新鲜</div>
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
                                <th>分类名称</th>
                                <th>展示图片</th>
                                <th>标题</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($list)): foreach ($list as $first): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $first['id'] ?></td>
                                    <td class="am-text-middle"><img src="<?php
                                    $a = $_SERVER['HTTP_HOST'];
                                     echo str_replace('http://'.$a.'\\/','',$first['images']) 
                                     ?>" alt="" width="50px" ></td>
                                    <td class="am-text-middle"><?= $first['title'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('wxapp.page/syfl1',
                                                ['id' => $first['id']]) ?>">
                                                <i class="am-icon-pencil"></i>设置标题
                                            </a>
                                            <a href="<?= url('wxapp.page/syfl2',
                                                ['id' => $first['id']]) ?>" >
                                                <i class="am-icon-pencil"></i>设置商品
                                            </a>
                                    
                                    </div>
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
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">天天特价</div>
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
                                <th>分类名称</th>
                                <th>展示图片</th>
                                <th>标题</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($list)): foreach ($list1 as $first): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $first['id'] ?></td>
                                    <td class="am-text-middle"><img src="<?php
                                    $a = $_SERVER['HTTP_HOST'];
                                     echo str_replace('http://'.$a.'\\/','',$first['images']) 
                                     ?>" alt="" width="50px" ></td>
                                    <td class="am-text-middle"><?= $first['title'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('wxapp.page/syfl1',
                                                ['id' => $first['id']]) ?>">
                                                <i class="am-icon-pencil"></i>设置标题
                                            </a>
                                            <a href="<?= url('wxapp.page/syfl2',
                                                ['id' => $first['id']]) ?>" >
                                                <i class="am-icon-pencil"></i>设置商品
                                            </a>
                                    
                                    </div>
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
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">生活必备</div>
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
                                <th>分类名称</th>
                                <th>展示图片</th>
                                <th>标题</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($list)): foreach ($list2 as $first): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $first['id'] ?></td>
                                    <td class="am-text-middle"><img src="<?php
                                    $a = $_SERVER['HTTP_HOST'];
                                     echo str_replace('http://'.$a.'\\/','',$first['images']) 
                                     ?>" alt="" width="50px" ></td>
                                    <td class="am-text-middle"><?= $first['title'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('wxapp.page/syfl1',
                                                ['id' => $first['id']]) ?>">
                                                <i class="am-icon-pencil"></i>设置标题
                                            </a>
                                            <a href="<?= url('wxapp.page/syfl2',
                                                ['id' => $first['id']]) ?>" >
                                                <i class="am-icon-pencil"></i>设置商品
                                            </a>
                                    
                                    </div>
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

