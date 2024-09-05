<?php

namespace Config;

use App\Controllers\SuratController;
use CodeIgniter\Config\BaseService;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Surat::index');

// Routes for SKU
$routes->get('/sku/create', 'Surat::createSku');
$routes->post('/sku/store', 'Surat::storeSku');
$routes->get('/sku/edit/(:num)', 'Surat::editSku/$1');
$routes->post('/sku/update/(:num)', 'Surat::updateSku/$1');
$routes->get('/sku/delete/(:num)', 'Surat::deleteSku/$1');
$routes->get('/sku/cetak/(:num)', 'Surat::cetakSku/$1');

// Routes for SKBM
$routes->get('/skbm/create', 'Surat::createSkbm');
$routes->post('/skbm/store', 'Surat::storeSkbm');
$routes->get('/skbm/edit/(:num)', 'Surat::editSkbm/$1');
$routes->post('/skbm/update/(:num)', 'Surat::updateSkbm/$1');
$routes->get('/skbm/delete/(:num)', 'Surat::deleteSkbm/$1');
$routes->get('/skbm/cetak/(:num)', 'Surat::cetakSkbm/$1');

// Routes for SKOS
$routes->get('/skos/create', 'Surat::createSkos');
$routes->post('/skos/store', 'Surat::storeSkos');
$routes->get('/skos/edit/(:num)', 'Surat::editSkos/$1');
$routes->post('/skos/update/(:num)', 'Surat::updateSkos/$1');
$routes->get('/skos/delete/(:num)', 'Surat::deleteSkos/$1');
$routes->get('/skos/cetak/(:num)', 'Surat::cetakSkos/$1');

// Routes for SU
$routes->get('/su/create', 'Surat::createSu');
$routes->post('/su/store', 'Surat::storeSu');
$routes->get('/su/edit/(:num)', 'Surat::editSu/$1');
$routes->post('/su/update/(:num)', 'Surat::updateSu/$1');
$routes->get('/su/delete/(:num)', 'Surat::deleteSu/$1');
$routes->get('/su/cetak/(:num)', 'Surat::cetakSu/$1');


// Routes for SK
$routes->get('/sk/create', 'Surat::createSk');
$routes->post('/sk/store', 'Surat::storeSk');
$routes->get('/sk/edit/(:num)', 'Surat::editSk/$1');
$routes->post('/sk/update/(:num)', 'Surat::updateSk/$1');
$routes->get('/sk/delete/(:num)', 'Surat::deleteSk/$1');
$routes->get('/sk/cetak/(:num)', 'Surat::cetakSk/$1');

// routes for SPSKCK
$routes->get('/spskck/create', 'Surat::createSpskck');
$routes->post('/spskck/store', 'Surat::storeSpskck');
$routes->get('/spskck/edit/(:num)', 'Surat::editSpskck/$1');
$routes->post('/spskck/update/(:num)', 'Surat::updateSpskck/$1');
$routes->get('/spskck/delete/(:num)', 'Surat::deleteSpskck/$1');
$routes->get('/spskck/cetak/(:num)', 'Surat::cetakSpskck/$1');

// routes for SKTM
$routes->get('/sktm/create', 'Surat::createSktm');
$routes->post('/sktm/store', 'Surat::storeSktm');
$routes->get('/sktm/edit/(:num)', 'Surat::editSktm/$1');
$routes->post('/sktm/update/(:num)', 'Surat::updateSktm/$1');
$routes->get('/sktm/delete/(:num)', 'Surat::deleteSktm/$1');
$routes->get('/sktm/cetak/(:num)', 'Surat::cetakSktm/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes are one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
