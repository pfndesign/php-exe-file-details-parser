# php-exe-file-details-parser
a php class for parsing exe file details ( without COM ) also works for files with same file detail format as exe (.dll , sys , ..)
# usage
```php
$filedetails = new filedetailsparser($filepath);
$data = $filedetails->getdata($type);
```
- filepath : exe file path
- type : data type 'array' | 'object' (optional) default:'array'
### return : return array/object on success or exception on fail

# getbykeyname
```php
$keyvalue = $filedetails->getbykeyname($keyname,$type);
```
- keyname : file detail key name (from list)
- type : data type 'array' | 'object' (optional) default:'array'
### return : return string/array/object on find or 'false' on notfind

# getdatalist
```php
$data = $filedetails->getdatalist($keylist,$type);
```
- keylist : list of keys for extraction from data
- type : data type 'array' | 'object' (optional) default:'array'
### return : return array/object

# filedetails list
- companyname
- filedescription
- fileversion
- internalname
- legalcopyright
- originalfilename
- productname
- productversion
- companyshortName
- productshortName
- lastchange
- legaltrademarks
- buildid
- updatesystemversion
- source control id
- filesize
- pathinfo

github : https://github.com/pfndesign/php-exe-file-details-parser
