<?php

/**
 * con4gis - the gis-kit
 *
 * @version   php 5
 * @package   con4gis
 * @author    con4gis contributors (see "authors.txt")
 * @license   GNU/LGPL http://opensource.org/licenses/lgpl-3.0.html
 * @copyright Küstenschmiede GmbH Software & Design 2011 - 2017.
 * @link      https://www.kuestenschmiede.de
 */

$GLOBALS['con4gis_core_extension']['installed'] = true;
$GLOBALS['con4gis_core_extension']['version']   = '1.9.0';
$GLOBALS['con4gis_core_extension']['con4gis_version'] = 'v3.9';

// API-Registration
$GLOBALS['TL_API'] = array();
$GLOBALS['TL_API']['fileUpload']  = 'c4g\C4GFileUpload';
$GLOBALS['TL_API']['imageUpload'] = 'c4g\C4GImageUpload';
$GLOBALS['TL_API']['deliver']     = 'c4g\C4GDeliverFileApi';



/**
 * Backend Modules
 */
array_insert($GLOBALS['BE_MOD'], array_search('content', array_keys($GLOBALS['BE_MOD'])) + 1, array
(
    'con4gis' => array
    (
        'c4g_core' => array
        (
            'callback' => 'c4g\C4GInfo',
            'icon'     => 'system/modules/con4gis_core/assets/images/core.png'
        )
    )
));

if(TL_MODE == "FE") {
    $GLOBALS['TL_HEAD'][] = "<script>var c4g_rq = '" . $_SESSION['REQUEST_TOKEN'] . "';</script>";
}

if (version_compare( VERSION, '4', '>=' ))
{
    $apiBaseUrl = 'con4gis/api';
    $GLOBALS['TL_CSS']['c4g_backend'] = 'system/modules/con4gis_core/assets/css/c4gBackend.css';
}
else
{
    $apiBaseUrl = 'system/modules/con4gis_core/api/index.php';
}
$GLOBALS['TL_HEAD'][] = "<script>var apiBaseUrl = '" . $apiBaseUrl . "';</script>";

/**
 * Content Elements
 */
array_insert($GLOBALS['TL_CTE']['con4gis'], 2, array
(
    'c4g_activationpage' => 'c4g\Content_c4g_activationpage'
));

/**
 * Purge jobs
 */
$GLOBALS['TL_PURGE']['folders']['con4gis'] = array
(
    'callback' => array('c4g\Core\C4GAutomator', 'purgeApiCache'),
    'affected' => array('system/cache/con4gis')
);

/**
 * Con4Gis Caching
 *
 * caching is not auto-enabled. To register a service to be cached, insert it in the GLOBALS-Array
 * eg: $GLOBALS['CON4GIS']['USE_CACHE']['SERVICES'][] = "layerService"; => layerService requests are cached
 *
 * it is also possible to enable caching while existence of defined get parameters and values
 * eg: $GLOBALS['CON4GIS']['USE_CACHE']['PARAMS']['method'] = array('getLive'); => request with method=getLive will be cached
 *
 */
$GLOBALS['CON4GIS']['USE_CACHE'] = array();
$GLOBALS['CON4GIS']['USE_CACHE']['SERVICES'] = array();
$GLOBALS['CON4GIS']['USE_CACHE']['PARAMS'] = array();

// check whether to use stringutil or string class
if (class_exists('\Contao\StringUtil')) {
    $GLOBALS['con4gis']['stringClass'] = '\Contao\StringUtil';
} else {
    $GLOBALS['con4gis']['stringClass'] = '\Contao\String';
}