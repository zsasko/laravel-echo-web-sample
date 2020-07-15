<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Laravel Echo Web Sample</title>
  </head>
  <body>
    <main role="main" class="container">
      <h1 class="mt-5">Laravel Echo Web Sample</h1>
      <br/>
      <p>Please enter a message that will be sent to the clients (this web application and android application) via Laravel Echo.</p>
      <form id="newMessageForm">
        <div class="form-group">
            <label for="messageInput">Message</label>
            <input type="text" class="form-control" id="messageInput" placeholder="Enter some message">
        </div>
        <button id="submitButton" type="submit" class="btn btn-primary">Submit</button>
        <br/><br/>
        <div class="form-group">
          <label for="messagesList">Received messages:</label>
          <ul id="messagesList" class="list-group">
          </ul>
        </div>
      </form>
    </main>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
  	<script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      $("#newMessageForm").submit(function(event) {
        event.preventDefault();
        const message = $("#messageInput").val();
        if (message === "") {
          alert("Please add some message!");
          return;
        }
        postMessageToBackend(message);
      });

      /**
       * Sending message to backend.
       * (No need to update messages list, because Laravel Echo listener will receive the message.)
       */
      function postMessageToBackend(message) {
        $.post("messages", {
          "_token": "{{ csrf_token() }}",
          "message": message 
        }).fail(function() {
          alert("Error occurred during sending the data. Please retry again later.");
        })
      }

      /**
       * Global Laravel Echo listener that listens 'MessageCreated' event in 'messages' channel.
       */
      window.Echo.channel('messages').listen('MessageCreated', (e) => {
        addMessageToList(e.message);
      });

      /**
       * Helper function that adds new message to messages list.
       */
      function addMessageToList(message) {
        const newLi = `<li class="list-group-item">${message}</li>`;
        $("#messagesList").prepend(newLi);
      }
    </script>
  </body>
</html>

