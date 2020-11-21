# portaldemo
Drupal 8 setup done using composer
Drupal 8 contrib modules downloaded using composer

Database backup is inside the DB_BKP folder situated in the root diectory.

DB Name : portaldemo.sql

Admin Credentials : 
		username: admin
		password: 1234
		
Base Url Path : http://localhost/portaldemo/web

Site Api key path : http://localhost/portaldemo/web/admin/config/system/site-information/siteapikey

Custom json path for node display : http://localhost/portaldemo/web/page_json/qwerty/48

Note: The custom path for can be dynamic. For eg. http://localhost/portaldemo/web/page_json/{siteapikey}/{nid}
      where {siteapikey} is the value of the site api key and {nid} is the node id of basic page. If Wrong {sitekey} value is
	  provided, the above url will show 403 access denied error.
	
This setup is mainly intended to show a config form created under site-information and update values of that form.

Resource help while implementing that feature:
1. https://www.valuebound.com/resources/blog/building-configuration-form-in-drupal-8
2. google portal for syntactical references
3. previous knowledge while implementating form, altering the form to change submit text, display node in json format in controller

Time Taken:
1. Drupal 8 setup using composer and imlementing basic features = 30 minutes
2. Creating config form and routing and alter submit button text = 90 minutes including proper references for initiating the form
3. Creating custom path and controller to display node in json format = 45 minutes
4. Unit testing and debugging some errors = 40 minutes
5. creating new repository on github and pushing the code = 30 mintues
