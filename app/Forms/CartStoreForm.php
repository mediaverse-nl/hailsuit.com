<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CartStoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'wrapper' => ['class' => 'form-group'],
                'attr' => ['class' => 'col-md-8 form-control'],
                'help_block' => [
                    'text' => null,
                    'tag' => 'p',
                    'attr' => ['class' => 'help-block']
                ],
                'default_value' => null, // Fallback value if none provided by value property or model
                'label' => $this->name,  // Field name used
                'label_show' => true,
                'label_attr' => ['class' => 'col-md-2 control-label', 'for' => $this->name],
                'errors' => ['class' => 'text-danger'],
                'rules' => [],           // Validation rules
                'error_messages' => []   // Validation error messages
            ])
            ->add('last_name', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('company_name', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('company_vat', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('company_coc', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('country', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('state', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('city', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('postal_code', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('address', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('address_number', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('name', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('email', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('telephone', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('payment_method', 'text', [
                'rules' => 'required|min:1|unique:brand',
            ])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);


    }
}
