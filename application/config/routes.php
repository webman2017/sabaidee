<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'Login/before_login';
$route['login_view'] = 'Login/login_view';
$route['register'] = 'Login/register';
$route['save_register'] = 'Login/save_register';

$route['shop_create'] = 'Shop/shop_create';
$route['shop_save'] = 'Shop/shop_save';
$route['stock_search'] = 'Stock/stock_search';
$route['save_stock'] = 'Stock/save_stock';
$route['category'] = 'Category';


$route['more'] = 'Order/more';

$route['checkstock'] = 'Stock/checkstock';
$route['stock_history'] = 'Stock/stock_history';
$route['stock_history_detail/(:any)'] = 'Stock/stock_history_detail/$1';
$route['save_shop_product'] = 'Shop/save_shop_product';

$route['shop_order'] = 'Order/shop_order';
$route['order_list'] = 'Order_list/index';

$route['search_products'] = 'Stock/search_products';
$route['get_status'] = 'Order/get_status';

$route['save_order'] = 'Order/save_order';
$route['confirm_order'] = 'Order/confirm_order';
$route['update_status_order'] = 'Order/update_status_order';
$route['search_order'] = 'Order/search_order';

$route['dashboard'] = 'Dashboard';

$route['product_create'] = 'Products/create';
$route['edit_product/(:any)'] = "Products/edit_product/$1";
$route['del_product'] = 'Products/del_product';
$route['delproduct'] = 'Products/delproduct';
$route['product_gen'] = 'Products/product_code_gen';

$route['customer_create'] = 'Customer/create';
$route['save_customer'] = 'Customer/save_customer';
$route['save_product'] = 'Products/save_product';
$route['update_product'] = 'Products/update_product';
$route['return_stock'] = 'Order/return_stock';
$route['return_stock_history'] = "Stock/return_stock_history";
$route['search_product'] = 'Products/search_product';

$route['search_product_all'] = 'Products/search_product_all';
$route['search_product_in'] = 'Products/search_product_in';
$route['get_product_shop'] = 'Order/get_product_shop';

$route['confirm_return'] = "Stock/confirm_return";

$route['product_preview/(:any)'] = "Products/product_preview/$1";
// stock
$route['print_invoice/(:any)'] = "Order/print_invoice/$1";
$route['qr/(:any)'] = "Order/qr_confirm_order/$1";
$route['qr_clear/(:any)'] = "Order/qr_clear/$1";

$route['order_detail/(:any)'] = 'Order/order_detail/$1';
$route['track_order'] = 'Order/track_order';

$route['stock_shop'] = 'Stock/stock_shop';

$route['getstatus'] = 'Order/getstatus';
$route['report'] = 'Report';

$route['cancel_order'] = 'Order/cancel_order';
$route['clear_success'] = 'Order/clear_success';
$route['send_success'] = 'Order/send_success';


$route['update_shop'] = "Shop/update_shop";
$route['search'] = "Shop/search";
$route['update_user'] = "Setting/update_user";
$route['stock'] = 'Stock/stock_view';
$route['save_sup'] = 'Stock/supplier_save';
$route['del_sup/(:any)'] = 'Stock/supplier_delete/$1';
$route['shop_del'] = 'Shop/shop_del';
$route['summary'] = 'Report/report_view';

$route['login'] = 'Login/login';

$route['shop'] = "Dashboard/shop";
$route['logout'] = 'Login/logout';

$route['transfers'] = 'Transfers';

$route['export_product'] = 'Excel_product/createExcel';
$route['export_stock'] = 'Excel_product/export_stock';
$route['export_order'] = 'Excel_product/export_order';
$route['export_report'] = 'Excel_product/export_report';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;