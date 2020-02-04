<?php

use App\Model\Reset;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

class ResetPasswordControl extends Control {

    /**
     * @var Reset $reset
     */
    public $reset;

    /**
     * @var bool $resetDone
     */
    protected $resetDone;

    // For future usage
    public function __construct(Reset $reset) {
        $this->reset = $reset;
        $this->resetDone = false;
    }

    /**
     * The main render function for the control
     * @throws Exception
     */
    public function render() : void {

        $this->template->setFile(__DIR__.'/ResetPasswordControl.latte');
        $this->template->resetDone = $this->resetDone;
        $this->template->render();
    }

    /**
     * Form component for resetting the password
     * @return Form
     */
    protected function createComponentResetForm(): Form
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
        $form->onSuccess[] = [$this, 'resetFormSucceeded'];
        return $form;
    }

    /**
     * Success handler
     * @param Form $form
     * @param stdClass $values
     */
    public function resetFormSucceeded(Form $form, \stdClass $values): void
    {

        $this->flashMessage('Your password was resetted.');

        try{
            $this->reset->saveNewPassword($values);
            $this->resetDone = true;
            $this->redrawControl('resetForm');
        } catch (Exception $error) {
            // Some BE error
        }
    }

}