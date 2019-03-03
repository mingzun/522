<?php

namespace app\common\model;

/**
 * 微信小程序diy页面模型
 * Class WxappPage
 * @package app\common\model
 */
class WxappPage extends BaseModel
{
    protected $name = 'wxapp_page';

    /**
     * 格式化页面数据
     * @param $json
     * @return array
     */
    public function getPageDataAttr($json)
    {
        $array = json_decode($json, true);
        return compact('array', 'json');
    }
    
    /**
     * 自动转换data为json格式
     * @param $value
     * @return string
     */
    public function setPageDataAttr($value)
    {
        return json_encode($value ?: ['items' => []]);
    }

    /**
     * diy页面详情
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail()
    {
        return self::get([]);
    }

    /**
     * 新增小程序首页diy默认设置
     * @param $wxapp_id
     * @return false|int
     */
    public function insertDefault($wxapp_id)
    {
        return $this->save([
            'page_type' => 10,
            'page_data' => [
                'items' => [
                    's10001' => [
                        'id' => 's10001',
                        'type' => 'search',
                        'params' => ['placeholder' => '搜索商品'],
                        'style' => [
                            'textAlign' => 'center',
                            'searchStyle' => 'radius',
                        ],
                    ],
                    's10002' => [
                        'id' => 's10002',
                        'type' => 'banner',
                        'style' => [
                            'btnColor' => '#ffffff',
                            'btnShape' => 'round',
                        ],
                        'data' => [
                            'sd10001' => [
                                'imgUrl' => 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAPAAA/+EDKmh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS41LWMwMTQgNzkuMTUxNDgxLCAyMDEzLzAzLzEzLTEyOjA5OjE1ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0QzczNTQyODg4QTIxMUU3QTI0MUVGRjA4MjJDOUQwOCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0QzczNTQyNzg4QTIxMUU3QTI0MUVGRjA4MjJDOUQwOCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MzUwQTEyMDc4MjY1MTFFNzlCRkM4MDNFNjkyODQwNDciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MzUwQTEyMDg4MjY1MTFFNzlCRkM4MDNFNjkyODQwNDciLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoM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cH2tnLy3Fd/as1tl1rMaTHy15p+BGmvDyfJvP7Q0qEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB//9k4NTM0SFREcW5zUCsrbHJNdVFOdzluUDVnYi92L3N1VzVIenFiMTdXY2NKMUpSd0hYQQ==',
                                'imgName' => 'banner-1.jpg',
                                'linkUrl' => '',
                            ],
                            'sd10002' => [
                                'imgUrl' => 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAPAAA/+EDKmh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS41LWMwMTQgNzkuMTUxNDgxLCAyMDEzLzAzLzEzLTEyOjA5OjE1ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozODc1MjY4Njg4QTExMUU3QUVCQUJBREQ1QjZGNUYzMyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozODc1MjY4NTg4QTExMUU3QUVCQUJBREQ1QjZGNUYzMyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDNGNTIwNEI4MjY1MTFFNzgwMTBDQTAwNjhGQTg1OTciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDNGNTIwNEM4MjY1MTFFNzgwMTBDQTAwNjhGQTg1OTciLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoM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AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAH/9lkN2UyK1JGbUl2Q3V6bytJb2ZOdmlmM0Nka2NlM0lHV0s0YjZoekVFNG5oaDV1OUtLQQ==',
                                'imgName' => 'banner-2.jpg',
                                'linkUrl' => '',
                            ],
                        ],
                    ]
                ],
            ],
            'wxapp_id' => $wxapp_id
        ]);
    }

}
