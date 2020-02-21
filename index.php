<?php
  require('filedetailsparser.php');

  $filepath = 'C:\Program Files\Git\git-bash.exe';
  $error = false;
  try {
      $filedetails = new filedetailsparser($filepath);
      $data = $filedetails->getdata('object');
      //$data = $filedetails->getdata(); // array
      //$filesize = $filedetails->getbykeyname('filesize');
      //$data = $filedetails->getdatalist(['filesize','pathinfo']);
  } catch (Exception $e) {
      $error = true;
      $errormessage = $e->getMessage();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>File Details Parser</title>
  </head>
  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0px" y="0px" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve"><path style="fill:#FAEFDE;" d="M440,424H32c-13.6,0-24-10.4-24-24V96c0-13.6,10.4-24,24-24h120l72,48h192c13.6,0,24,10.4,24,24V424z"/><path style="fill:#FFF7F0;" d="M32,72h128l56,56H8V96C8,82.4,18.4,72,32,72z"/><path style="fill:#CDA1A7;" d="M440,152h32c8.8,0,16,7.2,16,16v232c0,13.6-10.4,24-24,24h-24l0,0V152L440,152z"/><path style="fill:#EFD8BE;" d="M8,344h432l0,0v80l0,0H32c-13.6,0-24-10.4-24-24V344L8,344z"/><g><path style="fill:#F75F83;" d="M232,176h-48c-4.8,0-8,3.2-8,8s3.2,8,8,8h48c4.8,0,8-3.2,8-8S236.8,176,232,176z"/><path style="fill:#F75F83;" d="M72,192h80c4.8,0,8-3.2,8-8s-3.2-8-8-8H72c-4.8,0-8,3.2-8,8S67.2,192,72,192z"/><path style="fill:#F75F83;" d="M104,208H72c-4.8,0-8,3.2-8,8s3.2,8,8,8h32c4.8,0,8-3.2,8-8S108.8,208,104,208z"/><path style="fill:#F75F83;" d="M192,208h-56c-4.8,0-8,3.2-8,8s3.2,8,8,8h56c4.8,0,8-3.2,8-8S196.8,208,192,208z"/></g><g><path style="fill:#8D6C9F;" d="M408,336h-32c-4.8,0-8,3.2-8,8s3.2,8,8,8h32c4.8,0,8-3.2,8-8S412.8,336,408,336z"/><path style="fill:#8D6C9F;" d="M472,144h-24v-8c0-13.6-10.4-24-24-24H221.6c-6.4,0-12-2.4-16.8-7.2l-29.6-29.6C168,68,157.6,64,147.2,64H24C10.4,64,0,74.4,0,88v312c0,17.6,14.4,32,32,32h432c17.6,0,32-14.4,32-32V168C496,154.4,485.6,144,472,144z M32,416c-8.8,0-16-7.2-16-16v-48h328c4.8,0,8-3.2,8-8s-3.2-8-8-8H16V88c0-4.8,3.2-8,8-8h123.2c6.4,0,12,2.4,16.8,7.2l29.6,29.6c7.2,7.2,17.6,11.2,28,12H424c4.8,0,8,3.2,8,8v264c0,5.6,1.6,11.2,4.8,16H32V416z M480,400c0,8.8-7.2,16-16,16c-8.8-0.8-15.2-7.2-16-16V160h24c4.8,0,8,3.2,8,8V400z"/><path style="fill:#8D6C9F;" d="M40,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C48,371.2,44.8,368,40,368z"/><path style="fill:#8D6C9F;" d="M80,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C88,371.2,84.8,368,80,368z"/><path style="fill:#8D6C9F;" d="M120,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C128,371.2,124.8,368,120,368z"/><path style="fill:#8D6C9F;" d="M160,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C168,371.2,164.8,368,160,368z"/><path style="fill:#8D6C9F;" d="M200,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C208,371.2,204.8,368,200,368z"/><path style="fill:#8D6C9F;" d="M240,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8c4.8,0,8-3.2,8-8v-16C248,371.2,244.8,368,240,368z"/><path style="fill:#8D6C9F;" d="M280,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C288,371.2,284.8,368,280,368z"/><path style="fill:#8D6C9F;" d="M320,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C328,371.2,324.8,368,320,368z"/><path style="fill:#8D6C9F;" d="M360,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C368,371.2,364.8,368,360,368z"/><path style="fill:#8D6C9F;" d="M400,368c-4.8,0-8,3.2-8,8v16c0,4.8,3.2,8,8,8s8-3.2,8-8v-16C408,371.2,404.8,368,400,368z"/></g></svg>
            <strong class="ml-3">File Details Parser</strong>
          </a>
        </div>
      </div>
    </header>

    <main role="main">

      <div class="container">

        <?php if ($error) {
                  echo '<div class="alert alert-danger mt-2" role="alert">
                      '.$errormessage.'
                    </div>';
              }
        ?>
    <?php if (!$error) { ?>
      <h2 class="mt-2">File Data</h2>
      <table class="table mt-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">key</th>
            <th scope="col">data</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $filedata) {
            if(is_array($filedata)){
              echo '<tr>
                <td>'.$key.'</td>
                <td><table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">key</th>
                      <th scope="col">data</th>
                    </tr>
                  </thead>
                  <tbody>';
                    foreach ($filedata as $pathdata => $pathinfo) {
                      echo '<tr>
                        <td>'.$pathdata.'</td>
                        <td>'.$pathinfo.'</td>
                      </tr>';
                    }
                echo'</tbody>
                  </table>';
            }else{
              echo '<tr>
                <td>'.$key.'</td>
                <td>'.$filedata.'</td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    <?php } ?>
    <hr/>
    <h3>methods</h3>
    <div class="row mt-4">
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-header">
              getbykeyname
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">($keyname, $type='array')</li>
              <li class="list-group-item">return string/array/object/bool</li>
              <li class="list-group-item">get file details by key name</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-header">
              getdatalist
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">($keylist, $type='array')</li>
              <li class="list-group-item">return array/object</li>
              <li class="list-group-item">only get $keylist keys from file details</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-header">
              getdata
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">($type='array')</li>
              <li class="list-group-item">return array/object</li>
              <li class="list-group-item">get file data details as array or objectget file data details as array or object</li>
            </ul>
          </div>
        </div>
      </div>
      <h3>available file details</h3>
      <ul class="list-group mb-3">
        <li class="list-group-item">companyname</li>
        <li class="list-group-item">filedescription</li>
        <li class="list-group-item">fileversion</li>
        <li class="list-group-item">internalname</li>
        <li class="list-group-item">legalcopyright</li>
        <li class="list-group-item">originalfilename</li>
        <li class="list-group-item">productname</li>
        <li class="list-group-item">productversion</li>
        <li class="list-group-item">companyshortName</li>
        <li class="list-group-item">productshortName</li>
        <li class="list-group-item">lastchange</li>
        <li class="list-group-item">legaltrademarks</li>
        <li class="list-group-item">buildid</li>
        <li class="list-group-item">updatesystemversion</li>
        <li class="list-group-item">source control id</li>
        <li class="list-group-item">filesize</li>
        <li class="list-group-item">pathinfo</li>
      </ul>
      </div>

    </main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
