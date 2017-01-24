<?php
/**
 * DokuWiki Plugin dokurate2 (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Gruppe HTWdokurate2 <tillbussmann@googlemail.com>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_dokurate2 extends DokuWiki_Action_Plugin {

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {
        //$controller->register_hook('ACTION_ACT_PREPROCESS', 'BEFORE',  $this, 'allow_my_action');
        //$controller->register_hook('TPL_ACT_UNKNOWN', 'AFTER', $this, 'Call');
        $controller->register_hook('TPL_ACT_RENDER', 'BEFORE', $this, 'Call');

    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */

     public function allow_my_action(Doku_Event $event, $param) {
       //if($event->data != 'Call') return;
       $event->preventDefault();


   }

    public function Call(Doku_Event &$event, $param) {
    //if($event->data != 'Call') return;
      //$event->preventDefault();
      $dokurate2 = plugin_load('helper','dokurate2');
      if($dokurate2) echo $dokurate2->dokurate2_display();
    }

}

// vim:ts=4:sw=4:et:
