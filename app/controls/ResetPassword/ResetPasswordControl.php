<?php

use App\Forms\ResetForm;
use App\Model\Reset;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

class ResetPasswordControl extends Control {

    /**
     * @var Reset $reset
     */
    public $reset;

    /**
     * @var ResetForm $resetForm
     */
    public $resetForm;


    public function __construct(Reset $reset, ResetForm $resetForm) {
        $this->reset = $reset;
        $this->resetForm = $resetForm;
    }

    /**
     * The main render function for the control
     * @throws Exception
     */
    public function render() : void {

        $this->template->setFile(__DIR__.'/ResetPasswordControl.latte');
        $this->template->render();
    }

    /**
     * Form component for resetting the password
     * @return Form
     */
    protected function createComponentResetForm(): Form
    {
        $form = $this->resetForm->create();
        $form->onSuccess[] = [$this, 'resetFormSucceeded'];
        return $form;
    }

    /**
     * Success handler
     * @param Form $form
     * @param \stdClass $values
     * @throws \Nette\Application\AbortException
     */
    public function resetFormSucceeded(Form $form, \stdClass $values): void
    {
        try{
            $this->reset->saveNewPassword($values);
        } catch (Exception $error) {
            // Some BE error
        }

       $this->presenter->flashMessage('Your password was resetted.');
       $this->presenter->redirect('this');
    }


}