<!doctype html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <!-- CSS -->
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" type="text/css" href="https://bootswatch.com/journal/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/vue/0.12.1/vue.min.js"></script>
    </head> 

    <body class="container" id="guestbook"> 
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <h4>Simple Guestbook example</h4>
            </div>
            
            <form v-on="submit: onCreate">
                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="name" v-model="name" placeholder="Name">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="title" v-model="title" placeholder="Put here your title">
                </div>
            
                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="message" v-model="message" placeholder="Put here your message">
                </div>
            
                <div class="form-group text-right">   
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
            <div class="guestbook" v-repeat="guestbook: guestbooks">
                <h3>Message #{{ guestbook.id }} <small>by {{ guestbook.name }}</small></h3>
                <p>{{ guestbook.message }}</p>
                <p><span class="btn btn-primary text-muted" v-on="click: onDelete(guestbook)">Delete</span></p>
            </div>
        </div>
        <script type="text/javascript">
            new Vue({ 
                el: '#guestbook',
                data: {
                    guestbook: [],
                    title: '',
                    name: '',
                    message: ''
                },
                ready: function() {
                    this.getMessages();
                },
                methods: {
                    getMessages: function() {
                        $.ajax({
                            context: this,
                            url: "/api/guestbook",
                            success: function (result) {
                                this.$set("guestbooks", result) 
                            }
                        })
                    },
                    onCreate: function(e) {
                        e.preventDefault()
                        $.ajax({
                            context: this,
                            type: "POST",
                            data: {
                                name: this.name,
                                title: this.title,
                                message: this.message
                            },
                            url: "/api/guestbook",
                            success: function(result) {
                                this.guestbooks.push(result);
                                this.name = '';
                                this.title = '';
                                this.content = '';
                            }
                        })                        
                    },
                    onDelete: function (guestbook) {
                        $.ajax({
                            context: guestbook,
                            type: "DELETE",
                            url: "/api/guestbook/" + guestbook.id,
                        })
                        this.guestbooks.$remove(guestbook);
                    }
                }
            })
        </script>
    </body> 
</html>