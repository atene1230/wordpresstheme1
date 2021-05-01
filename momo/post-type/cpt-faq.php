<?php
class CPT_Faq{
    const SLUG = 'faq';
    const SCF_ID = 'scf-faq1';
    const SCF_TITLE = 'よくある質問';
    const TAXONOMY = 'faq-category';

    private $params;
    private $fields;
    private $taxonomy;


    public function __construct(){
        $this->params = array(
            'label' => 'よくある質問',
            'labels' => array('all_items' => 'よくある質問'),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        $this->taxonomy = array(
			'hierarchical' => true,
			'label' => '分類',
			'singular_label' => '分類',
			'public' => true,
			'show_ui' => true
        );

        $this->fields = array(
            array(
                'group' => self::SLUG.'-group1',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-excerpt',
                        'label' => '抜粋',
                        'type'  => 'textarea',
                        'rows'  => 5,
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

    public function get_fields(){
        return $this->fields;
    }
}
?>
