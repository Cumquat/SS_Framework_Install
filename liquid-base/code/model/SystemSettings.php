<?php
class SystemSettings extends DataObject {
    private static $db = array(
        "Key"   => "Varchar(64)",
        "Value" => "Text"
    );
    private static $default_sort = "Key";
    private static $searchable_fields = array(
        "Key"
    );
    private static $summary_fields = array(
        "ID"    => "ID",
        "Key"   => "Key",
        "Value" => "Value"
    );
    private static $indexes = array(
        "Key" => true
    );
    public static function get_setting($key){
        if($theData = SystemSettings::get()->filter(array("Key" => Convert::raw2sql($key)))->first()){
            return $theData->Value;
        }
        return false;
    }
    public static function update_setting($key, $value){
        if($theData = SystemSettings::get()->filter(array("Key" => Convert::raw2sql($key)))->first()){
            $theData->Key   = $key;
            $theData->Value = $value;
            return $theData->write();
        }
        return false;
    }
    public static function set_setting($key, $value){
        if($theData = SystemSettings::get()->filter(array("Key" => Convert::raw2sql($key)))->first()){
            return update_setting($key, $value);
        }
        $newData        = new SystemSettings();
        $newData->Key   = $key;
        $newData->Value = $value;
        return $newData->write();
    }
}