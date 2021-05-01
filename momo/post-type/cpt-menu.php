<?php
class CPT_Menu{
    const SLUG = 'menu';
    const SCF_ID = 'scf-menu1';
    const SCF_TITLE = 'メニュー';
    const SCF_ID2 = 'scf-menu2';
    const SCF_TITLE2 = 'メニュー詳細';
    const TAXONOMY = 'menu-category';

    private $params;
    private $fields;
    private $fields_detail;
    private $taxonomy;
    private $terms;

    public function __construct(){
        $this->params = array(
            'label' => 'メニュー',
            'labels' => array('all_items' => 'メニュー'),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        $this->taxonomy = array(
			'hierarchical' => true,
			'label' => 'メニュー分類',
			'singular_label' => 'メニュー分類',
			'public' => true,
			'show_ui' => true
        );

        $this->fields = array(
            array(
                'group' => self::SLUG.'-group1',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-name-english',
                        'label' => 'メニュー（英語表記）',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group2',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-image',
                        'label' => 'イメージ画像',
                        'type'  => 'image',
                    ),
                )
            ),
        );
        $this->terms = array(
            array(
                'name' => '通常メニュー',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'normal',
                ),
            ),
            array(
                'name' => 'グルーミング&リラクゼーション',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'grooming',
                ),
            ),
        );
        $this->fields_detail = array(
            array(
                'group' => self::SLUG.'-detail',
                'repeat' => true,
                'settings' => array(
                    array(
                        'name'    => self::SLUG.'-detail-name',
                        'label'   => 'メニュー名',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => self::SLUG.'-detail-price',
                        'label'   => 'メニュー価格',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => self::SLUG.'-detail-process',
                        'label'   => 'メニュー工程',
                        'type'    => 'text',
                    ),
                    array(
                        'name'    => self::SLUG.'-detail-notice',
                        'label'   => 'メニュー注釈',
                        'type'    => 'textarea',
                        'rows'    => 3,
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
    public function get_fields_detail(){
        return $this->fields_detail;
    }

}
?>