# Editing the NCRPD Website with Cloud9

- Don't forget to fork and clone the project to Cloud9 before doing these steps

### First create an Amazon Web Services account.

- Create an instance of within the relational database console (RDS)
	- Create a MySQL database
	- Choose Dev/Test option
	- With db.t2.mirco DB instance class
	- And around 5GB of storage
	- When you create the instance, make sure you have a secure username/password
	- Ensure that the instance is publically available
- Save the "Endpoint", this will be the "Hostname" of your database

Once your instance is created, you will want to ensure that the database is accessible from C9: <br>

- Open up the EC2 Management Console
- Go to Security groups, choose the correct security group
- Your Inbound table should look like this:
	|Type | Protocol | Port Range | Source | Description|
    |-----|:--------:|:----------:|:------:|-----------:|
	|MYSQL/Aurora | TCP | 3306 | 0.0.0.0/0 | |
	|MYSQL/Aurora | TCP | 3306 | ::/0	  | |

- Your outbound table should look like this:
	|Type | Protocol | Port Range | Destination | Description|
    |-----|:--------:|:----------:|:-----------:|-----------:|
	|All traffic | All | All | 0.0.0.0/0 | |

### In cloud 9, within your wordpress site, change the wp-config file to:

- define('DB_NAME', getenv('DB_NAME'));
- define('DB_USER', getenv('DB_USER'));
- define('DB_PASSWORD', getenv('DB_PASSWORD'));
- define('DB_HOST', getenv('DB_HOST'));

### Run your cloud 9 project:

- If you need to, set it up (i.e. language, sitename, username/password)
- Download ARI Adminer
- Open it, run in modal window (with wordpress database as the connection):
	- Make sure your database is the AWS one
	- Run SQL commands to insert data from the SQL database folder attached to gitHub
	- NOTE: you may need to change some items before you runt he SQL commands
	- NOTE2: Don't change the users and be careful when updating wp_options table as your password may change.

### View your website you may need to make the following changes:

- Apperance > Menus: Add all pages, ensure the following is checke: Display location: Primary Menu
	- Your links should all be working now, if they don't: Click through and "Update" each page
- Settings > Permalink: Ensure Post name is enabled
- Settings > Reading: Set "Front Page Displays" to "Your Latest Posts" or to a specific page