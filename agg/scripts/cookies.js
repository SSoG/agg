//I copied/pasted this from a website.  Not really sure how it works, but it does
function set_cookie (cookie_name, cookie_value, lifespan_in_days, valid_domain)
        {
            var domain_string = valid_domain ?
            ("; domain=" + valid_domain) : '' ;
            document.cookie = cookie_name +
            "=" + encodeURIComponent( cookie_value ) +
            "; max-age=" + 60 * 60 *
            24 * lifespan_in_days +
            "; path=/" + domain_string ;
        }

//called when "Save Settings" button is pressed.  Sees if checkboxes are checked or not, and adds a cookie accordingly
function save_cookies()
        {
            var cook1;
            if ($('#Kotaku').attr('checked') == "checked"){cook1 = "yes";}else{cook1 = "no";}
            set_cookie("kotaku", cook1, 365);

            var cook2;
            if ($('#Polygon').attr('checked') == "checked"){cook2 = "yes";}else{cook2 = "no";}
            set_cookie("polygon", cook2, 365);

            var cook3;
            if ($('#Destructoid').attr('checked') == "checked"){cook3 = "yes";}else{cook3 = "no";}
            set_cookie("destructoid", cook3, 365);

            var cook4;
            if ($('#Joystiq').attr('checked') == "checked"){cook4 = "yes";}else{cook4 = "no";}
            set_cookie("joystiq", cook4, 365);

            var cook5;
            if ($('#Siliconera').attr('checked') == "checked"){cook5 = "yes";}else{cook5 = "no";}
            set_cookie("siliconera", cook5, 365);
            
            alert("Settings Saved!");
            refresh_url();
        }

//Also copied/pasted.
function delete_cookie ( cookie_name, valid_domain )
        {
             var domain_string = valid_domain ?
                       ("; domain=" + valid_domain) : '' ;
            document.cookie = cookie_name +
                       "=; max-age=0; path=/" + domain_string ;
        }
        
//called when "Clear Settings" is pressed.  Deletes all cookies that were created and refreshes page.
function clear_cookies()
        {
            delete_cookie("kotaku");
            delete_cookie("polygon");
            delete_cookie("destructoid");
            delete_cookie("joystiq");
            delete_cookie("siliconera"); 
            
            alert("Settings Cleared!");
            document.location.reload(true);
        }
