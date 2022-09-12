<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @include('racing.racing-header')  
            <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
            <link rel="stylesheet" href="{{ asset('css/photo.css') }}">
            <link rel="stylesheet" href="{{ asset('css/ranking.css') }}">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div  style="text-align:center;margin-right:1px">
              @foreach($series as $seriess)
              @if($commit==1)
                @if($state->rss_id==3)
                  @if($record==0)
                    <a class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 border border-slate-300 rounded-md shadow-sm outline outline-2 outline-offset-2 outline-indigo-500 dark:bg-slate-700 dark:text-slate-200 dark:border-transparent  " href="{{route('racing-seriesindex-record',$seriess->rs_id)}}">Upload record</a>
                  @else
                    <font color="green;">All the race are finished</font>
                  @endif
                @else
                <font color="red"><a href="{{route('racing-series-index')}}" target="_blank">Please confirm the race series information at series page to unlock create recond buttom </a></font>
                @endif
              @endif
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">

                <!-- tab module -->
                    <section class="ns-TabsModule" data-active-tab="A">
                    
                        <!-- horizontal scroll wrapper -->
                        <div class="ns-ScrollWrapper">
                        <!-- tab nav -->
                        <nav class="ns-TabNav">
                            <a href="#ns-TabPanelD" class="ns-TabNav_Link" data-tab="D"><span>Introduction</span></a>
                            <a href="#ns-TabPanelA" class="ns-TabNav_Link" data-tab="A"><span>schedule</span></a>
                            <a href="#ns-TabPanelB" class="ns-TabNav_Link" data-tab="B"><span>cars</span></a>
                            <a href="#ns-TabPanelC" class="ns-TabNav_Link" data-tab="C"><span>Standing</span></a>
                            <a href="#ns-TabPanelE" class="ns-TabNav_Link" data-tab="E"><span>detail</span></a>
                            <span class="ns-TabNav_Indicator"></span>
                        </nav><!-- /.ns-TabNav -->
                        </div><!-- /.ns-ScrollWrapper -->
                        
                        <!-- tab panels -->
                        
                        <div class="ns-TabPanels">
                        

                        <div class="ns-TabPanel" id="ns-TabPanelA" data-tab-panel="A">
                            <section class="purchase" id="buy-now">
                                <div class="container">
                                    <h1 style="font-size:35px;">Map and Schedule</h1>
                                    @if($record==0)
                                      <ul>
                                        <h1 style="font-size:15px;">Upcoming Race:</h1> 
                                      @foreach($tracknnf as $tracknnfs)
                                        
                                      <li>   
                                        <a href="{{route('racing-trackindex-detail',$tracknnfs->m_id)}}" target="_blank">
                                          @if($trackcrr->m_id == $tracknnfs->m_id)
                                          <strong style="color:orange;">[Current Race ]</strong>
                                          @else
                                          <strong>[SCHEDULE {{ $loop->iteration}}  ]</strong>
                                          @endif
                                        <br>
                                          <strong>{{$tracknnfs->m_name}}</strong>
                                          <br>
                                          <img src="/trackimage/{{$tracknnfs->m_photoname}}" width="400px"  height="200px" alt="" />
                                        </a>
                                      </li>     
                                      @endforeach
                                      </ul>     
                                   @endif
                                  
                                    <ul>
                                      <h1 style="font-size:15px;">Finished Race:</h1> 
                                    @foreach($tracknlr as $key =>$tracknlrs)
                                    <li>   
                                        <strong>[Finished SCHEDULE {{ $loop->iteration}}  ]</strong>
                                        <br>
                                        <strong><a href="{{route('racing-trackindex-detail',$tracknlrs->m_id)}}" target="_blank">{{$tracknlrs->m_name}}</strong>
                                        <br>
                                        <div align="left">
                                          <p style="font-size:20px; display:inline; ">Result:</p>
                                        </div>
                                        @php($rank=0)
                                        @foreach($history as $historys)
                                          @if($historys->m_id==$tracknlrs->m_id)
                                          @php($rank=$rank+1)
                                          <div align="left">
                                            {{$rank}}. <p style="font-size:15px; display:inline; text-align: right;">{{$historys->rh_time}}</p> 
                                            &nbsp;&nbsp;
                                            <a href="" style="font-size:12px;" >{{$historys->c_name}}</a>
                                          </div>
                                          @endif
                                        @endforeach


                                        <a href="{{route('racing-trackindex-detail',$tracknlrs->m_id)}}" target="_blank"><img src="/trackimage/{{$tracknlrs->m_photoname}}" width="400px"  height="200px" alt="" /></a>
                                    </li>     
                                    @endforeach     
                                    </ul>   
                                   
                                </div>
                            </section>
                        </div>

                        <div class="ns-TabPanel" id="ns-TabPanelB" data-tab-panel="B">
                            <section class="purchase" id="buy-now">
                                <div class="container">
                                    <h1 style="font-size:35px;">Drivers and cars</h1>
                                    <ul>
                                    @foreach($car as $cars)
                                    <li>   
                                        <strong>[{{$cars->d_num}}]{{$cars->d_name}}</strong>
                                        <br>
                                        <strong>{{$cars->c_name}}</strong>
                                        <img src="/carimage/{{$cars->c_photoname}}" width="400px"  height="200px" alt="" />
                                    </li>     
                                    @endforeach     
                                    </ul>   
                                </div>
                            </section>
                        </div>
                        <div class="ns-TabPanel" id="ns-TabPanelC" data-tab-panel="C">
                            @foreach($ranking as $key=> $rankings)
                            <div class="leaderboard">
                                <img src="/carimage/{{$rankings->c_photoname}}"width="600px"  height="200px" >
                                <p class="leaderboardname" width="400px"  height="200px">
                                    @if($key==0)
                                    #1 
                                    @elseif($key==1)
                                    #2
                                    @elseif($key==2)
                                    #3
                                    @endif
                                    <a href="{{route('racing-driverindex-detail',$rankings->d_id)}}" target="_blank">[{{$rankings->d_num}}]{{$rankings->d_name}}</a>
                                </p>
                                
                                <p class="sendscore">  {{$rankings->c_name}}</p>
                                <p class="sendscore">Score:{{$rankings->rs_tsource}}</p>
                            </div>
                            @endforeach   
                             
                            </div>
                        </div>
                        <div class="ns-TabPanel" id="ns-TabPanelD" data-tab-panel="D">
                          <h1 style="font-size:50px;">{{$seriess->rs_name}}</h1>
                          <img  style="display:block; margin:auto;" src="/seriesimage/{{$seriess->rs_photoname}}" width="1500px"  height="900px" alt="" />
                        </div>
                        <div class="ns-TabPanel" id="ns-TabPanelE" data-tab-panel="e">
                          <div class="card mb-5">
                            
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                <th>Track</th>
                                                <th>Driver</th>
                                                <th>Car</th>
                                                <th>Time</th>
                                                <th>Source</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($tracknlr as $tracknls)
                                                <tr>
                                                  <th>{{$tracknls->m_name}}</th>
                                                </tr>
                                                  @foreach($history as $historys)
                                                    @if($tracknls->m_id == $historys->m_id)  
                                                    <tr>
                                                      <th>{{$historys->rs_source}}</th>
                                                      <th>{{$historys->d_name}}</th>
                                                      <th>[{{$historys->c_sname}}]{{$historys->c_name}}</th>
                                                      <th>{{$historys->rh_time}}</th>
                                                      <th>{{$historys->rssgs_s}}</th>
                                                    </tr>
                                                    @endif
                                                  @endforeach
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                          </div>
                        </div>
                        @endforeach
                        </div><!-- /.ns-TabPanels -->
                        
                    </section><!-- /.ns-TabsModule -->
                
                    
            </div>
        </div>
    </div>
