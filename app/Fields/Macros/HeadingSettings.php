<?php

namespace App\Fields\Macros;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeadingSettings extends Partial
{
    public function fields()
    {
        $builder = new FieldsBuilder('heading_settings');

        $builder
            ->addButtonGroup('heading_type', [
                'label' => 'Heading - Type',
                'default_value' => 'h2',
                'instructions' => 'Semantische waarde van de kop (seo).',
            ])
                ->addChoices(
                    ['h1' => 'H1'],
                    ['h2' => 'H2'],
                    ['h3' => 'H3'],
                    ['h4' => 'H4'],
                    ['h5' => 'H5'],
                    ['h6' => 'H6'],
                );

        return $builder;
    }
}
