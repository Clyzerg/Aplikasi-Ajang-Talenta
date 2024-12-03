<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['auth'] => ini buat redirect('auth'); 

// Login
$route['auth'] = 'Auth/login'; // Controller/view-nya
$route['auth_process'] = 'Auth/auth_process'; // biar bisa form_open harus di route dulu

// Admin
$route['admin'] = 'Admin/index'; // Controller/function

// HRD
$route['siswa'] = 'Siswa/index'; // Controller/view-nya

$route['ajang_talenta'] = 'ajang_talenta/index';
$route['ajang_talenta/daftar/(:any)'] = 'ajang_talenta/daftar_ajang/$1';
$route['ajang_talenta/proses_daftar'] = 'ajang_talenta/proses_daftar';
$route['rekapcontroller/index'] = 'rekapcontroller/index';


$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
