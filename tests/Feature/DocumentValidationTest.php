<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Document;

class DocumentValidationTest extends TestCase
{
    /** @test */
    public function test_invalidates_document_title_for_remessa_category_without_semestre()
    {
        $document = [
            'category' => 'Remessa',
            'category_id' => 1,
            'title' => 'Documento Semestre',
            'conteudo' => 'Conteúdo do documento',
        ];

        if ($document['category'] === 'Remessa') {
            $errors = $this->validateDocumentTitle($document);

            if (isset($errors['title'])) {

                $this->fail($errors['title'][0]);
            } else {
                $this->assertTrue(true);
            }

        } else{
            $this->assertTrue(true);
        }       
    }

    /** @test */
    public function test_validates_document_title_for_remessa_parcial_category()
    {

        $document = [
            'category' => 'Remessa Parcial',
            'category_id' => 2,
            'title' => 'Maio',
            'conteudo' => 'Conteúdo do documento',
        ];        

        if ($document['category'] === 'Remessa Parcial') {

            $errors = $this->validateDocument($document);
            $dataHolder = ''; 
            if (isset($errors['title'])) {

                $this->fail($errors['title'][0]);
            } else {
                $this->assertTrue(true);
            }
        }
    }

    /**
     * @param  \App\Models\Document  $document
     * @return array
     */
    protected function validateDocument($document)
    {

        $document = new Document($document);
        try {
            $document->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->validator->getMessageBag()->toArray();
        }

        return [];
    }

    /**
     * @param  \App\Models\Document  $document
     * @return array
     */
    protected function validateDocumentTitle($document)
    {

        $document = new Document($document);

        try {
            $document->validateTitleForRemessaCategory();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->validator->getMessageBag()->toArray();
        }

        return [];
    }    
}
