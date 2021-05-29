# karcisku Config htaccess
1.  add .htaccess file on root directory

htaccess file content

<IfModule mod_rewrite.c>
  RewriteEngine on
  RewriteRule ^$ public/ [L]
  RewriteRule (.*) public/$1 [L]
</IfModule>



2. add .htaccess file on public directory

htaccess file content

Options -Multiviews

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?url=$1 [L]


3. add .htaccess file on public directory

htaccess file content

Options -Indexes
