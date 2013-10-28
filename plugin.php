<?php
 
/**********************************************************************************************************
 * File: plugin.php
 * Project: Access Keys
 * Programmed by: Cory Bohon (AccessibleFuture.org, BrailleSC.org) at USC Upstate (http://uscupstate.edu)
 * 
 * This software is released under an MIT license.
 * For more information about this license type, visit: 
 * http://www.opensource.org/licenses/mit-license.php
 *
 *
 * Copyright (c) 2009-2013 AccessibleFuture.org, BrailleSC.org, and Cory Bohon
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 **********************************************************************************************************
 */
 
 
 
// add plugin hooks
add_plugin_hook('public_footer', 'access_keys_print_footer');
//add_plugin_hook('public_items_show', 'access_keys_browsing_items');
add_plugin_hook('config', 'access_keys_configuration');
add_plugin_hook('config_form', 'access_keys_configuration_form');
add_plugin_hook('uninstall', 'access_keys_uninstall');


// save plugin configuration page
function access_keys_configuration()
{
    // save the access keys as a plugin option
    set_option('access_keys_page', trim($_POST['access_keys_page']));
    set_option('access_keys_skip', trim($_POST['access_keys_skip']));
    set_option('access_keys_home', trim($_POST['access_keys_home']));
    set_option('access_keys_items', trim($_POST['access_keys_items']));
    set_option('access_keys_collections', trim($_POST['access_keys_collections']));
    set_option('access_keys_previous', trim($_POST['access_keys_previous']));
    set_option('access_keys_next', trim($_POST['access_keys_next']));
    set_option('access_keys_search', trim($_POST['access_keys_search']));
    
    // save the custom access keys as a plugin option -- A URL and key for each of the 10 keys
	set_option('access_keys_ck1_key', trim($_POST['access_keys_ck1_key']));
	set_option('access_keys_ck1_url', trim($_POST['access_keys_ck1_url']));
	
	set_option('access_keys_ck2_key', trim($_POST['access_keys_ck2_key']));
	set_option('access_keys_ck2_url', trim($_POST['access_keys_ck2_url']));
	
	set_option('access_keys_ck3_key', trim($_POST['access_keys_ck3_key']));
	set_option('access_keys_ck3_url', trim($_POST['access_keys_ck3_url']));
	
	set_option('access_keys_ck4_key', trim($_POST['access_keys_ck4_key']));
	set_option('access_keys_ck4_url', trim($_POST['access_keys_ck4_url']));
	
	set_option('access_keys_ck5_key', trim($_POST['access_keys_ck5_key']));
	set_option('access_keys_ck5_url', trim($_POST['access_keys_ck5_url']));
	
	set_option('access_keys_ck6_key', trim($_POST['access_keys_ck6_key']));
	set_option('access_keys_ck6_url', trim($_POST['access_keys_ck6_url']));
	
	set_option('access_keys_ck7_key', trim($_POST['access_keys_ck7_key']));
	set_option('access_keys_ck7_url', trim($_POST['access_keys_ck7_url']));
	
	set_option('access_keys_ck8_key', trim($_POST['access_keys_ck8_key']));
	set_option('access_keys_ck8_url', trim($_POST['access_keys_ck8_url']));
	
	set_option('access_keys_ck9_key', trim($_POST['access_keys_ck9_key']));
	set_option('access_keys_ck9_url', trim($_POST['access_keys_ck9_url']));
	
	set_option('access_keys_ck10_key', trim($_POST['access_keys_ck10_key']));
	set_option('access_keys_ck10_url', trim($_POST['access_keys_ck10_url']));
}

//Uninstall function 
function access_keys_uninstall()
{
	delete_option('access_keys_page');
    delete_option('access_keys_skip');
    delete_option('access_keys_home');
    delete_option('access_keys_items');
    delete_option('access_keys_collections');
    delete_option('access_keys_previous');
    delete_option('access_keys_next');
    delete_option('access_keys_search');
	delete_option('access_keys_ck1_key');
	delete_option('access_keys_ck1_url');
	delete_option('access_keys_ck2_key');
	delete_option('access_keys_ck2_url');
	delete_option('access_keys_ck3_key');
	delete_option('access_keys_ck3_url');
	delete_option('access_keys_ck4_key');
	delete_option('access_keys_ck4_url');
	delete_option('access_keys_ck5_key');
	delete_option('access_keys_ck5_url');
	delete_option('access_keys_ck6_key');
	delete_option('access_keys_ck6_url');
	delete_option('access_keys_ck7_key');
	delete_option('access_keys_ck7_url');
	delete_option('access_keys_ck8_key');
	delete_option('access_keys_ck8_url');
	delete_option('access_keys_ck9_key');
	delete_option('access_keys_ck9_url');
	delete_option('access_keys_ck10_key');
	delete_option('access_keys_ck10_url');
}
 
