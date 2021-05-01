<?php
class CPT_ShopInfo{
    const SLUG = 'scfex-shopinfo';

    private $posttypes;

    public function __construct(){
        $this->posttypes = array(
            array(
                'menu-id' => 'scf-shopinfo1',
                'menu-title' => '店舗情報',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-shop-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-name',
                                'label' => '店舗名（一覧用短縮表記）',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-meta-title',
                                'label' => '店舗名（TITLEタグ用）',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-meta-h1',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group15',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-meta-description',
                                'label' => 'デスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group16',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-meta-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-order',
                                'label' => '表示順',
                                'type'    => 'text',
                                'default' => '10',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group5',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-logo',
                                'label' => '店舗ロゴ画像',
                                'type'    => 'image',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group7',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-address',
                                'label' => '住所',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group8',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-tel',
                                'label' => '電話番号',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group9',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-card',
                                'label' => '利用可能カード',
                                'type'  => 'check',
                                'choices' => array(
                                    'visa' => 'VISA',
                                    'master' => 'マスターカード',
                                    'jcb' => 'JCB',
                                    'amex' => 'AMERICAN EXPRESS',
                                    'diners' => 'ダイナーズ',
                                ),
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-style-group10',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-time',
                                'label' => '営業時間',
                                'type'    => 'textarea',
                                'rows' => 10,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group11',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-map',
                                'label' => 'GoogleMap URL',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group12',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-review',
                                'label' => '口コミURL',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group6',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-reserve',
                                'label' => 'Web予約アドレス',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group13',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-gatag',
                                'label' => 'Google Analytics トラッキングタグ',
                                'type'    => 'textarea',
                                'rows' => 5,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-group14',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-calendar',
                                'label' => 'Google カレンダー 埋め込みタグ',
                                'type'    => 'textarea',
                                'rows' => 5,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-shop-eventtags',
                        'repeat' => true,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-shop-eventtag-key',
                                'label' => 'イベントタグ識別子',
                                'type'    => 'text',
                            ),	
                            array(
                                'name'  => self::SLUG.'-shop-eventtag',
                                'label' => '各種イベントタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),


                ),
            ),
        );
    }

    public function get_posttypes(){
        return $this->posttypes;
    }

}
?>