<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class Document extends Model
{
    const CONTEUDO_MAX_LENGTH = 1;

    protected $fillable = [
        'category_id',
        'title',
        'contents',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }    

    public static function createFromJson(array $data)
    {
        return static::create([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'contents' => $data['contents'],
        ]);
    }    

    public function validate()
    {
        $validator = \Validator::make($this->toArray(), $this->getValidationRules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function validateTitleForRemessaCategory()
    {

        $validator = Validator::make($this->toArray(), $this->validateTitleForRemessa());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }        

    }

    protected function validateTitleForRemessa()
    {
        $rules = [
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (stripos($value, 'semestre') === false) {
                        return $fail('O title deve conter a palavra "semestre".');
                    }
                },
            ],
        ];

        return $rules;
    }

    protected function getValidationRules()
    {
        $rules = [
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],            
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/\b(?:Janeiro|Fevereiro|Março|Abril|Maio|Junho|Julho|Agosto|Setembro|Outubro|Novembro|Dezembro)\b/', $value)) {
                        return $fail('O title deve conter o nome de um mês.');
                    }
                },                    
            ],
        ];

        return $rules;
    }

    public function validateConteudoMaxLength()
    {
        $rules = [
            'conteudo' => ['max:' . self::CONTEUDO_MAX_LENGTH],
        ];

        $validator = Validator::make($this->toArray(), $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }    
}