<script>
    "use strict";
//tab menu w/tab panel behaviour
//still learning. be kind.

//get tabs module parent
var tabsModule = document.body.querySelector(".ns-TabsModule");
//get tab nav
var tabNavList = document.body.querySelector(".ns-TabNav");
//get all tab nav links
var tabNavLinks = document.querySelectorAll(".ns-TabNav_Link");
//get tab nav current nav link indicator
var tabNavCurrentLinkindicator = tabNavList.querySelector(
  ".ns-TabNav_Indicator"
);
//get all tab panels
var tabPanels = document.querySelectorAll(".ns-TabPanel");
//show tab panel A first because panel A nav link has indicator on page load
document.getElementById("ns-TabPanelA").style.display = "block";

/**
 * position indicator function
 */
function positionIndicator() {
  //get left position of tab nav ul
  var tabNavListLeftPosition = tabNavList.getBoundingClientRect().left;
  //get tab module parent current data value
  var tabsModuleSectionDataValue =
    tabsModule.getAttribute("data-active-tab") || "A";
  //get nav link span with data value that matches current tab module parent data value
  var tabNavCurrentLinkText = tabNavList.querySelector(
    "[data-tab='" + tabsModuleSectionDataValue + "'] span"
  );
  //get dimensions of current nav link span
  var tabNavCurrentLinkTextPosition = tabNavCurrentLinkText.getBoundingClientRect();
  //set indicator left position via CSS transform
  //current nav link span left position - tab nav ul left position
  //prefix me for live
  tabNavCurrentLinkindicator.style.transform =
    "translate3d(" +
    (tabNavCurrentLinkTextPosition.left - tabNavListLeftPosition) +
    "px,0,0) scaleX(" +
    tabNavCurrentLinkTextPosition.width * 0.01 +
    ")";
}

