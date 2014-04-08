## School Management

Descpription to be done

## Installation

1. git clone https://aneeshep@bitbucket.org/aneeshep/school_management.git
2. cd school_management
3. composer install
4. Setup the db details in conf/db.php
5. php artisan migrate --package=cartalyst/sentry
6. php artisan migrate --package="lucadegasperi/oauth2-server-laravel"
7. php artisan migrate
8. php artisan db:seed

## Usage

### Get access token

#### Request for token
```
    POST /oauth/access_token HTTP/1.1
    Host: schoolmanagement.local
    Authorization: VGlTEFhfaWK41PG9OYxKbZqcgkzv2IETpnS4nhjJ
    Cache-Control: no-cache
    Content-Type: application/x-www-form-urlencoded
    grant_type=password&client_id=saqnelrfjqtplzwr&
    client_secret=efwsrljppdkawrnef&username=admin&
    password=password&scope=webapp
```
#### Sample Output

```    
    {
        access_token: "EDNIIACytthbaLOojrTNobks4aRe9YgjSrqIS3SG"
        token_type: "bearer"
        expires: 1397233962
        expires_in: 604800
        refresh_token: "GJxMkIve9LOIA3oIyGlmI5xNvkYFYxQfuFd6cvW0"
    }
```
### Use the token

#### Request

```
    GET /secure-route HTTP/1.1
    Host: schoolmanagement.local
    Authorization: OFUqQFikjVr6e7EvsogU994qexGDk3HTwrVnv4mW
    Cache-Control: no-cache
       
```
