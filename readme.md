<h1>PasteStore - analog of <a href="https://pastebin.com">PasteBin</a> service.

<h2>Instalation</h2>
<ul>
    <li>Clone repository</li>
    <li>Execute "composer install"</li>
    <li>Rename ".env.base" file to ".env" and set database information, set APP_URL</li>
    <li>Execute "php artisan migrate"</li>
    <li>If you want authorize your users with VK set VKONTAKTE_KEY and VKONTAKTE_SECRET fileds to your VK application info</li>
    <li>To run locally execute "php artisan serve", for server add a ".htaccess" file with the following content (mod_rewrite required) :
        <pre><IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteRule ^(.*)$ /public/$1 [L]
</IfModule></pre>
    </li>
</ul>
