<?php

namespace App\Forms;

use App\Body;
use Kris\LaravelFormBuilder\Form;

class TypeStoreForm extends Form
{
    public function buildForm()
    {
        $years = range(date('Y') + 1, 1900);

        $body = Body::all();
        $translation = [];

        foreach ($body as $b) {
            $translation[$b->id] = $b->getTranslation();
        }

        $this
            ->add('value', 'text', [
                'rules' => 'required|min:1|unique:type,value,NULL,NULL,model_year,' . $this->request['model_year'],
            ])
            ->add('model_year', 'select', [
                'choices' => array_combine($years, $years),
                'rules' => 'required|min:1|unique:type,model_year,NULL,NULL,value,' . $this->request['value'],
            ])
            ->add('body', 'choice', [
                'choices' => $translation,
                'attr' => ['class' => ''],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'expanded' => true,
                'multiple' => true,
                'rules' => 'present|array',
            ])
            ->add('brand_id', 'hidden', ['value' => $this->getData('brand_id')])
            ->add('submit', 'submit', ['label' => 'add', 'class' => 'card-link btn btn-sm btn-success']);
    }
}
