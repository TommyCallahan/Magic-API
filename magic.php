<?php
/**
 * Custom Magic Plugin
 * File: magic.php
 *
 */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC's Magic Directory</title>
    <script src="<?php echo plugins_url(); ?>/highspot/scripts/jquery-3-3-1.min.js" type="text/javascript"></script>
    <script src="<?php echo plugins_url(); ?>/highspot/scripts/main.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo plugins_url(); ?>/highspot/styles/style.css">
  </head>


  <body onload="loadThePage()">

    <header>
        <div id="inner-header">

          <div id="logo"><img alt="Magic The Gathering Logo" src="<?php echo plugins_url(); ?>/highspot/assets/Magicthegathering-logo.svg"/></div>


                    <form method="GET" action="<?php echo $_SERVER['REQUEST_URI'];?>" id="form-filters">
                      <input type="hidden" name="magic" value="yes">
                      <input class="form-control" type="text" name="searchName" placeholder="Name Search">
                      <div class="search-submit">
                        <div class="styled-select slate">
                          <select name="sortBy">
                            <option value="" disabled selected>Sort By</option>
                            <option value="name" />Name</option>
                            <option value="artist" />Artist</option>
                            <option value="type" />Type</option>
                          </select>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                      </div>
                    </form>

                    <div id="nav-icon3">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                  </div>

              </header>


              <div id="spinner">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600" version="1.1"><circle cx="300" cy="300" r="300" fill="#db212c"/><path d="m551.8 399.7c-22.4 53.5-67 80.2-133.6 80.2-12.2 0-25.5 1.5-39.7 4.6-21.4 4.6-32.1 11-32.1 19.1 0 2.5 1.8 5.5 5.3 8.8 3.6 3.3 6.6 5 9.2 5-12.7 0-4.1 0.4 26 1.1 30.1 0.8 48.9 1.1 56.5 1.1-44.3 26-118.4 37.9-222.3 35.9-34.1-0.5-63.4-15.5-87.8-45.1-24-28-35.9-59.3-35.9-93.9 0-36.6 12.3-67.8 37.1-93.6 24.7-25.7 55.4-38.6 92-38.6 8.1 0 19 1.8 32.5 5.3 13.5 3.6 22.5 5.3 27.1 5.3 18.8 0 42.3-7.8 70.3-23.3 28-15.5 41.3-23.3 39.7-23.3-5.1 53.5-22.9 89.4-53.5 107.7-21.9 12.7-32.8 25.2-32.8 37.4 0 7.6 4.6 13.8 13.7 18.3 7.1 3.6 15 5.4 23.7 5.4 13.2 0 26.2-8.1 39-24.4 12.7-16.3 18.3-31.1 16.8-44.3-1.5-15.3-0.5-33.6 3.1-55 1-6.1 4.7-13.6 11.1-22.5 6.4-8.9 12.1-14.4 17.2-16.4 0 4.6-1.6 12.2-5 22.9-3.3 10.7-5 18.6-5 23.7 0 11.2 3 19.9 9.2 26 9.2-3.6 17.3-15 24.4-34.4 6.1-14.8 9.7-29 10.7-42.8-21.4-1-41.9-10.7-61.5-29-19.6-18.3-29.4-38.2-29.4-59.6 0-3.6 0.5-7.1 1.5-10.7 3 4.6 7.6 11.7 13.7 21.4 8.7 12.7 15.3 19.1 19.9 19.1 6.1 0 9.2-6.4 9.2-19.1 0-16.3-4.3-31.1-13-44.3-9.7-15.8-22.2-23.7-37.4-23.7-7.1 0-17.8 3.8-32.1 11.5-14.3 7.6-27.3 11.5-39 11.5-3.6 0-19.4-4.6-47.4-13.8 49.4-8.1 74.1-15.5 74.1-22.1 0-17.3-33.9-29-101.6-35.1-6.6-0.5-18.8-1.5-36.7-3.1 2-2.5 16.5-5.3 43.5-8.4 22.9-2.5 39-3.8 48.1-3.8 121.2 0 198.1 58.8 230.7 176.5 5.6-4.6 8.4-12.4 8.4-23.2 0-13.9-4.1-31.5-12.2-52.7-3.1-8.2-7.9-20.6-14.5-37.2 41.7 53.2 62.6 103.6 62.6 151.2 0 25.1-5.9 47.8-17.6 68.3-7.6 13.8-21.9 31.5-42.8 53-20.9 21.5-35.1 38.1-42.8 49.9 28-7.6 46.4-13.5 55-17.6 19.3-8.6 36.9-21.6 52.7-39 0 6.6-2.8 16.6-8.4 29.8M218.8 99.5c0 9.2-5.1 15-15.3 17.6l-19.9 3.1c-7.1 3.6-17.6 17.6-31.3 42-1.5-7.6-3.8-18.3-6.9-32.1-4.6 0.5-12.2 4.6-22.9 12.2-4.6 3.6-12 8.9-22.2 16 3.1-18.3 13.2-36.9 30.6-55.8 18.3-20.9 36.2-31.3 53.5-31.3 22.9 0 34.4 9.4 34.4 28.3m132.9 70.3c0 8.7-4.7 15.9-14.1 21.8-9.4 5.9-18.7 8.8-27.9 8.8-12.2 0-23.2-6.9-32.8-20.6-11.7-16.8-23.7-27.7-35.9-32.9 2.5-2.5 5.6-3.8 9.2-3.8 4.6 0 12.3 3.6 23.3 10.7 10.9 7.1 17.9 10.7 21 10.7 2.5 0 6.7-3.6 12.6-10.7 5.9-7.1 12.3-10.7 19.5-10.7 16.8 0 25.2 8.9 25.2 26.7" fill="#200000"/>
                </svg>
              </div>



                  <div id="directory"></div>

                  <div id="jump-to-page">
                    <div id="jump-wrap">
                      <input class="form-control" id="pageselect" type="text" placeholder="Jump To Page #">
                      <div id="jump">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        	 width="306px" height="306px" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">
                        <g>
                        	<g id="chevron-right">
                        		<polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153 		"/>
                        	</g>
                        </g>
                        </svg>

                      </div>
                    </div>
                  </div>

  </body>
</html>
