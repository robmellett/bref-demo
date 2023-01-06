# About
A test project to see how [Bref.sh](https://bref.sh/docs/frameworks/laravel.html) works with Laravel.

## View Deployment

You can view the serverless deployment at [https://bref-demo.robmellett.dev/](https://bref-demo.robmellett.dev/)

Can you can view the deployment with

```shell
serverless info
```

Which will output the following infomation.

```shell
Running "serverless" from node_modules
service: bref-demo
stage: dev
region: ap-southeast-2
stack: bref-demo-dev
endpoint: ANY - https://*********.execute-api.ap-southeast-2.amazonaws.com
functions:
  web: bref-demo-dev-web
  artisan: bref-demo-dev-artisan
website:
  url: https://bref-demo.robmellett.dev
  cname: *********.cloudfront.net
```

## Artisan Commands

Helpful commands to check various AWS services are configured properly.

```shell
bref cli bref-demo-dev-artisan -- check:s3

bref cli bref-demo-dev-artisan -- check:mail
```

## Installation
Install the following packages:

```shell
composer require bref/bref bref/laravel-bridge --update-with-dependencies

php artisan vendor:publish --tag=serverless-config
```

## Testing the CLI
`bref cli bref-demo-dev-artisan -- inspire`

## Testing the SQS Queue
Test the queue with the following command:

Set the env variable:

`MAIL_TO_ADDRESS="your-test@email.com"`

Dispatch the test job with the following command.  If all is well, you will receive an email.

`AWS_DEFAULT_REGION=ap-southeast-2 bref cli bref-demo-dev-artisan -- test:queue`

## Testing the database
If you are using Postgres, make sure to copy the `php/conf.d/php.ini` file.

## Testing the Cache Driver
View the `/cache` route, and you should see the current server time.  Refresh a few seconds later and `cached` variable should be in the past.

## Adding new env variables to the serverless env
`aws ssm put-parameter --region ap-southeast-2 --name '/bref-demo-dev/my-parameter' --type String --value 'mysecretvalue'`

## Configuring Assets
`aws ssm put-parameter --region ap-southeast-2 --name '/bref-demo-dev/MIX_ASSET_URL' --type String --value '"https://<bucket-name>.s3.amazonaws.com'"`

## Make sure the following variables are set within GitHub Action Secrets.

```dotenv
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_PUBLIC_BUCKET=
```

## Creating the Domain Name (legacy)

```shell
npm install serverless-domain-manager --save-dev
```

```shell
# serverless.yml

custom:
  customDomain:
    domainName: service-name.robmellett.dev
    basePath: ''
    stage: ${self:provider.stage}
    createRoute53Record: false
    endpointType: 'regional'
    securityPolicy: tls_1_2
    apiType: http
    region: ${self:provider.region}
```

Create the Serverless Domain

```shell
sls create_domain
```
