<?php
class CPT_OptionPage{
    const SLUG = 'scfex-opt';

    private $posttypes;

    public function __construct(){
        $this->posttypes = array(
            array(
                'menu-id' => 'scf-options1',
                'menu-title' => 'ヘアスタイル',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-style-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-style-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-style-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-style-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-style-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-style-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-style-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-style-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options2',
                'menu-title' => 'ランキング',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-ranking-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-ranking-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-ranking-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-ranking-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-ranking-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-ranking-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-ranking-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-ranking-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options3',
                'menu-title' => 'クーポン',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-coupon-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-coupon-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-coupon-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-coupon-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-coupon-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-coupon-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-coupon-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-coupon-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options4',
                'menu-title' => 'メニュー',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-menu-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-menu-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-menu-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-menu-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-menu-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-menu-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-menu-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-menu-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options5',
                'menu-title' => 'スタッフ',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-staff-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-staff-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-staff-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-staff-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-staff-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-staff-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-staff-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-staff-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options6',
                'menu-title' => 'コンテンツ',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-contents-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-contents-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-contents-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-contents-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-contents-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-contents-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-contents-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-contents-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options7',
                'menu-title' => 'コラム',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-blog-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-blog-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-blog-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-blog-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-blog-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-blog-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-blog-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-blog-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options8',
                'menu-title' => 'インフォメーション',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-info-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-info-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-info-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-info-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-info-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-info-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-info-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-info-h1text',
                                'label' => 'H1テキスト',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                ),
            ),
            array(
                'menu-id' => 'scf-options9',
                'menu-title' => 'FAQ',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-faq-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-faq-title',
                                'label' => 'TITLEタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-faq-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-faq-description',
                                'label' => 'ディスクリプション',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-faq-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-faq-keyword',
                                'label' => 'キーワード',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-faq-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-faq-h1text',
                                'label' => 'H1テキスト',
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