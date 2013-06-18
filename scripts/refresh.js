        function refresh_url()
        {
            //base url
            var refurl = "http://ssogaming.com/agg/?";
            
            //if feed box is checked, add it to url =1, else add it =0
            if ($('#Kotaku').attr('checked') == "checked"){refurl += "k=1";}else{refurl +="k=0";}
            if ($('#Polygon').attr('checked') == "checked"){refurl += "p=1";}else{refurl +="p=0";}
            if ($('#Destructoid').attr('checked') == "checked"){refurl += "d=1";}else{refurl +="d=0";}
            if ($('#Joystiq').attr('checked') == "checked"){refurl += "j=1";}else{refurl +="j=0";}
            if ($('#Siliconera').attr('checked') == "checked"){refurl += "s=1";}else{refurl +="s=0";}
            
            //refresh page with new url
            window.location = refurl;
        }