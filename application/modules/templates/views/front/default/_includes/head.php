<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : setting(make_trans('meta_description')); ?>">
  <meta name="keywords" content="<?php echo isset($meta_keywords) ? $meta_keywords : setting(make_trans('meta_keywords')); ?>">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/css/colors.css'); ?>">
  <?php if (get_current_lang() == 'en') : ?>
  <link rel="stylesheet" href="<?= site_url('assets/css/custom_en.css') ?>">
  <?php endif; ?>
  <?php if (get_current_lang() == 'ar'): ?>
  <link rel="stylesheet" href="https://cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/css/custom_ar.css') ?>">
  <?php endif; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
