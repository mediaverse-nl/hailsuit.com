<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PropertyDeleteForm extends Form
{
    public function buildForm()
    {
        $this->add('submit', 'submit', ['label' => 'delete', 'class' => 'btn btn-danger btn-sm']);    }
}
