<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\HeadingSettings;

class Accordion extends Partial
{
    public function fields()
    {
        $accordion = new FieldsBuilder('accordion', [
            'label' => 'Inklapbare teksten',
            'acfe_flexible_thumbnail' => \Roots\asset('accordion.png'),
        ]);

        $accordion
            ->addTab('content', [
                'placement' => 'top',
                'label' => 'Inhoud',
            ])

                ->addText('title', [
                    'label' => 'Titel',
                ])

                ->addRepeater('items', [
                    'label' => '',
                    'layout' => 'row',
                    'button_label' => 'Voeg een item toe',
                ])

                    ->addText('label', [
                        'label' => 'Titel'
                    ])

                    ->addWysiwyg('content', [
                        'label' => 'Tekst',
                        'media_upload' => 0,
                        'toolbar' => 'simple',
                    ])

                ->endRepeater()

            ->addTab('settings', [
                'placement' => 'top',
                'label' => 'Instellingen',
            ])
                ->addFields($this->get(HeadingSettings::class));

        return $accordion;
    }
}
