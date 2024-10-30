<?php

/**
 * Register all actions and defines MailChimp api.
 * 
 *
 * Defines all actions for subscribe customers
 * for MailChimp account and example how to used
 * mailchimp api.
 *
 * @since      1.0.0
 */

add_action('wp_ajax_subscribe_customer', 'medma_mtx_subscribeCustomerData');
add_action('wp_ajax_nopriv_subscribe_customer', 'medma_mtx_subscribeCustomerData');
	
function medma_mtx_subscribeCustomerData(){
	$data = array();
	parse_str(sanitize_text_field($_POST['form_data']), $data);
	
	$email_service = get_theme_mod( 'medma_matix_sp_'.sanitize_text_field($data["template_number"]).'_newsletter_mail' );
	if($email_service == ''){
		$email_service = 'mail_chimp';
	}
	
	$api_values = medma_mtx_getApiAllData($email_service);
	
	$email = sanitize_text_field($data['customer_email']);
	$fname = sanitize_text_field($data['first_name']);
	$lname = sanitize_text_field($data['last_name']);
	$auth_details = array();
	if($api_values == 1){	
		try{
			switch ($email_service) {
					case 'mail_chimp':
						$auth_details['list-id'] = get_theme_mod( 'medma_matix_sp_mail_chimp_list_id' );
						$auth_details['api-key'] = get_theme_mod( 'medma_matix_sp_mail_chimp_api_key' );
						$auth_details['data-center'] = get_theme_mod( 'medma_matix_sp_mail_chimp_data_center' );
						
						$name = array("FNAME"=>$fname, "LNAME"=>$lname);

						$body = array(
						    'email_address' => $email,
						    'status' => 'subscribed',
						    'merge_fields' => $name
						);

						$url = "https://us".$auth_details['data-center'].".api.mailchimp.com/3.0/lists/".$auth_details['list-id']."/members";

						$body = json_encode($body);
						// echo $body;
						$args = array(
							'method' => 'POST',
						  'body' => $body,
						  'httpversion' => '1.0',
						  'headers' => array(
						    'Authorization' => 'Basic ' . base64_encode( "Medma" . ':' . $auth_details['api-key'] ),
						    'Content-Type' => 'application/json' 
						  )
						);

						$response = wp_remote_post($url, $args);
						
						if(json_decode($response['body'])->status == 'subscribed'){
							echo 1;	
						}else{
							echo 0;
						}
					break;
					
					case 'mad_mimi':
			  
						$auth_details['username'] = get_theme_mod( 'medma_matix_sp_mad_mimi_username' );
						$auth_details['api-key'] = get_theme_mod( 'medma_matix_sp_mad_mimi_api_key' );
						$auth_details['list-name'] = get_theme_mod( 'medma_matix_sp_mad_mimi_list_name' );
						
						$name = $fname.' '.$lname;

						$url = "https://madmimi.com/audience_lists/".$auth_details['list-name']."/add";

						$body = array(
						    'email' => $email,
						    'name' => $name,
						    'username' => $auth_details['username'],
						    'api_key' => auth_details['api-key']
						);

						$args = array(
						  'body' => http_build_query($body)
						);

						$response = wp_remote_post($url, $args);

						

						echo 1;
					break;


					case 'campaign_monitor':
						$auth_details['list-id'] = get_theme_mod( 'medma_matix_sp_campaign_list_id' );
						$auth_details['api-key'] = get_theme_mod( 'medma_matix_sp_campaign_api_key' );
						
						$name = $fname.' '.$lname;
						
						$url = "https://api.createsend.com/api/v3.1/subscribers/".$auth_details['list-id'].".json";
						$body = array(
						    'EmailAddress' => $email,
						    'Name' => $name,
						    'Resubscribe' => true,
						    'RestartSubscriptionBasedAutoresponders' => true
						);
						$args = array(
						  'body' => json_encode($body),
						  'headers' => array(
						    'Authorization' => 'Basic ' . base64_encode( $auth_details['api-key'] . ":" . ""),
						    'Content-Type' => 'application/json' 
						  )
						);
						$response = wp_remote_post($url, $args);


						echo 1;
					break;

					case 'constant_contact':
						$auth_details['list-id'] = get_theme_mod( 'medma_matix_sp_constant_contact_list_id' );
						$auth_details['auth-key'] = get_theme_mod( 'medma_matix_sp_constant_contact_auth' );
						
						$name = $fname.' '.$lname;

						$url = "https://api.createsend.com/api/v3.1/subscribers/".$auth_details['list-id'].".json";
						$body = array(
						    'EmailAddress' => $email,
						    'Name' => $name,
						    'Resubscribe' => true,
						    'RestartSubscriptionBasedAutoresponders' => true
						);
						$args = array(
						  'body' => json_encode($body),
						  'headers' => array(
						    'Authorization' => 'Basic ' . base64_encode( $auth_details['api-key'] . ":" . ""),
						    'Content-Type' => 'application/json' 
						  )
						);
						$response = wp_remote_post($url, $args);

						
						echo 1;
					break;

					case 'sendy':
						$auth_details['sendy-url'] = get_theme_mod( 'medma_matix_sp_sendy_url' );
						$name = $fname.' '.$lname;
				 
						$list = 2;

						$body = array(
						    'email' => $email,
						    'name' => $name,
						    'list' => 2
						);

						$args = array(
						  'body' => http_build_query($body)
						);

						$response = wp_remote_post($url, $args);

						
						echo 1;
					break;

					case 'get_response':
						$auth_details['campaign-id'] = get_theme_mod( 'medma_matix_sp_get_response_campaign_id' );
						$auth_details['api-key'] = get_theme_mod( 'medma_matix_sp_get_response_api_key' );
					   
						$name = $fname.' '.$lname;
						$campaign_id = $auth_details['campaign-id']; // get it from model
						$campaign_arr = array("campaignId"=>$campaign_id);
						$api_key = $auth_details['api-key']; // get from model


						$auth_token = "X-Auth-Token: api-key ".$api_key;
					  	

					  	$url = 'https://api.getresponse.com/v3/contacts';
						$body = array(
						    'email' => $email,
						    'name' => $name,
						    'campaign' => $campaign_arr
						);
						$args = array(
						  'body' => json_encode($body),
						  'headers' => array(
						  	'Content-Type' => 'application/json', 
						    'X-Auth-Token' => 'api-key '.$api_key,
						  )
						);
						$response = wp_remote_post($url, $args);

						

						
						echo 1;
					 
						break;

					case 'icontact':
				 
						$auth_details['app-id'] = get_theme_mod( 'medma_matix_sp_icontact_api_id' );
						$auth_details['username'] = get_theme_mod( 'medma_matix_sp_icontact_username' );
						$auth_details['api-pwd'] = get_theme_mod( 'medma_matix_sp_icontact_api_pwd' );
						$auth_details['api-version'] = get_theme_mod( 'medma_matix_sp_icontact_api_version' );
						$auth_details['api-url'] = get_theme_mod( 'medma_matix_sp_icontact_api_url' );
						$auth_details['list-id'] = get_theme_mod( 'medma_matix_sp_icontact_list_id' );

						$api_id = "Api-AppId: ".$auth_details['app-id'];
						$username = "Api-Username: ".$auth_details['username'];
						$password = "API-Password: ".$auth_details['api-pwd'];
						$api_ver = "API-Version: ".$auth_details['api-version'];
						$api_url = $auth_details['api-url']."contacts";
						$list_id = $auth_details['list-id'];

						$url = $api_url;
						$body = array(
						    'email' => $email,
						    'firstName' => $fname,
						    'lastName' => $lname
						);
						$args = array(
						  'body' => json_encode(array("contact"=>$req_data)),
						  'headers' => array(
						  	'Content-Type' => 'application/json', 
						    'Api-AppId' => $auth_details['app-id'],
						    'Api-Username' => $auth_details['username'],
						    'API-Password' => $auth_details['api-pwd'],
						    'API-Version' => $auth_details['api-version'],
						    'Accept' => 'application/json'
						  )
						);
						$response = json_decode(wp_remote_post($url, $args));
						$contact_id = $response->contacts[0]->contactId;

						


						/*------   Subsciption ------*/
						$api_url = $auth_details['api-url']."subscriptions";
						$req_data = array("contactId" => $contact_id,  "listId" => $list_id, "status"=>'normal');
						
						$json_request = json_encode($req_data);
					  
						$url = $api_url;
						$body = array(
						    'email' => $email,
						    'firstName' => $fname,
						    'lastName' => $lname
						);
						$args = array(
						  'body' => "[".json_encode(array("contact"=>$req_data))."]",
						  'headers' => array(
						  	'Content-Type' => 'application/json', 
						    'Api-AppId' => $auth_details['app-id'],
						    'Api-Username' => $auth_details['username'],
						    'API-Password' => $auth_details['api-pwd'],
						    'API-Version' => $auth_details['api-version'],
						    'Accept' => 'application/json'
						  )
						);
						$response = wp_remote_post($url, $args);
						$json_response = json_decode($response);

						if(count(json_decode($response)->subscriptions) == 0){
							echo 0;
						}else{
							echo 1;
						}

						
						
						

					break;    

					case 'active_campaign':
			   
						$auth_details['account-name'] = get_theme_mod( 'medma_matix_sp_active_account_name' );
						$auth_details['api-key'] = get_theme_mod( 'medma_matix_sp_active_api_key' );
						$auth_details['list-id'] = get_theme_mod( 'medma_matix_sp_active_list_id' );

						$api_url = "https://".$auth_details['account-name'].".api-us1.com/admin/api.php";



						$req_data = array( "api_key" => $auth_details['api-key'],
										   "api_action" => "contact_add",
										   "p[".$auth_details['list-id']."]" => $auth_details['list-id'],
										   "status[".$auth_details['list-id']."]" => $auth_details['list-id'],
										   "api_output" => "json",
										   "first_name" => $fname,
										   "last_name" => $lname,
										   "email" => $email
										   );
						
						$request = http_build_query($req_data);



						$url = $api_url;
						$body = array( "api_key" => $auth_details['api-key'],
										   "api_action" => "contact_add",
										   "p[".$auth_details['list-id']."]" => $auth_details['list-id'],
										   "status[".$auth_details['list-id']."]" => $auth_details['list-id'],
										   "api_output" => "json",
										   "first_name" => $fname,
										   "last_name" => $lname,
										   "email" => $email
								);
						$args = array(
						  'body' => http_build_query($body),
						  'headers' => array(
						  	'Content-Type' => 'application/x-www-form-urlencoded' 
						    )
						);
						$response = wp_remote_post($url, $args);
					   	
					   	if(count(json_decode($response)->result_code) == 0){
							echo 0;
						}else{
							echo 1;
						}

						
						echo 1;
					break;

					default:
						 echo 0;
					break;
				}
				 
			}catch(\Exception $e){
				 echo 0;
			}  
		}else{
			echo 2;
		}
	wp_die();
}

