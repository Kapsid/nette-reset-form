<?php

namespace App\Forms;

use Exception;
use Nette\Application\UI\Form;

class ResetForm extends Form
{
    public function create()
    {
        $form = new Form;

        // Using ajax
        $form->getElementPrototype()->class('ajax');
        $form->addText('email', 'E-mail:')
            ->addRule($form::EMAIL, 'Invalid email')
            ->setRequired('You must fill e-mail');
        $form->addPassword('password', 'Password:')
            ->addRule(Form::MIN_LENGTH, 'Password needs to have at least six chracters.',6)
            ->setRequired('You must fill password');
        $form->addSubmit('login', 'Reset');

        return $form;
    }


}
