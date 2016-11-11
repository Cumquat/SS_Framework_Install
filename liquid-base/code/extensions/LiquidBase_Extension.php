<?php
class LiquidBase_Extension extends Extension {
    public function forceLogin(){
    	$theVars = $this->owner->request->getVars();
        $theURL  = $theVars['url'];
        unset($theVars['url']);
        $theURLVars = http_build_query($theVars);
        if($theURLVars){
            $theURL = $theURL . "?" . $theURLVars;
        }
        return $this->owner->redirect("/Security/login?BackURL=" . urlencode($theURL));
    }
    public function confirmScreen($theData){
        return $this->owner->customise($theData)->renderWith(array("_ConfirmScreen", "Page"));
    }
    public function friendlyError($type, $pageMessage){
    	//$this->owner->response->setStatusCode(401);
    	return $this->owner->customise(array(
    		"Type"    => $type,
    		"Message" => $pageMessage
    	))->renderWith(array("_FriendlyErrorPage", "Page"));
    }
    public function getUserAlertMessage($theID){
        return LiquidBase::getUserAlertMessage($theID);
    }
    public function setUserAlertMessage($theID, $type, $message){
        return LiquidBase::setUserAlertMessage($theID, $type, $message);
    }
}