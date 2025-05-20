<?php
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: お知らせカテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "お知らせカテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "お知らせカテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "お知らせカテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'news_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "news_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_news_category',
			'edit_terms' => 'edit_news_category',
			'delete_terms' => 'delete_news_category',
			'assign_terms' => 'assign_news_category',
		],
	];
	register_taxonomy( "news_category", [ "page", "news", "breeds", "movie" ], $args );

	/**
	 * Taxonomy: 大会カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "大会カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "大会カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "大会カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'results_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "results_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_results_category',
			'edit_terms' => 'edit_results_category',
			'delete_terms' => 'delete_results_category',
			'assign_terms' => 'assign_results_category',
		],
	];
	register_taxonomy( "results_category", [ "results" ], $args );

	/**
	 * Taxonomy: FAQカテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "FAQカテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "FAQカテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "FAQカテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'faq_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "faq_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_faq_category',
			'edit_terms' => 'edit_faq_category',
			'delete_terms' => 'delete_faq_category',
			'assign_terms' => 'assign_faq_category',
		],
	];
	register_taxonomy( "faq_category", [ "faq" ], $args );

	/**
	 * Taxonomy: JKCチャンネルカテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "JKCチャンネルカテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "JKCチャンネルカテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "JKCチャンネルカテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'movie_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "movie_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_movie_category',
			'edit_terms' => 'edit_movie_category',
			'delete_terms' => 'delete_movie_category',
			'assign_terms' => 'assign_movie_category',
		],
	];
	register_taxonomy( "movie_category", [ "movie" ], $args );

	/**
	 * Taxonomy: 総合情報カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "総合情報カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "総合情報カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "総合情報カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'generalinfo_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "generalinfo_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_generalinfo_category',
			'edit_terms' => 'edit_generalinfo_category',
			'delete_terms' => 'delete_generalinfo_category',
			'assign_terms' => 'assign_generalinfo_category',
		],
	];
	register_taxonomy( "generalinfo_category", [ "generalinfo" ], $args );

	/**
	 * Taxonomy: 犬種カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "犬種カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "犬種カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "犬種カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'breed_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "breed_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_breed_category',
			'edit_terms' => 'edit_breed_category',
			'delete_terms' => 'delete_breed_category',
			'assign_terms' => 'assign_breed_category',
		],
	];
	register_taxonomy( "breed_category", [ "breeds" ], $args );

	/**
	 * Taxonomy: 犬種タグ.
	 */

	$labels = [
		"name" => esc_html__( "犬種タグ", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "犬種タグ", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "犬種タグ", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'breed_tag', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "breed_tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_breed_tag',
			'edit_terms' => 'edit_breed_tag',
			'delete_terms' => 'delete_breed_tag',
			'assign_terms' => 'assign_breed_tag',
		],
	];
	register_taxonomy( "breed_tag", [ "page", "news", "breeds", "movie" ], $args );

	/**
	 * Taxonomy: ロイヤルカナンアワードカテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "ロイヤルカナンアワードカテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "ロイヤルカナンアワードカテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "ロイヤルカナンアワードカテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'royalcanin_award_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "royalcanin_award_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_royalcanin_award_category',
			'edit_terms' => 'edit_royalcanin_award_category',
			'delete_terms' => 'delete_royalcanin_award_category',
			'assign_terms' => 'assign_royalcanin_award_category',
		],
	];
	register_taxonomy( "royalcanin_award_category", [ "royalcanin_award" ], $args );

	/**
	 * Taxonomy: 公認資格情報（1）カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "公認資格情報（1）カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "公認資格情報（1）カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "公認資格情報（1）カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'qualification1_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "qualification1_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_qualification1_category',
			'edit_terms' => 'edit_qualification1_category',
			'delete_terms' => 'delete_qualification1_category',
			'assign_terms' => 'assign_qualification1_category',
		],
	];
	register_taxonomy( "qualification1_category", [ "qualification1" ], $args );

	/**
	 * Taxonomy: 公認資格情報（2）カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "公認資格情報（2）カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "公認資格情報（2）カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "公認資格情報（2）カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'qualification2_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "qualification2_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_qualification2_category',
			'edit_terms' => 'edit_qualification2_category',
			'delete_terms' => 'delete_qualification2_category',
			'assign_terms' => 'assign_qualification2_category',
		],
	];
	register_taxonomy( "qualification2_category", [ "qualification2" ], $args );

	/**
	 * Taxonomy: ガゼット掲載記事カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "ガゼット掲載記事カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "ガゼット掲載記事カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "ガゼット掲載記事カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'gazette-article_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "gazette-article_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_gazette-article_category',
			'edit_terms' => 'edit_gazette-article_category',
			'delete_terms' => 'delete_gazette-article_category',
			'assign_terms' => 'assign_gazette-article_category',
		],
	];
	register_taxonomy( "gazette-article_category", [ "gazette-article" ], $args );

	/**
	 * Taxonomy: トリマー養成機関カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "トリマー養成機関カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "トリマー養成機関カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "トリマー養成機関カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'training-institute_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "training-institute_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_training-institute_category',
			'edit_terms' => 'edit_training-institute_category',
			'delete_terms' => 'delete_training-institute_category',
			'assign_terms' => 'assign_training-institute_category',
		],
	];
	register_taxonomy( "training-institute_category", [ "training-institute" ], $args );

	/**
	 * Taxonomy: トリマー養成機関エリア.
	 */

	$labels = [
		"name" => esc_html__( "トリマー養成機関エリア", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "トリマー養成機関エリア", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "トリマー養成機関エリア", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'training-institute_area', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "training-institute_area",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_training-institute_area',
			'edit_terms' => 'edit_training-institute_area',
			'delete_terms' => 'delete_training-institute_area',
			'assign_terms' => 'assign_training-institute_area',
		],
	];
	register_taxonomy( "training-institute_area", [ "training-institute" ], $args );

	/**
	 * Taxonomy: JKC公認資格カテゴリ.
	 */

	$labels = [
		"name" => esc_html__( "JKC公認資格カテゴリ", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "JKC公認資格カテゴリ", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "JKC公認資格カテゴリ", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'qualifications_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "qualifications_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_qualifications_category',
			'edit_terms' => 'edit_qualifications_category',
			'delete_terms' => 'delete_qualifications_category',
			'assign_terms' => 'assign_qualifications_category',
		],
	];
	register_taxonomy( "qualifications_category", [ "qualifications" ], $args );

	/**
	 * Taxonomy: ロイヤルカナンアワード犬種名.
	 */

	$labels = [
		"name" => esc_html__( "ロイヤルカナンアワード犬種名", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "ロイヤルカナンアワード犬種名", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "ロイヤルカナンアワード犬種名", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'royalcanin_award_breeds', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "royalcanin_award_breeds",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_royalcanin_award_breeds',
			'edit_terms' => 'edit_royalcanin_award_breeds',
			'delete_terms' => 'delete_royalcanin_award_breeds',
			'assign_terms' => 'assign_royalcanin_award_breeds',
		],
	];
	register_taxonomy( "royalcanin_award_breeds", [ "royalcanin_award" ], $args );

	/**
	 * Taxonomy: 都道府県カテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "都道府県カテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "都道府県カテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "都道府県カテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'event_area', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "event_area",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_event_area',
			'edit_terms' => 'edit_event_area',
			'delete_terms' => 'delete_event_area',
			'assign_terms' => 'assign_event_area',
		],
	];
	register_taxonomy( "event_area", [ "event_schedule" ], $args );

	/**
	 * Taxonomy: イベントカテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "イベントカテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "イベントカテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "イベントカテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'event_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "event_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_event_category',
			'edit_terms' => 'edit_event_category',
			'delete_terms' => 'delete_event_category',
			'assign_terms' => 'assign_event_category',
		],
	];
	register_taxonomy( "event_category", [ "event_schedule" ], $args );

	/**
	 * Taxonomy: ナビカテゴリー.
	 */

	$labels = [
		"name" => esc_html__( "ナビカテゴリー", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "ナビカテゴリー", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "ナビカテゴリー", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'nav_cat', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "nav_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
		"capabilities" => [
			'manage_terms' => 'manage_nav_cat',
			'edit_terms' => 'edit_nav_cat',
			'delete_terms' => 'delete_nav_cat',
			'assign_terms' => 'assign_nav_cat',
		],
	];
	register_taxonomy( "nav_cat", [ "global_nav" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

// イベントスケジュールからページ属性（menu_order）のサポートを削除
add_action('init', function() {
  remove_post_type_support( 'event_schedule', 'page-attributes' );
}, 20 );
