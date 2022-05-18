<html>
<head>
<title>DATABASE Database</title>
<?php require_once('header.php'); ?>
</head>

<?php require_once('connection.php'); ?>
<title>DATABASE Database</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=georgia'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" href="../css/box.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/glowing.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/if.css">


    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="../js/html.js"></script>
    <script src="../js/hourglass.js"></script>
    <script src="../js/expand_jquery.js"></script>
    <script src="../js/briefcase.js" defer></script>
    <script src='../js/aesthetics.js' crossorigin='anonymous'></script>

<body class="">

<script src="../js/exchange.js"></script>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="advanced-employee.php">Users</a>
  <a href="etf-basic.php">ETF</a>
  <a href="mutual-fund-basic.php">Mutual Fund</a>
  <a href="option-basic.php">Option</a>
  <a href="cryptocurrency-basic.php">Cryptocurrency</a>
  <a href="exchange.php">Exchanges and Assets</a>
  <a href="temp.php">Market Index</a>
  <!-- <a class="right" href="logout.php">Log Out</a> -->
  <a class="color w3-text-teal;" href="logout.php" style="float: right; color:black;"> <bdi style="margin: 35px;">Log Out</bdi></a>
</div>

<!-- Page Container -->
<div class="w3-content w3-margin-top" 
style="max-width:1400px; background-color: white">

    <!-- The Grid -->
    <div class="w3-row-padding">
        
        <!-- Right Column -->

        <div >
            <h2 style="text-align: center;">Data Acquisition and Technical Analysis for Blanket Assessments of the Stock Exchange</h2>
            <br>



            <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
  {
  "colorTheme": "light",
  "dateRange": "ALL",
  "showChart": true,
  "locale": "en",
  "largeChartUrl": "",
  "isTransparent": false,
  "showSymbolLogo": true,
  "showFloatingTooltip": true,
  "width": "100%",
  "height": "660",
  "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
  "plotLineColorFalling": "rgba(41, 98, 255, 1)",
  "gridLineColor": "rgba(42, 46, 57, 0)",
  "scaleFontColor": "rgba(120, 123, 134, 1)",
  "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
  "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
  "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
  "tabs": [
    {
      "title": "Indices",
      "symbols": [
        {
          "s": "FOREXCOM:SPXUSD",
          "d": "S&P 500"
        },
        {
          "s": "FOREXCOM:NSXUSD",
          "d": "US 100"
        },
        {
          "s": "FOREXCOM:DJI",
          "d": "Dow 30"
        },
        {
          "s": "INDEX:NKY",
          "d": "Nikkei 225"
        },
        {
          "s": "INDEX:DEU40",
          "d": "DAX Index"
        },
        {
          "s": "FOREXCOM:UKXGBP",
          "d": "UK 100"
        }
      ],
      "originalTitle": "Indices"
    },
    {
      "title": "Futures",
      "symbols": [
        {
          "s": "CME_MINI:ES1!",
          "d": "S&P 500"
        },
        {
          "s": "CME:6E1!",
          "d": "Euro"
        },
        {
          "s": "COMEX:GC1!",
          "d": "Gold"
        },
        {
          "s": "NYMEX:CL1!",
          "d": "Crude Oil"
        },
        {
          "s": "NYMEX:NG1!",
          "d": "Natural Gas"
        },
        {
          "s": "CBOT:ZC1!",
          "d": "Corn"
        }
      ],
      "originalTitle": "Futures"
    },
    {
      "title": "Bonds",
      "symbols": [
        {
          "s": "CME:GE1!",
          "d": "Eurodollar"
        },
        {
          "s": "CBOT:ZB1!",
          "d": "T-Bond"
        },
        {
          "s": "CBOT:UB1!",
          "d": "Ultra T-Bond"
        },
        {
          "s": "EUREX:FGBL1!",
          "d": "Euro Bund"
        },
        {
          "s": "EUREX:FBTP1!",
          "d": "Euro BTP"
        },
        {
          "s": "EUREX:FGBM1!",
          "d": "Euro BOBL"
        }
      ],
      "originalTitle": "Bonds"
    },
    {
      "title": "Forex",
      "symbols": [
        {
          "s": "FX:EURUSD",
          "d": "EUR/USD"
        },
        {
          "s": "FX:GBPUSD",
          "d": "GBP/USD"
        },
        {
          "s": "FX:USDJPY",
          "d": "USD/JPY"
        },
        {
          "s": "FX:USDCHF",
          "d": "USD/CHF"
        },
        {
          "s": "FX:AUDUSD",
          "d": "AUD/USD"
        },
        {
          "s": "FX:USDCAD",
          "d": "USD/CAD"
        }
      ],
      "originalTitle": "Forex"
    },
    {
      "title": "ETF",
      "symbols": [
        {
          "s": "NASDAQ:MSFT"
        },
        {
          "s": "NASDAQ:AAPL"
        },
        {
          "s": "NASDAQ:AMZN"
        },
        {
          "s": "NASDAQ:INTC"
        },
        {
          "s": "NYSE:GME"
        },
        {
          "s": "NASDAQ:EBAY"
        },
        {
          "s": "NASDAQ:TSLA"
        }
      ]
    },
    {
      "title": "Mutual Fund",
      "symbols": [
        {
          "s": "FINRA:ATHX_SHORT_VOLUME"
        },
        {
          "s": "AMEX:XLE"
        },
        {
          "s": "AMEX:XLK"
        }
      ]
    },
    {
      "title": "Cryptocurrency",
      "symbols": [
        {
          "s": "INDEX:BTCUSD"
        },
        {
          "s": "COINBASE:ETHUSD"
        },
        {
          "s": "COINBASE:ADAUSD"
        },
        {
          "s": "FTX:SOLUSD"
        },
        {
          "s": "BINANCE:AVAXUSD"
        },
        {
          "s": "COINBASE:ALGOUSD"
        },
        {
          "s": "COINBASE:ETCUSD"
        },
        {
          "s": "BINANCE:SANDUSD"
        }
      ]
    }
  ]
}
  </script>
