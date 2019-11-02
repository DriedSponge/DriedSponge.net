
<!DOCTYPE html>
<html>
    <head>
<!--         Site created: 9/19/19
        Author: DriedSponge(Jordan Tucker) -->
           
        <meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<!-- Global site tag (gtag.js) - Google Analytics -->



<meta name="theme-color" content="#007BFF">
 <link id="styless" rel="stylesheet" href = "https://driedsponge.net/css/textclass.css" >

 <link id="favicon" rel="icon" href = "https://cdn.driedsponge.net/img/zfavicon.ico" type="image/x-icon">
  
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-140402227-3"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140402227-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140402227-3');
</script>
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="description"  content="Name: DriedSponge.net,SteamID64: 76561198357728256
, SteamID: STEAM_1:0:198731264
, SteamID3: [U:1:397462528]
, URL: https://steamcommunity.com/id/driedsponge/" />
        <meta name="keywords" content="DriedSponge.net, 76561198357728256
, STEAM_1:0:198731264
, [U:1:397462528]
" />
        <meta property="og:site_name" content="DriedSponge.net | SteamID Finder" /> <!-- Replace with your name or whatever you want-->
        <meta property="og:title" content="Info on DriedSponge.net" />
        <meta property="og:image" content="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/18/18be38c2f230fea0fa667c8165e4da5cb1a787c0_full.jpg" />
        <meta property="og:image:type" content="image/png" />
        <meta name="author" content="Jordan Tucker">
        <meta property="og:description"  content="SteamID64: 76561198357728256
 SteamID: STEAM_1:0:198731264
 SteamID3: [U:1:397462528]
 URL: https://steamcommunity.com/id/driedsponge/" />
        <meta property="og:site_name" content="DriedSponge.net - driedsponge.net" />
        <title>DriedSponge.net - driedsponge.net</title>

        <script src="https://kit.fontawesome.com/0add82e87e.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href = "//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" type="text/css" >
       
        <style>
            .url{
                 color: white; 
                 text-decoration: underline;
            }
            .url:hover{
                 color: rgb(228, 228, 228); 
                 text-decoration: underline;
            }
            
        </style>
    </head>
    
 <body>

     <div class="app">
    <div class="container-fluid-lg">
        <div class="page-header">
        
            <nav class="navbar navbar-expand-lg navbar-dark  nbth fixed-top" >
                    <a class="navbar-brand" href="#"><strong>driedsponge.net</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                    <div class="collapse navbar-collapse" id="navbarmain">
                            
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="webdesign.php">Web Projects</a></li>
                            <li class="nav-item"><a class="nav-link" href="lua.php">Lua Projects</a></li>
                            <li class="nav-item"><a class="nav-link" href="tutorials/index.php">Coding Tutorials</a></li>
                            <li class="nav-item active"><a class="nav-link" href="steam.php">Steam Tool<span class="sr-only">(current)</span></a></li>
                        </ul>  
                        </div>
                  </nav>
                
                  
        </div>
        
    </div>
    <div class="container-fluid-lg" style="padding-top: 80px;">
        

        
            <div class="container">
               
                    <hgroup>
                        <h2><strong>Steam ID Tool</strong></h2>
                        <br>
                        
                     <div class="form-group">
                        
     <input id="id64" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter a SteamID/SteamID64/SteamID3/Profile URL/Custom Profile URL">
    </div>
<button onclick="go()" type="submit" class="btn btn-primary">Submit</button>                    
                    <br>
                    </hgroup>
                    <div class="jumbotron" style="text-align: center;">
                    <h2><img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/18/18be38c2f230fea0fa667c8165e4da5cb1a787c0_full.jpg"/></h2>
                    <h1>Results for: DriedSponge.net</h1>
                    <p class="paragraph"><strong>SteamID64:</strong> 76561198357728256
 <button  value="76561198357728256
" onclick="copything(this.value)" class="btn btn-success"><i class="far fa-copy"></i></button></p>
                    <p class="paragraph"><strong>SteamID:</strong> STEAM_1:0:198731264
 <button  value="STEAM_1:0:198731264
