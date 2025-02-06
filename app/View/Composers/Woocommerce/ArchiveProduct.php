<?php

namespace App\View\Composers\Woocommerce;

use Roots\Acorn\View\Composer;

class ArchiveProduct extends Composer
{

    public function with()
    {
        return [
            'banners' => $this->banners(),
            'extra_content' => $this->extra_content(),
            'page_header' => (object) $this->page_header(),
        ];
    }

    public function banners() {
        return get_field('banners', get_queried_object()->taxonomy.'_'.get_queried_object()->term_id) ?: [];
    }

    public function extra_content() {
        return get_field('extra_content', get_queried_object()->taxonomy.'_'.get_queried_object()->term_id) ?: null;
    }

    public function page_header() {
        $term = get_queried_object();
        $description = term_description($term->term_id, $term->taxonomy);
        $image = get_field('image', $term->taxonomy.'_'.$term->term_id);

        return [
            'content' => $description ?: null,
            'image' => $image ?: null,
        ];
    }
}
