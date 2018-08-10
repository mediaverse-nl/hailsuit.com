<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ContactStoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'rules' => 'required|min:1|unique:type,value,NULL,NULL,model_year,',
            ])
            ->add('email', 'email', [
                'rules' => 'required|min:1|unique:type,value,NULL,NULL,model_year,' ,
            ])
            ->add('message', 'textarea', [
                'rules' => 'required|min:1|unique:type,value,NULL,NULL,model_year,',
            ])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
    }
}
