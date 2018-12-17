# Developers' Manual
## File Structure
The file structure of this system relies on 6 major components.
There is a MySQL dump file for the database construction. 3 .csv files for data importation, 4 HTML files for each page of the system, 3 PHP files for each respective form, a CSS file for formatting, and a Javascript file to implement Javascript scripts.

**IMPORTANT**:
In order to run the php files on your localhost, you must change the password of your database connection manually, within each of the php files. Supplement the “12341234” password with the password you use to access your local host through your own “root” user. If you are unsure of your password, the basic configuration allows there to be no password, indicated by a “” in the password line of the database connection. THIS MUST BE DONE FOR ALL 3 PHP FILES
(StudySpaceFormProcessor, UserProcessor, and RatingFormProcessor)

Once all data is successfully imported, you may now continue to run all of the respective HTML, PHP, Javascript, and CSS files on your localhost. Make sure all of the files are parallel in the same directory and that there are no nested files.

## Necessary Software/Libraries
For the front end of our website, we chose to use HTML5, CSS5, and Javascript. HTML and CSS were used to create and design our website while Javascript was used to validate our forms. Bootstrap was utilized in our design due to its responsiveness and support. Specifically, the core javascript support from bootstrap was solid and enough for what we were looking for. Bootstrap also came with some core CSS which proved to be beneficial to the design of our website.

For the back end, we used PHP and SQL. PHP was utilized to support our forms and rating system. SQL served as our database language and used to store all study spots, locations, and other variables. It also served as a means to record and store information whenever a user submitted the contact form located on our website.

One library we decided to use was a font library. Due to the structure of our website, we hoped to create a smooth and simple website that everyone could easily use. The font library was added as a result to improve the design of our website by customizing the fonts on the site.

## System Environment
This system was utilized using a MAC OS X as well as Google chrome web browser. Atom was our primary environment for writing and editing code. MySQL was utilized for our database. In order for proper implementation, please make sure the aforementioned environments are used.
## Database Structure
Firstly is the MySQL file that initializes the Database for the entire system. Labeled “StudySpacesDB.sql” this file must be initiated using any type of MySQL software tool in a query. The most commonly tool used in our system was that of MySQL workbench but any tool with MySQL capabilities is fine.

Next is the data that needs to be imported into the now established Database of StudySpacesDB2. There are multiple ways to do this, but make sure you are utilizing all of .csv files included in the repository. In order to accurately import all the data from the .csv files into the Database, you must first save them to your local directory, and record the filepath of each. Once saved, import the data (Either using the MySQL import tool or LOAD DATA queries), in the following order: **NOTE THIS IS IMPORTANT**
Locations.csv -> Buildings.csv -> Study Spaces.csv
