## Preparation
1. Download Composer, Node, NPM and Docker
2. Download source code, e.g through git command:
`git clone git@github.com:dleungsw/sehs4517.git`

## Step to run project
After download the source code, run below command in project root folder:
1. `npm install`
2. `composer install`
3. `npm run dev`
4. `./vendor/bin/sail up`

## Initial DB
1. Access phpMyAdmin\
URL: http://localhost:8080/\
Username: sail\
Password: password
1. Click the database (sehs4517)
2. Import database from `database/sql/sehs4517.sql`

## Admin Panel
URL: http://localhost/admin\
Username: admin@admin.com\
Password: password
