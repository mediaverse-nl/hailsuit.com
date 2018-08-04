<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BrandStoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
    }
}
