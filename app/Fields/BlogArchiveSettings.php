<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\Image;
use App\Fields\Partials\FlexRows;

class BlogArchiveSettings extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('blog_archive_settings', [
            'title' => 'Archief instellingen',
        ]);

        $builder
            ->addTab('page_header', [
                'label' => 'Pagina header',
                'placement' => 'left'
            ])

                ->addGroup('post_archive_page_header_group', [
                    'label' => ' ',
                ])

                    ->addTextarea('title', [
                        'label' => 'Alternative pagina titel',
                        'rows' => 2,
                        'new_lines' => 'br',
                        'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
                    ])

                    ->addWysiwyg('content', [
                        'label' => 'Tekst',
                        'media_upload' => 0,
                        'toolbar' => 'simple_no_format',
                    ])

                    ->addFields($this->get(Image::class))
                        ->modifyField('image', ['label'=>'Achtergrond afbeelding'])

                ->endGroup()

            ->addTab('content', [
                'label' => 'Extra flexibele rijen',
            ])
                ->addGroup('post_archive_flex_rows_group', [
                    'label' => ' ',
                ])
                    ->addFields($this->get(FlexRows::class))
                ->endGroup();

        $builder
            ->setLocation('options_page', '==', 'post-archive-settings');

        return $builder->build();
    }
}
