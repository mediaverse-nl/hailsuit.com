<?php

$edit_name = 'Edit';
$create_name = 'Create';

// Home
Breadcrumbs::register('dashboard', function($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

// Home > detail
Breadcrumbs::register('admin.detail.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Details', route('admin.detail.index'));
});
// Home > detail > edit
Breadcrumbs::register('admin.detail.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.detail.index');
    $breadcrumbs->push($edit_name, route('admin.detail.edit', $model->id));
});

// Home > faq
Breadcrumbs::register('admin.faq.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('FAQ', route('admin.faq.index'));
});
// Home > faq > edit
Breadcrumbs::register('admin.faq.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($edit_name, route('admin.faq.edit', $model->id));
});
// Home > faq > create
Breadcrumbs::register('admin.faq.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($create_name, route('admin.faq.create'));
});

// Home > brand
Breadcrumbs::register('admin.brand.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Brands', route('admin.brand.index'));
});
// Home > brand > edit
Breadcrumbs::register('admin.brand.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.brand.index');
    $breadcrumbs->push($edit_name, route('admin.brand.edit', $model->id));
});

// Home > product
Breadcrumbs::register('admin.product.index', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Products', route('admin.product.index'));
});
// Home > detail > edit
Breadcrumbs::register('admin.product.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push($edit_name, route('admin.product.edit', $model->id));
});
// Home > detail > create
Breadcrumbs::register('admin.product.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push($create_name, route('admin.product.create'));
});