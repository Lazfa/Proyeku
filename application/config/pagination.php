<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['base_url'] = base_url();
$config['total_rows'] = 100;
$config['per_page'] = 5;
$config['num_links'] = 3;

$config['full_tag_open'] = '<div class="float kanan" style="margin-right:10pt;"> <ul class="pagination">';
$config['full_tag_close'] = '</ul> </div>';

$config["first_link"] = 'Awal';
$config["first_tag_open"] = '<li class="page-item">';
$config["first_tag_close"] = '</li>';
$config["first_url"] = '';

$config["last_link"] = 'Akhir';
$config["last_tag_open"] = '<li class="page-item">';
$config["last_tag_close"] = '</li>';

$config["next_link"] = '&raquo;';
$config["next_tag_open"] = '<li class="page-item">';
$config["next_tag_close"] = '</li>';

$config["prev_link"] = '&laquo;';
$config["prev_tag_open"] = '<li class="page-item">';
$config["prev_tag_close"] = '</li>';

$config["cur_tag_open"] = '<li class="page-item active">';
$config["cur_tag_close"] = '</li>';

$config["num_tag_open"] = '<li class="page-item">';
$config["num_tag_close"] = '</li>';

