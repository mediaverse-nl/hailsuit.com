<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FaqUpdateForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'rules' => 'required|min:5|unique:faq,title',
            ])
            ->add('description', 'textarea', [
                'rules' => 'required|min:5',
            ])
            ->add('submit', 'submit', ['label' => 'update', 'attr' => ['class' => 'btn btn-sm btn-success']]);
    }
}
