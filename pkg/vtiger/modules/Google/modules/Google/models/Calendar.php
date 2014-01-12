<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

vimport('~~/modules/WSAPP/synclib/models/SyncRecordModel.php');

class Google_Calendar_Model extends WSAPP_SyncRecordModel {

    const TYPE_ORGANIZER = "http://schemas.google.com/g/2005#event.organizer";

    public $organizer;
    public $whoList;
    public $startUTC;
    public $endUTC;

    /**
     * return id of Google Record
     * @return <string> id
     */
    function getId() {
        return $this->data['entity']->id->text;
    }

    /**
     * return modified time of Google Record
     * @return <date> modified time 
     */
    public function getModifiedTime() {
        return $this->vtigerFormat($this->data['entity']->updated->text);
    }

    /**
     * return Subject of Google Record
     * @return <string> Subject
     */
    function getSubject() {
        return $this->data['entity']->title->text;
    }

    /**
     * return Start time time in UTC of Google Record
     * @return <date> start time
     */
    function getStartTimeUTC() {
        if (isset($this->startUTC)) {
            return $this->startUTC;
        }
        $when = $this->data['entity']->getWhen();
        if (empty($when)) {
            $gStart = "00:00";
        } else if ($when[0]->getStartTime()) {
            $gStart = $when[0]->getStartTime();
        } else {
            $gStart = "00:00";
        }
        $start = new DateTime($gStart);
        $timeZone = new DateTimeZone('UTC');
        $start->setTimezone($timeZone);
        $startUTC = $start->format('H:i:s');
        $this->startUTC = $startUTC;
        return $startUTC;
    }

    /**
     * return End time time in UTC of Google Record
     * @return <date> end time
     */
    function getEndTimeUTC() {
        if (isset($this->endUTC)) {
            return $this->endUTC;
        }
        $when = $this->data['entity']->getWhen();
        if (empty($when)) {
            $gEnd = "00:00";
        } else if ($when[0]->getEndTime()) {
            $gEnd = $when[0]->getEndTime();
        } else {
            $gEnd = "00:00";
        }
        $end = new DateTime($gEnd);
        $timeZone = new DateTimeZone('UTC');
        $end->setTimezone($timeZone);
        $endUTC = $end->format('H:i:s');
        $this->endUTC = $endUTC;
        return $endUTC;
    }

    /**
     * return start date in UTC of Google Record
     * @return <date> start date
     */
    function getStartDate() {
        if (isset($this->startDate)) {
            return $this->startdate;
        }
        $when = $this->data['entity']->getWhen();
        if (empty($when)) {
            $gStart = date('Y-m-d');
        } else if ($when[0]->getStartTime()) {
            $gStart = $when[0]->getStartTime();
        } else {
            $gStart = date('Y-m-d');
        }
        $start = new DateTime($gStart);
        $timeZone = new DateTimeZone('UTC');
        $start->setTimezone($timeZone);
        $startDate = $start->format('Y-m-d');
        $this->startDate = $startDate;
        return $startDate;
    }

    /**
     * return  End  date in UTC of Google Record
     * @return <date> end date
     */
    function getEndDate() {
        if (isset($this->endUTC)) {
            return $this->endUTC;
        }
        $when = $this->data['entity']->getWhen();
        if (empty($when)) {
            $gEnd = date('Y-m-d');
        } else if ($when[0]->getEndTime()) {
            $gEnd = $when[0]->getEndTime();
        } else {
            $gEnd = date('Y-m-d');
        }
        $end = new DateTime($gEnd);
        $timeZone = new DateTimeZone('UTC');
        $end->setTimezone($timeZone);
        $endDate = $end->format('Y-m-d');
        $this->endDate = $endDate;
        return $endDate;
    }

    /**
     * return Organizer of Google Record
     * @return <string> Organizer
     */
    function getOrganizer() {
        if (isset($this->organizer)) {
            return $this->organizer;
        }
        $whoList = $this->getWhoList();
        $this->organizer = $whoList['organizer'];
        return $this->organizer;
    }

    /**
     * return Who List of Google Record
     * @return <array> Who List
     */
    function getWhoList() {
        if (isset($this->whoList)) {
            return $this->whoList;
        }
        $whoList = $this->data['entity']->getWho();
        $guests = array();
        $organizer = array();
        foreach ($whoList as $i => $who) {
            $type = $who->getRel();
            if ($type == self::TYPE_ORGANIZER) {
                $organizer['name'] = $who->getValueString();
                $organizer['email'] = $who->getEmail();
            } else {
                $detail = array();
                $detail['name'] = $who->getValueString();
                $detail['email'] = $who->getEmail();
                array_push($guests, $detail);
            }
        }
        $this->organizer = $organizer;
        $list = array();
        $list['organizer'] = $organizer;
        $list['guests'] = $guests;
        return $list;
    }

    /**
     * return tilte of Google Record
     * @return <string> title
     */
    function getTitle() {
        $title = $this->data['entity']->title->text;
        return empty($title) ? null : $title;
    }

    /**
     * return discription of Google Record
     * @return <string> Discription
     */
    function getDescription() {
        return $this->data['entity']->content->text;
    }

    /**
     * return location of Google Record
     * @return <string> location
     */
    function getWhere() {
        $where = $this->data['entity']->where;
        if (!empty($where)) {
            return $where[0]->valueString;
        }
    }

    /**
     * Returns the Google_Contacts_Model of Google Record
     * @param <array> $recordValues
     * @return Google_Contacts_Model
     */
    public static function getInstanceFromValues($recordValues) {
        $model = new Google_Calendar_Model($recordValues);
        return $model;
    }

    /**
     * converts the Google Format date to 
     * @param <date> $date Google Date
     * @return <date> Vtiger date Format
     */
    public function vtigerFormat($date) {
        list($date, $timestring) = explode('T', $date);
        list($time, $tz) = explode('.', $timestring);

        return $date . " " . $time;
    }

}

?>
