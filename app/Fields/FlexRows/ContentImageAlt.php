<?php

namespace App\Fields\FlexRows;

use App\Fields\Macros\HeadingSettings;
use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\Image;
use App\Fields\Macros\TextBlockLink;

class ContentImageAlt extends Partial
{
    public function fields()
    {
        $content_image_alt = new FieldsBuilder('content_image_alt', [
            'label' => 'Tekst met afbeelding (highlight)',
            'acfe_flexible_thumbnail' => \Roots\asset('content-image-alt.png'),
        ]);

        $content_image_alt
            ->addTab('content', [
                'label' => 'Inhoud',
                'placement' => 'top'
            ])
                ->addFields($this->get(Image::class))

                ->addFields($this->get(TextBlockLink::class))
                    ->modifyField('content', [ 'toolbar' => 'simple_no_format',])

            ->addTab('settings', [
                'label' => 'Instellingen',
                'placement' => 'top'
            ])
                ->addFields($this->get(HeadingSettings::class));


        return $content_image_alt;
    }
}
