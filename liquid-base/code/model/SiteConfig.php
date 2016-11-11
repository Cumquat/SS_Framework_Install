<?php
/**
 * Sitewide configuration.
 * 
 * This is shamlessley copy > pasted from CMS. Though have removed permissions
 * stuff as this is more intrinsically linked to the CMS.
 *
 * @property string Title Title of the website.
 * @property string Tagline Tagline of the website.
 *
 * @author Tom Rix
 * @package siteconfig
 */
class SiteConfig extends DataObject implements PermissionProvider {
	private static $db = array(
		"Title" 		=> "Varchar(255)",
		"Tagline" 		=> "Varchar(255)",
		'Description'	=> "Text",
		'Version'		=> 'Varchar(20)'
	);
	private static $has_one = array(
		"Logo" => "Image"
	);
	private static $many_many = array();
	private static $disabled_themes = array();
	public function populateDefaults(){
		$this->Title   = _t('SiteConfig.SITENAMEDEFAULT', "System Name");
		$this->Tagline = _t('SiteConfig.TAGLINEDEFAULT', "your tagline here");
		parent::populateDefaults();
	}
	public function getCMSFields(){ 
		$fields = parent::getCMSFields();
		return $fields; 
	}
	/**
	 * Get the actions that are sent to the CMS. In
	 * your extensions: updateEditFormActions($actions)
	 *
	 * @return Fieldset
	 */
	public function getCMSActions() {
		if (Permission::check('ADMIN') || Permission::check('EDIT_SITECONFIG')) {
			$actions = new FieldList(
				FormAction::create('save_siteconfig', _t('CMSMain.SAVE','Save'))
					->addExtraClass('ss-ui-action-constructive')->setAttribute('data-icon', 'accept')
			);
		} else {
			$actions = new FieldList();
		}
		$this->extend('updateCMSActions', $actions);
		return $actions;
	}

	/**
	 * @return String
	 */
	public function CMSEditLink() {
		return singleton('CMSSettingsController')->Link();
	}
	
	/**
	 * Get the current sites SiteConfig, and creates a new one
	 * through {@link make_site_config()} if none is found.
	 *
	 * @return SiteConfig
	 */
	static public function current_site_config() {
		if ($siteConfig = DataObject::get_one('SiteConfig')) return $siteConfig;
		
		return self::make_site_config();
	}

	/**
	 * Setup a default SiteConfig record if none exists
	 */
	public function requireDefaultRecords() {
		parent::requireDefaultRecords();
		$siteConfig = DataObject::get_one('SiteConfig');
		if(!$siteConfig) {
			self::make_site_config();
			DB::alteration_message("Added default site config","created");
		}
	}
	
	/**
	 * Create SiteConfig with defaults from language file.
	 * 
	 * @return SiteConfig
	 */
	static public function make_site_config() {
		$config = SiteConfig::create();
		$config->write();
		return $config;
	}
	
	public function providePermissions() {
		return array(
			'EDIT_SITECONFIG' 	=> array(
				'name' 			=> 'Manage site configuration',
				'category' 		=> 'LIQUIDCONFIG',
				'help' 			=> 'Ability to edit Liquid Config Settings',
				'sort' => 400
			)
		);
	}
	function canEdit($member = false){
    	return Permission::check('EDIT_SITECONFIG');
  	}
}
