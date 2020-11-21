<?php

/**  
 * @file  
 * Contains Drupal\siteapikey\Form\SiteApiForm.  
 */ 
 
namespace Drupal\siteapikey\Form;
 
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SiteApiForm extends ConfigFormBase{
	
	/**
	* {@inheritdoc}
	*/
	protected function getEditableConfigNames() {
		return [
		  'siteapikey.settings',
		];
	}
	
	/**
	* {@inheritdoc}
	*/
	public function getFormId() {
		return 'siteapi_form';
	}
	/**
	* {@inheritdoc}
	*/
	
	public function buildForm(array $form, FormStateInterface $form_state){
		//get default value of site api key form if any
		$config = $this->config('siteapikey.settings');
		$form['siteapikey'] = [
			'#type' => 'textfield',
			'#title' => t('Site Api Key'),
			'#default_value' => $config->get('siteapikey'),
		];
		return parent::buildForm($form, $form_state);
	}
	public function submitForm(array &$form, FormStateInterface $form_state) {  
		parent::submitForm($form, $form_state);  
		// set new value in the form
		$this->config('siteapikey.settings')  
			 ->set('siteapikey', $form_state->getValue('siteapikey'))  
			 ->save();  
	}  
}