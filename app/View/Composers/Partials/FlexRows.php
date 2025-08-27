<?php

namespace App\View\Composers\Partials;

use Roots\Acorn\View\Composer;

class FlexRows extends Composer
{
    public function with()
    {
        return [
            'flex_rows' => $this->data(),
        ];
    }

    public function data()
    {
        $post_id = get_the_ID();

        if (is_home()) {
            $post_archive_flex_rows_group = get_field('post_archive_flex_rows_group', 'option');
            $flex_rows = $post_archive_flex_rows_group['flex_rows'];
        } else {
            $flex_rows = get_field('flex_rows', $post_id);
        }


        if (!$flex_rows) {
            return [];
        } else {
            $data = [];
            $index = 1;

            foreach ($flex_rows as $row) {
                $row = (object)[
                    'row_name' => str_replace('_','-', $row['acf_fc_layout']),
                    'row_content' => $row,
                    'row_position' => $index,
                ];

                array_push($data, $row);

                $index++;
            }

            $data = (object)$data;
            return $data;
        }
    }
}
