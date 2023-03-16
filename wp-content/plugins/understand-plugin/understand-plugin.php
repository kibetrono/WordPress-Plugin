<?php
//  The plugin will create a word count settings links on the settings, a CPT
/**
 * Plugin Name: Learn Plugin Development
 * Description : Understanding different features of Plugin Development
 * Version: 1.0.0
 * Author: David Kibet Rono
 * Author URI: www.softwareske.com
*/

if(!defined("ABSPATH")){
    die;
}

if(!class_exists("UnderstandPluginInDetails")){
    class UnderstandPluginInDetails{
        function __construct()
        {
            add_action('admin_menu',array($this,'adminMenuPage'));
            add_action('admin_init',array($this,'settingsPage'));
        }

        function settingsPage(){
            add_settings_section('sectionOne',null,null,'word_count_settings');
            // display location
            add_settings_field('kibet_display_location',"Display Location",array($this,'addLocationHTML'),'word_count_settings','sectionOne');
            register_setting('settingsNameGroup','kibet_display_location',array("sanitize_callback" => 'sanitize_text_field','default'=>'0'));

            // Headline
            add_settings_field('kibet_headline_text',"Headline Text",array($this,'addHeadlineHTML'),'word_count_settings','sectionOne');
            register_setting('settingsNameGroup','kibet_headline_text',array("sanitize_callback" => 'sanitize_text_field','default'=>'Post Statistics'));

            // word count
            add_settings_field('kibet_word_count',"Word Count",array($this,'addCheckBoxHTML'),'word_count_settings','sectionOne',array('specificName'=>'kibet_word_count'));
            register_setting('settingsNameGroup','kibet_word_count',array("sanitize_callback" => 'sanitize_text_field','default'=>'1'));

            // character count
            add_settings_field('kibet_character_count',"Character Count",array($this,'addCheckBoxHTML'),'word_count_settings','sectionOne',array('specificName'=>'kibet_character_count'));
            register_setting('settingsNameGroup','kibet_character_count',array("sanitize_callback" => 'sanitize_text_field','default'=>'1'));

            // read time
            add_settings_field('kibet_read_time',"Read Time",array($this,'addCheckBoxHTML'),'word_count_settings','sectionOne',array('specificName'=>'kibet_read_time'));
            register_setting('settingsNameGroup','kibet_read_time',array("sanitize_callback" => 'sanitize_text_field','default'=>'1'));

        }

        function addCheckBoxHTML($args){?>
            <input type="checkbox" name="<?php echo $args['specificName'] ?>" value="1" <?php checked(get_option($args['specificName']), '1')?> >
            <?php
        }

        function addHeadlineHTML(){?>
            <input type="text" name="kibet_headline_text" value="<?php echo esc_attr(get_option('kibet_headline_text')) ?>">
            <?php
        }

        function addLocationHTML(){
            ?>
            <select name="kibet_display_location">
                <option value="0" <?php selected(get_option('kibet_display_location','0'))?>> Beginning of Post</option>
                <option value="1" <?php selected(get_option('kibet_display_location','1'))?>> End of Post</option>
            </select>
            <?php
        }
        
        function locationSanitize($input){
            if ($input != '0' AND $input != '1'){
                add_settings_error('kibet_display_location','kibet_display_location_error',"Display Location must only have the options of beginning or end");
                return get_option('kibet_display_location');
            }

            return $input;
        }

        function adminMenuPage(){
            add_options_page('Word Count Settings Page','Word Count','manage_options','word_count_settings',array($this,'settingsLink'));
        }

        function settingsLink(){
            ?>
            <div class="wrap">
                <h1>Count Settings</h1>
                <form action="options.php" method="POST">
                    <?php
                    settings_fields('settingsNameGroup');
                    do_settings_sections('word_count_settings');
                    submit_button();
                    ?>
                </form>
            </div>
            <?php 
        }
    }

    $understandPluginInDetails = new UnderstandPluginInDetails();
}