<?php

namespace App\Tests\Form\Type;

use App\Form\Type\ShoppingTaskType;
use App\Entity\Todo\ShoppingTask;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Validator\Validation;

class ShoppingTaskFormTypeTest extends TypeTestCase
{
    protected function getExtensions()
    {
        return [new ValidatorExtension(Validation::createValidator())];
    }

    /**
     * Test that User object is mofified in the correct way when
     * submitting the RegisterForm with predefined data.
     */
    public function testSubmitValidData()
    {
        $formData = [
            'Title' => 'Test title',
            'Products' => ['test1', 'test2', 'test3'],
        ];

        $model = new ShoppingTask();
        // $formData will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(ShoppingTaskType::class, $model);

        $expected = new ShoppingTask();
        $expected->setTitle($formData["Title"]);
        $expected->setProducts($formData["Products"]);

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $formData was modified as expected when the form was submitted
        $this->assertEquals($expected->getTitle(), $model->getTitle());
        $this->assertEquals($expected->getProducts(), $model->getProducts());
    }
}
