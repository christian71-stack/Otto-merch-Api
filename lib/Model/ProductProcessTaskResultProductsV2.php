<?php
/**
 * ProductProcessTaskResultProductsV2
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * OTTO Market API
 *
 * # Home Welcome to OTTO Market API Documentation. At this page you will find all information to use the API for your business.  ## Become an OTTO Market partner Follow these steps: - Go to [otto.market](https://www.otto.market) - Inform yourself about our benefits - Register as a partner - Get access to our partner portal \"OTTO Partner Connect (OPC)\" - Deliver all necessary documents and data & sign the contract - Go to OPC and request your API user  ## Process Workflow  Given below is the overall process workflow of how different services interact within otto market.  <img src=\"/docs/process_information.png\" alt=\"Process Workflow\"/>  ## General Changelog This changelog will contain information about important changes. Most important things are legal issues, version upgrades and not backward compatible changes. Newest information will be placed on top of the table.  | Date       | Interface                           | Classification | Description                                                                                     | |------------|-------------------------------------|----------------|-------------------------------------------------------------------------------------------------| | 2022-03-17 | [Quantities](../docs#tag/Quantities-V2) | Sandbox        | Version 2 of /quantities is now available in the sandbox environment.                       | | 2022-01-19 | [Price reductions](../docs#tag/Price-Reductions-V1) | New API        | Added price reduction APIs                                                      | | 2021-11-26 | [Products](../docs#tag/Products-V2) | Sandbox        | Version 2 of /products is now available in the sandbox environment.                             | | 2021-04-30 | [Orders](../docs#tag/Orders-V4)     | New Version    | Version 4 is now live. We plan to go offline with Version 3 (v3) by  2021-10-31                 | | 2021-04-06 | [Products](../docs#tag/Products-V2) | New Version    | Version 2 is now live. We plan to go offline with Version 1 (v1) earliest by 01.11.2021.        | | 2020-04-14 | [Receipts](../docs#tag/Receipts-V2) | New Version    | Version 2 is now live. We plan to go offline with Version 1 (v1) earliest by 14th October,2020. | | 2020-04-20 | [Orders](../docs#tag/Orders-V4)     | New Version    | Version 3 is now live. We plan to go offline with Version 2 (v2) earliest by 01.11.2020.        | | 2019-09-01 | [Orders](../docs#tag/Orders-V4)     | New Version    | Version 1 will be outdated in some time. Please change to version 2, if it is marked as ready.  | | 2022-02-28 | [Price Reductions](../docs#tag/Price-Reductions-V1)     | New Version    | Version 1 is now live. |  ## Feedback  We are very interested in learning about how to improve our API-Documentation for you and would love to here your feedback!   [Send Feedback.](mailto:partnerintegration@otto.market?subject=[OTTO%20Market]%20Feedback%20API%20documentation)  ## Get Support If you have any questions and remarks or if you need support, please reach out to us via [e-mail](mailto:support@otto.market). We will get back to you as soon as possible.  # Partner API Developer's Guide The Developer's Guide is targeted at developers and people with technical background who are already a partner of OTTO Market or are interested in becoming a partner. The aim is to help you as a partner of OTTO Market to connect to and to work with the OTTO Partner API. It describes some common implementation patterns and helps you to understand how processes work. Detailed information about the concrete interfaces can be accessed by clicking onto the single tabs.  ## Authorization (OAuth2)  <!-- ReDoc-Inject: <security-definitions> -->  ### Fetch access token  In order to fetch an authorization token you must have an API user with a password. You can use the following cURL command to receive your token. Make sure to include your username and password in the command (without leading and trailing < >) and to URL-encode special characters appropriately. ``` curl -X POST \\   https://api.otto.market/v1/token \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -H 'Cache-Control: no-cache' \\   -d 'username=<YourUsername>&password=<YourPassword>&grant_type=password&client_id=token-otto-api' ```  Alternatively, you can let cURL encode the POST data by using `--data-urlencode` instead: ``` curl -X POST \\   https://api.otto.market/v1/token \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -H 'Cache-Control: no-cache' \\   --data-urlencode username=<YourUsername> \\   --data-urlencode password=<YourPassword> \\   --data-urlencode grant_type=password \\   --data-urlencode client_id=token-otto-api ```  The response of the request will look like the following example. The token itself can be extracted from the <code class=\"inline\">access_token</code> value. ``` {   \"access_token\": \"eyJhbGciOiJSUzI1NiISInR5cCIgOiAiSldUIiwia2lkIiA6ICJTd3ExRDRvYVBKUFQzMER3dmlZRkVVV2hRaEJtMEdPRlpWVWIwYWEteDBjIn0.eyJqdGkiOiIyMTg5Y2NjNC02NjU5LTQ1YmMtYjliMS1jYTIzMDMxOGQ3NmQiLCJleHAiOjE1ODQ5ODg3NjQsIm5iZiI6MCwiaWF0IjoxNTg0OTg1MTY0LCJpc3MiOiJodHRwczovL2VzYi13cy5vdHRvLmRlL3NlYy1hcGkvYXV0aC9yZWFsbXMvb3R0by1wYXJ0bmVyIiwic3ViIjoiODkwYmZkYjEtMTJkZS00OTY0LWJmMzgtYWQ1NzEyOTc4NjU4IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoidG9rZW4tb3R0by1hcGkiLCJhdXRoX3RpbWUiOjAsInNlc3Npb25fc3RhdGUiOiIzZTA3MTBiMi1iNTdhLTRjYjAtYTUxZC02ZGU2MGE5OTczNTYiLCJhY3IiOiIxIiwic2NvcGUiOiJwdW1iYS1yb2xlcy1hcHAtcG9ydGFsIHBhcnRuZXIgZW1haWwgcHJvZmlsZSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsiUHJvZHVjdHNfV3JpdGUiLCJSZWNlaXB0c19OYXZpZ2F0aW9uX1JlYWQiLCJTZXBhTWFuZGF0ZXNfQ3VzdG9tZXJTdXBwb3J0X1dyaXRlIiwiQnJhbmRzaG9wX05hdmlnYXRpb25fUmVhZCIsIkNhcnJpZXJBbmRSZXR1cm5fTmF2aWdhdGlvbl9SZWFkIiwiUGFydG5lcl9OYXZpZ2F0aW9uX1JlYWQiLCJTZXJ2aWNlc19OYXZpZ2F0aW9uX1JlYWQiLCJBbmFseXRpY3NfTmF2aWdhdGlvbl9SZWFkIiwiUHJvZHVjdHNfTmF2aWdhdGlvbl9SZWFkIl19LCJuYW1lIjoiVGVzdCBVc2VyIiwicHJlZmVycmVkX3VzZXJuYW1lIjoiYXBpX3Rlc3QiLCJsb2NhbGUiOiJkZSIsImdpdmVuX25hbWUiOiJUZXN0IiwiZmFtaWx5X25hbWUiOiJVc2VyIiwiZW1haWwiOiJhbmRyZS5lcmtAb3R0by5kZSJ9.Rszr6jXUUGGHzqw2XVo7HcaZ0pHvwYyJdg0olZEwpkz2lNBPejFPDuHK5eUrKEBxOhAsu3zKXwrfcyMWW8iufAbfCEonlDjle7U3NafLT-ITcjiL0wf1oI0D33h37RKmd0KjBXcoZRyvGZEUoItMp1WNGLn0JV8UvSOqDiGeCHvuurLNb91aIIHNMuN8lRQLaOhCKRmKsnxpUOytNcOER0_Z_sbK3x4fWJuaEDLIf6OGmx6TXZQr5e2UnvtOIWpt_JMvnKoJOC2-cPN5MP-PiMKTodi7ajhavUxo7dWyE0eBvc2stMFhjwSJO1KUkGjHdk0PWt-4GNlAdBze3laR2Q\",   \"expires_in\": 1800,   \"refresh_expires_in\": 7200,   \"refresh_token\": \"eyJhbGciOiJIUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICI5YjRjZjM1Yi0yZDBkLTQzZGUtYWVjMC1kZTUzMDNiYjM3YjEifQ.eyJqdGkiOiI2NDI0ZTg5OC0yMTBkLTRhZGYtYWNhOS1hZmI1YjA4NTU0NDMiLCJleHAiOjE1ODQ5OTIzNjQsIm5iZiI6MCwiaWF0IjoxNTg0OTg1MTY0LCJpc3MiOiJodHRwczovL2VzYi13cy5vdHRvLmRlL3NlYy1hcGkvYXV0aC9yZWFsbXMvb3R0by1wYXJ0bmVyIiwiYXVkIjoiaHR0cHM6Ly9lc2Itd3Mub3R0by5kZS9zZWMtYXBpL2F1dGgvcmVhbG1zL290dG8tcGFydG5lciIsInN1YiI6Ijg5MGJmZGIxLTEyZGUtNDk2NC1iZjM4LWFkNTcxMjk3ODY1OCIsInR5cCI6IlJlZnJlc2giLCJhenAiOiJ0b2tlbi1vdHRvLWFwaSIsImF1dGhfdGltZSI6MCwic2Vzc2lvbl9zdGF0ZSI6IjNlMDcxMGIyLWI1N2EtNGNiMC1hNTFkLTZkZTYwYTk5NzM1NiIsInNjb3BlIjoicHVtYmEtcm9sZXMtYXBwLXBvcnRhbCBwYXJ0bmVyIGVtYWlsIHByb2ZpbGUifQ.X02NuyvlIhGL6L6fDGvdW-NSLCpFFIc4Cf8XbA_bBdk\",   \"token_type\": \"bearer\",   \"not-before-policy\": 0,   \"session_state\": \"3e0710b2-b57a-4cb0-a51d-6de60a997356\",   \"scope\": \"pumba-roles-app-portal partner email profile\" } ```  ### Use refresh token The refresh token can be extracted from the <code class=\"inline\">refresh_token</code> value. Once the access token is expired you can use the refresh token to get a new access token, without using your users credentials again. You can use the following cURL command. Include the refresh token (without leading and trailing < >). ``` curl -X POST \\   https://api.otto.market/v1/token \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -H 'cache-control: no-cache' \\   -d 'refresh_token=<refresh_token>&grant_type=refresh_token&client_id=token-otto-api' ```  The reponse of this request will look like the example above, the access token can be extracted from <code class=\"inline\">access_token</code> and the new refresh token from <code class=\"inline\">refresh_token</code>.  ### Use access token  When you decode the access token you will see information including your email, name and roles as well as usual token metadata:  ``` {   \"jti\": \"b76250a9-a69f-45fe-9191-d42c68da051e\",   \"exp\": 1584988534,   \"nbf\": 0,   \"iat\": 1584984934,   \"iss\": \"https://esb-ws.otto.de/sec-api/auth/realms/otto-partner\",   \"sub\": \"790bfdb1-12de-4964-bf38-ad5712978658\",   \"typ\": \"Bearer\",   \"azp\": \"token-otto-api\",   \"auth_time\": 0,   \"session_state\": \"81476119-17a4-414b-a4da-aec6f737ddf4\",   \"acr\": \"1\",   \"scope\": \"openid pumba-roles-app-portal partner email profile\",   \"email_verified\": true,   \"partner_id\": \"1000000\",   \"realm_access\": {     \"roles\": [       \"Products_Read\",       ...     ]   },   \"name\": \"Example User\",   \"preferred_username\": \"api_example\",   \"given_name\": \"Example\",   \"family_name\": \"User\",   \"email\": \"example.user@example.org\" } ```  ## Calling an Endpoint All endpoints are secured via authorization. You add the HTTP <code class=\"inline\">Authorization</code> -Header with value <code class=\"inline\">Bearer ey...</code> and will get access. ``` curl -X GET \\   https://api.otto.market/v2/orders \\   -H 'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5jdhstdheSldUIiwia2lkIiA6ICI4T1d6MjhuZ01GbHBURDl5TGtxQkRHMThuYXZNVFgyTWtqNVhkY0RITDBZIn0.eyJqdGkiOiI5OTM1NDk3OS1iNDdhLTQ3MzctOWYyMy0yNTMyMmI5MGVmYmMiLCJleHAiOjE1NTM3NjQ4NjMsIm5iZiI6MCwiaWF0IjoxNTUzNzYxMjYzLCJpc3MiOiJodHRwczovL2VzYi13cy5vdHRvLmRlL3NlYy1hcGkvYXV0aC9yZWFsbXMvcGFydG5lci1hcGktdGVzdCIsImF1ZCI6ImFjY291bnQiLCJzdWIiOiI0MWUwNGQ1OS0xMTk0LTRiYjMtODhkYS1hYjRmNTk2NDkwZGUiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJwYXJ0bmVyLWFwaSIsImF1dGhfdGltZSI6MCwic2Vzc2lvbl9zdGF0ZSI6IjliNjk1ZDA1LTY5YzQtNDkwZS1hZGIzLTc2YWE5NmJmZjA0YyIsImFjciI6IjEiLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsib2ZmbGluZV9hY2Nlc3MiLCJ1bWFfYXV0aG9yaXphdGlvbiJdfSwicmVzb3VyY2VfYWNjZXNzIjp7ImFjY291bnQiOnsicm9sZXMiOlsibWFuYWdlLWFjY291bnQiLCJtYW5hZ2UtYWNjb3VudC1saW5rcyIsInZpZXctcHJvZmlsZSJdfX0sInNjb3BlIjoiZW1haWwgcHJvZmlsZSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJwYXJ0bmVyIjoiMTAwMDYyNCIsIm5hbWUiOiJTb3VsZXdheSIsInByZWZlcnJlZF91c2VybmFtZSI6IjEwMDA2MjQiLCJnaXZlbl9uYW1lIjoiU291bGV3YXkifQ.SleUexNdapaY5RmrVTbKRMiVpRrbNLjIUi7fILsW1hkpqQbX4IQRaSufSt98Ar0OkEmIvZvYPpGVecmjwYvD3YQzBmlcdU0V544Y0h8y01RyxZAYGZbRXfA1kOsFDucnrClCcj1JIaQMU4629wU9OM_SdQaLvfTA2l5prma94RekdWR3S-6DzXqJDtHrrcYS8BsfohkuLdi1U8vPUjwee9lsY3RTa9YZVekH4hFVWMl0Pbwub8jwum6zRjTu-ZAiLhZSnl8mSaMtrJFmkzRi3-s9eN7k0lnLKWGt7JuqZ_vbiJT8ZhHvPur4eLrY02ehF6-lwSUyjWMCzCi5TjBgYg' ```  The expected result has an HTTP 200 code with a probably empty list.  ## Rate Limiting A high volume of calls on API services at any given time would increase server resource consumption. If the load is due to an unauthorized intrusion it would be a chaos. Thus, rate limiting becomes extremely important.  In general requests are limited to 20 requests per second per partner-id as received inside the header. Exceeding the rate limit results in a HTTP 429 \"too many requests\" error. For some endpoints the rate limit is lower to ensure the best quality for all API users. Please see below:  |Endpoint path|HTTP method|Max requests per time unit| |:-|:-|:-| |/products|GET|10 per second| |/products|POST|20 per second| |/products/active-status|GET|10 per second| |/products/active-status|POST|3600 per day| |/products/marketplace-status|GET|10 per second| |/products/categories|GET|10 per second| |/products/brands|GET|10 per second|  ### User Based API Throttling A general method of limiting usage of API resource is to allocate a pre-configured static or dynamic quota for a consumer.The API rate limiting is done on the basis of partner-id. A particular partner-id can make 20 requests per second.  ### Best Practice Don't batch-process if possible (when every partner processes data once every hour, we have a clogged system once every hour and nothing to do the reset of the time).  ## Timeouts and Defaults | Name            | Value | Description                                                                                                     | |-----------------|-------|-----------------------------------------------------------------------------------------------------------------| | request timeout | 10s   | The maximum HTTP request timeout for all interfaces                                                             | | limit           | 128   | The default for limit query parameter. See Paging. The default limit can be overwritten in specific interfaces. |  ## Common Patterns ### Interface Definition Our REST interface definitions are basically using swagger.io. All interface definitions can be automatically used by you to generate necessary API objects and similar in your chosen implementation language. In order to remain technically extensible and up-to-date, individual interfaces may have been described in new or different definition schemes. We are constantly trying to keep all interfaces technically up to date.  ### Versioning The OTTO Partner API uses different versions for the single endpoints. The version number is included in the URL path. [Semantic versioning](https://semver.org/) scheme is used, but only the major version. Breaking changes are only introduced in new major versions. API version is required in all urls.  Endpoints may introduce new optional fields at any time in the request and any new fields in the response. The client must skip all unknown fields.  For every endpoint, a changelog exists which displays the latest released changes and the upcoming unreleased changes. Additionally, an overall [Changelog](/) exists with the most exciting changes about the API in general. ### Supporting old versions The OTTO Partner API continues to support old versions of an API for **6 months** from the time of public announcement for the new version of a given API. It is recommanded to check regularly. This can be be automated by checking HTTP headers.  __example:__ ``` Warning: v2 is deprecated. Please migrate to v3 Sunset: Sun, 01 Nov 2020 00:00:00 GMT Deprecation: Wed, 11 Nov 2018 23:59:59 GMT Link: <https://api.otto.market/v3/orders>; rel=\"successor-version\" ```  ## Header Some common headers should be set by clients:  1. Set the <code class=\"inline\">X-Request-Timestamp</code> header according to the [ISO-8601](https://tools.ietf.org/html/rfc3339#section-5.6) standard. You can use this regex pattern: <code class=\"inline\">^\\d{4}-(0\\d|1[0-2])-([0-2]\\d|3[01])T(2[0-3]|[01]\\d):[0-5]\\d:[0-5]\\d(\\.\\d+)?(\\[+-](2[0-3]|[01]\\d):[0-5]\\d|Z)$</code> 2. Set <code class=\"inline\">Accept</code> to the desired response format e.g. <code class=\"inline\">application/json</code> 3. Set the <code class=\"inline\">Content-Type</code> header to define the used format in the request body, only applicable if you send a request body  ## HTTP Methods The interfaces describe which HTTP methods are allowed and how to use them. Our basic concern is that basically all HTTP Methods are allowed in the [standardized way](https://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol). Note that these methods should behave as specified by their [standardized meaning (idempotency)](http://restcookbook.com/HTTP%20Methods/idempotency/). The following is a description of a few special features, relevant facts or ways to use some of the HTTP methods. <details>   <summary>Click to expand for details</summary>  ### POST POST will update specific fields **and** returns the result like a GET would do (error response is independent).  ### PUT PUT will create or replace the whole entity independent of an existing entity.  ### PATCH PATCH will update specific fields **and** not return data like a GET would do (error response is independent). PATCH body is structured in the same way as PUT and POST (entity body). All fields added into your body will be updated, other fields will not be affected.  __example:__ ``` {   \"username\" : \"myusername\",   \"email\" : null } ``` </details>  ## HTTP Status Codes We are using [standardized HTTP status code](https://www.restapitutorial.com/httpstatuscodes.html) with a body only if needed (it also just can be empty), but details about that you can find at the concrete interface implementation.  | Verb   | Description                                                                                                                                                                                                                                                                                            | |--------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------| | HEAD   | Can be issued against any resource to get just the HTTP header info.                                                                                                                                                                                                                                   | | GET    | Used for retrieving resources.                                                                                                                                                                                                                                                                         | | POST   | Used for creating resources.                                                                                                                                                                                                                                                                           | | PATCH  | Used for updating resources with partial JSON data. For instance, an Issue resource has title and body attributes. A PATCH request may accept one or more of the attributes to update the resource. PATCH is a relatively new and uncommon HTTP verb, so resource endpoints also accept POST requests. | | PUT    | Used for replacing resources or collections. For PUT requests with no body attribute, be sure to set the Content-Length header to zero.                                                                                                                                                                | | DELETE | Used for deleting resources.                                                                                                                                                                                                                                                                           |  ## Error Message Style Error messages are returned as content type \"application/json;charset=utf-8\" in the following format: ``` {   \"errors\": [     {       \"path\": \"/orders/1000331\",       \"title\":  \"Invalid Attribute\",       \"code\": \"490\",       \"detail\": \"First name must contain at least three characters.\",       \"detail-structured\": {...},       \"jsonpath\": \"[@.orderid=='12345']/invoiceAddress/firstname\",       \"logref\": \"key to find in the log\"     }   ],   \"warnings\": [       {         \"path\": \"/orders/1000331\",         \"title\":  \"Warning Attribute\",         \"code\": \"WRONG_SPELLING\",         \"detail\": \"Last name should start with big letter.\",         \"detail-structured\": {...},         \"jsonpath\": \"[@.orderid=='12345']/invoiceAddress/lastname\",         \"logref\": \"key to find in the log\"       }     ] } ```  | Field            | Mandatory | Description                                                                                          | |------------------|-----------|------------------------------------------------------------------------------------------------------| | path             | yes       | called REST path                                                                                     | | path             | yes       | short description of the error                                                                       | | path             | no        | internal error code (number or enum) of your application / domain (do not use the HTTP status codes) | | pathl            | no        | long description of the error, perhaps technical details                                             | | pathl-structured | no        | technical details in JSON structure                                                                  | | pathath          | no        | JSON field in request which caused the error                                                         | | pathf            | no        | reference key to find more stuff in the log (as example traceId)                                     |  ## Pagination All interfaces return a list with resources (orders, shipments...) and a next link if more entries exist. Use the next link to retrieve more entries.  For pagination, the basic query parameter \"limit\" (e.g. <code class=\"inline\">?limit=10</code>) can be used to define the maximum amount of resulting entities returned per call. The interface itself can reduce the limit lower than your client limit.  An example entity would be: ``` {   resources: [     {       ...data of the entity if all or some information will be provided directly...,       links: [         {           href: \"/v1/orders/1234\",  <--- Link to single partner order           rel: \"self\"         }       ]     }   ],   links: [     {       href: \"/v1/orders?idGt=1234\", <--- Link to next list of ressources. If not present, no more records exist, currently       rel: \"next\"     }   ] } ```  ## Bulk requests If you send a bulk request for an API endpoint, it will be processed asynchronously at the backend.  ### Synchronous Answer Synchronously will be delivered an endpoint to check the asynchronous processing state. ``` HTTP STATUS 202 (Accepted) {     \"task\": {         \"href\": \"/interface/foo/123\",         \"id\": \"123\"     } } ```  ### Check the State of an Endpoint The client can follow the <code class=\"inline\">href</code> to check the state of processing. An example entity would be: ``` {   \"state\": \"pending\",   \"message\": \"is running boy\",   \"progress\": \"35\",   \"total\": \"100\",   \"pingAfter\": \"2019-05-01T13:25:12+0200\",   \"links\": [     {       \"rel\": \"self\",       \"href\": \"/foo/bar/123\"     },     {       \"rel\": \"failed\",       \"href\": \"/foo/bar/123/failed\"     },     {       \"rel\": \"succeeded\",       \"href\": \"/foo/bar/123/succeeded\"     }   ] } ```  ### Fetching files like PDF and CSV  Clients don't have to know the filetype that will be returned from a resource. Resources serving files will have the appropriate file extension in the URL as shown in the example below.  **Request Headers** ``` GET /SomeInvoice.pdf HTTP/1.1 Accept: *_/_* ```  Clients can find out the mime-type from the Content-Type header that will be sent in the response (e.g. application/pdf for PDF files and application/csv for CSV files).  **Response Headers**    ``` HTTP/1.1 200 OK Content-Length: 514493 Content-Type: application/pdf ```  ## Common fields Common fields like time, currency, country codes etc need to follow the standard ISO guidelines unless mentioned otherwise. The fields must report the format they are following on the docs.  ### Some standard formats: - Time: Accept in any time zone in ISO-8601 format and always reply in UTC.    Example: `YYYY-MM-DD` and `hh:mm:ss.sss`: `2020-03-12` and `22:33:34.400` - Currency: ISO-4217.    Example: `EUR` for Euros, `GBP` for British Pound Sterling. - Country code: ISO-3166-1 alpha-3    Example: `DEU` for Germany, `NOR` for Norway.  # Sandbox  ### General **Sandbox is the test environment,** used for testing an API connection. It provides all the functionalities of the live OTTO Market Interface. All actions and orders there are simulated for testing purposes.  The login session and the API key in the sandbox environment are completely separated from the production environment.  REST API: **https://sandbox.api.otto.market**  ## Getting started Follow these steps to start testing on our sandbox environment:  1.  Make yourself familiar with sandbox functionalities. 1.  Request a sandbox API user from our team via [e-mail](mailto:support@otto.market). 1.  Authenticate to our sandbox environment. See [DevelopersGuide](/docs#section/Partner-API-Developer's-Guide) for further information. 1.  Use our Order generator to create fictional orders. See Technical Advice below to know, which orders are created. 1.  Test the API functionality of your application.  ## Technical Advice Please note the following information: ### Authorization For the endpoint like all the other endpoints a valid authorization token has to be sent. If you need further information, please consult the [Developers Guide](/docs#section/Partner-API-Developer's-Guide).  ### GET-Returns Endpoint Since there are no real costumers, returns cannot be announced. Hence, the GET endpoint of returns is retrieving an empty string.  ### Sandbox Reset To prevent data overload, our sandbox and its orders are resetted monthly at first Sunday from 6 p.m. to 10 p.m.\\ Any dynamic data (shipments, returns) is deleted. Old shipments will not be available anymore.\\ Therefore, you have to create new Orders every month.  ### Order Generator To test your API implementation you can generate test orders only on the sandbox environment by sending an empty POST request to the following generation endpoint:  [https://sandbox.api.otto.market/v4/orders/testorders]()  This will run 8 predefined scenarios on our sandbox. After the POST request, you will receive 6 orders in \"PROCESSABLE\" status with different combinations of positions and items (e.g. standard and freight delivery). You will also receive 1 prepayment orders in \"ANNOUNCED\" and 1 orders in \"CANCELLED_BY_MARKETPLACE\" status.  The generated orders will contain one or more position items with the following products:  | Product Title                       | EAN           | SKU                   | |-------------------------------------|---------------|-----------------------| | Smartphone »CallMe 1000«            | 1245780164732 | SmartCM1000-schwarz-1 | | Fancy Shirt »Flower«                | 4851278936452 | FancyFlower-m-pi      | | Rasenmaeher »Turbo V1«              | 9821393948573 | 0440-Rasen-T-V1       | | Spedition Wohnlandschaft 3.tlg.     | 8263748321943 | Sped-Wohn-3-98735     | | Spedition Kühlschrank »COOL EXTREM« | 7263000981290 | Sped-Kühl084-kombi    |  Scenarios:  | Scenarios        | Status                   | Comment                                                                | |------------------|--------------------------|------------------------------------------------------------------------| | 1, 2, 3, 4, 7, 8 | PROCESSABLE              | Scenario 4 inclusive discount                                          | | 5                | ANNOUNCED                | Prepayment Order which is announced (Customer has not paid yet)<br>Order includes weeePickup on position item level| | 6                | CANCELLED_BY_MARKETPLACE | Prepayment Order which has been cancelled, because customer didn’t pay |  Please use the generated orders to test the interaction with Orders, Shipments and Returns.  If you want to create a single scenario you can do that by sending an empty POST to:  [https://sandbox.api.otto.market/v4/orders/testorders/scenario\\{scenarionumber\\}]()  e.g. [https://sandbox.api.otto.market/v4/orders/testorders/scenario1]()  ## Best-practice test cases  We´ve come up with mulitple test cases to help you test the basic functionalities needed for each endpoint when offering your service to an OTTO Market Seller. The test cases should be tested within the sandbox environment. If you´re interested in feedback from our service provider management you can send screenshots of the test results [here](mailto:partnerintegration@otto.market?subject=[OTTO%20Market%20API]%20Service%20Provider%20test%20cases).  We´re referring to the test orders created using the *test order generator* within the sandbox environment. Please read the section [Order Generator](#order-generator) on how to create test orders.  ### Products We want to test the successful and incorrect creation of several products as well as the deactivation of the  products. The successful display of the errors and OTTO categories should also be tested.   1. Download the valid category list over the appropriate endpoint and load it into your mapping interface.  **Attention:** Please remember to show your customer the `featureRelevance` and `relevance` of attributes. `LEGAL` attributes are mandatory.  2. Download the valid brand list over the appropriate endpoint and load it into your system.  3. List a product with 8 SKUs of a valid brand and a valid category.  4. Try listing a product with a wrong brand, a wrong category, an attribute with a wrong name and a wrong value.  5. Please deactivate a SKU from the product created in test case 1 and send us a screenshot of the deactivation display in your  system.  ### Quantities We want to test the successful transfer of inventory to existing SKUs.  6. Please send a positive inventory via the interface for three of the successfully submitted SKUs.  **Attention:** Inventory updates should only be updated when the quanities have changed for a product. That being said a  common best practice is to atleast align the stock keeping system with the OTTO Market once a day. Maybe at night.  ### Orders We want to test the processes for pulling orders in different statuses using self-generated test orders. The  cancellation process is also to be tested.  7. Generate the collection of 16 test orders (in 8 scenarios) via the order generator and pull the orders in the status \"PROCESSABLE\".  8. GET the orders in the status \"ANNOUNCED\".  9. Use one of the orders from test scenario 2 and cancel it via the corresponding interface.  10. Use one of the orders from scenario 7 and simply cancel an item from the order using the appropriate interface.  ### Shipments We want to test the shipping processes and consider the special feature of the returnTrackingKey for  parcel shipping. Test cases for parcel shipping and forwarding shipping are to be executed.   11. Use one of the orders from scenario 1 and report the items in a shipment as shipped.  12. Use one of the orders from scenario 1 and report two different shipments (two package shipments) for the four items.   13. Use one of the orders from scenario 3 and report the item as shipped in a shipment.   14. Use one of the orders from scenario 8 and report all items in separate shipments as shipped (parcel shipping + freight  forwarding shipping)  ### Returns Finally, the return case should be checked and a return accepted and rejected for an item successfully  marked as shipped.   15. Use the order marked as shipped from test case 10 and report the items as accepted returns (acceptance).  16. Use the order marked as shipped from test case 12 and report the item as an unaccepted return (rejection).  ## Products: Validation and test cases  We want to test the successful and incorrect creation of several products as well as the deactivation of the products.   The successful display of product related errors, OTTO categories and brands should also be tested.  ### Validation  Submitted product data is validated in two steps:  **1. Technical validation**  The first technical validation (syntax and required attributes) takes place after you´ve sent product data using a POST request. Read more about uploading products here: OTTO Market API: Create or update your product variations. If your http request was successful (http response state 200), you´ll be provided with four different links (pending, succeeded, failed, unchanged). Following the links you´ll be able to check which products have been successfully listed, failed, unchanged or are still being processed.  |Status|Explanation| |:-|:-| |Pending|The product listing is still being processed| |Succeeded|The shown products listing was successful| |Failed|Listing of all shown products has failed| |Unchanged|The request for the listed products is unchanged to the last request|  **2. Shop validation**  The second step is the shop validation. Results of the shop validation are retrievable using the marketplace-status endpoint. Please read OTTO Market API: Read the marketplace status on how to use the marketplace status endpoint. Submitted product data always has one of the following four marketplace statuses:  | Status     | Explanation                                                                                                                                                                       | |------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------| | Pending    | Submitted product data is currently proceeded.                                                                                                                                    | | Online     | The SKU is displayed at otto.de. You can find the SKU using the shop link. <br />In some cases, additional information will be shown on how to improve the visibility on otto.de. | | Restricted | The SKU is not displayed at otto.de because of an error shown within the error’s container.                                                                                       | | Inactive   | The SKU was set inactive via the active-status endpoint and could be reactivated via the active-status endpoint.                                                                  |  **Attention:** Since the sandbox is missing a direct shop integration the second validation is simulated.  ### Test cases  To ensure you´re able to test every marketplace status including different errors we´ve added specific EAN´s to our sandbox environment. Below you´ll find predefined test cases to simulate possible cases from the live environment. As mentioned before the different states are retrievable fetching the marketplace status.  **Test case #1: Status Online with poor data quality:**  A product status can be online but still have poor data quality. To increase the visibility please add the listed attributes from the error message (“{0}”).  This state can be tested by listing SKU´s using one or more of the following EAN´s:  - “6250000000010” - “6250000000027” - “6250000000034” - “6250000000041” - “6250000000058”  You should receive an error message that looks anything like this:  800001 - DATAQUALITY_NOTICE_SIGNIFICANT_ATTRIBUTE_AND_INFORMATION: “Durch die Pflege folgender Attribute kann die Sichtbarkeit des Produktes gesteigert werden: ''{0}''”  **Test case #2: Status Restricted – Brand blocked**  Some brands are reserved for specific sellers. By listing a product with one of those reserved brands you should receive the following error message:  600007- BRAND_BLOCKED and error title: “Die Marke ist gesperrt und darf nicht eingespielt werden.“ This state can be tested by listing SKU´s using one or more of the following EAN´s:  - “6250000000065” - “6250000000072” - “6250000000089” - “6250000000096” - “6250000000102”  **Test case #3: Status Restricted – EAN already known**  To ensure a great customer experience, product listings using the same EAN are grouped on the OTTO market. This leads to seller competition. By listing a product with a yet unknown EAN a new moin will be generated and must be included in all future updates / listings for that EAN. The moin is retrievable via the marketplace status.  By listing a product with an already known EAN you´ll be prompted with the following error message:  700001 - MOIN_ALREADY_KNOWN and the error title: “Diese Variante ist auf dem OTTO Marktplatz bereits bekannt. Um die Variante zum Verkauf anbieten zu können, bestätigen Sie uns bitte den Content, indem sie die MOIN beim nächsten Update an uns zurückschicken.“  The error message says that the EAN is already known and can only be sold by including the moin. The moin is retrievable from the marketplace status. Including the moin means you´re agreeing that you´re selling the exact same product which has initially generated the moin for the EAN you´re trying to sell. If you disagree, please contact support@otto.market.  The listing of a product with an already known EAN is possible by listing SKU´s using one or more of the following EAN´s:  - “6250000000201” - “6250000000300” - “6250000000409” - “6250000000508” - “6250000000607” - “6250000000706” - “6250000000805” - “6250000000904” - “6250000001000”  **Test case #4: Status Restricted – MOIN incorrect**  It´s possible that you´re trying to submit a product including the moin but the moin has a typo / is wrong in general. You´ll receive the following error message then:  700002 – MOIN_INCORRECT and the error title: “Die von Ihnen zu dieser Variante übertragene MOIN entspricht nicht der von uns für diese Variante vergebenen MOIN. Bitte überprüfen Sie ihre Daten und korrigieren die MOIN entsprechend.“  This is solved by including the correct moin.  # Developer Program (Currently in closed beta)  The developer program will allow partners and service providers to connect more easily and safer than before.  To ensure every process and functionality is working as intended we are currently in a closed beta test.  We are really looking forward to launching the developer program in the next months.  **Attention: The Developer Program and the functionalities are in closed beta. Partners and service providers do not have public access yet.**  ## Registration as Service Provider  1. Register as service provider at [developer.otto.market](https://developer.otto.market)    1. Enter your contact and company data    2. Select the required scopes for your application       - This information is displayed to the partners and the access token issued to your application will be limited to the scopes granted by the partner.    3. Accept the terms & conditions 2. An invitation email will be sent to you including a link to reset your password    - Once you set your password, your user account is created 3. You can now log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal 4. Once sandbox access is granted, you can see \"[API Access](https://portal.otto.market/app-management/service-provider/sandbox-apps)\" (\"API Zugriff\") in the left menu bar 5. To get production access and become visible for partners in the OPC, contact the PCM    - Please provide your company name and your email address.    - This will be automated in the future, so that you can request production access directly within the portal. 6. Once approved you can see \"[Partner Management](https://portal.otto.market/app-management/partner-consents)\" (\"Partner Verwaltung\") in the left menu bar  ### Approval Process  There are two phases of approval for service provider registration:  **Sandbox Access**  Once this is approved service providers can start creating sandbox apps and test against Sandbox Partner APIs    **Production Access**  Once this is approved service providers will be shown for partners to provide consents and service providers will also have access to create live apps and test against Live Partner APIs   ## Create Apps for accessing Partner APIs  The below sections talk about various use cases of creating apps and granting access to Partner APIs depending on your \"role\": - **[Partners without service providers](#partners-without-service-providers)** - **[Partners with service providers](#partners-with-service-providers)** - **[Service providers](#service-providers)**  ### Partners without Service Providers  Partners who are using partner APIs themselves and do not use any third party service providers to access partner APIs.  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal 2. Click on the gear icon in the upper right corner to expand the settings menu and go to \"[API access](https://portal.otto.market/settings?section=API+Zugriff)\" (\"API Zugriff\")    - This page includes an overview about all your apps separated by environment (sandbox and production).  3. Expand the environment section you want to create an app in. 4. Create a new app by clicking on the \"Create new app\" (\"Neue App erstellen\") button 5. Provide an app name and at least one scope your app needs to have access to and click on \"Create app\" (\"App erstellen\") 6. Done! Your app was created, and you will be directed to the credentials tab. 7. Use the generated client ID and client secret for accessing Partner APIs.  **Note** - The number of apps you can create is limited. If you reach this limit but need to create a new app, you have to delete an old one first → refer [Delete Apps](#delete-apps) - The client secret for the app is shown only once. If missed or forgotten, you have to rotate the client secret → refer [Rotate Client Secret for Apps](#rotate-client-secret-for-apps)  ### Partners with Service Providers  Partners can grant service providers access to Partner APIs and edit or revoke these granted accesses  #### Connect with Service Providers and grant access  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal 2. Click on the gear icon in the upper right corner to expand the settings menu and go to \"[All Service Providers](https://portal.otto.market/settings?section=Alle+Dienstleister)\" (\"Alle Dienstleister\") 3. Search for the service provider you want to grant access 4. Hover over the service provider's name and click on the button \"Grant access\" (\"Zugriff erteilen\") 5. Select the scopes you want the service provider to have access to    - Please note: You can only select the scopes this service provider has registered for    - Please also note: You have to select at least one scope    - Confirm your choice(s) by clicking the \"Grant access\" (\"Zugriff erteilen\") button 6. Done! Now you can see this service provider in the tab \"[My Service Providers](https://portal.otto.market/settings?section=Meine+Dienstleister)\" (\"Meine Dienstleister\")  #### Edit or revoke granted Access  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal 2. Click on the gear icon in the upper right corner to expand the settings menu and go to \"[My Service Providers](https://portal.otto.market/settings?section=Meine+Dienstleister)\" (\"Meine Dienstleister\") 3. Search for the service provider you want to edit/revoke access for 4. Hover over the service provider's name and click on the button \"Edit access\" (\"Zugriff bearbeiten\") 5. Within the popup message you can change the scopes and also revoke access completely    - Please note: You can only select the scopes this service provider has registered for    - Please also note: You have to select at least one scope    - Confirm either your changes in the scopes by clicking on \"Save\" (\"Speichern\") or click on \"Revoke access\" (\"Zugriff entziehen\") and confirm the popup message  ### Service Providers  Service providers can create sandbox apps for testing purposes, activate apps for consented partners and request more scopes and unlimited partner.  #### Sandbox Apps for accessing Sandbox Partner APIs  These apps are not connected to a specific partner but simulate a successful app with a consented partner.  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal as service provider 2. Go to \"[API Access](https://portal.otto.market/app-management/service-provider/sandbox-apps)\" (\"API Zugriff\") in the left menu bar    - This page includes an overview about all your sandbox apps. 3. Create a new app by clicking on the \"Create new app\" (\"Neue App erstellen\") button 4. Provide an app name and at least one scope your app needs to have access to and click on \"Create app\" (\"App erstellen\") 5. Done! Your sandbox app was created, and you will be directed to the credentials tab. 6. Use the generated client ID and client secret for accessing Sandbox Partner APIs.  **Note** - The number of apps you can create is limited. If you reach this limit but need to create a new app, you have to delete an old one first → refer [Delete Apps](#delete-apps) - The client secret for the app is shown only once. If missed or forgotten, you have to rotate the client secret → refer [Rotate Client Secret for Apps](#rotate-client-secret-for-apps)  #### Activate App for Consented Partner  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal as service provider  2. Go to \"[Partner Management](https://portal.otto.market/app-management/partner-consents)\" (\"Partner Verwaltung\") in the left menu bar    - This page includes an overview of all your partners. 3. Search for the partner you want to create a production app for 4. Hover over the partner's name and click on the button \"Create App\" (\"App erstellen\") 5. Provide an app name and click on \"Create app\" (\"App erstellen\")    - You can overwrite the pre-filled suggested app name    - The scopes are pre-selected and cannot be changed 6. Done! Your app was created, and you will be directed to the credentials tab 7. Use the generated client ID and client secret for accessing Partner APIs  **Note** - By default, you can have only 3 consented partners. If you need access to more partners you can request unlimited partner access → refer [Request more Scopes and unlimited Partner Access](#request-more-scopes-and-unlimited-partner-access) - As of now, you cannot delete those apps and cannot have multiple apps per partner. - The client secret for the app is shown only once. If missed or forgotten, you have to rotate the client secret → refer [Rotate Client Secret for Apps](#rotate-client-secret-for-apps)  #### Request more Scopes and Access to integrate more than three Partners  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal as service provider 2. Go to \"[Partner Management](https://portal.otto.market/app-management/partner-consents)\" (\"Partner Verwaltung\") in the left menu bar 3. Click on the \"Other Accesses\" (\"Weitere Zugriffe\") button in the upper right corner 4. Here you can select new scopes and also request access to more than 3 partners by checking the corresponding checkbox(es) 5. Confirm your choice(s) to start the approval process    - Once requested there will be a corresponding flag right beside the scope stating \"Requested\" (\"Angefragt\").    - Each request will be processed separately.    - You can cancel your request (as long as it is not approved) by unchecking the corresponding checkbox and confirming your changes.  ## Authorization: Client Secret and Client ID  ### List of all available Scopes The below table gives mapping of displayed scope names in UI to the scope names to be used for fetching token  | Display Name    | Scope Name (To be used in fetching token) | |-----------------|-------------------------------------------| | Products        | products                                  | | Orders          | orders                                    | | Receipts        | receipts                                  | | Returns         | returns                                   | | Price Reduction | price-reduction                           | | Shipments       | shipments                                 | | Quantities      | quantities                                | | Accounting      | accounting                                |  ### Authorization Flow  The client credential flow of OAuth2 is used for authorization. This means, your app can fetch an access token by simply calling our token endpoint using its client ID and client secret. When calling this endpoint our authorization server will validate the given client ID and client secret. If both are valid the authorization server will return an access token which again can be used to authenticate against a partner API.  <img src=\"/docs/process_dev-program_client-credentials-flow.png\" alt=\"Client Credentials Flow for Developer Program\"/>  There are a lot of information and (also not so technical) explanations on the client credential flow and how to use it in the internet. You can find the official documentation of OAuth2 here: - [OAuth2 grant types: client credentials](https://oauth.net/2/grant-types/client-credentials/) - [OAuth2 access tokens: client credentials](https://www.oauth.com/oauth2-servers/access-tokens/client-credentials/)  ### Fetch the Access Token  To fetch an access token you can use the following cURL command to receive your token. Make sure to include your client ID and client secret as well as the required scopes in the command (without leading and trailing < >) and to URL-encode special characters appropriately.  **Request** ```shell curl -X POST \\   https://api.otto.market/v1/token \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -H 'Cache-Control: no-cache' \\   -d 'client_id=<YourClientId>&client_secret=<YourClientSecret>&grant_type=client_credentials&scope=\"<ScopeName>\"' ```  Alternatively, you can let cURL encode the POST data by using `--data-urlencode` instead: ```shell curl -X POST \\   https://sandbox.api.otto.market/v1/token \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -H 'Cache-Control: no-cache' \\   --data-urlencode client_id=<YourClientId> \\   --data-urlencode client_secret=<YourClientSecret> \\   --data-urlencode grant_type=client_credentials \\   --data-urlencode scope=\"<ScopeName1> <ScopeName2>\" ```  **Example** ```shell curl -X POST \\   https://api.otto.market/v1/token \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -H 'Cache-Control: no-cache' \\   --data-urlencode client_id=abf291f8-4692-4c47-9171-260cafd12fde \\   --data-urlencode client_secret=40082467-48bf-4fc3-a983-3c9dcde4c007 \\   --data-urlencode grant_type=client_credentials \\   --data-urlencode scope=\"orders products\" ```  **Note** - When adding no scopes, the token will NOT include any scope at all, meaning you will NOT be able to access any API endpoint. - When adding more than one scope, simply put a space between the names of the different scopes (no commas or else). - Please check the scope names for spelling errors. Having the wrong scope names in the request will result in an `invalid_scope` error. - You can only request scopes that have been granted to you by PCM (during registration or when requesting additional scopes later on) and by the partner. Otherwise, you get an `invalid_scope` error. - Please check if you are using the correct URL depending on the environment:    - Production: https://api.otto.market/v1/token    - Sandbox: https://sandbox.api.otto.market/v1/token  **Response**  A successful response of the request will look like the following example. The token itself can be extracted from the `access_token` value.  ```shell HTTP/1.1 200 OK Content-Type: application/json Cache-Control: no-store   {   \"access_token\":\"eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJpSmNDa2NsYUtSWlVFSkhMRTV2UHV0UzRtbnJSaVFUYzRpTXRKMzY2anRBIn0.eyJleHAiOjE2NDg4MjYwMDAsImlhdCI6MTY0ODgyNDIwMCwianRpIjoiMWZhMjgyZDItODM0MC00N2ZjLWIzMDMtMDM3NzllOTZkYzdiIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi1wcmVwcm9kLmFwcHMtdGVzdC5vdHRvLmRlL3NlYy1hcGkvYXV0aC9yZWFsbXMvZGVlcHNlYS1zYW5kYm94Iiwic3ViIjoiZjk0N2NkOGQtZjc1Yi00ZjY2LTlkOWYtZjI3MjBhYzY1Mzc1IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoidmFuZXNzYS10ZXN0IiwiYWNyIjoiMSIsInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJQcm9kdWN0c19SZWFkIiwiUHJvZHVjdHNfV3JpdGUiLCJQcm9kdWN0c19OYXZpZ2F0aW9uX1JlYWQiXX0sInNjb3BlIjoiUHJvZHVjdHMgcHJvZmlsZSBlbWFpbCIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiY2xpZW50SG9zdCI6IjUyLjU4LjI0MC4wIiwiY2xpZW50SWQiOiJ2YW5lc3NhLXRlc3QiLCJwcmVmZXJyZWRfdXNlcm5hbWUiOiJzZXJ2aWNlLWFjY291bnQtdmFuZXNzYS10ZXN0IiwiY2xpZW50QWRkcmVzcyI6IjUyLjU4LjI0MC4wIn0.WliPt3I8YGiGUB-It3iZEUiXMpPvROMkxogBzJhw_ned4Lc5S6XL3tDfDi8ql82ExwS0SnIPlm3XqVGMIFsdUqXvpMxztvva1dHQKmIhTICejZLVWyskZFLylcDabnSPc7lXhT0wxC4BC8Y1ARPiZbeak7Luzwqw12NCoT8ugDbyxdbXY39edLGdEe97VfiM6gj8nW4Xm2T-xHbWlcclVau90bekqpGF1Gk0W_c9u6vxrswA9S8uluHTmqA_iPIqnfS4Z5pLoigVjwH9Q3xXO8GIRe3cKc5RsOwFDc_j4OkiAzuHUhmyj8m21WadOIEJ7p_HBenJR1aWWMKXrBabwA\",   \"expires_in\":1800,   \"refresh_expires_in\":0,   \"token_type\":\"Bearer\",   \"not-before-policy\":0,   \"scope\":\"orders products\" } ```  Error responses are returned with an HTTP 400 status code including `error` and `error_description` (and for some errors also `error_uri`).  The following errors may occur: - `invalid_request`: The request is missing a required parameter (incl. unsupported values, duplicate parameters, multiple credentials). - `invalid_client`: Client authentication failed due to unknown client, invalid client ID or secret. May return HTTP 401 (Unauthorized). - `invalid_grant`: The authorization code is invalid or expired. - `invalid_scope`: There is an invalid scope value in the request. This can be caused by typos or by requesting scopes that have NOT been granted to you. - `unauthorized_client`: The authenticated client is not authorized to use this authorization grant type. - `unsupported_grant_type`: The authorization grant type is unknown or not supported by the authorization server.  An error response may look like the following example: ```shell HTTP/1.1 400 Bad Request Content-Type: application/json Cache-Control: no-store   {   \"error\": \"invalid_scope\",   \"error_description\": \"Invalid scopes: orders\" } ```  ### Use the Access Token to call an Endpoint All endpoints are secured via authorization. You need to add the HTTP `Authorization` header with value `Bearer ey...` in order to get access.  **Example** ```shell curl -X GET \\   https://api.otto.market/v2/orders \\   -H 'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5jdhstdheSldUIiwia2lkIiA6ICI4T1d6MjhuZ01GbHBURDl5TGtxQkRHMThuYXZNVFgyTWtqNVhkY0RITDBZIn0.eyJqdGkiOiI5OTM1NDk3OS1iNDdhLTQ3MzctOWYyMy0yNTMyMmI5MGVmYmMiLCJleHAiOjE1NTM3NjQ4NjMsIm5iZiI6MCwiaWF0IjoxNTUzNzYxMjYzLCJpc3MiOiJodHRwczovL2VzYi13cy5vdHRvLmRlL3NlYy1hcGkvYXV0aC9yZWFsbXMvcGFydG5lci1hcGktdGVzdCIsImF1ZCI6ImFjY291bnQiLCJzdWIiOiI0MWUwNGQ1OS0xMTk0LTRiYjMtODhkYS1hYjRmNTk2NDkwZGUiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJwYXJ0bmVyLWFwaSIsImF1dGhfdGltZSI6MCwic2Vzc2lvbl9zdGF0ZSI6IjliNjk1ZDA1LTY5YzQtNDkwZS1hZGIzLTc2YWE5NmJmZjA0YyIsImFjciI6IjEiLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsib2ZmbGluZV9hY2Nlc3MiLCJ1bWFfYXV0aG9yaXphdGlvbiJdfSwicmVzb3VyY2VfYWNjZXNzIjp7ImFjY291bnQiOnsicm9sZXMiOlsibWFuYWdlLWFjY291bnQiLCJtYW5hZ2UtYWNjb3VudC1saW5rcyIsInZpZXctcHJvZmlsZSJdfX0sInNjb3BlIjoiZW1haWwgcHJvZmlsZSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJwYXJ0bmVyIjoiMTAwMDYyNCIsIm5hbWUiOiJTb3VsZXdheSIsInByZWZlcnJlZF91c2VybmFtZSI6IjEwMDA2MjQiLCJnaXZlbl9uYW1lIjoiU291bGV3YXkifQ.SleUexNdapaY5RmrVTbKRMiVpRrbNLjIUi7fILsW1hkpqQbX4IQRaSufSt98Ar0OkEmIvZvYPpGVecmjwYvD3YQzBmlcdU0V544Y0h8y01RyxZAYGZbRXfA1kOsFDucnrClCcj1JIaQMU4629wU9OM_SdQaLvfTA2l5prma94RekdWR3S-6DzXqJDtHrrcYS8BsfohkuLdi1U8vPUjwee9lsY3RTa9YZVekH4hFVWMl0Pbwub8jwum6zRjTu-ZAiLhZSnl8mSaMtrJFmkzRi3-s9eN7k0lnLKWGt7JuqZ_vbiJT8ZhHvPur4eLrY02ehF6-lwSUyjWMCzCi5TjBgYg' ```  ### Rotate Client Secret for Apps  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal 2. Navigate to your app overview:    - For partners: \"[API Access](https://portal.otto.market/settings?section=API+Zugriff)\" (\"API Zugriff\")    - For service providers - sandbox apps: \"[API Access](https://portal.otto.market/app-management/service-provider/sandbox-apps)\" (\"API Zugriff\")    - For service providers - production apps: \"[Partner Management](https://portal.otto.market/app-management/partner-consents)\" (\"Partner Verwaltung\") 3. Within the app overview, hover over the app name and click on the \"Details\" button 4. Click on the tab \"Credentials\" to see your client ID and secret 5. Click on the \"Rotate\" (\"Rotieren\") button to rotate your client secret 6. Now you can copy the client secret by clicking the \"Copy\" (\"Kopieren\") button  **Note** - Do not share your credentials with others. Keep it private at all times!  ## Delete Apps  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal 2. Go to \"API Access\" (\"API Zugriff\"): [link for partners](https://portal.otto.market/settings?section=API+Zugriff) | [link for service providers](https://portal.otto.market/app-management/service-provider/sandbox-apps) 3. Within the app overview, hover over the app name and click on the trash can icon to delete your app 4. Confirm the deletion within the popup window  **Note** - As service provider, you can only delete sandbox apps.  ## Automate App Activation And Secret Rotation (only for Service Providers)  In case a service provider serves several partners (refer [Request more Scopes and unlimited Partner Access](#request-more-scopes-and-unlimited-partner-access) if needed),  it may be very inconvenient to create production apps for each of these partners manually via the UI. This is why we introduced a way to automatically activate apps via API.  Therefore, a service provider needs a dedicated client ID and secret.  1. Log in to the [Otto Partner Connect (OPC)](https://portal.otto.market) portal 2. Click on the gear icon in the upper right corner to expand the settings menu and go to \"[API Access](https://portal.otto.market/settings?section=API+Zugang)\" (\"API Zugang\") 3. Turn on the \"API Access for live environment\" (\"API Zugang für Live-Umgebung\") and confirm 4. Client ID and secret will be shown below. These can be used to activate apps and also to rotate their client secret automatically via API.  ### Activate App For Consented Partner  **Request** ```shell curl --request POST \\   --url https://api.otto.market/v1/apps \\   --header 'Authorization: Bearer REPLACE_BEARER_TOKEN' \\   --header 'Content-Type: application/json' \\   --data '{  \"targetPartnerId\": \"<<targetPartnerId>>\",  \"appName\": \"<<appName>>\" }' ```  **Request body schema**  | Attributes  | Description | | ----------- | ----------- | | `targetPartnerId` | Id of the partner who has granted consent.| | `appName` | Name of the app.|  **Example** ```shell curl --request POST \\   --url https://api.otto.market/v1/apps \\   --header 'Authorization: Bearer REPLACE_BEARER_TOKEN' \\   --header 'Content-Type: application/json' \\   --data '{  \"targetPartnerId\": \"123456\",  \"appName\": \"app_123456\" }' ```  **Response** ```json {  \"appId\": \"6246be5b3375602bc884c6e3\",  \"credential\": {   \"clientId\": \"6141b2b0-6acd-4914-a199-fa2d4282075c\",   \"clientSecret\": \"9f797a38-e701-48aa-8985-37cc0de15e11\"  } } ```  **Responses**  | Status      | Description | | ----------- | ----------- | | `200`       | App has been successfully activated and is ready for use.| | `400`       | No consent available for the given targetPartnerId.|  ### Rotate Client Secret For Apps  **Request** ```shell curl --request POST \\   --url https://api.otto.market/v1/apps/{appId}/client-secret \\   --header 'Authorization: Bearer REPLACE_BEARER_TOKEN' ```  **Example** ```shell curl --request POST \\   --url https://api.otto.market/v1/apps/6246be5b3375602bc884c6e3/client-secret \\   --header 'Authorization: Bearer REPLACE_BEARER_TOKEN' ```  **Response** ```json {  \"appId\": \"6246be5b3375602bc884c6e3\",  \"credential\": {   \"clientId\": \"6141b2b0-6acd-4914-a199-fa2d4282075c\",   \"clientSecret\": \"9f791a28-e701-48aa-8985-45cc0de71f03\"  } } ```  **Responses**  | Status      | Description | | ----------- | ----------- | | `200`       | Credentials has been successfully generated.| | `404`       | No app available with given appId.|
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.33
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * ProductProcessTaskResultProductsV2 Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProductProcessTaskResultProductsV2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ProductProcessTaskResult__Products-V2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'variation' => 'string',
'url_to_shop_product' => '\Swagger\Client\Model\ProductLinkProductsV2',
'errors' => '\Swagger\Client\Model\ProductProcessTaskErrorProductsV2[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'variation' => null,
'url_to_shop_product' => null,
'errors' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'variation' => 'variation',
'url_to_shop_product' => 'urlToShopProduct',
'errors' => 'errors'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'variation' => 'setVariation',
'url_to_shop_product' => 'setUrlToShopProduct',
'errors' => 'setErrors'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'variation' => 'getVariation',
'url_to_shop_product' => 'getUrlToShopProduct',
'errors' => 'getErrors'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['variation'] = isset($data['variation']) ? $data['variation'] : null;
        $this->container['url_to_shop_product'] = isset($data['url_to_shop_product']) ? $data['url_to_shop_product'] : null;
        $this->container['errors'] = isset($data['errors']) ? $data['errors'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets variation
     *
     * @return string
     */
    public function getVariation()
    {
        return $this->container['variation'];
    }

    /**
     * Sets variation
     *
     * @param string $variation variation
     *
     * @return $this
     */
    public function setVariation($variation)
    {
        $this->container['variation'] = $variation;

        return $this;
    }

    /**
     * Gets url_to_shop_product
     *
     * @return \Swagger\Client\Model\ProductLinkProductsV2
     */
    public function getUrlToShopProduct()
    {
        return $this->container['url_to_shop_product'];
    }

    /**
     * Sets url_to_shop_product
     *
     * @param \Swagger\Client\Model\ProductLinkProductsV2 $url_to_shop_product url_to_shop_product
     *
     * @return $this
     */
    public function setUrlToShopProduct($url_to_shop_product)
    {
        $this->container['url_to_shop_product'] = $url_to_shop_product;

        return $this;
    }

    /**
     * Gets errors
     *
     * @return \Swagger\Client\Model\ProductProcessTaskErrorProductsV2[]
     */
    public function getErrors()
    {
        return $this->container['errors'];
    }

    /**
     * Sets errors
     *
     * @param \Swagger\Client\Model\ProductProcessTaskErrorProductsV2[] $errors errors
     *
     * @return $this
     */
    public function setErrors($errors)
    {
        $this->container['errors'] = $errors;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
