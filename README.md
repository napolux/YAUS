# YAUS [![Build Status](https://travis-ci.org/napolux/YAUS.svg?branch=master)](https://travis-ci.org/napolux/YAUS)

This is YAUS, (**Y**et **A**nother **U**rl **S**hortener) based on [SlimFramework](http://www.slimframework.com/) 3.4.0
and [Doctrine](http://www.doctrine-project.org/).

The project is over-commented in order to make easier for people to understand what the code is doing.
YAUS was created as a "week-end project", it was made according to the [KISS principle](https://en.wikipedia.org/wiki/KISS_principle):
**keep it in mind when using YAUS in a production environment**.

## Nice things about YAUS

There's an administration page at the `/admin` address.

YAUS can provide data about the URL you're shortening by just adding `.json` to the address created.

### Example:

`http://localhost:8080/u/a` goes to the shortened address while `http://localhost:8080/u/a.json` provides a JSON object with info about the url.

```
{
    "url"   : "http://example.com",
    "visits": 3,
    "hash"  : "a9b9f04336ce0181a08e774e01113b31",
    "shortUrl"  : "ab"
} 
```

A little API is available. Check `src/routes.php`. 

## Requirements

To run YAUS you need:

* PHP 5.5.x
* A MySQL database
* [Composer](https://getcomposer.org/download/) & [PHPUnit](http://phpunit.de)
* [SASS](http://sass-lang.com)

## Setup

* Launch local PHP Server from YAUS folder `php -S 0.0.0.0:8080 -t public public/index.php`
* Launch SASS watcher `sass --watch assets/sass/:public/css --style compressed`
* Go and visit `http://localhost:8080`
* Change database connection credentials in `src/settings.php`
* Change admin username and password in `src/middleware.php`

### Legal stuff

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF
OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

### That's all folks!

That's it! Now go build something cool.
