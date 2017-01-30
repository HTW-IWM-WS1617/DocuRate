<?php
/**
 * DokuWiki Plugin dokurate (Helper Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Gruppe HTWdokurate <tillbussmann@googlemail.com>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class helper_plugin_dokurate extends DokuWiki_Plugin {

  public function dokurate_display()
  {
  //display 5 star rating form in html
      echo '<div class="rating-stars">';

      echo '<input type="radio" name="group-1" id="group-1-0" value="1" /><label for="group-1-0"><a href=' . wl($ID, array('rating' => 1)) . '" class="plugin_rating_stars' . ' data-rating="1"></a></label>';
      echo '<input type="radio" name="group-1" id="group-1-1" value="2" /><label  for="group-1-1"><a href=' . wl($ID, array('rating' => 2)) . '" class="plugin_rating_stars' . ' data-rating="2"></a></label>';
      echo '<input type="radio" name="group-1" id="group-1-2" value="3" /><label  for="group-1-2"><a href=' . wl($ID, array('rating' => 3)) . '" class="plugin_rating_stars' . ' data-rating="3"></a></label>';
      echo '<input type="radio" name="group-1" id="group-1-3" value="4" /><label  for="group-1-3"><a href=' . wl($ID, array('rating' => 4)) . '" class="plugin_rating_stars' . ' data-rating="4"></a></label>';
      echo '<input type="radio" name="group-1" id="group-1-4"  value="5" /><label for="group-1-4"><a href=' . wl($ID, array('rating' => 5)) . '" class="plugin_rating_stars' . ' data-rating="5"></a></label>';
      echo '</div>';

  }

    /**
     * Return info about supported methods in this Helper Plugin
     *
     * @return array of public methods
     */
    public function getMethods() {
        return array(
            array(
                'name'   => 'getThreads',
                'desc'   => 'returns pages with discussion sections, sorted by recent comments',
                'params' => array(
                    'namespace'         => 'string',
                    'number (optional)' => 'integer'
                ),
                'return' => array('pages' => 'array')
            ),
            array(
                // and more supported methods...
            )
        );
    }

}
