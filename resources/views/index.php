<!doctype html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <link rel="stylesheet" type="text/css" href="https://bootswatch.com/journal/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    </head> 

    <body class="container" id="guestbook"> 
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <h4>Simple Guestbook example</h4>
            </div>
            <form id="form">
                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="name" id="name" placeholder="Name">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="title" id="title" placeholder="Put here your title">
                </div>
            
                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="message" id="message" placeholder="Put here your message">
                </div>
            
                <div class="form-group text-right">   
                    <button type="submit" id ="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
            <div class="guestbook">
                
            </div>
        </div>
        <script type="text/javascript">
            //Get all messages
            $(document).ready(function(){
                $.ajax({
                    type: "GET",
                    url: "/api/guestbook",
                    success: function (result) {
                        result.forEach(function(item, i, result) {
                          $('.guestbook').append(
                            '<h3>#'+result[i].id + ', message  <small>by </small>'+ result[i].name+ ' with title<i>:'+result[i].title + '</i></p></h3>'+'<p>Message: '+result[i].message+'</p>'
                            );
                        }); 
                    }
                });
            });
            
            //submit function
            $('#submit').click(function( event ) {
                $.ajax({
                    type: "POST",
                    url: "/api/guestbook",
                    data: $("#form").serialize(),
                    success: function (result) {
                    }
                });
              });
        </script>
    </body> 
</html>