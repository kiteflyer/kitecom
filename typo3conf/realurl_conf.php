<?php

    $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
        'pagePath' => array (
            'type' => 'user',
            'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
            'spaceCharacter' => '-',
            'expireDays' => 3,
            'rootpage_id' => '1',
        ),
        'preVars' => array(
            array(
                'GETvar' => 'tx_t3dkitecom_search[action]',
                'valueMap' => array(
                ),
                'noMatch' => 'bypass',
            ),
            array(
                'GETvar' => 'tx_t3dkitecom_search[controller]',
                'valueMap' => array(
                    //'Search' => 'Search',
                ),
                'noMatch' => 'bypass',
            ),            
            array(
                'GETvar' => 'cHash',
                'valueMap' => array(
                ),
                'noMatch' => 'bypass',
            ),                        
            
        ),
        'fileName' => array (
            // Add html extension to path.
            'defaultToHTMLsuffixOnPrev' => 1,
        ),

        /*'fileName' => array (
            'defaultToHTMLsuffixOnPrev' => 1,
            'index' => array(
                'nav.html' => array(
                    'keyValues' => array ('type' => 102)
                ),
                'ajax.html' => array(
                    'keyValues' => array ('type' => 101)
                ),                
            ),
        ),*/
    );

?>