<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AddStockForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('barcode', 'text', [
                'rules' => 'required|exists:barcode,value',
                'attr' => ['class' => 'form-control', 'placeholder' => 'EAN'],
            ])
            ->add('stock', 'number', [
                'rules' => 'required',
            ])
            ->add('submit', 'submit', ['label' => 'submit', 'class' => 'card-link btn btn-sm btn-success']);
    }
}
