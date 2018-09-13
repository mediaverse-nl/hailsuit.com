<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CartStoreForm extends Form
{
    public function buildForm()
    {

        $this
            ->add('first_name', 'text', [
                'rules' => 'required|min:1|unique:brand',
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
            ]);
//            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
//        $table->string('company_name')->nullabe();
//        $table->string('company_vat')->nullabe();
//        $table->string('company_coc')->nullabe();
//        $table->string('country');
//        $table->string('state');
//        $table->string('city');
//        $table->string('postal_code');
//        $table->string('address');
//        $table->string('address_number');
//        $table->string('name');
//        $table->string('email');
//        $table->string('telephone');
//        $table->string('currency')->nullabe();
//        $table->decimal('total_paid', 10, 2);
//        $table->decimal('shipping_cost', 10, 2);
//        $table->string('payment_method');
//        $table->string('status')->default('paid');
    }
}
