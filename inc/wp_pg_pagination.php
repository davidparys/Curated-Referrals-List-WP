<?php
/**
 * Class Name: PG_Pagination
 * GitHub URI:
 * Description:
 * Version: 1.0
 * Author: Matjaz Trontelj - @pinegrow
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */


class PG_Pagination
{
    static function getQuery( $query = null ) {
        global $wp_query;

        if(empty( $query )) {
            return $wp_query;
        } else {
            return $query;
        }
    }

    static function getCurrentPage() {
        $name = 'paged';
        if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
            $name = 'page';
        }
        return intval(get_query_var( $name ) ? get_query_var( $name ) : 1);
    }

    static function getMaxPages( $query = null ) {
        return self::getQuery( $query )->max_num_pages;
    }

    static function isPaginated( $query = null ) {
        return self::getQuery( $query )->max_num_pages > 1;
    }

    static function getNextPageUrl( $query = null ) {
        $max_pages = self::getMaxPages( $query );
        if(self::getCurrentPage() < $max_pages) {
            return get_pagenum_link( self::getCurrentPage() + 1 );
        }
        return null;
    }

    static function getPreviousPageUrl( $query = null ) {
        if(self::getCurrentPage() > 1) {
            return get_pagenum_link( self::getCurrentPage() - 1 );
        }
        return null;
    }

    static function getHrefAttribute( $url ) {
        if(empty( $url )) {
            return '';
        } else {
            return 'href="'.esc_url( $url ).'"';
        }
    }

    static function getPreviousHrefAttribute( $query = null ) {
        return self::getHrefAttribute( self::getPreviousPageUrl( $query ));
    }

    static function getNextHrefAttribute( $query = null ) {
        return self::getHrefAttribute( self::getNextPageUrl( $query ));
    }
}