<?php

Router::get('/', 'auth', 'index');
Router::get('auth/login', 'auth', 'index');
Router::post('auth/login', 'auth', 'login');

Router::get('dashboard', 'dashboard', 'index');
Router::get('logout', 'auth', 'logout');

Router::get('patients', 'patient', 'index');
Router::get('patients/create', 'patient', 'create');
Router::post('patients/create', 'patient', 'create');
Router::get('patients/{id}/edit', 'patient', 'edit');
Router::post('patients/{id}', 'patient', 'update');
Router::post('patients/{id}/delete', 'patient', 'delete');

Router::get('health_record', 'healthRecord', 'index');
Router::get('health_record/create', 'healthRecord', 'create');
Router::post('health_record/create', 'healthRecord', 'create');
Router::get('health_record/{id}/edit', 'healthRecord', 'edit');
Router::post('health_record/{id}', 'healthRecord', 'update');
Router::post('health_record/{id}/delete', 'healthRecord', 'delete');

Router::get('appointment', 'appointment', 'index');
Router::get('appointment/create', 'appointment', 'create');
Router::post('appointment/create', 'appointment', 'create');
Router::get('appointment/{id}/edit', 'appointment', 'edit');
Router::post('appointment/{id}', 'appointment', 'update');
Router::post('appointment/{id}/delete', 'appointment', 'delete');
Router::post('appointment/{id}/approve', 'appointment', 'approve');

Router::dispatch();
