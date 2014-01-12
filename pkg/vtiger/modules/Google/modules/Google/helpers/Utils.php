<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Google_Utils_Helper {

    /**
     * Updates the database with syncronization times
     * @param <sting> $sourceModule module to which sync time should be stored
     * @param <date> $modifiedTime Max modified time of record that are sync 
     */
    public static function updateSyncTime($sourceModule, $modifiedTime = false) {
        $db = PearDatabase::getInstance();
        self::intialiseUpdateSchema();
        $user = Users_Record_Model::getCurrentUserModel();
        if (!$modifiedTime) {
            $modifiedTime = self::getSyncTime($sourceModule);
        }
        if (!self::getSyncTime($sourceModule)) {
            if ($modifiedTime) {
                $db->pquery('INSERT INTO vtiger_google_sync (googlemodule,user,synctime,lastsynctime) VALUES (?,?,?,?)', array($sourceModule, $user->id, $modifiedTime, date('Y-m-d H:i:s')));
            }
        } else {
            $db->pquery('UPDATE vtiger_google_sync SET synctime = ?,lastsynctime = ? WHERE user=? AND googlemodule=?', array($modifiedTime, date('Y-m-d H:i:s'), $user->id, $sourceModule));
        }
    }

    /**
     *  Creates sync table if not exists
     */
    private static function intialiseUpdateSchema() {
        if (!Vtiger_Utils::CheckTable('vtiger_google_sync')) {
            Vtiger_Utils::CreateTable('vtiger_google_sync', '(googlemodule varchar(50),user int(10), synctime datetime,lastsynctime datetime)', true);
        }
    }

    /**
     *  Gets the max Modified time of last sync records
     *  @param <sting> $sourceModule modulename to which sync time should return
     *  @return <date> max Modified time of last sync records OR <boolean> false when date not present  
     */
    public static function getSyncTime($sourceModule) {
        $db = PearDatabase::getInstance();
        self::intialiseUpdateSchema();
        $user = Users_Record_Model::getCurrentUserModel();
        $result = $db->pquery('SELECT synctime FROM vtiger_google_sync WHERE user=? AND googlemodule=?', array($user->id, $sourceModule));
        if ($result && $db->num_rows($result) > 0) {
            $row = $db->fetch_array($result);
            return $row['synctime'];
        } else {
            return false;
        }
    }

    /**
     *  Gets the last syncronazation time 
     *  @param <sting> $sourceModule modulename to which sync time should return
     *  @return <date> last syncronazation time OR <boolean> false when date not present  
     */
    public static function getLastSyncTime($sourceModule) {
        $db = PearDatabase::getInstance();
        self::intialiseUpdateSchema();
        $user = Users_Record_Model::getCurrentUserModel();
        $result = $db->pquery('SELECT lastsynctime FROM vtiger_google_sync WHERE user=? AND googlemodule=?', array($user->id, $sourceModule));
        if ($result && $db->num_rows($result) > 0) {
            $row = $db->fetch_array($result);
            return $row['lastsynctime'];
        } else {
            return false;
        }
    }

    /**
     *  Get the callback url for a module
     * @global type $site_URL
     * @param <object> $request
     * @param <array> $options any extra parameter add to url
     * @return string callback url
     */
    static function getCallbackUrl($request, $options = array()) {
        global $site_URL;

        $callback = $site_URL . "/index.php?module=" . $request['module'] . "&view=List&sourcemodule=" . $request['sourcemodule'];
        foreach ($options as $key => $value) {
            $callback.="&" . $key . "=" . $value;
        }
        return $callback;
    }

}
