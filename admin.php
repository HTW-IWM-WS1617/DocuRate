<?php
/**
 * DokuWiki Plugin dokurate (Admin Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Gruppe DokuRate <htw_docurate@fraunhofer.de>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class admin_plugin_dokurate extends DokuWiki_Admin_Plugin {

    private $hlp;

    /**
     * @return int sort number in admin menu
     */
    public function getMenuSort() {
        return 400;
    }

    /**
     * @return bool true if only access for superuser, false is for superusers and moderators
     */
    public function forAdminOnly() {
        return false;
    }

    /**
     * Should carry out any processing required by the plugin.
     */
    public function handle() {
      $this->hlp = plugin_load('helper', 'dokurate');
      $this->hlp->getDB();
    }

    /**
     * Render HTML output, e.g. helpful text and a form
     */
    public function html() {
        ptln('<h1>'.$this->getLang('menu').'</h1>');
    }
}

// vim:ts=4:sw=4:et:
