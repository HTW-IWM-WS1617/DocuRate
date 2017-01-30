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

  /** @var helper_plugin_sqlite */
  protected $sqlite = null;


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
     * initializes the DB connection
     *
     * @return helper_plugin_sqlite|null
     */
    public function getDBHelper() {
        if(!is_null($this->sqlite)) return $this->sqlite;

        $this->sqlite = plugin_load('helper', 'sqlite');
        if(!$this->sqlite) {
            msg('The rating plugin requires the sqlite plugin', -1);
            $this->sqlite = null;
            return null;
        }

        $ok = $this->sqlite->init('dbdokurate', __DIR__ . '/db');
        if(!$ok) {
            msg('rating plugin sqlite initialization failed', -1);
            $this->sqlite = null;
            return null;
        }

        return $this->sqlite;
    }


    public function ratepage($rate, $page) {

        $sqlite = $this->getDBHelper();
        if(!$sqlite) return;

        // ignore any bot accesses
        /**if(!class_exists('Jaybizzle\CrawlerDetect\CrawlerDetect')){
            require (__DIR__ . '/CrawlerDetect.php');
        }
        $CrawlerDetect = new Jaybizzle\CrawlerDetect\CrawlerDetect();
        if($CrawlerDetect->isCrawler()) return;
    */
        $translation = plugin_load('helper', 'translation');
        if (!$translation) {
            $lang = '';
        } else {
            $lang = $translation->getLangPart($page);
        }

        $date = date('Y-m-d');

        $sql = "INSERT OR REPLACE INTO ratings (page, rater, lang, date, value) VALUES (?, ?, ?, ?, ?)";
        $sqlite->query($sql, $page, $this->userID(), $lang, $date, $rate);
    }
    }



}
