<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>COVID-19</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="corona update/style.css" />
    <link rel="stylesheet" href="corona update/new-style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://kit.fontawesome.com/c939d0e917.js"></script>
    <script src="corona update/map-style.js"></script>
    <script src="corona update/script.js"></script>
    <script src="corona update/charts.js"></script>
  </head>
  <body>
   
    <div class="container-fluid main">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-7">
          <div class="row header-container">
            <div class="col col-md title-container">
            
              <div class="col-12 col-lg-6 d-flex">
                <a href="../" class="site-logo">
                    <img src="images/web_logo.png" class="img-fluid" style=" width: auto; height:auto ; ">
                <p style="font-size: 60%;text-align: center; color:#66cc00">| Perspectives Behind The Story |</p>
      
                </a>
                <a href="../" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>
            </div>

            <div class="col-sm-12 col-md search-container mb-2 mb-lg-0">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"
                    ><i class="fas fa-search"></i
                  ></span>
                </div>

                <div class="col dropdown">
                  <input
                    type="text"
                    autocomplete="off"
                    onkeyup="filterFunction()"
                    id="myInput"
                    class="form-control"
                    placeholder="Search Table..."
                    aria-label="Search Location"
                    aria-describedby="basic-addon1"
                  />
                  <div id="myDropdown" class="dropdown-content"></div>
                </div>
              </div>
            </div>
          </div>
          <div></div>
          <div class="row p-3" style="width: 100%;">
            <img src="images/in.png" class="center" style=" width: 10%; height:10% ; "><p><h4>(INDIA)</h4></p>
        </div>
          
          <div class="row stats-container">
            <div class="col-sm-12 col-md-12 col-lg-4 mb-2 mb-lg-0">
              <div
                class="card cases activemap"
               
              >
                <div class="card-body">
                  <div class="highlight_1"></div>
                  <h8 class="card-title">Total Cases</h8>
                  <h3 class="card-subtitle mb-2 total-number"></h3>
                  <h8 class="todays-cases"></h8>
                </div>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 mb-2 mb-lg-0">
              <div
              class="card recovered"
              
              >
                <div class="card-body">
                  <div class="highlight_2 "></div>
                  <h8 class="card-title">Recovered</h8>
                  <h3 class="card-subtitle mb-2 recovered-number"></h3>
                  <h8 class="todays-recoverd"></h8>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div
                class="card deaths"
               
              >
                <div class="card-body">
                  <div class="highlight_3"></div>
                  <h8 class="card-title">Deaths</h8>
                  <h3 class="card-subtitle mb-2 deaths-number"></h3>
                  <h8 class="todays-deaths"></h8>
                </div>
              </div>
            </div>
          </div>
          <br />

          <div></div>
          <div class="row p-3" style="width: 100%;">
            <img src="images/world.png" alt="world image" class="center" style=" width: 10%; height:10% ; "><p><h4>(World)</h4></p>
          </div>
          <div class="row stats-container">
            <div class="col-sm-12 col-md-12 col-lg-4 mb-2 mb-lg-0">
              <div
                class="card cases activemap"
                onclick=" toggleActive(this,'#666666',0,'cases')"
              >
                <div class="card-body">
                  <div class="highlight"></div>
                  <h8 class="card-title">Total Cases</h8>
                  <h3 class="card-subtitle mb-2 wo_total-number"></h3>
                  <h8 class="wo_todays-cases"></h8>
                </div>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 mb-2 mb-lg-0">
              <div
                class="card recovered"
                onclick=" toggleActive(this,'#B5E7AA',1,'recovered')"
              >
                <div class="card-body">
                  <div class="highlight"></div>
                  <h8 class="card-title">Recovered</h8>
                  <h3 class="card-subtitle mb-2 wo_recovered-number"></h3>
                  <h8 class="wo_todays-recoverd"></h8>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div
                class="card deaths"
                onclick=" toggleActive(this,'#F6595A',2,'deaths')"
              >
                <div class="card-body">
                  <div class="highlight"></div>
                  <h8 class="card-title">Deaths</h8>
                  <h3 class="card-subtitle mb-2 wo_deaths-number"></h3>
                  <h8 class="wo_todays-deaths"></h8>
                </div>
              </div>
            </div>
          </div>

          <div class="row map-container1 mt-3">
            <div class="col">
              <div class="map-container">
                <div class="refrest-container">
                  <i
                    onclick="refreash()"
                    class="fa fa-refresh refresh-btn"
                    aria-hidden="true"
                  ></i>
                </div>
                <div id="map"></div>
              </div>
            </div>
          </div>

          <div class="row chart-container mt-3">
            <div class="col bar-line-container">
              <div class="line-chart" style="width: 99%;">
                <canvas id="myChart" ></canvas>
              </div>
            </div>
          </div>
          
                <div class="row youtube-container mt-3">
                  <div class="col video-container">
                    <h3 style="text-align: center; margin-top: 10px;">Symthoms</h3>
                    <div class="row ">

                      <div class="col">
                         <img alt="Fever" src="https://www.gstatic.com/healthricherkp/covidsymptoms/light_fever.gif" 
                        height="55px" width="auto" >
                  <p><h4>Fever</h4></p>
                      </div>
                      <h1>|</h1>
        
                      <div class="col">
                        <img alt="Dry cough" src="https://www.gstatic.com/healthricherkp/covidsymptoms/light_cough.gif" 
                        height="55px" width="auto" >
                        <p><h4>Dry Cough</h4></p>
                      </div>
                    
                      <h1>|</h1>
                      <div class="col">
                        <img alt="Tiredness" src="https://www.gstatic.com/healthricherkp/covidsymptoms/light_tiredness.gif"
                         height="55px" width="auto">
                        <p><h4>Tiredness</h4></p>
                        </div>
                        
                        </div>
                    
                    <div class="video">
                      <iframe
                        width="99%"
                        height="400px"
                        src="https://www.youtube.com/embed/U8r3oTVMtQ0"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                      ></iframe>
                    </div>
                  </div>
                </div>
           


          <div class="car-container">
            <div
              id="carouselExampleIndicators"
              class="carousel slide"
              data-ride="carousel"
            >
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="images/image2.jpg"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="images/covid19web.jpg"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>

                <div class="carousel-item">
                  <img
                    src="images/image3.jpg"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>

                <div class="carousel-item">
                  <img
                    src="images/image4.png"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>

                <div class="carousel-item">
                  <img
                    src="images/image5.jpg"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>

              </div>
              <a
                class="carousel-control-prev"
                href="#carouselExampleIndicators"
                role="button"
                data-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Previous</span>
              </a>
              <a
                class="carousel-control-next"
                href="#carouselExampleIndicators"
                role="button"
                data-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-5 side-panel-container my-3">
          <div class="table-container">
            <table
              id="tip"
              title="Scroll to see more, or click to see on map "
              class="table"
            >
              <thead>
                <tr>
                  <th scope="col" class="hide">Flag</th>
                  <th
                    scope="col"
                    class="table-pointer"
                    onclick="sortNewTable('country',1);"
                  >
                    <span class="header-long">Country </span
                    ><span class="header-short">Loc </span>
                    <i class="fa fa-sort"></i>
                  </th>
                  <th
                    scope="col"
                    class="table-pointer"
                    onclick="sortNewTable('cases',2);"
                  >
                    Cases <i class="fa fa-sort"></i>
                  </th>
                  <th
                    scope="col"
                    class="table-pointer"
                    onclick="sortNewTable('recovered',3);"
                  >
                    <span class="header-long">Recovered </span
                    ><span class="header-short">Recov </span>
                    <i class="fa fa-sort"></i>
                  </th>
                  <th
                    scope="col"
                    class="table-pointer"
                    onclick="sortNewTable('deaths',4);"
                  >
                    Deaths <i class="fa fa-sort"></i>
                  </th>
                </tr>
              </thead>

              <tbody id="table-data"></tbody>
            </table>
          </div>
          
          <div class="pie-container">
            <div class="row p-3" style="width: 100%;">
              <img src="images/in.png" class="center" style=" width: 10%; height:10% ; "><p><h4>(INDIA)</h4></p>
            
              <canvas id="myPieChart"></canvas>
            </div>
          </div>


          <div><p><h4>WHO News-feed</h4></p> </div>
          <div class="news-container">
            <div><h3 id="heading"></h3></div>
            <div><h5 id="publishe-date"></h5></div>
            <i
              onclick="test(this,'news-feed')"
              class="fa fa-plus-circle open-close"
              aria-hidden="true"
            ></i>
            <div id="news-feed"></div>
          </div>
          <div class="news-container">
            <div><h3 id="heading2"></h3></div>
            <div><h5 id="publishe-date2"></h5></div>
            <i
              onclick="test(this,'news-feed2')"
              class="fa fa-plus-circle open-close"
              aria-hidden="true"
            ></i>
            <div id="news-feed2"></div>
          </div>
          <div class="news-container">
            <div><h3 id="heading3"></h3></div>
            <div><h5 id="publishe-date3"></h5></div>
            <i
              onclick="test(this,'news-feed3')"
              class="fa fa-plus-circle open-close"
              aria-hidden="true"
            ></i>
            <div id="news-feed3"></div>
          </div>

          <blockquote class="twitter-tweet">
            <p lang="en" dir="ltr">
              <a href="https://twitter.com/hashtag/IndiaFightsCorona?src=hash&amp;ref_src=twsrc%5Etfw">
                #IndiaFightsCorona</a><br><br>
                The onus is on us! Let us keep our surroundings 
                clean by regularly disinfecting commonly touched surfaces.
                <br> 
                <a href="https://twitter.com/hashtag/BadalkarApnaVyavaharKareinCoronaParVaar?src=hash&amp;ref_src=twsrc%5Etfw">
                  #BadalkarApnaVyavaharKareinCoronaParVaar</a> 
                  <a href="https://twitter.com/hashtag/TogetherAgainstCovid19?src=hash&amp;ref_src=twsrc%5Etfw">
                    #TogetherAgainstCovid19</a> <a href="https://t.co/sic9uv7tmM">
                      pic.twitter.com/sic9uv7tmM</a></p>&mdash; Ministry of Health (@MoHFW_INDIA) 
                      <a href="https://twitter.com/MoHFW_INDIA/status/1289477425928183808?ref_src=twsrc%5Etfw">
                        August 1, 2020</a></blockquote>
                        <a
                        href="https://twitter.com/intent/tweet?button_hashtag=covid&ref_src=twsrc%5Etfw"
                        class="twitter-hashtag-button"
                        data-show-count="false"
                        >Tweet #covid</a
                      >
                        <script
              async
              src="https://platform.twitter.com/widgets.js"
              charset="utf-8"
            ></script>
                  
         
          <div>
            <a
              class="twitter-timeline"
              data-height="500"
              href="https://twitter.com/TheStoryADDA"
              >Tweets by The Story Adda</a
            >
            
          </div>

          <script
            async
            src="https://platform.twitter.com/widgets.js"
            charset="utf-8"
          ></script>
         
          <script
            async
            src="https://platform.twitter.com/widgets.js"
            charset="utf-8"
          ></script>
        </div>
      </div>
    </div>
   
    
    
    <!--<div class="container">-->
    <!--    <p style ="color:#b8b894 ; ">Covid-19 Tracker Developed By- Vikas Chauhan</p>-->
    <!--</div>-->

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ7VvobsIYLr3Pe6cTNUnIUvzgpV2Na-o&callback=initMap"
      async
      defer
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <script src="listerer.js"></script>
    
  </body>
</html>
