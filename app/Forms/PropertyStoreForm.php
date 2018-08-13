<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PropertyStoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('value', 'text', [
                'rules' => 'required|min:1|unique:property',
            ])
            ->add('detail_id', 'hidden', ['value' => $this->getData('detail_id')])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
    }
}