</div>
<!-- TradingView Widget END -->

<br><br>
    <h2 style="text-align: center;">Graphs and Analysis</h2>
            <br>


            <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="aapl.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">AAPL</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="msft.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">MSFT</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="googl.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">GOOGL</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="agthx.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">AGTHX</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="fxaix.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">FXAIX</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="vsmpx.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">VSMPX</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="btc.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">BTC</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="eth.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">ETH</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>

        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
            <a href="sol.php" style="text-decoration: none">
    <div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px">
    <div style="background: #fffff0" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <!-- <img src="../Images/option.png" style="width: calc(100px + 10%);"
                         alt="Masrik Dahir"> -->
                </div><bdi style="font-size: calc(10px + .5vw);">SOL</bdi></b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <ul>
                </ul>
            </div></div></a>
            </div>
        </div>


    </div>









<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

    <br><br>
    <h2 style="text-align: center;">Asset Categories and Charts </h2>
            <br>
            <a href="etf-basic.php" style="text-decoration: none"><div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px"><div style="background: whitesmoke" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <img src="../Images/etf.png" style="width: calc(50px + 5%);"
                         alt="Masrik Dahir">
                </div><br>ETF</b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <div style="font-size: 15px">Daily high price, low price, average price, and moving average charts</div>
                <ul>
                </ul>
            </div></div></a>

            <a href="mutual-fund-basic.php" style="text-decoration: none"><div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px"><div style="background: whitesmoke" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <img src="../Images/mutual_fund.png" style="width: calc(50px + 5%);"
                         alt="Masrik Dahir">
                </div><br>Mutual Fund</b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <div style="font-size: 15px">Net Asset Value, Dividend, and moving average charts</div>
                <ul>
                </ul>
            </div></div></a>
            <a href="cryptocurrency-basic.php" style="text-decoration: none"><div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px"><div style="background: whitesmoke" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <img src="../Images/cryptocurrency.png" style="width: calc(90px + 5%);"
                         alt="Masrik Dahir">
                </div><br>Cryptocurrencies</b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <div style="font-size: 15px">Price, Total Supply, and Market Cap</div>
                <ul>
                </ul>
            </div></div></a>

            <a href="option-basic.php" style="text-decoration: none"><div class="glow-on-hover3 Blazing" type="button" style="margin-top: min(calc(1px + 2vw), 10px); margin-left: 10px"><div style="background: whitesmoke" class="w3-container">
                <h2><b style="color: black"><div class="wrapper">
                    <img src="../Images/option.png" style="width: calc(50px + 5%);"
                         alt="Masrik Dahir">
                </div><br>Options</b>
                    <b class="color w3-text-teal;" style="float: right; color:DarkSlateGray;"> <bdi style="font-size: calc(10px + .5vw);">  </bdi></b></h2>
                <div style="font-size: 15px">Expiration Dates and Strike Prices for Puts and Calls</div>
                <ul>
                </ul>
            </div></div></a>

            <br>

        </div>
        

        <!-- End Grid -->
    </div>


    <!-- End Page Container -->
</div>
<br>
<br>
</div>
<footer class="w3-center w3-margin-top;" style="width: 100%">
  <div style="color:#FFFAFA;background-color:#000000">
    <p style="padding-top: 15px; font-size:25px"></p>
    <a href="https://www.masrikdahir.com/" style="text-decoration: none;" target="blank"><bdi style="font-size:20px" class='w3-hover-opacity'>&lt;Masrik Dahir&gt;</bdi></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="https://github.com/nguyenvt35" style="text-decoration: none;" target="blank"><bdi style="font-size: 20px" class='w3-hover-opacity'>&lt;Vivian Nguyen&gt;</bdi></a>
    <br>
    <br>

  </div>

</footer>



</body>

</html>