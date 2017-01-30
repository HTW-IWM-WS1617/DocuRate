<?php
/**
 * DokuWiki Plugin dokurate (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Gruppe DokuRate <htw_docurate@fraunhofer.de>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');

class action_plugin_dokurate extends DokuWiki_Action_Plugin {


    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {

       //$controller->register_hook('ACTION_ACT_PREPROCESS', 'FIXME', $this, 'handle_action_act_preprocess');
       //$controller->register_hook('TPL_ACT_UNKNOWN', 'FIXME', $this, 'handle_tpl_act_unknown');
			 $controller->register_hook('TPL_ACT_RENDER', 'BEFORE', $this, 'Call');
			 $controller->register_hook('DOKUWIKI_STARTED', 'AFTER', $this, 'handle_vote');

    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */

		 public function Call(Doku_Event &$event, $param) {
		     //if($event->data != 'Call') return;
		       //$event->preventDefault();
		       $dokurate = plugin_load('helper','dokurate');
		       if($dokurate) echo $dokurate->dokurate_display();
		     }


		public function handle_vote(Doku_Event &$event, $param) {
	 	        global $INPUT;
	 	        global $ID;
	 	        if(!$INPUT->has('rating')) return;

	 	        $rate = $INPUT->int('rating');

	 	        /** @var helper_plugin_rating $hlp */
	 	        $hlp = plugin_load('helper', 'dokurate');
	 	        $hlp->ratepage($rate, $ID);
	 	    }


				 /**
    *public function handle_action_act_preprocess(Doku_Event &$event, $param) {
    *}

    *public function handle_tpl_act_unknown(Doku_Event &$event, $param) {
    *}

*/
}
