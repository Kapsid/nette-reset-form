<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Users management.
 */
final class Reset
{

    public function __construct()
    {}

    public function saveNewPassword(\stdClass $values) : bool {
        return true;
        // Here I would call some API or directly access DB
    }
}
