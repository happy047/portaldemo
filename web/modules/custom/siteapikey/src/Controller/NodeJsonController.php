<?php
namespace Drupal\siteapikey\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Component\Serialization\Json;
/**
* Display nodes in json format if correct siteapikey value is given in url arguments
*/

class NodeJsonController extends ControllerBase{
	
	/**
	* {@inheritdoc}
	*/
	public function node_display(){
		global $base_url;
		$apikey = \Drupal::routeMatch()->getParameter('apikey');
		$nid = \Drupal::routeMatch()->getParameter('nid');
		$config_api_key = \Drupal::config('siteapikey.settings')->get('siteapikey');
		$encoded_data = '';
		// If config key matches the key provided in url then return json
		if($config_api_key == $apikey){
			$node = Node::load($nid);
			$node_title = $node->getTitle();
			$type_name = $node->bundle();
			if($type_name == 'page'){
				$node_json = [];
				$node_json['nid'] = $nid;
				$node_json['node_title'] = $node_title;
				$encoded_data = Json::encode($node_json);
			}
		}
		// If config key does not match show 403 forbidden
		elseif($config_api_key != $apikey){
			$redirect_url = new \Drupal\Core\Url('system.403');
			$response = new RedirectResponse($redirect_url->toString());
			$response->send();
		}
		//return response
		return new Response($encoded_data);
	}
	
}
