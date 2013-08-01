#!/bin/bash
mysqldump --user=sso1319002161860 --password=z8R%MgYxd --host=sso1319002161860.db.10428646.hostedresource.com --add-drop-table sso1319002161860 > temp.sql
echo "UPDATE wp_options SET option_value = 'http://localhost/agg' WHERE option_value = 'http://ssogaming.com'" >> temp.sql
mysql --user=SSoGDev --password=S3cr3ts! --host=SSoGDev.db.10428646.hostedresource.com SSoGDev < temp.sql
rm temp.sql
