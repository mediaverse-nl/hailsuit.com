<?php

$edit_name = 'Edit';
$create_name = 'Create';

// dashboard
Breadcrumbs::register('dashboard', function($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

// dashboard > detail
Breadcrumbs::register('admin.detail.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Details', route('admin.detail.index'));
});
// dashboard > detail > edit
Breadcrumbs::register('admin.detail.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.detail.index');
    $breadcrumbs->push($edit_name, route('admin.detail.edit', $model->id));
});

// dashboard > faq
Breadcrumbs::register('admin.faq.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('FAQ', route('admin.faq.index'));
});
// dashboard > faq > edit
Breadcrumbs::register('admin.faq.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($edit_name, route('admin.faq.edit', $model->id));
});
// dashboard > faq > create
Breadcrumbs::register('admin.faq.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($create_name, route('admin.faq.create'));
});

// dashboard > brand
Breadcrumbs::register('admin.brand.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Brands', route('admin.brand.index'));
});
// dashboard > brand > edit
Breadcrumbs::register('admin.brand.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.brand.index');
    $breadcrumbs->push($edit_name, route('admin.brand.edit', $model->id));
});

// dashboard > product
Breadcrumbs::register('admin.product.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Products', route('admin.product.index'));
});
// dashboard > detail > edit
Breadcrumbs::register('admin.product.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push($edit_name, route('admin.product.edit', $model->id));
});
// dashboard > detail > create
Breadcrumbs::register('admin.product.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push($create_name, route('admin.product.create'));
});

// dashboard > images
Breadcrumbs::register('admin.image.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Images Library', route('admin.text-editor.index'));
});

// dashboard > text
Breadcrumbs::register('admin.text.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Texts', route('admin.text-editor.index'));
});
// dashboard > text > edit
Breadcrumbs::register('admin.text.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.text.index');
    $breadcrumbs->push($edit_name, route('admin.text-editor.edit', $model->id));
});