<?php
class CPT_Toppage{
    const SLUG = 'scfex-toppage';

    private $posttypes;

    public function __construct(){
        $this->posttypes = array(
            array(
                'menu-id' => 'scf-toppage1',
                'menu-title' => 'トップページ設定',
                'groups' => array(
                    array(
                        'group' => self::SLUG.'-slides',
                        'repeat' => true,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-slides-image',
                                'label' => 'スライド画像',
                                'type'    => 'image',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-group1',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-concept',
                                'label' => 'コンセプト',
                                'type'    => 'textarea',
                                'rows' => 5,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-group2',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-insta-cid',
                                'label' => 'Instagram API クライアントID',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-group3',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-insta-uid',
                                'label' => 'Instagram API ユーザーID',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-group4',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-insta-token',
                                'label' => 'Instagram API アクセストークン',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-group5',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-insta-hashtag',
                                'label' => 'Instaハッシュタグ',
                                'type'    => 'text',
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-group6',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-insta-official',
                                'label' => 'Insta埋め込みコード（公式アカウント）',
                                'type'    => 'textarea',
                                'rows' => 3,
                            ),	
                        ),
                    ),
                    array(
                        'group' => self::SLUG.'-group7',
                        'repeat' => false,
                        'settings' => array(
                            array(
                                'name'  => self::SLUG.'-insta-hashtag-code',
                                'label' => 'Insta埋め込みコード（ハッシュタグ）',
                                'type'    => 'textarea',
                                'rows' => 3,
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