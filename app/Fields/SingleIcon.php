<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class SingleIcon extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('single_icon', [
            'title' => 'Icoon',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'categories', 'tags', 'featured_image', 'author'],
        ]);

        $builder
            ->addTextarea('summary', [
                'label' => 'Omschrijving',
            ])

            ->addImage('icon', [
                'label' => 'Icoon',
                'preview_size' => 'thumbnail',
                'mime_types' => 'svg, png',
                'return_format' => 'url',
                'required' => 1,
            ]);

        $builder
            ->setLocation('post_type', '==', 'icon');

        return $builder->build();
    }
}
