<html>
    <body> 
        <div class="container">
            <?php  if (isset($mensaje)){
        echo "<p style='color:red; font-weight: bold;'>".$mensaje.'</p>';}
        ?>
            <div class="row" >
                <div class="col-sm-4">
                    <div class="signup-form" >
                        <form method="post">
                            Nombre usuario: <input type="text" name="user"><br>
                          
                            <input type="submit" 
                                   style="background-color:#FF8A02;color:white;"  
                                   value='Enviar'> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>    
</html>

