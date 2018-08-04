<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DetailStoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('value', 'text', [
                'rules' => 'required|min:1|unique:detail',
            ])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
    }
}
