<?php
class CPT_Staff{
    const SLUG = 'staff';
    const TAXONOMY = 'staff-position';
    const SCF_ID = 'scf-staff1';
    const SCF_TITLE = 'スタッフ';

    private $params;
    private $taxonomy;
    private $terms;
    private $fields;

    public function __construct(){
        $this->params = array(
            'label' => 'スタッフ',
            'labels' => array('all_items' => 'スタッフ'),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        $this->taxonomy = array(
			'hierarchical' => true,
			'label' => '役職',
			'singular_label' => '役職',
			'public' => true,
			'show_ui' => true
        );
        $this->terms = array(
            array(
                'name' => 'スタイリスト',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'stylist',
                ),
            ),
            array(
                'name' => 'エステティシャン',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'esthetician',
                ),
            ),
            array(
                'name' => 'アシスタント',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'assistant',
                ),
            ),
            array(
                'name' => 'レセプション',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'reception',
                ),
            ),
        );
        $this->fields = array(
            array(
                'group' => self::SLUG.'-group1',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-image',
                        'label' => 'スタッフ写真',
                        'type'  => 'image',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group2',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-name-alpha',
                        'label' => '氏名（ローマ字）',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group3',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-name-job',
                        'label' => '役職（表示用）',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group4',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-comment-title',
                        'label' => 'コメント（見出し）',
                        'type'  => 'textarea',
                        'rows'    => 3,
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group5',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-career',
                        'label' => '歴年数',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group6',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-taste',
                        'label' => '得意なイメージ',
                        'type'  => 'text',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group7',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-technique',
                        'label' => '得意な技術',
                        'type'  => 'textarea',
                        'rows'    => 3,
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group8',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-hobby',
                        'label' => '趣味・マイブーム',
                        'type'  => 'textarea',
                        'rows'    => 3,
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group9',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-reserve',
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