<?php
class CPT_Style{
    const SLUG = 'hairstyle';
    const TAXONOMY = 'hairstyle-length';
    const TAG = 'hairstyle-tag';
    const SCF_ID = 'scf-hairstyle1';
    const SCF_TITLE = 'ヘアスタイル';
    const TAX_STYLE = 'hairstyle-style';
    const TAX_COLOR = 'hairstyle-color';

    private $params;
    private $taxonomy;
    private $tag;
    private $terms;
    private $terms_tag;
    private $fields;
    private $tax_style;
    private $tax_color;

    public function __construct(){
        $this->params = array(
            'label' => 'ヘアスタイル',
            'labels' => array('all_items' => 'ヘアスタイル'),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail'),
            'pagination'=>true,
        );
        $this->taxonomy = array(
			'hierarchical' => true,
			'label' => 'レングス',
			'singular_label' => 'レングス',
			'public' => true,
			'show_ui' => true
        );
        $this->tag = array(
			'hierarchical' => false,
			'label' => 'タグ',
			'singular_label' => 'タグ',
			'public' => true,
			'show_ui' => true
        );
        $this->tax_style = array(
			'hierarchical' => false,
			'label' => 'イメージ',
			'singular_label' => 'イメージ',
			'public' => true,
			'show_ui' => true
        );
        $this->tax_color = array(
			'hierarchical' => true,
			'label' => 'カラー',
			'singular_label' => 'カラー',
			'public' => true,
			'show_ui' => true
        );
        $this->terms = array(
            array(
                'name' => 'ベリーショート',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'veryshort',
                ),
            ),
            array(
                'name' => 'ショート',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'short',
                ),
            ),
            array(
                'name' => 'ミディアム',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'medium',
                ),
            ),
            array(
                'name' => 'ボウズ',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'bouzu',
                ),
            ),
            array(
                'name' => 'その他',
                'taxonomy' => self::TAXONOMY,
                'data' => array(
                    'slug' => 'other',
                ),
            ),
        );
        $this->terms_tag = array(
            array(
                'name' => '刈り上げ',
                'taxonomy' => self::TAG,
                'data' => array(
                    'slug' => 'kariage',
                ),
            ),
            array(
                'name' => 'ソフモヒ',
                'taxonomy' => self::TAG,
                'data' => array(
                    'slug' => 'soft-mohican',
                ),
            ),
            array(
                'name' => '斜めバング',
                'taxonomy' => self::TAG,
                'data' => array(
                    'slug' => 'diagonal-bang',
                ),
            ),
            array(
                'name' => 'ツーブロック',
                'taxonomy' => self::TAG,
                'data' => array(
                    'slug' => 'two-block',
                ),
            ),
            array(
                'name' => '束感',
                'taxonomy' => self::TAG,
                'data' => array(
                    'slug' => 'bunch',
                ),
            ),
        );
        $this->fields = array(
            array(
                'group' => self::SLUG.'-movie1',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-youtube',
                        'label' => 'Youtube埋め込みコード',
                        'type'    => 'text',
                    ),	
                )
            ),
            array(
                'group' => self::SLUG.'-movie2',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-movie-file',
                        'label' => '動画ファイル',
                        'type'    => 'file',
                        'notes'       => 'Youtube埋め込みコードを設定している場合、そちらが優先されます。',
                    ),	
                )
            ),
            array(
                'group' => self::SLUG.'-image-group1',
                'repeat' => true,
                'settings' => array(
                    array(
                        'name'  => self::SLUG.'-image',
                        'label' => 'スタイル写真',
                        'type'  => 'image',
                        'notes'       => 'Youtube埋め込みコード、または動画ファイルを設定している場合、1枚目に一覧ページ用のサムネイル画像を登録してください。',
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group2',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'    => self::SLUG.'-staff',
                        'label'   => '担当スタッフ',
                        'type'    => 'relation',
                        'post-type'   => array( 'staff' ),
                        'limit'       => 1,
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group3',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'    => self::SLUG.'-faceshape',
                        'label'   => '顔型',
                        'type'  => 'check',
                        'choices' => array(
                            '丸型' => '丸型',
                            '卵型' => '卵型',
                            '四角' => '四角',
                            '逆三角' => '逆三角',
                            'ベース' => 'ベース',
                        ),
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group4',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'    => self::SLUG.'-volume',
                        'label'   => '髪量',
                        'type'  => 'check',
                        'choices' => array(
                            '少ない' => '少ない',
                            '普通' => '普通',
                            '多い' => '多い',
                        ),
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group5',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'    => self::SLUG.'-quality',
                        'label'   => '髪質',
                        'type'  => 'check',
                        'choices' => array(
                            '柔らかい' => '柔らかい',
                            'やや柔らかい' => 'やや柔らかい',
                            'やや硬い' => 'やや硬い',
                            '硬い' => '硬い',
                        ),
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group6',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'    => self::SLUG.'-weight',
                        'label'   => '太さ',
                        'type'  => 'check',
                        'choices' => array(
                            '細い' => '細い',
                            'やや細い' => 'やや細い',
                            'やや太い' => 'やや太い',
                            '太い' => '太い',
                        ),
                    ),
                )
            ),
            array(
                'group' => self::SLUG.'-group7',
                'repeat' => false,
                'settings' => array(
                    array(
                        'name'    => self::SLUG.'-habit',
                        'label'   => 'クセ',
                        'type'  => 'check',
                        'choices' => array(
                            'なし' => 'なし',
                            '少し' => '少し',
                            'やや強い' => 'やや強い',
                            '強い' => '強い',
                        ),
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

    public function get_tag(){
        return $this->tag;
    }

    public function get_terms(){
        return $this->terms;
    }

    public function get_terms_tag(){
        return $this->terms_tag;
    }

    public function get_fields(){
        return $this->fields;
    }
    public function get_style(){
        return $this->tax_style;
    }
    public function get_color(){
        return $this->tax_color;
    }

}
?>