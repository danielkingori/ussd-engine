<?php

namespace App\Messages\Outgoing;

use BotMan\BotMan\Messages\Incoming\Answer;

class TextQuestion extends FieldQuestion
{
    public function getRules(): array
    {
        $validationRules = [];

        if ($this->field['required']) {
            $validationRules[] = 'required';
        }

        $rules = [
          $this->field['key']  => $validationRules,
        ];

        return $rules;
    }

    public function getAnswerBody(Answer $answer): array
    {
        return [$this->field['key'] => $answer->getText()];
    }

    public function getAnswerValue()
    {
        return [
          'value' => $this->answerValue,
        ];
    }
}