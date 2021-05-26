<?php
// tests/Form/Type/TestedTypeTest.php
namespace App\Tests\Form\Type;

use App\Form\Type\TaskFormType;
use App\Entity\Todo\PlainTask;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Validator\Validation;

class TaskFormTypeTest extends TypeTestCase
{
    protected function getExtensions()
    {
        return [new ValidatorExtension(Validation::createValidator())];
    }

    /**
     * Test that PlainTask object is mofified in the correct way when
     * submitting the Task form with predefined data.
     */
    public function testSubmitValidData()
    {
        $formData = [
            'title' => 'Test title',
            'message' => 'Test message',
        ];

        $model = new PlainTask();
        // $formData will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(TaskFormType::class, $model);

        $expected = new PlainTask();
        $expected->setTitle($formData["title"]);
        $expected->setMessage($formData["message"]);

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $formData was modified as expected when the form was submitted
        $this->assertEquals($expected->getTitle(), $model->getTitle());
        $this->assertEquals($expected->getMessage(), $model->getMessage());
    } 
}
