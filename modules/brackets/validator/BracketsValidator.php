<?php

namespace app\modules\brackets\validator;

use app\modules\brackets\models\DataString;
use yii\validators\Validator;

class BracketsValidator extends Validator
{

    private $errorMessage = 'Please check the order of the brackets.';

    /**
     * @param DataString $model
     * @param string     $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        if (!($model instanceof DataString)) {
            return;
        }

        if (!$this->validateString($model->data)) {
            $this->addError($model, $attribute, $this->errorMessage);
        }
    }

    public function validateString(string $string): bool
    {
        $result = true;
        $stack = [];

        for ($i = 0; $i < strlen($string); $i++) {
            $symbol = $string[$i];
            if ($this->isOpenBracket($symbol)) {
                $stack[] = $symbol;
            }
            if ($this->isCloseBracket($symbol)) {
                if (0 == count($stack)) {
                    $result = false;
                    break;
                }

                $open = array_pop($stack);
                if (!$this->areOpenAndCloseBracketsOfSameType($open, $symbol)) {
                    $result = false;
                    break;
                }
            }
        }

        if (0 != count($stack)) {
            $result = false;
        }

        return $result;
    }

    private function isOpenBracket(string $symbol): bool
    {
        return $symbol == '(' || $symbol == '[';
    }

    private function isCloseBracket(string $symbol): bool
    {
        return $symbol == ')' || $symbol == ']';
    }

    private function areOpenAndCloseBracketsOfSameType(string $open, string $close): bool
    {
        $result = false;
        if ($open == '(' && $close == ')') {
            $result = true;
        }

        if ($open == '[' && $close == ']') {
            $result = true;
        }

        return $result;
    }
}