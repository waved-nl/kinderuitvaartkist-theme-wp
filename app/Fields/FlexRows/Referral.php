<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\Image;
use App\Fields\Macros\TextBlockLink;
use App\Fields\Macros\HeadingSettings;

class Referral extends Partial
{
    public function fields()
    {
        $referral = new FieldsBuilder('referral', [
            'label' => 'Doorverwijzing',
            'acfe_flexible_thumbnail' => \Roots\asset('referral.png'),
        ]);

        $referral
            ->addTab('content', [
                'placement' => 'top',
                'label' => 'Inhoud',
            ])
                ->addFields($this->get(Image::class))

                ->addFields($this->get(TextBlockLink::class))
                    ->modifyField('content', [ 'toolbar' => 'simple_no_format',])

            ->addTab('settings', [
                'label' => 'Instellingen',
                'placement' => 'top'
            ])
                ->addFields($this->get(HeadingSettings::class));

        return $referral;
    }
}
