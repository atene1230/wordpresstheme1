<?php
class CPT_Coupon{
    const SLUG = 'coupon';
    const TAXONOMY = 'coupon-category';
    const SCF_ID = 'scf-coupon1';
    const SCF_TITLE = 'クーポン';

    private $params;
    private $taxonomy;
    private $terms;

    public function __construct(){
        $this->params = array(
            'label' => 'クーポン',
            'labels' => array('all_items' => 'クーポン'),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        $this->taxonomy = array(
			'hierarchical' => true,
			'label' => 'クーポン種別',
			'singular_label' => 'クーポン種別',
			'public' => true,
			'show_ui' => true
        );
        $this->terms = array(
            array(
                'name' => 'すべてのお客様',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'all',
                ),
            ),
            array(
                'name' => '初回のみ',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'new',
                ),
            ),
            array(
                'name' => '2回目以降',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'repeat',
                ),
            ),
        );
        $this->fields = array(
            array(
                'group' => self::SLUG.'-group1',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-menu',
                        'label' => '対象メニュー',
                        'type'  => 'check',
                        'choices' => array(
                            'カット' => 'カット',
                            'カラー' => 'カラー',
                            'パーマ' => 'パーマ',
                            'ヘッドスパ' => 'ヘッドスパ',
                            'ネイル・ハンドケア' => 'ネイル・ハンドケア',
                            'フェイスケア' => 'フェイスケア',
                            'ボディ' => 'ボディ',
                            'ブライダル' => 'ブライダル',
                            'その他' => 'その他',
                        ),
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group6',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-time',
                        'label' => '施術時間',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group2',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-normal-price',
                        'label' => '通常価格',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group3',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-coupon-price',
                        'label' => 'クーポン価格',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group4',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-image',
                        'label' => 'イメージ画像',
                        'type'  => 'image',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group5',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-reserveurl',
                        'label' => 'Web予約URL',
                        'type'  => 'text',
                    ),
                )
            ),
        );

    }

    public function get_param(){
        return $this->params;
    }

    public function get_tax(){
        return $this->taxonomy;
    }

    public function get_terms(){
        return $this->terms;
    }
    public function get_fields(){
        return $this->fields;
    }


}
?>