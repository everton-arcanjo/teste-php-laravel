<?php

use Tests\TestCase;
use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;

class DocumentTest extends TestCase
{
    public function testConteudoMaxLength()
    {
        $document = new Document([
            'conteudo' => str_repeat('AQQQQ', Document::CONTEUDO_MAX_LENGTH + 1),
        ]);

        try {
            $document->validateConteudoMaxLength();
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();

            $this->assertArrayHasKey('conteudo', $errors);
            $this->assertEquals(['O campo conteudo não pode ter mais de ' . Document::CONTEUDO_MAX_LENGTH . ' caractere(s).'], $errors['conteudo']);
        }
    }
}
