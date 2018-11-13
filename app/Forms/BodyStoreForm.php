<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BodyStoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('value', 'text', [
                'rules' => 'required|min:2',
            ])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
    }
}
