<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café ordrer</title>
    <script type="text/javascript" src="SalgV4.js"></script>
	<link href="Main_CSS.css" rel="stylesheet" type="text/css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	
</head>

<body>
	<div class="nav-bar">
		<nav>
			<img src="SVG/HyggeUdvalg_Logo.svg" class="logo" alt="Hygge Udvalg Logo">
		</nav>
	</div>

    <h1>Hygge udvalg café ordrer</h1>
	<div class="container">
        <div class="vare-box">
            <h4>Snacks</h4>
            <div class="row">
		        <div class="col" >
            	    <p>Sour Cream &amp;&nbsp;Onion</p>
            	    <p>16 kr.</p>
                    <h4 id="SCOC-Counter">0</h4>
                    <div class="item-buttons">
            	        <button class="minus deactive" id="SCOC-minus" onClick="saveData('SCAO',-1,3,-16)">-</button>
                        <button class="plus" onClick="saveData('SCAO',1,3,16)">+</button>
                    </div>
                </div>
                <div class="col" >
                    <p>American Grill</p>
                    <p>16 kr.</p>
                    <h4 id="AGC-Counter">0</h4>
                    <div class="item-buttons">
                        <button class="minus deactive" id="AGC-minus" onClick="saveData('AmericanGrill',-1,4,-16)">-</button>
                        <button class="plus" onClick="saveData('AmericanGrill',1,4,16)">+</button>
                    </div>
                </div>
                <div class="col" >
                    <p>Barbecue</p>
                    <p>16 kr.</p>
                    <h4 id="BBQ-Counter">0</h4>
                    <div class="item-buttons">
                        <button class="minus deactive" id="BBQ-minus" onClick="saveData('Barbecue',-1,5,-16)">-</button>
                        <button class="plus" onClick="saveData('Barbecue',1,5,16)">+</button>
                    </div>
                </div>
            </div>
            <h4>Drikkevare</h4>
            <div class="row">
		        <div class="col" >
            	    <p>Coca Cola</p>
                    <h4 id="Cola-Counter">0</h4>
                    <div class="item-buttons">
            	        <button class="minus deactive" id="cola-minus" onClick="saveData('CocaCola',-1,0,-6)">-</button>
                        <button class="plus" onClick="saveData('CocaCola',1,0,6)">+</button>
                    </div>
                </div>
                <div class="col" >
                    <p>Coca Cola Zero</p>
                    <h4 id="ColaZ-Counter">0</h4>
                    <div class="item-buttons">
                        <button class="minus deactive" id="colaZ-minus" onClick="saveData('CocaZero',-1,1,-6)">-</button>
                        <button class="plus" onClick="saveData('CocaZero',1,1,6)">+</button>
                    </div>
                </div>
                <div class="col" >
                    <p>Faxe Kondi</p>
                    <h4 id="Faxe-Counter">0</h4>
                    <div class="item-buttons">
                        <button class="minus deactive" id="faxe-minus" onClick="saveData('FaxeKondi',-1,2,-6)">-</button>
                        <button class="plus" onClick="saveData('FaxeKondi',1,2,6)">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-bag">
            <h2>Indkøbskurv</h2>
            <div class="order-container">
                <ul>
                    <li>
                        <h4>Snacks</h4>
                        <ul class="dashed">
                            <li class="deactive" id="SCOC-bag"><p>Sour Creme & Onion <span class="bagAmount" id="SCOCBagAmount">x1</span></p><h6 id="SCOCBagPrice">12 kr.</h6></li>
                            <li class="deactive" id="AGC-bag"><p>American Grill Chips <span class="bagAmount" id="AGCBagAmount">x1</span></p><h6 id="AGCBagPrice">12 kr.</h6></li>
                            <li class="deactive" id="BBQ-bag"><p>Barbeque Chips <span class="bagAmount" id="BBQBagAmount">x1</span></p><h6 id="BBQBagPrice">12 kr.</h6></li>
                        </ul>
                    </li>
                    <li>
                        <h4>Drikkevare</h4>
                        <ul class="dashed">
                            <li class="deactive" id="cola-bag"><p>Coca Cola <span class="bagAmount" id="ColaBagAmount">x1</span></p><h6 id="ColaBagPrice">6 kr.</h6></li>
                            <li class="deactive" id="colaZ-bag"><p>Coca Cola Zero <span class="bagAmount" id="ColaZBagAmount">x1</span></p><h6 id="ColaZBagPrice">6 kr.</h6></li>
                            <li class="deactive" id="faxe-bag"><p>Faxe Kondi <span class="bagAmount" id="FaxeBagAmount">x1</span></p><h6 id="FaxeBagPrice">6 kr.</h6></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="total-container">
                <!-- <p>I alt</p> -->
                <h3 id="totalPrice">0 Kr.</h3>
                <div class="item-buttons">
                    <button id="clearBTN" class="minus deactive" onClick="ClearOrder()">Clear Order</button>
                    <button id="saveBTN" class="plus deactive" onClick="SaveOrder()">Save Order</button>
                </div>
            </div>
            
        </div>
	</div>


    <div class="containter" style="margin-top: 75px;">
        <!--Button for saving order to Log-->
        <div class="row" style="text-align: center;">
            <div class="col">
                
            </div>
            <div class="col">
                <h3> Click the button to download the csv file </h3>  
                <!-- create an HTML button to download the csvfile on click -->  
                <a id="downloadBTN" href="#" download="/logs/12-10-2022.csv"><button class="plus" style="padding:0 10px; border-radius: var(--border-radius-full);"> Download csv</button></a> 
            </div>
        </div>
    </div>
    
</body>
</html>