function medma_mtx_getApiAllData($email_service){
	if($email_service == 'mail_chimp'){
		$list_id = get_theme_mod( 'medma_matix_sp_mail_chimp_list_id' );
		$api_key = get_theme_mod( 'medma_matix_sp_mail_chimp_api_key' );
		$data_center = get_theme_mod( 'medma_matix_sp_mail_chimp_data_center' );
		if($list_id == '' || $api_key == '' || $data_center == ''){
			return 0;
		}
	}
	else if($email_service == 'mad_mimi'){
		$username = get_theme_mod( 'medma_matix_sp_mad_mimi_username' );
		$api_key = get_theme_mod( 'medma_matix_sp_mad_mimi_api_key' );
		$list_name = get_theme_mod( 'medma_matix_sp_mad_mimi_list_name' );
		if($username == '' || $api_key == '' || $list_name == ''){
			return 0;
		}
	}
	else if($email_service == 'campaign_monitor'){
		$list_id = get_theme_mod( 'medma_matix_sp_campaign_list_id' );
		$api_key = get_theme_mod( 'medma_matix_sp_campaign_api_key' );
		if($list_id == '' || $api_key == ''){
			return 0;
		}
	}
	else if($email_service == 'constant_contact'){
		
	}
	else if($email_service == 'sendy'){
		$url = get_theme_mod( 'medma_matix_sp_sendy_url' );
		if($url == ''){
			return 0;
		}
	}
	else if($email_service == 'get_response'){
		$campaign_id = get_theme_mod( 'medma_matix_sp_get_response_campaign_id' );
		$api_key = get_theme_mod( 'medma_matix_sp_get_response_api_key' );
		if($campaign_id == '' || $api_key == ''){
			return 0;
		}
	}
	else if($email_service == 'icontact'){
		$api_id = get_theme_mod( 'medma_matix_sp_icontact_api_id' );
		$username = get_theme_mod( 'medma_matix_sp_icontact_username' );
		$api_pwd = get_theme_mod( 'medma_matix_sp_icontact_api_pwd' );
		$api_version = get_theme_mod( 'medma_matix_sp_icontact_api_version' );
		$api_url = get_theme_mod( 'medma_matix_sp_icontact_api_url' );
		$list_id = get_theme_mod( 'medma_matix_sp_icontact_list_id' );
		if($api_id == '' || $username == '' || $api_pwd == '' || $api_version == '' || $api_url == '' || $list_id == ''){
			return 0;
		}
	}
	else if($email_service == 'active_campaign'){
		$list_id = get_theme_mod( 'medma_matix_sp_active_list_id' );
		$api_key = get_theme_mod( 'medma_matix_sp_active_api_key' );
		$account_name = get_theme_mod( 'medma_matix_sp_active_account_name' );
		if($list_id == '' || $api_key == '' || $account_name == ''){
			return 0;
		}
	}
	
	return 1;
}

?>
