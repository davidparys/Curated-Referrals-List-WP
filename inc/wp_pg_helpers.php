<?php
/**
 * Class Name: PG_Image, PG_Helper
 * GitHub URI:
 * Description:
 * Version: 1.0
 * Author: Matjaz Trontelj - @pinegrow
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

class PG_Image {

    static function removeSizeAttributes( $img, $attr = null ) {
        if( $attr == 'both' || $attr == 'width') {
            $img = preg_replace('/\swidth="[^"]*"/i', '', $img);
        }
        if( $attr == 'both' || $attr == 'height') {
            $img = preg_replace('/\sheight="[^"]*"/i', '', $img);
        }
        return $img;
    }

    static function getUrl( $image_or_url, $size ) {
        if(!is_numeric( $image_or_url )) {
            return $image_or_url;
        }
        return wp_get_attachment_image_url( $image_or_url, $size );
    }

    static function getImages( $list ) {
        if(empty( $list )) return array();
        if(is_string( $list )) $list = explode( ',', $list );
        $args = array(
            'post__in'       => $list,
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'posts_per_page' => -1,
            'orderby'        => 'post__in',
            'order'          => 'ASC'
        );
        return get_posts( $args );
    }

    static function isPostImage() {
        global $post;
        return $post->post_type === 'attachment' && !empty( $post->post_mime_type ) &&  strpos( $post->post_mime_type, 'image' ) === 0;
    }

    static function getPostImage( $id, $size, $args, $remove_sizes = null, $default_img = null) {
        $img = '';

        if(empty($id) && self::isPostImage()) {
            $img = wp_get_attachment_image( get_the_ID(), $size, false, $args);

        } else if(has_post_thumbnail($id)) {
            $img = get_the_post_thumbnail( $id, $size, $args);
        }

        if(!empty($default_image) && empty($img)) {
            $img = $default_img;
        }

        if(!empty($img) && !empty($remove_sizes)) {
            $img = self::removeSizeAttributes( $img, $remove_sizes );
        }
        return $img;
    }
}

class PG_Helper {

    static function getPostFromSlug( $slug_or_id, $post_type ) {
        if( is_numeric( $slug_or_id ) ) {
            return $slug_or_id;
        }
        return get_page_by_path( $slug_or_id, OBJECT, $post_type );
    }

    static function getTermFromSlug( $slug_or_id, $taxonomy ) {
        if( is_numeric( $slug_or_id ) ) {
            return $slug_or_id;
        }
        switch( $taxonomy ) {
            case 'category':
                return get_category_by_slug( $slug_or_id );
            default:
                return get_term_by( 'slug', $slug_or_id, $taxonomy );
        }
    }

    static function addAttributesToElements( $tag, $attrs, $html ) {
        $attr_str = '';

        foreach( $attrs as $name => $val ) {
            $attr_str .= " {$name}";
            if(!is_null($val)) {
                $attr_str .= "=\"{$val}\"";
            }
        }

        if(!empty($attr_str)) {
            $html = str_replace("<{$tag} ", "<{$tag}{$attr_str} ", $html);
            $html = str_replace("<{$tag}>", "<{$tag}{$attr_str}>", $html);
        }

        return $html;
    }

    static $shown_posts = array();

    static function rememberShownPost( $p = null ) {
        global $post;
        if(empty( $p )) {
            $p = $post;
        }
        if(!empty($p) && !in_array( $p->ID, self::$shown_posts)) {
            self::$shown_posts[] = $p->ID;
        }
    }

    static function getShownPosts() {
        return self::$shown_posts;
    }

    static function getInsightMetaFields() {
        $list = array();
        $meta = get_post_meta( get_the_ID() );
        if($meta) {
            foreach($meta as $key => $values) {
                if(strpos($key, '_') !== 0) {
                    $list[] = $key;
                }
            }
        }
        echo '<!-- PG_FIELDS:'.implode(',', $list).'-->';
    }

    static function getRelationshipFieldValue( $field ) {
        if( function_exists( 'get_field' )) {
            return get_field( $field, false, false );
        } else {
            $value = get_post_meta( get_the_ID(), $field );
            if( empty( $value ) ) {
                return null;
            }
            if(count($value) === 1) {
                if(strpos($value[0], 'a:') >= 0 && strpos($value[0], '{') >= 0) {
                    return unserialize($value[0]);
                }
                if(is_string($value[0])) {
                    return explode(',', $value[0]);
                }
            }
            return $value;
        }
    }

    static function getPostIdList( $value ) {
        if( empty( $value )) {
            return array(-1);
        }
        if(is_string($value)) {
            $value = explode(',', $value);
        }
        if(is_numeric($value)) {
            $value = array($value);
        }
        if(is_array($value) && count($value) === 0) {
            $value = array(-1);
        }
        return $value;
    }

    static function getBreadcrumbs( $type = 'parents', $add_home = false, $home_label = '' ) {
        global $post;

        $r = array();

        if($type === 'parents') {
            $parents = get_post_ancestors( $post->ID );
            foreach($parents as $parent_id) {
                $p = get_post( $parent_id );
                $r[] = array(
                    'name' => get_the_title( $p ),
                    'link' => get_permalink( $p )
                );
            }
        } else {
            $category = get_the_category( $post->ID );

            if(!empty($category)) {
                $parents = get_ancestors($category[0]->term_id, 'category');

                array_unshift( $parents, $category[0]->term_id );

                foreach ($parents as $parent_id) {
                    $p = get_category($parent_id);
                    $r[] = array(
                        'name' => $p->name,
                        'link' => get_category_link($p)
                    );
                }
            }
        }

        array_unshift($r, array(
            'name' => get_the_title( $post ),
            'link' => get_permalink( $post )
        ));

        if($add_home) {
            $r[] = array(
                'name' => $home_label,
                'link' => home_url()
            );
        }

        return array_reverse( $r );
    }
}