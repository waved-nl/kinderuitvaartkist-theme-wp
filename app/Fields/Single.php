<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\FlexRows;
use App\Fields\Page\PageHeader;

class Single extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('single', [
            'title' => 'Blog bericht',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'categories', 'tags', 'featured_image', 'author'],
        ]);

        $builder
            ->addTab('content', [
                'label' => 'Flexibele rijen',
            ])
                ->addFields($this->get(FlexRows::class));

        $builder
            ->setLocation('post_type', '==', 'post');

        return $builder->build();
    }
}
