<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0ZCzt1AQR9XC5AxmzhPfcGfUVw2agbMk&libraries=places"></script>
 </head>
<body>
    <?php 

   //require 'ApiCalls.php'; 


//   $get_data = callAPI('GET','http://api.openweathermap.org/data/2.5/weather?q=Delhi,India&APPID=c9a90ff4fba57b0aea106922863cf618', false); //die();
// //   //print_r($get_data);
//     $response = json_decode($get_data, true);
// // //         $countryList=getCountryData();
//  echo '<pre>';print_r($response);die();

//       if($_REQUEST['selected_country']!=""){
// //        $result=findAddress($_REQUEST['selected_country']);
//        //echo "<pre>"; print_r($result);
//       }  


    ?>
    <form action="" method="get" id="frm">
    <div id="app">
        <div class="map-icon">
            <ul>
                <li onclick="openModal(1)"><img src="./images/sunset.gif" alt=""></li>
                <li onclick="openModal(2)"><img src="./images/globe.gif" alt=""></li>
                <li onclick="openModal(3)" title="Weather"><img src="./images/clouds.png" alt=""></li>
                <li onclick="openModal(4)" title="Currency Exchange"><img src="./images/currency_ex.jpg" alt="Currency Exchange"/></li>
                 <li onclick="openModal(5)"><img src="./images/wiki.jpeg" alt=""/></li>
            </ul>
        </div>
        <div class="row">
            <div class="map-dropdown col-md-4">
            <select name="selected_country" v-model="selected_country" id="placeDropdown" class="form-control  form-select" onchange="geocodeSelectedPlace(this.value)">
                <option value="">Select a country</option>
               
            </select>
        </div>
        </div>

        <div id="map" style="width: 100%; height: 100vh;"></div>
      
        <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal"></button>
                    </div>
                    <div class="modal-body">

                        <div class="data-box" v-if="modalId == 3" id="boxmodalId3">
                            <h4>Today</h4>
                            <div class="information">
                                <div>
                                    <h4>Sun Rise</h4>
                                </div>
                                <div>
                                    <img src="./images/sunrise.gif" alt="">
                                </div>
                                <div>
                                    <h4 class="temp" id="temp3"></h4>
                                </div>
                            </div>
                        </div>

                        <div class="data-box" v-if="modalId == 2" id="boxmodalId2">
                            <h4>Today</h4>
                            <div class="information">
                                <div>
                                    <h4>Sun Set</h4>
                                </div>
                                <div>
                                    <img src="./images/sunset.gif" alt="">
                                </div>
                                <div>
                                    <h4 class="temp" id="temp2"></h4>
                                </div>
                            </div>
                        </div>

                        

                        <div class="cloud-calender" v-if="modalId == 1" id="modalId1">
                            <table class="table table-bordered">
                              
                                <tbody>
                                    <tr>
                                        <th>Country Name</th>
                                        <td id="modalId1_country"></td>
                                    </tr>
                                    <tr>
                                        <th>Continent</th>
                                        <td id="modalId1_continent"></td>
                                    </tr>
                                    <tr>
                                        <th>Country code</th>
                                        <td id="modalId1_country_code"></td>
                                    </tr>
                                    <tr>
                                        <th>Geometry</th>
                                        <td id="modalId1_lng"></td>
                                    </tr>
                                    <tr>
                                        <th>Timezone</th>
                                        <td id="modalId1_short_name"></td>
                                    </tr>
                                    <tr>
                                        <th>Currency  Name</th>
                                        <td id="modalId1_name"></td>
                                    </tr>
                                    <tr>
                                        <th>Currency  Symbol</th>
                                        <td id="modalId1_iso_code"></td>
                                    </tr>
                                    <tr>
                                        <th>Calling code</th>
                                        <td id="modalId1_callingcode"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 

                      <!--   <div class="cloud-calender" v-if="modalId == 2" id="modalId2">
                            <div class="cloud-box">
                                <p class="date">Today</p>
                                <img src="./images/sunny.png" alt="">
                                <p id="modalId2_date_Apparent">{</p>
                                <p class="type">Apparent <br> Time</p>
                            </div>
                            <div class="cloud-box">
                                <p class="date">Today</p>
                                <img src="./images/sunny.png" alt="">
                                <p d="modalId2_date_astronomical"></p>
                                <p class="type">Astronomical <br> Time</p>
                            </div>
                            <div class="cloud-box">
                                <p class="date">Today</p>
                                <img src="./images/sunny.png" alt="">
                                <p id="modalId2_date_civil"></p>
                                <p class="type">Civil <br> Time</p>
                            </div>
                            <div class="cloud-box">
                                <p class="date">Today</p>
                                <img src="./images/sunny.png" alt="">
                                <p id="modalId2_date_Nautical"></p>
                                <p class="type">Nautical <br> Time</p>
                            </div>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
         <div class="modal" id="currencyModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Currency Converter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                          <div class="modal-body well">
                               <div class="row">
                                <div class="col-md-12">
                                
                                <div class="input-group mb-3">
                                  <span class="input-group-text" id="basic-addon1">Amount</span>
                                   <input type="number" class="form-control" id="number" placeholder="00000">
                                </div>
                                </div>
                               </div> 
                             <div class="row">
                               
                                <div class="col-md-6">
                                  <div class="input-group mb-3">
                                    <select name="currency" id="currencyOption" class="currency form-select" onchange="updatevalue()">
                                      
                                    </select>
                                  </div>
                                </div>
                                  <div class="col-md-6">
                                  <div class="input-group mb-3">
                                    <select name="currency" id="currencyOption2" class="currency form-select" onchange="updatevalue()">
                                        
                                    </select>
                                  </div>
                              </div>

                             
                              </div>
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Exchange Amount</span>
                          
                                      <input type="text" class="form-control" id="output" placeholder="00000" disabled>
                                  </div>
                                </div>
                              
                                </div>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
            </div>
        </div>
        <div class="modal" id="weatherModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Today Weather</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container">

                        <div class="row d-flex justify-content-center align-items-center">
                          <div class="col-md-10">

                            <div class="card" style="color: #4B515D; border-radius: 35px;">
                              <div class="card-body">

                                <div class="d-flex">
                                  <h6 class="flex-grow-1" id="weatherLocation">Warsaw</h6>
                                  <h6 id="weatherStartTime">15:07</h6>
                                </div>

                                <div class="d-flex flex-column text-center mt-5 mb-4">
                                  <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;" id="weatherTemp"> 13°C </h6>
                                  <span class="small" style="color:#868B94" id="weatherTypeId">Stormy</span>
                                </div>

                                <div class="d-flex align-items-center">
                                  <div class="flex-grow-1" style="font-size: 1rem;">
                                    <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1" id="weatherSpeed"> 40 km/h
                                      </span></div>
                                    <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1" id="weatherPercentage"> 84% </span>
                                    </div>
                                    <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1" id="weatherTiming"> 0.2h </span>
                                    </div>
                                  </div>
                                  <div>
                                    <img src="images/rain.gif"
                                      width="100px">
                                  </div>
                                </div>

                              </div>
                            </div>

                          </div>
                        </div>

                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  
                </div>
              </div>
        </div>
    </div>
         <div class="modal" id="WikiModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Wiki Pedia Links</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group p-4">
                        <input type="text" placeholder="Search ..." id="search" oninput=" getWikiList(this.value)">
                    </div>
                    <div id="linkData" class="text-center"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
        </div>

         <div class="modal" id="ContryInfoModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> Country Population</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    
                    <div id="linkData">
                        <ul style="list-style: none;" id="population" class="list-group">
                                <li id="one" class="list-group-item"></li>
                                <li id="two" class="list-group-item"></li>
                                <li id="three" class="list-group-item"></li>      
                                <li id="four" class="list-group-item"></li>
                                <li id="five" class="list-group-item"></li>
                        </ul>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
        </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/1.30.1/date_fns.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script> -->
 <script>
   if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;
                        // Now you can use the latitude and longitude to call geocodeSelectedPlace
                        var location = latitude + ',' + longitude;
                        console.log('postion init');
                         getCountryList('India');
                         geocodeSelectedPlace(location);
                      
    }.bind(this), function(error) {
        console.error("Error getting user's location: " + error.message);
    });
}

    function geocodeSelectedPlace(placeName) {
        //document.querySelector("#frm").submit();

             $.ajax({
            data:'selectedPlace='+placeName,    
            url: "api/mapData.php",
            async: true,
            type:'post',
            //dataType: 'json',
            success: function (data) {
             
              var mapDataRep=JSON.parse(data);
              var locations = [];
              this.geoData=mapDataRep[0];

              mapDataRep.forEach((item,key)=>{
                locations.push([item.formatted,item.geometry.lat,item.geometry.lng,key]);
              })


              console.log(locations);
                console.log(mapDataRep);
                  const mapOptions = {
                        center: {
                            lat: this.geoData.geometry.lat,
                            lng: this.geoData.geometry.lng
                        },
                        zoom: 6
                        };
                        //setCountryToSelect(this.geoData.components.country);
                        var infowindow = new google.maps.InfoWindow();
                         var marker, i;
                           this.map = new google.maps.Map(document.querySelector('#map'), mapOptions);
                      
                        if(mapDataRep.length>0){

                            for( i = 0; i < locations.length; i++ ) {
                                 marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: this.map,
                                  });
                                  
                                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                      infowindow.setContent(locations[i][0]);
                                      infowindow.open(this.map, marker);
                                    }
                                  })(marker, i));
                          
                            }

                        }

                        document.querySelector("#exampleModalLabel").innerText=this.geoData.components.country+","+this.geoData.components.continent;
                        document.querySelector("#temp3").innerText=getFormattedTime(this.geoData.annotations?.sun?.rise?.civil);
                        document.querySelector("#temp2").innerText=getFormattedTime(this.geoData?.annotations?.sun?.set?.civil);
                         document.querySelector("#modalId1_country").innerText=this.geoData?.components?.country;
                         document.querySelector("#modalId1_continent").innerText=this.geoData?.components?.continent;
                         document.querySelector("#modalId1_country_code").innerText=this.geoData?.components?.country_code;
                         document.querySelector("#modalId1_lng").innerText=`${this.geoData?.geometry?.lat} ,${this.geoData?.geometry?.lng}`;
                         document.querySelector("#modalId1_short_name").innerText=`${this.geoData?.annotations?.timezone?.name} (${this.geoData?.annotations?.timezone?.short_name})`;
                        document.querySelector("#modalId1_name").innerText=this.geoData?.annotations?.currency.name;
                        document.querySelector("#modalId1_iso_code").innerText=`${this.geoData?.annotations?.currency.symbol } / ${this.geoData?.annotations?.currency.iso_code }`
                        document.querySelector("#modalId1_callingcode").innerText=`${this.geoData?.annotations?.callingcode }`;

                        
                        // document.querySelector("#modalId2_date_Apparent").innerText=`${getFormattedTime(this.geoData?.annotations?.sun?.set?.apparent)}`
                        // document.querySelector("#modalId2_date_astronomical").innerText=`${getFormattedTime(this.geoData?.annotations?.sun?.set?.astronomical)}`;
                        // document.querySelector("#modalId2_date_civil").innerText=
                        // `${getFormattedTime(this.geoData?.annotations?.sun?.set?.civil)}`;
                        //  document.querySelector("#modalId2_date_Nautical").innerText=`${getFormattedTime(this.geoData?.annotations?.sun?.set?.nautical)}`;

                        //  document.querySelector("#modalId3_date_Apparent").innerText=`${getFormattedTime(this.geoData?.annotations?.sun?.set?.apparent)}`
                        // document.querySelector("#modalId3_date_astronomical").innerText=`${getFormattedTime(this.geoData?.annotations?.sun?.set?.astronomical)}`;
                        // document.querySelector("#modalId3_date_civil").innerText=
                        // `${getFormattedTime(this.geoData?.annotations?.sun?.set?.civil)}`;
                        //  document.querySelector("#modalId3_date_Nautical").innerText=`${getFormattedTime(this.geoData?.annotations?.sun?.set?.nautical)}`
                      
                       
                        
             
            }
          });  

                  
                }
     
     function getCountryList(placeName){
             $.ajax({
            data:'selectedPlace='+placeName,    
            url: "api/countryData.php",
            async: true,
            type:'get',
            //dataType: 'json',
            success: function (data) {
             
              var countryData=JSON.parse(data);
              var dropdownHtml=document.getElementById('placeDropdown');

             
                for (let key in countryData) {
                  let option = document.createElement("option");
                  option.setAttribute('value', countryData[key]);
                  if(countryData[key]==placeName){
                    option.setAttribute('selected',true);
                  }
                  let optionText = document.createTextNode(countryData[key]);
                  option.appendChild(optionText);

                  dropdownHtml.appendChild(option);
                }

             }
             
             }) 
     }
      function getFormattedTime(unixTimestamp) {
                    const date = new Date(unixTimestamp * 1000); // Convert to milliseconds
                    const hours = date.getHours();
                    const minutes = date.getMinutes();
                    //console.log(date.getTime());
                    const amPm = hours >= 12 ? 'PM' : 'AM'; // Determine if it's AM or PM
                    const formattedHours = hours % 12 || 12; // Convert 0 to 12 for 12-hour format
                    const formattedMinutes = minutes.toString().padStart(2, '0'); // Ensure minutes are two digits
                    return `${formattedHours}:${formattedMinutes} ${amPm}`;
                }        
    
      function openModal(modalId) {
                     
                    console.log(modalId);
                    this.modalId = modalId;
                    if(modalId===1){
                     $('#weatherModal').modal('hide'); 
                      $('#currencyModal').modal('hide');  
                       $('#WikiModal').modal('hide');  
                       $('#ContryInfoModal').modal('hide');
                      $('#exampleModal').modal('show');    
                      $('#modalId'+modalId).css({display:"inline-flex"});
                    }else if(modalId===2){
                         $('#exampleModal').modal('hide');    
                      $('#currencyModal').modal('hide');  
                     $('#WikiModal').modal('hide');  
                      $('#weatherModal').modal('hide'); 
                         var dropdownHtml=document.getElementById('placeDropdown').value;
                        getCountryInfo(dropdownHtml);
                       
                    }else if(modalId===3){
                      $('#exampleModal').modal('hide');    
                      $('#currencyModal').modal('hide');  
                     $('#WikiModal').modal('hide');  
                      $('#weatherModal').modal('show'); 
                       $('#ContryInfoModal').modal('hide');
                        $.ajax({
                            data:'location='+document.getElementById('placeDropdown').value,    
                            url: "api/weatherData",
                            async: true,
                            type:'post',
                            //dataType: 'json',
                            success: function (data) {
                                //console.log(data);
                                const response=data.response_data;
                               setWeatherData(response);


                            }
                        })
                    }else if (modalId===4){
                      $('#weatherModal').modal('hide'); 
                      $('#exampleModal').modal('hide');  
                       $('#WikiModal').modal('hide');  
                       $('#currencyModal').modal('show');
                        $('#ContryInfoModal').modal('hide');
                        getCurrenyList();
                    }else if (modalId===5){
                     $('#weatherModal').modal('hide'); 
                      $('#exampleModal').modal('hide');  
                       $('#WikiModal').modal('show');  
                      $('#currencyModal').modal('hide');
                       $('#ContryInfoModal').modal('hide');
                       
                    }else{
                            $('#modalId2,#modalId3').css({display:"inline-flex"});    
                    }
                   

                 

        }
     function getWikiList(){
          $.ajax({
                           data:'title='+document.getElementById('search').value,    
                            url: "api/wikiLinks",
                            async: true,
                            type:'post',
                            //dataType: 'json',
                            beforeSend:function(){
                                document.getElementById("linkData").innerText="Wait..."
                            },
                            success: function (data) {
                                console.log(data);
                                document.getElementById("linkData").innerHtml="";

                            }
                        })    

     }     
     function getCurrenyList(){
                        $.ajax({
                           // data:'location='+document.getElementById('placeDropdown').value,    
                            url: "api/currencyList",
                            async: true,
                            type:'get',
                            //dataType: 'json',
                            success: function (data) {
                                console.log(data);
                                const response=data.response_data;
                                var optionData=document.getElementById('currencyOption');
                                var optionData2=document.getElementById('currencyOption2');
                                
                                const currenyArray=[];
                                
                                 const keys=Object.keys(response);
                                let i=0;
                                for(let key of keys){
                                  currenyArray.push({code:key,name:response[key]});  
                                    i++; 
                                }
                                currenyArray.forEach((item,key)=>{
                                  let option = document.createElement("option");
                                  option.setAttribute('value', item.code);
                                   let optionText = document.createTextNode(item.name);
                                  option.appendChild(optionText);
                                
                                  let option2 = document.createElement("option");
                                  option2.setAttribute('value', item.code);
                                 
                                  let optionText2 = document.createTextNode(item.name);
                                  option2.appendChild(optionText2);

                                  optionData.appendChild(option); 
                                  optionData2.appendChild(option2);
                                })
                                
                               

                            }
                        })
     }   
    function setWeatherData(response){
                                document.getElementById('weatherLocation').innerText=response.name;

                               // SimpleDateFormat simpleDateFormat = new SimpleDateFormat("hh:mm:ss");
                               
                                var timestamp=new Date(response.dt).getTime();
                                const value = dateFns.format(dateFns.parse(response.dt, "yyyy-MM-dd HH:mm:ss"),'h:mm a');
                                console.log(value);
                                //var convertTime=mydt.getHours()+':'+mydt.getMinutes();
                                document.getElementById('weatherStartTime').innerText=value;
                                document.getElementById('weatherTemp').innerText=`${response.main.temp} K `;
                                //(Range${response.main.temp_min} To ${response.main.temp_max})
                                document.getElementById('weatherTypeId').innerText=`${response.weather[0].main}  (${response.weather[0].description})`;
                                document.getElementById('weatherSpeed').innerText=`${response.wind.speed} meter/sec`;
                                document.getElementById('weatherPercentage').innerText=`${response.clouds.all} %`;
                                if(response.wind.gust!=undefined){
                                document.getElementById('weatherTiming').innerText=`${response.wind.gust} meter/sec`;
                                }
                                  $('#weatherModal').modal('show');
    }    
    function updatevalue() {
      let currency1 = document.getElementById('currencyOption').value;
      let currency2 = document.getElementById('currencyOption2').value;

      let value = number.value;


      if (currency1 != currency2) {
        convert(currency1, currency2, value);
      } else {
        alert("Choose Diffrent Currency");
      }
    }
    function convert(currency1, currency2, value){
        
          $.ajax({
                data:'amount='+value+'&currency1='+currency1+'&currency2='+currency2,   
                url: "api/currencyConvert",
                async: true,
                type:'post',
                //dataType: 'json',
                success: function (data) {
                    console.log(data);
                    document.getElementById('output').value=data.response_data.rates[currency2];
                }
            });          
    }
    function getCountryInfo(countryName){
        
          $.ajax({
                data:'name='+countryName,   
                url: "api/countryInfo",
                async: true,
                type:'post',
                //dataType: 'json',
                beforeSend:function(){
                    document.querySelector('#one').innerText='Wait..';
                },
                success: function (data) {
                    var response=data.response_data;
               
                     console.log(response.name);
                    $("#one").text(`Capital :${response.capital}`);
                     $("#two").text(`Population :${response.population}`);
                      $("#three").text(`Area :${response.area}`);
                    $("#five").text(`Region :${response.region} Sub Region:${response.subregion}`);
                       $("#four").html('Flag &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:100px" src="'+response.flags.png+'"/>');
                       
                      
                     $('#ContryInfoModal').modal('show');
                     

                }
            });          
    }
    
    function closeModal() {
                    $('#exampleModal').modal('hide');
                    $('#modalId2,#modalId3,#modalId1').css({display:"block"});    
                }

    </script>

</body>
</html>
