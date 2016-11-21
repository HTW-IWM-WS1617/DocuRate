<?php
/**
 * DokuWiki Plugin dokurate (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Gruppe DokuRate <htw_docurate@fraunhofer.de>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_dokurate extends DokuWiki_Action_Plugin {

    var $parameter = "";

    /**
     * return some info
     */
    function getInfo(){
        return array(
            'author' => 'Gruppe 2',
            'email'  => 'htw_dokurate@fraunhofer.de',
            'date'   => '2016-11-20',
            'name'   => 'Dokurate)',
            'desc'   => 'Easy rating plugin for dokuwiki',
            'url'    => 'http://www.dokuwiki.org/plugin:dokurate',
        );
    }



class action_plugin_dokurate extends DokuWiki_Action_Plugin {

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {

       $controller->register_hook('ACTION_ACT_PREPROCESS', 'FIXME', $this, 'handle_action_act_preprocess');
       $controller->register_hook('TPL_ACT_UNKNOWN', 'FIXME', $this, 'handle_tpl_act_unknown');
   
    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */

    public function handle_action_act_preprocess(Doku_Event &$event, $param) {
    }

    public function handle_tpl_act_unknown(Doku_Event &$event, $param) {
    }

}

// vim:ts=4:sw=4:et:
