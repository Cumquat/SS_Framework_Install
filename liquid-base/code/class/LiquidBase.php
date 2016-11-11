<?php
class LiquidBase {
	public static function SiteAdmin(){
        if(Permission::check('ADMIN')){
            return true;
        }
        return false;
    }
    public static function getUserAlertMessage($theID){
        if($theMessage = Session::get("global." . $theID . ".message")){
            Session::clear("global." . $theID . ".message");
            return '<div class="alert alert-' . $theMessage['type'] . '" role="alert">' . $theMessage['message'] . '</div>';
        }
        return '';
    }
    public static function setUserAlertMessage($theID, $type, $message){
        Session::set("global." . $theID . ".message", array(
            "type"    => $type,
            "message" => $message
        ));
        Session::save();
    }
    public static function deleteFileParents($theParent){
        if($theParent->ID and !$theParent->hasChildren()){
            $theParent->delete();
            if($subParent = $theParent->Parent()){
                self::deleteFileParents($subParent);
            }
        }
    }
}