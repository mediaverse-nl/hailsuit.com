<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class TypeStoreForm extends Form
{
    public function buildForm()
    {
        $years = range(date('Y') + 1, 1900);

        $this
            ->add('value', 'text', [
                'rules' => 'required|min:1|unique:type,value,NULL,NULL,model_year,' . $this->request['model_year'],
            ])
            ->add('model_year', 'select', [
                'choices' => array_combine($years, $years),
//                'empty_value' => '=== Select language ===',
                'rules' => 'required|min:1|unique:type,model_year,NULL,NULL,value,' . $this->request['value'],
            ])
            ->add('brand_id', 'hidden', ['value' => $this->getData('brand_id')])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
    }
}
