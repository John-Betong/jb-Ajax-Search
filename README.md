# jb-Ajax-Search Routine

#### Essential Platform Requirements
1. PHP 
2. MySql
3. Database and a table with a text field or varchar field

#### Thoughts on Making This Tutorial
Creating a new database and table seemed a lot of work just to show a demo with content that would only be used once! I opted to use:  

- your very own database table content. 
- with a minimum setup
- to be running in **under a minute!** 

***Special Note For the Paranoid:***
<br>
      Please feel free to copy an existing database with a table that has at least one searchable varchar or text field. 

### Demo Installation in Three Easy Steps:

**Step 1: **
		- download "jb-ajax-search.zip"
		- Unpack into any new localhost or online "new-directory"

##### Step 2: use any editor to modify "**db-results.php**"
	- define('HOST',  '**yourHost**');
	- define('uNAME', '**userName**');
	- define('pWORD', '**passWord**');  
	- define('dBASE', '**dataBase**'); 
	- define('dTABLE',  '**tableName**'); 
	- define('dCOL001', '**columnName**'); // field *MUST* be varchar or text
	- define('dCOL002', '**columnName**'); // field *MUST* be NULL or (varchar or text)
		

##### Step3: browse and open "/new-directory/index.php" 
		- finished in less than a minute!


### Live Installation in Three Easy Steps:
1.  copy &amp; paste to your web-page:  **&lt;?php require "ajax-form.php";?&gt;**
2.  copy &amp; paste to your web-page:  **&lt;div id="livesearch"&gt;&lt;/div&gt;**
3.  set path to **"db-results.php"**  in **"ajax-form.php"** 


#### Suggested Improvements:
	- add fields to $sql statement
	- format search results
	- add pagination to search results
	- move JavaScript to just before </body> 


#### TL;DR
Recently I have been searching database tables containing foreign characters and tried numerous techniques. Results revealed there is no simple solution.  Two effective but slow, clunky methods were syllables and phonemes. 

To make nippier searches the phonemes method involved storing an extra column in the table. Both methods involved entering text into a search edit box, clicking enter, parsing the search text into a SQL statement, searching and returning partial or empty no results.

####[Ajax to the Rescue](https://en.wikipedia.org/wiki/Ajax_(programming))
Although I have never been a JavaScript fan; this was definitely a big plus for **Ajax**. Primarily because only a single character needs uploading to a fast server which uses PHP's MySql used to dynamcally render the browser results.

####[W3School's Ajax Tutorial](http://www.w3schools.com/ajax/default.asp)
 was followed and the demos worked. Next task was to update to a server. There were some minor problems but delighted to say it also worked!

Complications arose when trying to interface with CodeIgniter. The biggest problem was the number of files and saving to their correct paths. Simplification was essential if ***Ajax*** was to be used on other domains. 

Having a working online demo made debugging easier because any failed alternative approaches could easily be rolled back. After exhaustive testing and debugging the project is now online:


#### [Online Demo](http://www.johns-jokes.com/downloads/sp-e/jb-ajax-search/?)
1. **index.php**          - *displays the Live Search and also links to all source code.*
2. **_ajax-form.php**     - *required() by index.php. Also contains JavaScript.*
3. **db-results.php**     - *a standalone file that renders database table results also called from the Ajax routine. This file is essential and must display the database table results in order for Ajax to work correctly.*
4. **README.md**           - *this file*
5. **jb-search.zip**      - *zipped contents to be dowloaded and installed into "new-driectory*



##### Have fun :)



