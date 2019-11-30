<!DOCTYPE html>


<html>
    <head>
        
        
        <meta name="description" content="Welcome to my second Lua tutorial!. In this tutorial I will cover the following items: addon structure, functions, and variables.">
        <meta name="keywords" content="lua functions, Lua tutorial, gmod lua functions,lua variables, DriedSponge Lua Tutorials Getting Started,lua Getting Started">
        <meta name="author" content="Jordan Tucker">
        <meta property="og:site_name" content="DriedSponge.net | Lua Tutorial 2 - Getting Started" />
        
        <title>Lua Tutorial 2 - Getting Started</title>
        <script src="https://kit.fontawesome.com/0add82e87e.js" crossorigin="anonymous"></script>
    </head>

 <body>
        

    <div class="app">
    <div class="container-fluid-lg" style="padding-top: 80px;">

        
            <div class="container">
               
                    <hgroup>
                        <h2><strong><a href="index.php">Tutorials</a> &gt; Lua Tutorial 2 - Getting Started</strong></h2>
                        <br>
                    </hgroup>
                    <p class="paragraph">Welcome to my second Lua tutorial!. In this tutorial I will cover the following items:</p>
                    <ul class="paragraph">
                            <li><a href="#as">Addon Structure</a></li>
                            <li><a href="#f">Functions</a></li>
                            <li><a href="#v">Variables</a></li>
                        </ul>
                    <h4 class="subheading">Video:</h4>  
                    <p style="text-align: center;"><iframe width="560" height="315" src="https://www.youtube.com/embed/h2qyMIxIA2o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
                    <br>


                    <h4 class="subheading" id="as">Addon Structure</h4>
                        <p class="paragraph">Addon structure is very important when loading your addon. If you do it improperly, your addon will not load and therefore not work. I will do my best to describe how to structure your addon here, but it's probably better to watch the video.</p>
                        <p class="paragraph">First, navigate to where your garrysmod folder is (<i>Usually in Steam\steamapps\common\GarrysMod\garrysmod</i>). In that folder you should see another folder called addons.</p>
                        <img src="https://i.driedsponge.net/images/png/1sIid.png" alt="GMOD Directory" />
                        <p class="paragraph">This is the folder where all your addons will go (<i>The gma files are just addons from the workshop. You do not need to worry about them</i>). Enter the addons folder and create a new folder. You can name the folder whatever you want.</p>
                        <img src="https://i.driedsponge.net/images/png/D8vIT.png" alt="Addon Directory" />    
                        <p class="paragraph">This is where every file regarding your addon will go. This includes lua/sound/materials and other items to. In this tutorial, I will only be talking about the lua folder, so go ahead and create that folder.</p>
                        <img src="https://i.driedsponge.net/images/png/UsZGD.png" alt="Lua Directory" />
                        <p class="paragraph">In the lua folder, create a folder called autorun. This tells the game to automatically run the code when the script is loaded. You don't always have to use an autorun folder but it's good to use when getting started. 
                        <img src="https://i.driedsponge.net/images/png/Q1fC4.png" alt="Client/Server Directory" />
                        <p class="paragraph"> Next, create two folders in the autorun folder. One called <i>client</i> and one called <i>server</i>. You will also want to create a lua file called <i>shared.lua</i>.</p>
                        <img src="https://i.driedsponge.net/images/png/ZIytg.png" alt="Client/Server Directory" />
                        <p class="paragraph">The client folder is where all your client code will go. The server folder is where your server code is stored. The shared.lua is for all of your shared code (<i>If it is necessary, you can create multiple shared lua files! Also it does not have to be named shared.lua! That is just what I named it.</i>). Finally create a lua file in the client folder named whatever you want and create a lua file in the server folder named whatever you want. File names don't really matter, all that matters in the directory and that it's a lua file.</p>
                        <img src="https://i.driedsponge.net/images/gif/unkbn.gif" alt="Client/Server files" />
                        <p class="paragraph">The lua file you put in the client folder will have all your client code. The lua file you put in the server folder will have all of your server code. This marks the end of this segment.</p>
                    <br>
                    <h4 class="subheading" id="f">Functions</h4> 
                    <p class="paragraph">A function is basically a thing that tells the game to do something. As explained in <a target="_blank" href="lua.php?page=1">the first tutorial</a>, there are server, client, and shared functions(See <a target="_blank" href="lua.php?page=1#css">Client/Server/Shared</a>). An example of a functions would be <code>print("hello world")</code>. This tells the server or client to print the string hello world in console.</p>
                    <p class="paragraph">Right now we are going to test this function. In your shared file enter <code>print("hello shared")</code>. It should look like this:</p>
                    <img src="https://i.driedsponge.net/images/png/3BKVa.png" alt="print functions" />
                    <p class="paragraph">To test your code, start up gmod and click start new game.<strong>Make sure you have max players set to at least two</strong>, this is because the server side does not load in single player. Then click start game.</p>
                    <p class="paragraph">To check if your code worked, open the console by pressing the tilde key (<i>The key right below the escape key. If this does not work, you might have to enable the developer console in settings</i>). When you open your console look for  the <code>"hello shared"</code> string.</p>
                    <img src="https://i.driedsponge.net/images/gif/Wr5dz.gif" alt="print functions in console" />
                    <p class="paragraph">As you can see it printed twice. Blue means server, yellow means client. You can tell this is shared because it printed once on the server and once on the client! Now that we have our first function out of the way, let's move on to variables. In a future tutorial, I will talk about creating your own functions.</p>

                    <br>

                    <h4 class="subheading" id="v">Variables</h4>
                    <h5><span class="badge badge-primary">Tip: To clear your console, use the <i>clear</i> console command.</span></h5>

                    <p class="paragraph">Variables are things that allow your addon to hold data. This data can be called and reused throughout your code. This data  can be a boolean, string, or number (<i>See <a target="_blank" href="lua.php?page=1#dt">Data Types</a></i>). There are two types of variables, local variables and global variables. The difference between local and global variables is that local variables only exist in the block that they are defined, and global variables exist in the entire file. You can also use variables from other files if you use the <a href="http://wiki.garrysmod.com/page/Global/include" target="_blank">include</a> function and the <a href="http://wiki.garrysmod.com/page/Global/AddCSLuaFile" targert="_blank">AddCSLuaFile</a> function. This is how you define a variable:</p> 
                    <img src="https://i.driedsponge.net/images/png/oitVe.png" alt="variable example"/>
                    <p class="paragraph">Alright, let's go back to our print function. We can print out our variable by changing our print function to <code>print(myvariable)</code> (<i>In my case I want to print <code>MyCar</code></i>).</p>
                    <img src="https://i.driedsponge.net/images/png/ybqL4.png" alt="variable print example code"/>
                    <img src="https://i.driedsponge.net/images/png/fyO5j.png" alt="variable print example"/>
                    <p class="paragraph">Now we are going to talk about concatenation. This is basically allows you to join two strings together. All you gotta use is <code>..</code>. Here are some examples of how you would use this:</p>
                   
                    <ul class="paragraph">
                        <li><code><a href="https://wiki.garrysmod.com/page/Global/print" target="_blank">print</a>("keeping two strings apart ".."for some reason")</code></li>
                        <li><code><a href="https://wiki.garrysmod.com/page/Global/print" target="_blank">print</a>("My car year is "..MyCarYear)</code></li>
                        <li><code><a href="https://wiki.garrysmod.com/page/Global/print" target="_blank">print</a>(MyCar.." is my car brand")</code></li>
                        <li><code><a href="https://wiki.garrysmod.com/page/Global/print" target="_blank">print</a>("My name is driedsponge and my new "..MyCar.." is from "..MyCarYear)</code></li>
                    </ul> 
                    <p class="paragraph">Let's look to see what it printed:</p>
                    <img src="https://i.driedsponge.net/images/png/hZ4g3.png" alt="concatenation print example code"/>
                    <img src="https://i.driedsponge.net/images/png/5mmAv.png" alt="concatenation print example"/>
                    <p class="paragraph">Concatenation and variables in general can be very useful when displaying information. Also, variables are very useful for reusing pieces of data, especially when your making some kind of menu and you want to have a primary color and secondary color.</p>
                    

                    <br>
                    <p class="paragraph">This is the end of my second tutorial!. As always, if anyone needs help the best way to talk to me is in <a href="https://driedsponge.net/discord" target="_blank">my discord server</a>. Have a good day/evening!</p>
                    <br>
                    
                    


</div>
</div>
</div> 

<!-- end of app -->



                
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/popper.js@1"></script>
        <script src="https://unpkg.com/tippy.js@4"></script>
       
 </body>






</html>