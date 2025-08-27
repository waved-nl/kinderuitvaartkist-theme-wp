<?php

namespace App\Fields\Page;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\Image;

class PageHeader extends Partial
{
    public function fields()
    {
        $page_header = new FieldsBuilder('page_header');

        $page_header
            ->addGroup('page_header_group', [
                'label' => ' ',
            ])

                ->addTextarea('title', [
                    'label' => 'Alternative pagina titel',
                    'rows' => 2,
                    'new_lines' => 'br',
                    'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
                ])

                ->addButtonGroup('heading_type', [
                    'label' => 'Pagina titel - Type',
                    'default_value' => 'h1',
                    'instructions' => 'Semantische waarde van de kop (seo).',
                ])
                    ->addChoices(
                        ['h1' => 'H1'],
                        ['h2' => 'H2'],
                        ['h3' => 'H3'],
                        ['h4' => 'H4'],
                        ['h5' => 'H5'],
                        ['h6' => 'H6'],
                    )

                ->addWysiwyg('content', [
                    'label' => 'Tekst',
                    'media_upload' => 0,
                    'toolbar' => 'simple_no_format',
                ])


                ->addFields($this->get(Image::class))
                    ->modifyField('image', ['label'=>'Achtergrond afbeelding']);

        return $page_header;
    }
}
