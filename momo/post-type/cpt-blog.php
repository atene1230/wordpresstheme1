<?php
class CPT_Blog{
    const SLUG = 'post';
    const SCF_ID = 'scf-blog1';
    const SCF_TITLE = 'ブログ記事';

    private $fields;

    public function __construct(){
        $this->fields = array(
            array(
                'group' => self::SLUG.'-group1',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => 'blog-coupon',
                        'label' => '関連クーポン',
                        'type'    => 'relation',
                        'post-type'   => array( 'coupon' ),
                        'limit'       => 3,
                    ),	
                )
            ),
            array(
                'group' => self::SLUG.'-group2',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => 'blog-staff',
                        'label' => '担当スタッフ',
                        'type'    => 'relation',
                        'post-type'   => array( 'staff' ),
                        'limit'       => 1,
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