" onclick="copything(this.value)" class="btn btn-success"><i class="far fa-copy"></i></button></p>
                    <p class="paragraph"><strong>SteamID3:</strong> [U:1:397462528]
 <button value="[U:1:397462528]
" onclick="copything(this.value)" class="btn btn-success"><i class="far fa-copy"></i></button></p>
                    <p class="paragraph"><strong>Profile URL:</strong> <a class="url" target="_blank" href="https://steamcommunity.com/id/driedsponge/">https://steamcommunity.com/id/driedsponge/</a> <button value="https://steamcommunity.com/id/driedsponge/" onclick="copything(this.value)" class="btn btn-success"><i class="far fa-copy"></i></button></p>
                    <h4 class="subheading" style="color: white;">Personal Info (This may not be accurate)</h4><br>
                    <p class="paragraph"><strong>Real Name:</strong> Jordan <button value="Jordan" onclick="copything(this.value)" class="btn btn-success"><i class="far fa-copy"></i></button></p>
                    <p class="paragraph"><strong>Country</strong>: US <button value="US" onclick="copything(this.value)" class="btn btn-success"><i class="far fa-copy"></i></button> </p>
                    
                    </div>
                    
                       
            



                    

                        </div>
</div>
</div> 
<!-- End of "app" -->

<a href="https://billing.hexanenetworks.com/aff.php?aff=330" target="_blank"style="text-align: center;"><img width="580px"  src="https://cdn.hexanenetworks.com/img/web/branding/hexane-networks-banner.png" /></a>
<br>
<footer>
    <div class="page-footer">
            <h4><em class="socials">Socials</em></h4>
                    
                        <a href="https://steamcommunity.com/id/driedsponge" target="_blank"><button  data-tippy-content="Steam" type="button" class="btn btn-success"><i class="fab fa-steam fa-2x"></i></button></a>
                        <a href="https://twitter.com/Dried_Sponge" target="_blank"><button type="button" data-tippy-content="Twitter" class="btn btn-success"><i class="fab fa-twitter fa-2x"></i></button></a>
                        <a href="https://www.reddit.com/user/DriedSponge78" target="_blank"><button data-tippy-content="Reddit" type="button" class="btn btn-success"><i class="fab fa-reddit fa-2x"></i></button></a>
                        <a href="https://www.youtube.com/channel/UCuGIXCXxUJNaq8NjFsYM21A" target="_blank"><button data-tippy-content="YouTube" type="button" class="btn btn-success"><i class="fab fa-youtube fa-2x"></i></button></a>
                        <a href="https://gitlab.com/DriedSponge" target="_blank"><button  data-tippy-content="Git Lab" type="button" class="btn btn-success"><i class="fab fa-gitlab fa-2x"></i></button></a>
                       <button type="button" class="btn btn-success" data-toggle="modal" data-tippy-content="Discord" data-target="#keymodal"><i class="fab fa-discord fa-2x"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="keymodal" tabindex="-1" role="dialog" aria-labelledby="keytitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="keytitle">Discord</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <iframe src="https://discordapp.com/widget?id=506684375543447573&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <p><cite>Copyright © 2019 DriedSponge.net &bull; Current theme: Default &bull; <a href="https://driedsponge.net/privacy.php" class="whitehyperlink">Privacy Policy</a> &bull; Please report any bugs on the site in my <a href="https://discordapp.com/invite/EEPXhqE" class="whitehyperlink" target="_blank">discord server</a></cite></p>
                            
        </div>
      </footer>



    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
        <script src="https://unpkg.com/popper.js@1"></script>
        <script src="https://unpkg.com/tippy.js@4"></script>
        <script src="main.js"></script>
        

        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        document.getElementById("id64").value = "76561198357728256";

        </script>
        <script>
          function  copything(value){
            

            navigator.clipboard.writeText(value)
            
           toastr["success"](value + " was successfully copied to clipboard", "Congradulations!")

           toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
          }


        </script>
        <script src="search.js"></script>
 </body>






</html>
