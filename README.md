# About
A test project to see how [Bref.sh](https://bref.sh/docs/frameworks/laravel.html) works with Laravel.

## View Serverless Deployment

You can view the serverless deployment at [https://bref-demo-dev.robmellett.dev/](https://bref-demo-dev.robmellett.dev/)

Can you can view the deployment with the following command.

```shell
serverless info
```

Which will output the following information.

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
  jobsWorker: bref-demo-dev-jobsWorker
website:
  url: https://bref-demo-dev.robmellett.dev
  cname: d2jlrzo11fcm59.cloudfront.net
jobs: https://sqs.ap-southeast-2.amazonaws.com/*********/bref-demo-dev-jobs
```

### Testing the Web Lambda

You can view the web lambda at [https://bref-demo.robmellett.dev/](https://bref-demo.robmellett.dev/).

### Testing the CLI Lambda

You can test the artisan lambda with the following command.

```shell
serverless bref -a "inspire"
```

### Testing the database
If you are using Postgres, make sure to copy the `php/conf.d/php.ini` file.

```shell
serverless bref cli -a "check:database"
```

### Testing the SQS Queue
Test the queue with the following command:

```shell
bref cli -a "check:queue"
```

### Testing the Mail Driver

```shell
bref cli -a "check:queue"
```

### Testing the Cache Driver
View the [cache](https://bref-demo.robmellett.dev/cache) route, and you should see the current server time.  Refresh a few seconds later and `cached` variable should be in the past.

### Checking S3 Filesystem

```shell
bref cli -a "check-s3"
```

## Installation
Install the following packages:

```shell
composer require bref/bref bref/laravel-bridge --update-with-dependencies

php artisan vendor:publish --tag=serverless-config
```

### Adding Secrets to the Serverless Environment

```shell
aws ssm put-parameter --region ap-southeast-2 --name '/bref-demo-dev/my-parameter' --type String --value 'mysecretvalue'
```

### Configuring Assets

```shell
aws ssm put-parameter --region ap-southeast-2 --name '/bref-demo-dev/MIX_ASSET_URL' --type String --value '"https://<bucket-name>.s3.amazonaws.com'"`
```

## Deployment

Make sure the following variables are set within GitHub Action Secrets.

```dotenv
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_PUBLIC_BUCKET=
```

## Creating the Domain Name (legacy)

This is no longer required since the `serverless-lift` plugin is installed.

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

Create the Serverless Domain with the following command.

```shell
sls create_domain
```
