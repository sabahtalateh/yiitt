<?php

use app\modules\brackets\validator\BracketsValidator;

class BracketsValidatorTest extends \Codeception\Test\Unit
{
    /**
     * @var BracketsValidator
     */
    private $validator;
    /**
     * @var \UnitTester
     */
//    protected $tester;

    protected function _before()
    {
        $this->validator = new \app\modules\brackets\validator\BracketsValidator();
    }

    protected function _after()
    {
    }

    // tests
    public function testBracketsValidation()
    {
        expect($this->validator->validateString(""))->true();
        expect($this->validator->validateString("()"))->true();
        expect($this->validator->validateString("([])"))->true();
        expect($this->validator->validateString("[([])]"))->true();
        expect($this->validator->validateString("[ (а+б) [ ( [ ] ) ] ( d+e ) ] "))->true();
        expect($this->validator->validateString("()()()()()[][][]"))->true();
        
        expect($this->validator->validateString("()["))->false();
        expect($this->validator->validateString("[((((())))))]"))->false();
        expect($this->validator->validateString("( ) ( ) [ ( ] )"))->false();
    }
}