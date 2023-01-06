<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About
A test project to see how Bref.sh works with Laravel.

Install the following packages:

```shell
composer require bref/bref bref/laravel-bridge

npm install serverless-domain-manager --save-dev
```

## Create the Serverless Domain
`sls create_domain`


## Testing the CLI
`bref cli bref-dev-artisan -- inspire`

## Testing the SQS Queue
Test the queue with the following command:

Set the env variable:

`MAIL_TO_ADDRESS="your-test@email.com"`

Dispatch the test job with the following command.  If all is well, you will receive an email.

`AWS_DEFAULT_REGION=ap-southeast-2 bref cli bref-dev-artisan -- test:queue`

## Testing the database
If you are using Postgres, make sure to copy the `php/conf.d/php.ini` file.

## Testing the Cache Driver
View the `/cache` route, and you should see the current server time.  Refresh a few seconds later and `cached` variable should be in the past.

## Adding new env variables
`aws ssm put-parameter --region ap-southeast-2 --name '/bref-dev/my-parameter' --type String --value 'mysecretvalue'`

## Configuring Assets
`aws ssm put-parameter --region ap-southeast-2 --name '/bref-dev/MIX_ASSET_URL' --type String --value '"https://<bucket-name>.s3.amazonaws.com'"`

## Make sure the following variables are set within Github Action Secrets.

```dotenv
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_PUBLIC_BUCKET=
```
