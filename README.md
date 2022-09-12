Xamp setting:

<VirtualHost *:80>  
   DocumentRoot "c:\xampp\htdocs\mysystem\public"  
   ServerName smartlive.system       
</VirtualHost>  

Laravel environment
1.PHP 8+
2.php artisan key:generate


Data base Setting(MySQL):  
-Default data  
1. Download laravel.sql   
2. Create a database call "laravel"  
3. Upload the laravel.sql in MySQL  
4.Finish  
*if you cannot using Default data, plz using the "From 0 to build"  

-From 0 to build 
1. Create a database call "laravel"
2. using code [php artisan migrate:fresh] or [php artisan migrate] in VS code terminal.
3. Read the excel for build up basic database (Series earn score,User Level of admin name,Series States,Map Ranking)  
4.Finish  
  
System login method:  
-Create a new acc with email of using Register  
-Using default admin ACC (If you already upload Dafault data)  
ACC:admin  
PWW:123456789  
  
系統的設計文檔(介紹/db設計/基本資料輸入):  
GTA_webdesign_doc.xlsx  

系統使用:  
-新增車子資料之前:  
1.先新增車子類型(cartype)  
2.新增擁有者(driver)    

-新增系統賽之前:  
1.先完成車子新增  
2.地圖的新增  
3.才能於series 當中新增系統賽及選擇系統車型/選擇比賽地圖等  
  
Any question:  
Welcome to   
Email:tszchun516@gmail.com  
Line:sotszchun516   
  
thank you!!!  