/**
 * hide all tab panels function
 */
function hideAllTabPanels() {
  //loop through all tab panel elements
  for (i = 0; i < tabPanels.length; i++) {
    //remove style attribute from all tab panels to hide them
    tabPanels[i].removeAttribute("style");
  }
}

/**
 * tab nav link function
 * tab nav link event displays matching tab panel,
 * and positions current tab nav link indicator
 */
var tabNavLinkEvent = function () {
  //get this link data value
  var thisLink = this.getAttribute("data-tab");
  //get this link href value
  var thisHref = this.getAttribute("href");
  //get tab panel element with ID that matches this link href value
  var thisTabPanel = document.querySelector(thisHref);
  //set tab module parent data to this link data value
  tabsModule.setAttribute("data-active-tab", thisLink);
  //fire hide all tab panels function
  hideAllTabPanels();
  //get tab panel element with ID that matches this link href value and set its style to show it
  thisTabPanel.style.display = "block";
  //fire the position indicator function
  positionIndicator();
};

/**
 * attach tabNavLinkEvent to all tab nav links
 * loop through all nav links and add event
 * need to change to parent element and use e.target maybe
 */
for (var i = 0; i < tabNavLinks.length; i++) {
  //for each nav link, add click event that fires tab nav link click event function
  tabNavLinks[i].addEventListener("click", tabNavLinkEvent, false);
}

/**
 * should really position indicator from parent left edge rather than body,
 * to keep indicator in position on resize. meh
 * for now, here's a quick win because i'm tired
 * https://developer.mozilla.org/en-US/docs/Web/Events/resize
 */
(function () {
  //someone smarter than me "debounce" code
  var resizeTimeout;
  function resizeThrottler() {
    if (!resizeTimeout) {
      resizeTimeout = setTimeout(function () {
        resizeTimeout = null;
        actualResizeHandler();
      }, 66);
    }
  }
  //function to fire after resize timeout delay
  function actualResizeHandler() {
    //fire the position indicator function
    positionIndicator();
  }
  //window resize event
  window.addEventListener("resize", resizeThrottler, false);
})();

/**
 * fire position indicator function right away
 */
positionIndicator();

//this is old code
//make your own from this for the fun of it :)
//p.s. i'm getting better.

/**
 * listen to nick drake for peace of mind
 */

    </script>

</x-app-layout>