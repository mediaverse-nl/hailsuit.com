<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FaqStoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'rules' => 'required|min:5|unique:title',
            ])
            ->add('description', 'textarea', [
                'rules' => 'required|min:5',
            ])
            ->add('submit', 'submit', ['label' => 'save', 'attr' => ['class' => 'btn btn-sm btn-success']]);
    }
}
