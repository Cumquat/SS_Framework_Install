<?php
class SystemSettings_Admin extends ModelAdmin {
    private static $menu_title     = "System Settings";
    private static $url_segment    = "system_settings";
    private static $default_model  = "SystemSettings";
    private static $managed_models = array(
        "SystemSettings"
    );
}