// show plugin configuration page
function access_keys_configuration_form()
{    
    // create a form inputs to collect the user's custom accesskeys
    echo '<div id="access_keys_config_form">';
		echo 'Create access keys for the functions below by specifying a one character key for each item you wish to use. Items that have no entries will be ignored when presenting keys to the user.';
    
	echo '<h3><strong>Configure Built-in Omeka Functions</strong></h3>';
    
    ?>
    
    <div class="field">
		<label for="access_keys_page">Access Keys Description Page: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_page', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_page'), null); ?>
    	</div>
    </div>
    
    <div class="field">
		<label for="access_keys_skip">Skip to Content: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_skip', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_skip'), null); ?>
    	</div>
    </div>
    
    <div class="field">
		<label for="access_keys_home">Go to Home Page: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_home', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_home'), null); ?>
    	</div>
    </div>
    
    <div class="field">
		<label for="access_keys_items">Browse Items: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_items', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_items'), null); ?>
    	</div>
    </div>
    
    <div class="field">
		<label for="access_keys_collections">Browse Collections: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_collections', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_collections'), null); ?>
    	</div>
    </div>
            
    <div class="field">
		<label for="access_keys_search">Advanced Search: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_search', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_search'), null); ?>
    	</div>
    </div>
    
    <?php //custom access keys configuration ?>
    
    <br /><br />
    <h3><strong>Configure Custom Access Keys</strong></h3>
    
    <div class="field">
		<label for="access_keys_ck1_key">Custom Access Key 1: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck1_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck1_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck1_url', 'size'=>'50'), get_option('access_keys_ck1_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck2_key">Custom Access Key 2: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck2_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck2_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck2_url', 'size'=>'50'), get_option('access_keys_ck2_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck3_key">Custom Access Key 3: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck3_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck3_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck3_url', 'size'=>'50'), get_option('access_keys_ck3_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck4_key">Custom Access Key 4: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck4_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck4_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck4_url', 'size'=>'50'), get_option('access_keys_ck4_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck1_key">Custom Access Key 5: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck5_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck5_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck5_url', 'size'=>'50'), get_option('access_keys_ck5_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck6_key">Custom Access Key 6: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck6_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck6_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck6_url', 'size'=>'50'), get_option('access_keys_ck6_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck7_key">Custom Access Key 7: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck7_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck7_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck7_url', 'size'=>'50'), get_option('access_keys_ck7_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck8_key">Custom Access Key 8: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck8_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck8_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck8_url', 'size'=>'50'), get_option('access_keys_ck8_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck9_key">Custom Access Key 9: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck9_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck9_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck9_url', 'size'=>'50'), get_option('access_keys_ck9_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
    
    <div class="field">
		<label for="access_keys_ck10_key">Custom Access Key 10: </label>

    	<div class="inputs">
    		<?php echo get_view()->formText(array('name'=>'access_keys_ck10_key', 'maxlength'=>'1', 'size'=>'2'), get_option('access_keys_ck10_key'), null); ?>
    		<p class="explanation">
    			Enter the 1-character access key here.
    		</p>
    	</div>
    	
    	<div class="inputs">
			<?php echo get_view()->formText(array('name'=>'access_keys_ck10_url', 'size'=>'50'), get_option('access_keys_ck10_url'), null); ?>
			<p class="explanation">
				Enter the URL for the access key above.
			</p>
		</div>
    </div>
        
    <?php
    
}

// function that will print the next/previous item access 
function access_keys_browsing_items()
{	
   //prints out the ahref tags with the appropriate access keys -- only usable when browsing items
   
   if(get_option('access_keys_previous') != "")
   {
   		?>
   		
   		<a href="<?php echo link_to_previous_item_show(); ?>" accesskey="<?php echo get_option('access_keys_previous'); ?>" title="Press the <?php echo get_option('access_keys_previous'); ?> access key to go to the previous item in the collection."></a>
   		
   		<?php   
   }
   if(get_option('access_keys_next') != "")
   {
	   ?>
   		
   		<a href="<?php echo link_to_next_item_show(); ?>" accesskey="<?php echo get_option('access_keys_next'); ?>" title="Press the <?php echo get_option('access_keys_next'); ?> access key to go to the previous item in the collection."></a>
   		
   		<?php   
   }
}
 
