<?php
/**
 * This file is part of MySQLDumper released under the GNU/GPL 2 license
 * http://www.mysqldumper.net
 *
 * @package         MySQLDumper
 * @subpackage      View_Helpers
 * @version         SVN: $Rev$
 * @author          $Author$
 */

/**
 * Print translator names
 *
 * @package         MySQLDumper
 * @subpackage      View_Helpers
 */
class Msd_View_Helper_PrintFlag extends Zend_View_Helper_Abstract
{
    /**
     * Holds all languages
     *
     * @var array
     */
    private static $_languages;

    /**
     * Print image of given locale
     *
     * @param string $locale
     *
     * @return string
     */
    public function printFlag($locale)
    {
        if (self::$_languages === null) {
            $languagesModel = new Application_Model_Languages();
            $languages = $languagesModel->getLanguages();
            self::$_languages = array();
            foreach ($languages as $language) {
                self::$_languages[$language['locale']] = $language;
            }
        }
        $ret ='';
        if (isset(self::$_languages[$locale])) {
            $ret = '<img src="' . $this->view->baseUrl() . '/images/flags/';
            $ret .= self::$_languages[$locale]['locale'] . '.'
                    . self::$_languages[$locale]['flag_extension'] . '"'
                    . ' alt="' . self::$_languages[$locale]['name'] .'"'
                    . ' title="' . self::$_languages[$locale]['name'] .'"'
                    . '/>';
        }
        return $ret;
    }
}