<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listen Event</title>
  </head>
  <body>  
    <script>
      window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
    </script>
    <script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script> 
    <script src="{{ asset('public/js/laravel-echo-setup.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      try {
        window.Echo.channel('TestEvent').listen('TestEvent', (data) => {
          alert("Event is working");
          console.log("data", data);
        });
      }
      catch(e) {
        console.log("Error while listening");
      }
    </script>
  </body>
</html>