<?php
// tests/Form/Type/TestedTypeTest.php
namespace App\Tests\Form\Type;

use App\Form\Type\RegistrationFormType;
use App\Entity\User;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Validator\Validation;

class RegistrationTaskFormTypeTest extends TypeTestCase
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
            'email' => 'test@test.com',
            'password' => 'testar123',
        ];

        $model = new User();
        // $formData will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(RegistrationFormType::class, $model);

        $expected = new User();
        $expected->setEmail("test@test.com");
        $expected->setPassword("testar123");

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $formData was modified as expected when the form was submitted
        $this->assertEquals($expected->getEmail(), $model->getEmail());
    } 
}
