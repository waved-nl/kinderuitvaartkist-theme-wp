<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\Image;
use App\Fields\Macros\TextBlockLink;
use App\Fields\Macros\HeadingSettings;

class BrochureForm extends Partial
{
    public function fields()
    {
        $brochure_form = new FieldsBuilder('brochure_form', [
            'label' => 'Borchure formulier',
            'acfe_flexible_thumbnail' => \Roots\asset('brochure-form.png'),
        ]);

        $brochure_form
            ->addTab('content', [
                'placement' => 'top',
                'label' => 'Inhoud',
            ])
                ->addFields($this->get(TextBlockLink::class))
                    ->modifyField('content', [ 'toolbar' => 'simple_no_format',])
                    ->removeField('link')

                ->addFields($this->get(Image::class))

                ->addText('form_shortcode', [
                    'label' => 'Contact form 7 code',
                    'instructions' => 'voorbeeld: <i>[contact-form-7 id="id" title="title"]</i>'
                ])

            ->addTab('settings', [
                'placement' => 'top',
                'label' => 'Instellingen',
            ])
                ->addFields($this->get(HeadingSettings::class));

        return $brochure_form;
    }
}
