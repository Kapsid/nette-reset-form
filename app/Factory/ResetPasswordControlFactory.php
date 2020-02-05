<?php

namespace App\Factory;

use App\Forms\ResetForm;
use App\Model\Reset;
use ResetPasswordControl;

class ResetPasswordControlFactory
{

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

    public function create() : ResetPasswordControl {
        return new ResetPasswordControl($this->reset, $this->resetForm);
    }

}