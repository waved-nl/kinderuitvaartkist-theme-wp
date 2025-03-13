<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\HeadingSettings;

class ProductHighlights extends Partial
{
    public function fields()
    {
        $product_highlights = new FieldsBuilder('product_highlights', [
            'label' => 'Uitgelichte producten',
            'acfe_flexible_thumbnail' => \Roots\asset('product-highlights.png'),
        ]);

        $product_highlights
            ->addTab('content', [
                'placement' => 'top',
                'label' => 'Inhoud',
            ])
                ->addTextarea('title', [
                    'label' => 'Titel',
                    'rows' => 2,
                    'new_lines' => 'br',
                    'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
                ])

                ->addPostObject('product_ids', [
                    'label' => 'Producten',
                    'instructions' => 'Volgorde kan aangepast worden door de items te verslepen.',
                    'post_type' => ['product'],
                    'return_format' => 'id',
                    'allow_archives' => 0,
                    'allow_null' => 0,
                    'multiple' => 1,
                ])

                ->addLink('assortment_link', [
                    'label' => 'Link naar assortiment',
                ])

            ->addTab('settings', [
                'label' => 'Instellingen',
                'placement' => 'top'
            ])
                ->addFields($this->get(HeadingSettings::class));

        return $product_highlights;
    }
}