function access_keys_print_footer()
{
   //prints out the the ahref tags with the appropriate accesskeys that are usable on any page in Omeka
   if(get_option('access_keys_skip') != "")
   {
   echo '<a href="#content" "accesskey="' . get_option('access_keys_skip') . '" title="Press the ' . get_option('access_keys_skip') . ' access key to skip to the content of the page"></a>';
   }
   if(get_option('access_keys_home') != "")
   {
   echo '<a href="' . html_escape(WEB_ROOT) . '"' . 'accesskey="' . get_option('access_keys_home') . '" title="Press the ' . get_option('access_keys_home') . ' access key to go to the home page of this archive."></a>';
   }
   if(get_option('access_keys_items') != "")
   {
   echo '<a href="' . html_escape(WEB_ROOT) . '/items" accesskey="' . get_option('access_keys_items') . '" title="Press the ' . get_option('access_keys_items') . ' access key to browse the collection by items."></a>';
   }
   if(get_option('access_keys_collections') != "")
   {
   echo '<a href="' . html_escape(WEB_ROOT) . '/collections" accesskey="' . get_option('access_keys_collections') . '" title="Press the ' . get_option('access_keys_collections') . ' access key to browse the archive by collections."></a>';
   }
   if(get_option('access_keys_search') != "")
   {
   echo '<a href="' . html_escape(WEB_ROOT) . '/items/advanced-search" accesskey="' . get_option('access_keys_search') . '" title="Press the ' . get_option('access_keys_search') . ' access key to go to the search page."></a>';
   }
   
   //prints out the ahref tags for the custom access keys. These are accessible from any page in Omeka.
   if(get_option('access_keys_ck1_key') != "" && get_option('access_keys_ck1_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck1_url') . '" accesskey="' . get_option('access_keys_ck1_key') . '" title="Press the ' . get_option('access_keys_ck1_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck1_url') . '"></a>';
   }
   if(get_option('access_keys_ck2_key') != "" && get_option('access_keys_ck2_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck2_url') . '" accesskey="' . get_option('access_keys_ck2_key') . '" title="Press the ' . get_option('access_keys_ck2_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck2_url') . '"></a>';
   }
   if(get_option('access_keys_ck3_key') != "" && get_option('access_keys_ck3_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck3_url') . '" accesskey="' . get_option('access_keys_ck3_key') . '" title="Press the ' . get_option('access_keys_ck3_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck3_url') . '"></a>';
   }
   if(get_option('access_keys_ck4_key') != "" && get_option('access_keys_ck4_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck4_url') . '" accesskey="' . get_option('access_keys_ck4_key') . '" title="Press the ' . get_option('access_keys_ck4_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck4_url') . '"></a>';
   }
   if(get_option('access_keys_ck5_key') != "" && get_option('access_keys_ck5_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck5_url') . '" accesskey="' . get_option('access_keys_ck5_key') . '" title="Press the ' . get_option('access_keys_ck5_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck5_url') . '"></a>';
   }
   if(get_option('access_keys_ck6_key') != "" && get_option('access_keys_ck6_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck6_url') . '" accesskey="' . get_option('access_keys_ck6_key') . '" title="Press the ' . get_option('access_keys_ck6_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck6_url') . '"></a>';
   }
   if(get_option('access_keys_ck7_key') != "" && get_option('access_keys_ck7_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck7_url') . '" accesskey="' . get_option('access_keys_ck7_key') . '" title="Press the ' . get_option('access_keys_ck7_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck7_url') . '"></a>';
   }
   if(get_option('access_keys_ck8_key') != "" && get_option('access_keys_ck8_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck8_url') . '" accesskey="' . get_option('access_keys_ck8_key') . '" title="Press the ' . get_option('access_keys_ck8_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck8_url') . '"></a>';
   }
   if(get_option('access_keys_ck9_key') != "" && get_option('access_keys_ck9_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck9_url') . '" accesskey="' . get_option('access_keys_ck9_key') . '" title="Press the ' . get_option('access_keys_ck9_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck9_url') . '"></a>';
   }
   if(get_option('access_keys_ck10_key') != "" && get_option('access_keys_ck10_url') != "")
   {
   echo '<a href="' . get_option('access_keys_ck10_url') . '" accesskey="' . get_option('access_keys_ck10_key') . '" title="Press the ' . get_option('access_keys_ck10_key') . ' access key to go to the following URL: ' . get_option('access_keys_ck10_url') . '"></a>';
   }


//Custom Functions 
//custom link to function to add an additional tag for access keys
function link_to_custom($additionaltag='', $record, $action=null, $text='View', $props = array(), $queryParams=array())
{
    // If we're linking directly to a record, use the URI for that record.
    if($record instanceof Omeka_Record) {
        $url = record_uri($record, $action);
    }
    else {
        // Otherwise $record is the name of the controller to link to.
        $urlOptions = array();
        //Use Zend Framework's built-in 'default' route
        $route = 'default';
        $urlOptions['controller'] = (string) $record;
        if($action) $urlOptions['action'] = (string) $action;
        $url = uri($urlOptions, $route, $queryParams);
    }

    
	$attr = !empty($props) ? ' ' . _tag_attributes($props) : '';
    
	return '<a href="'. html_escape($url) . '"' . $additionaltag . $attr . '>' . $text . '</a>';
}
}
 
?>